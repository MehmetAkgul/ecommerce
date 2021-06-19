<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');

    }

    public function UserProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileUpdate(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        if ($request->file('profile_photo_path')) {
            $data = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . Auth::user()->profile_photo_path));
            $filename = date('YmdHi') . $data->getClientOriginalName();
            $filepath = 'upload/user_images/' . date('YmdHi') . $data->getClientOriginalName();
            $data->move(public_path('upload/user_images/'), $filename);
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->profile_photo_path = $filepath;
            $user->save();
        }

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()

        ]);


        $notification = array(
            'message' => 'Your Profile Updated Succesfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('user.profile')->with($notification);


    }

    public function UserEditPassword()
    {
        if (isset(Auth::user()->id)) {
            $user = User::find(Auth::user()->id);

            return view('frontend.profile.edit_password', compact('user'));
        }
    }


    public
    function UserUpdatePassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = User::find(1)->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $admin = User::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            $notification = array(
                'message' => 'You entered your current password incorrectly.',
                'alert-type' => 'error',
            );
            return Redirect()->route('user.password.edit')->with($notification);
        }
    }
}
