<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileControlller extends Controller
{
    public function index()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile.index', compact('adminData'));
    }

    public function edit()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile.edit', compact('adminData'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find(1);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->image) {
            $file = $request->file('image');
            @unlink(public_path('upload/admin_images/' . $admin->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $admin['profile_photo_path'] = $filename;
        }
        $admin->save();
        $notification = array(
            'message' => 'Admin profile Updated Successful',
            'alert-type' => 'success',
        );
        return Redirect()->route('admin.profile.index')->with($notification);
    }

    public function editPassword()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile.password', compact('adminData'));
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);


        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            $notification = array(
                'message' => 'You entered your current password incorrectly.',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.password.edit')->with($notification);
        }


    }
}
