@extends('frontend.master')

@section('title')
    Order product
@endsection

@section('content')
<section class="order-product-section">
    <div class="container-fluid">
        <div class="order-product-search">
            <form class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by product name....">
                <button class="order-search-btn" type="submit" title="Search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="order-table-section">
            <table class="order-product-table-wrapper">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Product Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="order-product-image">
                            <img src="{{ asset('/product/images/'.$order->product->image) }}">
                        </td>
                        <td class="order-product-name">
                             {{ $order->product->name ?? "No name found" }}
                        </td>
                        <td class="order-product-category">
                            {{ $order->product->category->name ?? "No name found" }}
                        </td>
                        
                        <td class="order-product-qty">
                            {{ $order->qty ?? "" }}
                        </td>
                        <td class="order-product-price">
                            ৳ {{ $order->product->regular_price ?? "" }}
                        </td>
                        <td class="order-product-price">
                            ৳ {{ $order->product->regular_price * $order->qty ?? "" }}
                        </td>
                        <td class="order-product-status">
                            <h3 class="item-status">
                                <span class="badge badge-success">Approved</span>
                            </h3>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</section>
@endsection
