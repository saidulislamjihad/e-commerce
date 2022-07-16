@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col">
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="{{ url('/orders') }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                            <div class="col-md-5"><h5 class="mb-1">{{ $order->user->full_name ?? 'Customer' }} orders details</h5></div>
                            <div class="col-md-2">
                                <a href="{{ url('/order/pdf/'.$order->orderId) }}" class="btn btn-sm btn-success float-right">Invoice Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Order</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>OrderID</th>
                                <th>Customer Name</th>
                                <th>Sub total</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>{{ $order->orderId ?? 'Orderid' }}</td>
                                <td>{{ $order->user->full_name ?? 'Customer' }}</td>
                                <td>{{ $order->price ?? 'qty' }} Tk.</td>
                                <td>{{ $order->price }} Tk.</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Order details</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            @foreach ($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $orderDetail->product->name ?? 'Product name' }}</td>
                                    <td>{{ $orderDetail->qty }}</td>
                                    <td>{{ $orderDetail->product->regular_price ?? 'qty' }} Tk.</td>
                                    <td>{{ $orderDetail->product->regular_price * $orderDetail->qty }} Tk.</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Product details</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand Name</th>
                                <th>Price</th>
                            </tr>
                            @foreach ($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <img src="{{ asset('/product/images/' .$orderDetail->product->image) }}" height="40" width="40"/>
                                    </td>
                                    <td>{{ $orderDetail->product->name ?? 'Product name' }}</td>
                                    <td>{{ $orderDetail->product->brand->name ?? 'Brand name' }}</td>
                                    <td>{{ $orderDetail->product->regular_price ?? 'qty' }} Tk.</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Shipping details</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>Customer name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Zip</th>
                            </tr>
                            <tr>
                                <td>{{ $order->user->shipping->full_name ?? 'No name' }}</td>
                                <td>{{ $order->user->shipping->email ?? 'No email' }}</td>
                                <td>{{ $order->user->shipping->phone ?? 'No phone' }}</td>
                                <td>{{ $order->user->shipping->address ?? 'No address' }}</td>
                                <td>{{ $order->user->shipping->country_name ?? 'No country' }}</td>
                                <td>{{ $order->user->shipping->city_name ?? 'No city' }}</td>
                                <td>{{ $order->user->shipping->distric_name ?? 'No district' }}</td>
                                <td>{{ $order->user->shipping->zip ?? 'No zip' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Billing details</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>Customer name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Zip</th>
                            </tr>
                            <tr>
                                <td>{{ $order->user->billing->full_name ?? 'No name' }}</td>
                                <td>{{ $order->user->billing->email ?? 'No email' }}</td>
                                <td>{{ $order->user->billing->phone ?? 'No phone' }}</td>
                                <td>{{ $order->user->billing->address ?? 'No address' }}</td>
                                <td>{{ $order->user->billing->country_name ?? 'No country' }}</td>
                                <td>{{ $order->user->billing->city_name ?? 'No city' }}</td>
                                <td>{{ $order->user->billing->distric_name ?? 'No district' }}</td>
                                <td>{{ $order->user->billing->zip ?? 'No zip' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card radius-10 mt-3">
                    <div class="card-body">
                        <h2>Payment details</h2>
                        <hr/>
                        <table class="table table-responsive">
                            <tr>
                                <th>Customer name</th>
                                <th>Payment type</th>
                                <th>Transaction ID</th>
                                <th>Total pay</th>
                            </tr>
                            <tr>
                                <td>{{ $order->user->full_name ?? 'No name' }}</td>
                                <td>{{ $order->user->payment->payment_type ?? 'No payment type' }}</td>
                                <td>{{ $order->user->payment->transaction_id ?? 'No transaction ID' }}</td>
                                <td>{{ $order->user->payment->total_pay ?? 'No total pay' }} Tk.</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection