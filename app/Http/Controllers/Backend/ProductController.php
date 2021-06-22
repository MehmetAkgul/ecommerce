<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $cats = Category::latest()->get();
        $subcats = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.create', compact('subcats', 'cats', 'brands'));
    }

}
