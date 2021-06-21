<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_tr' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        $result = Brand::insert([
            'brand_name_en' => Helpers::one_tr($request->brand_name_en),
            'brand_slug_en' => Helpers::slugify($request->brand_name_en),
            'brand_name_tr' => Helpers::one_tr($request->brand_name_tr),
            'brand_slug_tr' => Helpers::slugify($request->brand_name_tr),
            'brand_image' => $save_url,
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Brand Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.brand.index')->with($notification);


    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(Request $request)
    {
        $result = "";
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_tr' => 'required',
        ]);

        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            //$image->move(public_path('upload/brand/'), $name_gen);
            Image::make($image)->save('upload/brand/' . $name_gen);

            $save_url = 'upload/brand/' . $name_gen;
            $result = Brand::findOrFail($request->id)->update([
                'brand_name_en' => Helpers::one_tr($request->brand_name_en),
                'brand_slug_en' => Helpers::slugify($request->brand_name_en),
                'brand_name_tr' => Helpers::one_tr($request->brand_name_tr),
                'brand_slug_tr' => Helpers::slugify($request->brand_name_tr),
                'brand_image' => $save_url,
            ]);
            @unlink($request->old_image);
        } else {
            $result = Brand::findOrFail($request->id)->update([
                'brand_name_en' => Helpers::one_tr($request->brand_name_en),
                'brand_slug_en' => Helpers::slugify($request->brand_name_en),
                'brand_name_tr' => Helpers::one_tr($request->brand_name_tr),
                'brand_slug_tr' => Helpers::slugify($request->brand_name_tr),
            ]);
        }
        if ($result) {
            $notification = array(
                'message' => 'Brand Successfully Updated',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.brand.index')->with($notification);
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        @unlink($img);
        $result = Brand::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Brand Successfully Deleted',
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
