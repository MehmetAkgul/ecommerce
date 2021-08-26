<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            if (session()->get('language') == 'english') {

                return response()->json(['success' => 'Succesfully Added On Your Cart']);
            } else {
                return response()->json(['success' => 'Ürünleriniz Sepetinize Başarıyla Eklendi']);
            }

            $notification = array(
                'message' => 'Your Profile Updated Succesfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('user.profile')->with($notification);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            if (session()->get('language') == 'english') {
                return response()->json(['success' => 'Succesfully Added On Your Cart']);
            } else {
                return response()->json(['success' => 'Ürünleriniz Sepetinize Başarıyla Eklendi']);
            }
        }
    } // end method


    // Mini Cart section
    public function AddMiniCart()
    {


        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();


        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => ($cartTotal),
        ));


    }// End Mini Cart section

    //Remove Product from Mini Cart
    public function RemoveProductFromCart($rowId)
    {
        $status = Cart::remove($rowId);
        if (session()->get('language') == 'english') {
            return response()->json(['success' => 'Product Removed From Cart Successfully']);
        } else {
            return response()->json(['error' => 'Ürün Sepetten Başarıyla Kaldırıldı']);
        }

    }// End Remove Product from Mini Cart

}
