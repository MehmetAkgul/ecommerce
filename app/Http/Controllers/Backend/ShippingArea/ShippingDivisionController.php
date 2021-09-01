<?php

namespace App\Http\Controllers\Backend\ShippingArea;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingDivisionController extends Controller
{
    public function index()
    {
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();
        return view('backend.shipping.division.index', compact('divisions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'division_name' => 'required'
        ]);

        $status = ShippingDivision::insert([
            'division_name' => Helpers::one_tr($request->division_name),
            'created_at' => Carbon::now(),
        ]);


        if ($status) {
            $notification = array(
                'message' => 'Shipping Division Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.shipping.division.index')->with($notification);
    }



    public function edit($id)
    {
        $divisions = ShippingDivision::findOrFail($id);
        return view('backend.shipping.division.edit', compact('divisions'));
    }

    public function update(Request $request)
    {
        $status = ShippingDivision::findOrFail($request->id)->update([
            'division_name' => Helpers::one_tr($request->division_name),
            'created_at' => Carbon::now(),
        ]);

        if ($status) {
            $notification = array(
                'message' => 'Shipping Division Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.shipping.division.index')->with($notification);
    }

    public function delete($id)
    {

        $status = ShippingDivision::findOrFail($id)->delete();
        if ($status) {
            $notification = array(
                'message' => 'Shipping Division Successfully Deleted',
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
