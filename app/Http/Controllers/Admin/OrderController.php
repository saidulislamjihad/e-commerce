<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
        $sql = OrderDetails::with('product', 'order')->orderBy('created_at', 'desc');

        if (isset($request->search)) {
            $sql->whereHas('product', function($q) use($request){
                $q->where('name', 'LIKE','%'.$request->search.'%');
            });
        }

        $orders = $sql->paginate(10);
        return view('admin.customer.orders', compact('orders'));
    }

    public function ordersView($id)
    {
        $order = Order::with('orderDetails', 'user')->where('id', $id)->orderBy('created_at', 'desc')->first();
        return view('admin.customer.details', compact('order'));
    }

    //============== Order status ===============//

    public function pending($id)
    {
        $pending = OrderDetails::where('id', $id)->where('status', 0)->first();
        $pending->status = 1;
        $pending->save();

        if($pending->status == 1){
            $pendingOrder = Order::where('id', $pending->order_id)->first();
            $pendingOrder->status = 1;
            $pendingOrder->save();
        }
        return redirect()->back()->with('success', 'Order status has been changed.');
    }
    public function shipping($id)
    {
        $pending = OrderDetails::where('id', $id)->where('status', 1)->first();
        $pending->status = 2;
        $pending->save();

        if($pending->status == 2){
            $pendingOrder = Order::where('id', $pending->order_id)->first();
            $pendingOrder->status = 2;
            $pendingOrder->save();
        }
        return redirect()->back()->with('success', 'Order status has been changed.');
    }

    public function stocks()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.products.stocks', compact('products'));
    }

    public function ordersPdf($orderId)
    {
        $order = Order::with('orderDetails', 'user')->where('orderId', $orderId)->orderBy('created_at', 'desc')->first();

        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->stream('pdf_file.pdf');
    }

    public function pdf()
    {
        $data = [
            'title' => 'Welcome to shakil.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('admin.pdf', $data);
    
        return $pdf->download('shakil.pdf');
    }
}
