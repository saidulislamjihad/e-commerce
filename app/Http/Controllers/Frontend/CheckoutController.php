<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('frontend.checkout.checkout');
    }

    public function customer_checkout(CheckoutRequest $request)
    {
        try{
            $billing = new Billing();
            $billing->user_id = auth('web')->user()->id;
            $billing->first_name = $request->first_name;
            $billing->last_name = $request->last_name;
            $billing->email = $request->email;
            $billing->phone = $request->phone;
            $billing->country_name = $request->country_name;
            $billing->city_name = $request->city_name;
            $billing->distric_name = $request->distric_name;
            $billing->zip = $request->zip;
            $billing->address = $request->address;
            $billing->save();

            //Shipping information
            $shipping = new Shipping();
            $shipping->user_id = auth('web')->user()->id;
            $shipping->first_name = $request->first_name;
            $shipping->last_name = $request->last_name;
            $shipping->email = $request->email;
            $shipping->phone = $request->phone;
            $shipping->country_name = $request->country_name;
            $shipping->city_name = $request->city_name;
            $shipping->distric_name = $request->distric_name;
            $shipping->zip = $request->zip;
            $shipping->address = $request->address;
            $shipping->save();
            return redirect('/payment')->with('success', 'Your billing and shipping information has been submited.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function payment_form()
    {
        $products = Cart::orWhere('user_id', auth()->guard('web')->check() ? auth('web')->user()->id : '')->orWhere('ip_address', request()->ip())->get();
        return view('frontend.checkout.payment', compact('products'));
    }

    public function customerPayment(Request $request)
    {
        $this->validate($request, [
            'vendor_id' => 'required',
            'price' => 'required',
            'qty' => 'required|integer',
        ]);



        //===================== Product stock update ======================//
        $productStockUpdate = Product::where('id', $request->order_product_id)->get();
        foreach($productStockUpdate as $key => $stock){
            $stock->stock = $stock->stock - $request->order_qty[$key];
            $stock->save();
        }

        if($request->bkash){
            $payment = new Payment();
            $payment->user_id = auth('web')->user()->id;
            $payment->payment_type = $request->bkash;
            $payment->transaction_id = $request->transaction_id;
            $payment->total_pay = $request->total_pay;
            $payment->save();

            //===================== Order ======================//

            $order = new Order();
            $order->user_id = auth('web')->user()->id;
            $order->orderId = random_int(10000, 99999);
            $order->price = $request->total_pay;
            $order->save();

            //===================== Order details ======================//

            if(!empty($payment)){
                foreach($request->order_product_id as $key => $product){
                    $productOrder = new OrderDetails();
                    $productOrder->order_id = $order->id;
                    $productOrder->vendor_id = $request->vendor_id[$key];
                    $productOrder->product_id = $request->order_product_id[$key];
                    $productOrder->qty = $request->order_qty[$key];
                    $productOrder->price = $request->regular_price[$key];
                    $productOrder->save();
                }
            }

            //===================== User cart product delete ======================//
            if(!empty($payment)){
                $cartProduct = Cart::orWhere('user_id', auth()->guard('web')->check() ? auth('web')->user()->id : '')->orWhere('ip_address', request()->ip())->get();
                foreach($cartProduct as $product){
                    $product->delete();
                }
            }
        }
        elseif($request->nogad){
            $payment = new Payment();
            $payment->user_id = auth('web')->user()->id;
            $payment->payment_type = $request->nogad;
            $payment->transaction_id = $request->transaction_id;
            $payment->total_pay = $request->total_pay;
            $payment->save();

            //===================== Order ======================//

            $order = new Order();
            $order->user_id = auth('web')->user()->id;
            $order->orderId = random_int(10000, 99999);
            $order->price = $request->total_pay;
            $order->save();

            //===================== Order details ======================//

            if(!empty($payment)){
                foreach($request->order_product_id as $key => $product){
                    $productOrder = new OrderDetails();
                    $productOrder->order_id = $order->id;
                    $productOrder->vendor_id = $request->vendor_id[$key];
                    $productOrder->product_id = $request->order_product_id[$key];
                    $productOrder->qty = $request->order_qty[$key];
                    $productOrder->price = $request->regular_price[$key];
                    $productOrder->save();
                }
            }

            //===================== User cart product delete ======================//
            if(!empty($payment)){
                $cartProduct = Cart::orWhere('user_id', auth()->guard('web')->check() ? auth('web')->user()->id : '')->orWhere('ip_address', request()->ip())->get();
                foreach($cartProduct as $product){
                    $product->delete();
                }
            }
        }
        elseif($request->rocket){
            $payment = new Payment();
            $payment->user_id = auth('web')->user()->id;
            $payment->payment_type = $request->rocket;
            $payment->transaction_id = $request->transaction_id;
            $payment->total_pay = $request->total_pay;
            $payment->save();

            //===================== Order ======================//

            $order = new Order();
            $order->user_id = auth('web')->user()->id;
            $order->orderId = random_int(10000, 99999);
            $order->price = $request->total_pay;
            $order->save();

            //===================== Order details ======================//

            if(!empty($payment)){
                foreach($request->order_product_id as $key => $product){
                    $productOrder = new OrderDetails();
                    $productOrder->order_id = $order->id;
                    $productOrder->vendor_id = $request->vendor_id[$key];
                    $productOrder->product_id = $request->order_product_id[$key];
                    $productOrder->qty = $request->order_qty[$key];
                    $productOrder->price = $request->regular_price[$key];
                    $productOrder->save();
                }
            }

            //===================== User cart product delete ======================//
            if(!empty($payment)){
                $cartProduct = Cart::orWhere('user_id', auth()->guard('web')->check() ? auth('web')->user()->id : '')->orWhere('ip_address', request()->ip())->get();
                foreach($cartProduct as $product){
                    $product->delete();
                }
            }
        }
        else{
            $payment = new Payment();
            $payment->user_id = auth('web')->user()->id;
            $payment->payment_type = $request->cod;
            $payment->transaction_id = 'cash on delivery';
            $payment->total_pay = $request->total_pay;
            $payment->save();

            //===================== Order ======================//

            $order = new Order();
            $order->user_id = auth('web')->user()->id;
            $order->orderId = random_int(10000, 99999);
            $order->price = $request->total_pay;
            $order->save();

            //===================== Order details ======================//

            if(!empty($payment)){
                foreach($request->order_product_id as $key => $product){
                    $productOrder = new OrderDetails();
                    $productOrder->order_id = $order->id;
                    $productOrder->vendor_id = $request->vendor_id[$key];
                    $productOrder->product_id = $request->order_product_id[$key];
                    $productOrder->qty = $request->order_qty[$key];
                    $productOrder->price = $request->regular_price[$key];
                    $productOrder->save();
                }
            }


            //===================== User cart product delete ======================//
            if(!empty($payment)){
                $cartProduct = Cart::orWhere('user_id', auth()->guard('web')->check() ? auth('web')->user()->id : '')->orWhere('ip_address', request()->ip())->get();
                foreach($cartProduct as $product){
                    $product->delete();
                }
            }

        }

        return redirect('/order/complete')->with('success', 'Your order has been successfully submitted. Thank you for connecting us.');
    }

    public function completeOrder()
    {
        return view('frontend.order.complete');
    }
}
