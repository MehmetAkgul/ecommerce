<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_tr' => 'required',
            'category_icon' => 'required',
        ]);

        $result = Category::insert([
            'category_name_en' => Helpers::up_tr($request->category_name_en),
            'category_name_tr' => Helpers::up_tr($request->category_name_tr),
            'category_slug_en' => Helpers::slugify($request->category_name_en),
            'category_slug_tr' => Helpers::slugify($request->category_name_tr),
            'category_icon' => $request->category_icon,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.category.index')->with($notification);


    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_tr' => 'required',
            'category_icon' => 'required',
        ]);

        $result = Category::findOrFail($request->id)->update([
            'category_name_en' => Helpers::up_tr($request->category_name_en),
            'category_name_tr' => Helpers::up_tr($request->category_name_tr),
            'category_slug_en' => Helpers::slugify($request->category_name_en),
            'category_slug_tr' => Helpers::slugify($request->category_name_tr),
            'category_icon' => $request->category_icon,
        ]);

        if ($result) {
            $notification = array(
                'message' => 'Category Successfully Updated',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('backend.category.index')->with($notification);
    }

    public function delete($id)
    {
        $result = Category::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Category Successfully Deleted',
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
