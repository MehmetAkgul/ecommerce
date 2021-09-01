<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function view()
    {
        return view('frontend.mycart.index');
    }

    public function getDataFromMycart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();


        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => ($cartTotal),
        ));
    }


    public function removingProductFromMycart($rowId)
    {
        $status = Cart::remove($rowId);

        if (Session::has('coupon') && Cart::count()==0) {
            Session::forget('coupon');
        }

        if ($status) {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'Product Removed From Mycart Successfully']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Ürün Sepetinizden Başarıyla Kaldırıldı']);
            }
        } else {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'An Error Occurred Please Try Again Later']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Bir Hata Oluştu Lütfen Daha Sonra Tekrar Deneyiniz']);
            }
        }
    }

    public function incrementProductFromMycart($rowId)
    {
        $row = Cart::get($rowId);
        $status = Cart::update($rowId, ['qty' => $row->qty + 1]);

        if ($status) {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'Product Quantity Increased Successfully']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Ürün Adeti Başarıyla Arttırıldı']);
            }
        } else {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'An Error Occurred Please Try Again Later']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Bir Hata Oluştu Lütfen Daha Sonra Tekrar Deneyiniz']);
            }
        }
    }

    public function decrementProductFromMycart($rowId)
    {
        $row = Cart::get($rowId);
        $status = Cart::update($rowId, ['qty' => $row->qty - 1]);

        if ($status) {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'Product Quantity Increased Successfully']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Ürün Adeti Başarıyla Arttırıldı']);
            }
        } else {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'An Error Occurred Please Try Again Later']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Bir Hata Oluştu Lütfen Daha Sonra Tekrar Deneyiniz']);
            }
        }
    }


    public function couponApply(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
        ]);

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            $discount_amount = Cart::total(0, "", "") * $coupon->coupon_discount / 100;
            $total_amount = Cart::total(0, "", "") - $discount_amount;

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $discount_amount,
                'total_amount' => $total_amount,
            ]);

            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'success', 'title' => 'Coupon Applied']);
            } else {
                return response()->json(['icon' => 'success', 'title' => 'Kupon Uygulandı']);
            }

        } else {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'error', 'title' => 'Invalid Coupon']);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Hatalı kupon']);
            }
        }
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        if (session()->get('language') == 'english') {
            return response()->json(['icon' => 'success', 'title' => 'Coupon Removed ']);
        } else {
            return response()->json(['icon' => 'success', 'title' => 'Kupon Kaldırıldı']);
        }
    }


    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            $discount_amount = Cart::total(0, "", "") * session()->get('coupon')['coupon_discount'] / 100;
            $total_amount = Cart::total(0, "", "") - $discount_amount;
            return response()->json([
                'subtotal' => Cart::total(2, ".", ","),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => $discount_amount,
                'total_amount' => $total_amount,
            ]);
        } else {
            return response()->json(array(
                'total' => Cart::total(2, ".", ","),
            ));
        }
    }

}
