<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.index', compact('subcategories','cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_tr' => 'required',
            'category_id' => 'required',
        ]);

        $result = SubCategory::insert([
            'subcategory_name_en' => Helpers::one_tr($request->subcategory_name_en),
            'subcategory_name_tr' => Helpers::one_tr($request->subcategory_name_tr),
            'subcategory_slug_en' => Helpers::slugify($request->subcategory_name_en),
            'subcategory_slug_tr' => Helpers::slugify($request->subcategory_name_tr),
            'category_id' => $request->category_id,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Sub Category Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.subcategory.index')->with($notification);


    }

    public function edit($id)
    {
        $cats = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit', compact('subcategory','cats'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_tr' => 'required',
            'category_id' => 'required',
        ]);

        $result = SubCategory::findOrFail($request->id)->update([
            'subcategory_name_en' => Helpers::one_tr($request->subcategory_name_en),
            'subcategory_name_tr' => Helpers::one_tr($request->subcategory_name_tr),
            'subcategory_slug_en' => Helpers::slugify($request->subcategory_name_en),
            'subcategory_slug_tr' => Helpers::slugify($request->subcategory_name_tr),
            'category_id' => $request->category_id,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Sub Category Successfully Updated',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.subcategory.index')->with($notification);
    }

    public function delete($id)
    {
        $result = SubCategory::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Sub Category Successfully Deleted',
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
