<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryCotroller extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.index', compact('subsubcategories', 'cats'));
    }

    public function getsubcategory($category_id)
    {
        $subcategories = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en', 'ASC')->get();
         return json_encode($subcategories);
    }

    public function getsubsubcategory($subcategory_id)
    {
        $subsubcategories = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
         return json_encode($subsubcategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_tr' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
        ]);

        $result = SubSubCategory::insert([
            'subsubcategory_name_en' => Helpers::one_tr($request->subsubcategory_name_en),
            'subsubcategory_name_tr' => Helpers::one_tr($request->subsubcategory_name_tr),
            'subsubcategory_slug_en' => Helpers::slugify($request->subsubcategory_name_en),
            'subsubcategory_slug_tr' => Helpers::slugify($request->subsubcategory_name_tr),
            'subcategory_id' => $request->subcategory_id,
            'category_id' => $request->category_id,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Sub-Sub Category Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.subsubcategory.index')->with($notification);


    }

    public function edit($category_id,$id)
    {
        $cats = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory.edit', compact('subsubcategory', 'subcategories', 'cats'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_tr' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
        ]);

        $result = SubSubCategory::findOrFail($request->id)->update([
            'subsubcategory_name_en' => Helpers::one_tr($request->subsubcategory_name_en),
            'subsubcategory_name_tr' => Helpers::one_tr($request->subsubcategory_name_tr),
            'subsubcategory_slug_en' => Helpers::slugify($request->subsubcategory_name_en),
            'subsubcategory_slug_tr' => Helpers::slugify($request->subsubcategory_name_tr),
            'subcategory_id' => $request->subcategory_id,
            'category_id' => $request->category_id,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Sub-Sub Category Successfully Updated',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.subsubcategory.index')->with($notification);
    }

    public function delete($id)
    {
        $result = SubSubCategory::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Sub-Sub Category Successfully Deleted',
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
