<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HotProductController extends Controller
{
    public function index()
    {
        return view('frontend.hot.products');
    }

    public function products()
    {
        $products = Product::with('reviews')->where('product_type', 'hot')->take(8)->where('status', 1)->get();
        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
    public function list()
    {
        $products = Product::with('reviews')->where('product_type', 'hot')->where('status', 1)->get();
        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}
