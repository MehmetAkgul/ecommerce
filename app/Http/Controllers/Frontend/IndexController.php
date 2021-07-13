<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = Category:: orderBy('category_name_en', 'ASC')->limit(3)->get();
        $products = Product:: where('status', 1)->orderBy('product_name_en', 'ASC')->get();
        $featured = Product:: where('featured', 1)->orderBy('product_name_en', 'ASC')->get();
        $hot_deals = Product:: where('hot_deals', 1)->orderBy('product_name_en', 'ASC')->get();
        $special_offer = Product:: where('special_offer', 1)->orderBy('product_name_en', 'ASC')->get();
        $special_deals = Product:: where('special_deals', 1)->orderBy('product_name_en', 'ASC')->get();

        return view('frontend.index', compact('sliders', 'categories', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals'));
    }

    public function product_details($id, $slug)
    {
        $product = Product:: findOrFail($id);
        $color_en = explode(',', $product->product_color_en);
        $color_tr = explode(',', $product->product_color_tr);
        $size_en = explode(',', $product->product_size_en);
        $size_tr = explode(',', $product->product_size_tr);
        $multiImages = MultiImg:: where('product_id', $id)->get();
        $relatedProduct = Product:: where('category_id', $product->category_id)->get();
        //dd($relatedProduct);
        return view('frontend.product.prodcut_details',
            compact('product', 'multiImages', 'color_en', 'color_tr', 'size_en', 'size_tr', 'relatedProduct')
        );

    }

    public function product_tag($tag, $lang)
    {
        $product = "";
        if ($lang == 'tr') {
            $product = Product:: where('status', 1)->where('product_tags_tr', $tag)->orderBy('id', 'DESC')->paginate(2);
        } else {
            $product = Product:: where('status', 1)->where('product_tags_en', $tag)->orderBy('id', 'DESC')->paginate(2);
        }
        return view('frontend.product.tag-wise-product', compact('product'));
    }


    public function subCatWiseProduct($lang, $subcat_id, $slug)
    {
        $product = "";
        if ($lang == 'tr') {
            $product = Product:: where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        } else {
            $product = Product:: where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        }
        return view('frontend.product.subcategory-wise-product', compact('product'));
    }


    public function subSubCatWiseProduct($lang, $subsubcat_id, $slug)
    {
        $product = "";
        if ($lang == 'tr') {
            $product = Product:: where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(3);
        } else {
            $product = Product:: where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(3);
        }
        return view('frontend.product.subsubcategory-wise-product', compact('product'));
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
