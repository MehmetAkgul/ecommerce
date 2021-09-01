<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons=Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.index',compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
             'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);



        $slider_check = Coupon::insert([
            'coupon_name' => mb_strtoupper($request->coupon_name),
             'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        if ($slider_check) {
            $notification = array(
                'message' => 'Coupon Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.coupon.index')->with($notification);
    }


    public function active($id)
    {

        $result = Coupon::findOrFail($id)->update([
            'status' => 1
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Coupon Successfully Activated',
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

        $result = Coupon::findOrFail($id)->update([
            'status' => 0
        ]);
        if ($result) {
            $notification = array(
                'message' => 'Coupon Successfully Inactivated',
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

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    public function update(Request $request)
    {
        $status = Coupon::findOrFail($request->id)->update([
            'coupon_name' => mb_strtoupper($request->coupon_name),
             'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        if ($status) {
            $notification = array(
                'message' => 'Coupon Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.coupon.index')->with($notification);
    }

    public function delete($id)
    {

        $status = Coupon::findOrFail($id)->delete();
        if ($status) {
            $notification = array(
                'message' => 'Coupon Successfully Deleted',
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


