<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    }


    public function active($id)
    {

        $result = Slider::findOrFail($id)->update([
            'status' => 1
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Slider Successfully Activated',
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

        $result = Slider::findOrFail($id)->update([
            'status' => 0
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Slider Successfully Inactivated',
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

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);
        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image');
            $new_img_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $img_check = Image::make($image)->resize(870, 370)->save('upload/slider/' . $new_img_name);
            if ($img_check === false) {
                $notification = array(
                    'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                    'alert-type' => 'error',
                );
                return Redirect()->route('backend.slider.index')->with($notification);
            }
            $image = 'upload/slider/' . $new_img_name;
        }


        $slider_check = Slider::insert([
            'title' => $request->title,
            'title_tr' => $request->title_tr,
            'description' => $request->description,
            'description_tr' => $request->description_tr,
            'title_color' => $request->title_color,
            'image' => $image,
            'link' => $request->link,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        if ($slider_check) {
            $notification = array(
                'message' => 'Slider Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.slider.index')->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request)
    {

        $image =$request->old_image;
        if ($request->file('image')) {
            @unlink($image);
            $image = $request->file('image');
            $new_img_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $img_check = Image::make($image)->resize(870, 370)->save('upload/slider/' . $new_img_name);
            if ($img_check === false) {
                $notification = array(
                    'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                    'alert-type' => 'error',
                );
                return Redirect()->route('backend.slider.index')->with($notification);
            }
            $image = 'upload/slider/' . $new_img_name;
        }

        $slider_check = Slider::findOrFail($request->id)->update([
            'title' => $request->title,
            'title_tr' => $request->title_tr,
            'description' => $request->description,
            'description_tr' => $request->description_tr,
            'title_color' => $request->title_color,
            'image' => $image,
            'link' => $request->link,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);


        if ($slider_check) {
            $notification = array(
                'message' => 'Slider Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.slider.index')->with($notification);
    }

    public function delete($id)
    {
        $oldimg = Slider::findOrFail($id);
       unlink($oldimg->image);
        $result = Slider::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'message' => 'Slider Successfully Deleted',
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
