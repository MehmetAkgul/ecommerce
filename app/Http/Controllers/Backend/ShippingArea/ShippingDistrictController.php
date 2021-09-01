<?php

namespace App\Http\Controllers\Backend\ShippingArea;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingDistrictController extends Controller
{
    public function index()
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.shipping.district.index', compact('districts','divisions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'district_name' => 'required'
        ]);

        $status = ShippingDistrict::insert([
            'division_id' => Helpers::one_tr($request->division_id),
            'district_name' => Helpers::one_tr($request->district_name),
            'created_at' => Carbon::now(),
        ]);


        if ($status) {
            $notification = array(
                'message' => 'Shipping District Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.shipping.district.index')->with($notification);
    }



    public function edit($id)
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $district = ShippingDistrict::findOrFail($id);
        return view('backend.shipping.district.edit', compact('district','divisions'));
    }

    public function update(Request $request)
    {
        $status = ShippingDistrict::findOrFail($request->id)->update([
            'division_id' => Helpers::one_tr($request->division_id),
            'district_name' => Helpers::one_tr($request->district_name),
            'created_at' => Carbon::now(),
        ]);

        if ($status) {
            $notification = array(
                'message' => 'Shipping District Added Successfully',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'An Error Occurred During Operation Please Contact Your System Administrator.',
                'alert-type' => 'error',
            );
        }
        return Redirect()->route('backend.shipping.district.index')->with($notification);
    }

    public function delete($id)
    {

        $status = ShippingDistrict::findOrFail($id)->delete();
        if ($status) {
            $notification = array(
                'message' => 'Shipping District Successfully Deleted',
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
