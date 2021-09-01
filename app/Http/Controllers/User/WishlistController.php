<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function view()
    {
        return view('frontend.wishlist.index');
    }

    public function addToWishlist(Request $request, $product_id)
    {

        if (Auth::check()) {


            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                if (session()->get('language') == 'english') {
                    return response()->json(['icon' => 'success', 'title' => 'The product you selected has been added to the Wishlist']);
                } else {
                    return response()->json(['icon' => 'success', 'title' => 'Seçtiğiniz ürün İstek Listesine eklendi']);
                }

            } else {
                if (session()->get('language') == 'english') {
                    return response()->json(['icon' => 'info', 'title' => 'This product has already been added to your Wish List']);
                } else {
                    return response()->json(['icon' => 'info', 'title' => 'Bu ürün Daha Önceden İstek Listenize Eklenmiştir']);
                }
            }
        } else {
            if (session()->get('language') == 'english') {
                return response()->json(['icon' => 'error', 'title' => 'First You Have to Login to Your Account']);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'İlk Önce Hesabınıza Giriş Yapmalısınız']);
            }

        }

    }

    public function getWishlistProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }


    public function RemoveProductFromWishlist($id)
    {


        $status = Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        if (session()->get('language') == 'english') {
            return response()->json(['icon' => 'success', 'title' => 'Product Removed From Wishlist Successfully']);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Ürün İsteklerim Listesinden Başarıyla Kaldırıldı']);
        }

    }

}
