<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    public function active($id)
    {

        $result = Product::findOrFail($id)->update([
            'status' => 1
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Product Successfully Activated',
                'alert-type' => 'info',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {

        $result = Product::findOrFail($id)->update([
            'status' => 0
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Product Successfully Inactivated',
                'alert-type' => 'info',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->back()->with($notification);
    }

    public function create()
    {
        $cats = Category::latest()->get();
        $subcats = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.create', compact('subcats', 'cats', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_tr' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_tr' => 'required',
            'product_color_en' => 'required',
            'product_color_tr' => 'required',
            'selling_price' => 'required',
            'short_description_en' => 'required',
            'short_description_tr' => 'required',
            'long_description_en' => 'required',
            'long_description_tr' => 'required',
            'product_thumbnail' => 'required',
            'multi_img' => 'required',
        ]);
        $img_thumbnail_path = "";
        if ($request->file('product_thumbnail')) {
            $img_thumbnail = $request->file('product_thumbnail');
            $new_img_name = hexdec(uniqid()) . "." . $img_thumbnail->getClientOriginalExtension();
            $img_check = Image::make($img_thumbnail)->resize(917, 1000)->save('upload/products/thumbnail/' . $new_img_name);
            if ($img_check === false) {
                $notification = array(
                    'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                    'alert-type' => 'error',
                );
                return Redirect()->route('backend.product.index')->with($notification);
            }
            $img_thumbnail_path = 'upload/products/thumbnail/' . $new_img_name;
        }


        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => Helpers::one_tr($request->product_slug_en),
            'product_slug_en' => Helpers::slugify($request->product_slug_en),
            'product_name_tr' => Helpers::one_tr($request->product_name_tr),
            'product_slug_tr' => Helpers::slugify($request->product_name_tr),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => Helpers::down_tr($request->product_tags_en),
            'product_tags_tr' => Helpers::down_tr($request->product_tags_tr),
            'product_size_en' => $request->product_size_en,
            'product_size_tr' => $request->product_size_tr,
            'product_color_en' => $request->product_color_en,
            'product_color_tr' => $request->product_color_tr,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_tr' => $request->short_description_tr,
            'long_description_en' => $request->long_description_en,
            'long_description_tr' => $request->long_description_tr,
            'product_thumbnail' => $img_thumbnail_path,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        // MULTIPLE IMG UPLOAD START
        $multi_img_check = false;
        if ($request->file('multi_img')) {
            $multi_img = $request->file('multi_img');
            foreach ($multi_img as $img) {
                $new_img_name = hexdec(uniqid()) . "." . $img->getClientOriginalExtension();
                $img_check = Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $new_img_name);
                if ($img_check === false) {
                    $notification = array(
                        'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                        'alert-type' => 'error',
                    );
                    return Redirect()->route('backend.product.index')->with($notification);
                }
                $img_path = 'upload/products/multi-image/' . $new_img_name;
                $multi_img_check = MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $img_path,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        // MULTIPLE IMG UPLOAD END


        if ($product_id && $multi_img_check) {
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.product.index')->with($notification);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $cats = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $multi_img = MultiImg::where('product_id', $id)->get();
        return view('backend.product.edit', compact('multi_img', 'product', 'cats', 'brands', 'subcategory', 'subsubcategory'));
    }

    public function multi_img_update(Request $request)
    {
        // MULTIPLE IMG UPLOAD START
        $multi_img_check = false;
        $multi_img = $request->file('multi_img');
        foreach ($multi_img as $id => $img) {

            $imgToDelete = MultiImg::findOrFail($id);
            @unlink($imgToDelete->photo_name);

            $new_img_name = hexdec(uniqid()) . "." . $img->getClientOriginalExtension();
            $img_check = Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $new_img_name);


            if ($img_check === false) {
                $notification = array(
                    'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                    'alert-type' => 'error',
                );
                return Redirect()->route('backend.product.index')->with($notification);
            }

            $img_path = 'upload/products/multi-image/' . $new_img_name;
            $multi_img_check = MultiImg::where('id', $id)->update([
                'photo_name' => $img_path,
                'updated_at' => Carbon::now(),
            ]);
        }

        // MULTIPLE IMG UPLOAD END


        if ($multi_img_check) {
            $notification = array(
                'message' => 'Product Pictures Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {

        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_tr' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_tr' => 'required',
            'product_color_en' => 'required',
            'product_color_tr' => 'required',
            'selling_price' => 'required',
            'short_description_en' => 'required',
            'short_description_tr' => 'required',
            'long_description_en' => 'required',
            'long_description_tr' => 'required',

        ]);

        $product_id = $request->product_id;

//******************************* IMAGE STAGE

        $img_path = $request->old_image;
        if ($request->file('product_thumbnail')) {
            @unlink($request->old_image);
            $img = $request->product_thumbnail;
            $new_img_name = hexdec(uniqid()) . "." . $img->getClientOriginalExtension();
            $img_check = Image::make($img)->resize(917, 1000)->save('upload/products/thumbnail/' . $new_img_name);
            if ($img_check === false) {
                $notification = array(
                    'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                    'alert-type' => 'error',
                );
                return Redirect()->route('backend.product.index')->with($notification);
            }
            $img_path = 'upload/products/thumbnail/' . $new_img_name;
//******************************* IMAGE STAGE
        }

        $product_check = Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'product_thumbnail' => $img_path,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => Helpers::one_tr($request->product_name_en),
            'product_slug_en' => Helpers::slugify($request->product_name_en),
            'product_name_tr' => Helpers::one_tr($request->product_name_tr),
            'product_slug_tr' => Helpers::slugify($request->product_name_tr),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => Helpers::down_tr($request->product_tags_en),
            'product_tags_tr' => Helpers::down_tr($request->product_tags_tr),
            'product_size_en' => $request->product_size_en,
            'product_size_tr' => $request->product_size_tr,
            'product_color_en' => $request->product_color_en,
            'product_color_tr' => $request->product_color_tr,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_tr' => $request->short_description_tr,
            'long_description_en' => $request->long_description_en,
            'long_description_tr' => $request->long_description_tr,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        if ($product_check) {
            $notification = array(
                'message' => 'Product Information (Excluding Product Images) Updated Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.product.index')->with($notification);
    }

    public function delete($id)
    {
        $oldMultiImg = MultiImg::where('prodcut_id', $id) > get();
        foreach ($oldMultiImg as $multi) {
            unlink($multi->photo_name);
        }


        $oldimg = Product::findOrFail($id);
        unlink($oldimg->product_thumbnail);
        $result = Product::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Product Successfully Deleted',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->back()->with($notification);
    }

    public function multi_img_delete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        $result = MultiImg::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Product Image Successfully Deleted',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->back()->with($notification);
    }


}
