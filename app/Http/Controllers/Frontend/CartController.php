<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        if (auth()->check()){
            $cartProduct = new Cart();
            $cartProduct->product_id = $request->product_id;
            $cartProduct->user_id = auth()->user()->id;
            $cartProduct->qty = $request->qty;
            $cartProduct->price = $request->price;
            $cartProduct->save();
        }else{
            $cartProduct = new Cart();
            $cartProduct->product_id = $request->product_id;
            $cartProduct->ip_address = $request->ip();
            $cartProduct->qty = $request->qty;
            $cartProduct->price = $request->price;
            $cartProduct->save();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Product has been successfully added to cart.'
        ]);
    }
    public function addToCartDetailsPage(Request $request, $id)
    {
        //dd(Product::find($id));
        if (auth()->check()){
            $cartProduct = new Cart();
            $cartProduct->product_id = $request->product_id;
            $cartProduct->user_id = auth()->user()->id;
            $cartProduct->qty = $request->qty;
            $cartProduct->price = $request->price;
            $cartProduct->delivery_charge = $request->delivery_charge;
            $cartProduct->save();
        }else{
            $cartProduct = new Cart();
            $cartProduct->product_id = $request->product_id;
            $cartProduct->ip_address = $request->ip();
            $cartProduct->qty = $request->qty;
            $cartProduct->price = $request->price;
            $cartProduct->delivery_charge = $request->delivery_charge;
            $cartProduct->save();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Product has been successfully added to cart.'
        ]);
    }

    public function cartProducts()
    {
        $products = Cart::with('product')->orWhere('user_id', auth()->check() ? Auth::guard('web')->user()->id : ' ')->orWhere('ip_address', request()->ip())->get();
        return response()->json($products, 200);
    }

    public function totalCartProducts()
    {
        $totalProduct = DB::table('carts')->orWhere('user_id', auth()->check() ? Auth::guard('web')->user()->id : ' ')->orWhere('ip_address', request()->ip())->sum('qty');
        return response()->json($totalProduct);
    }

    public function totalCartProductsPrice()
    {
        $totalProductPrice = DB::table('carts')->orWhere('user_id', auth()->check() ? Auth::guard('web')->user()->id : ' ')->orWhere('ip_address', request()->ip())->sum('price');
        return response()->json($totalProductPrice);
    }

    public function removeCartProduct($id)
    {
        $removeCartProduct = Cart::find($id);
        $removeCartProduct->delete();
        return response()->json($removeCartProduct, 200);
    }


    //Cart product
     public function userCartProducts()
     {
         if (auth()->guard('web')->check()){
             $auth_user = Auth::guard('web')->user()->id;
             return view('frontend.cart.products', compact('auth_user'));
         }else{
             $auth_user = Cart::where('ip_address', request()->ip())->first();
             return view('frontend.cart.products', compact('auth_user'));
         }

     }

     public function getUserCartProducts($id)
     {
         $getUserProducts = Cart::orWhere('user_id', $id)->orWhere('ip_address', \request()->ip())->with('product')->get();
         return response()->json($getUserProducts, 200);
     }

     public function updateCartProduct(Request $request, $id)
     {
         $cartUpdate = Cart::find($id);
         $product = Product::where('id', $cartUpdate->product_id)->first();
         $cartUpdate->qty = $request->qty;
         $cartUpdate->price = $request->qty * $product->regular_price;
         $cartUpdate->save();
         return response()->json($cartUpdate, 200);
     }
}
