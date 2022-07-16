@extends('frontend.master')

@section('title')
    User deshboard
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/banner.png">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title" style="color: #fff; font-weight: 700">
                Customer Dashboard
            </h3>
        </div>
    </section>
    <section class="user-dashboard-section-wrapper">
        <div class="container-fluid">
            <div class="user-profile-outer">
                <div class="user-profile-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-profile-image">
                                <img src="{{ auth('web')->user()->avatar }}" />
                            </div>
                        </div>
                        @if($orderProducts->count() > 10 )
                            <div class="col-md-2 col-sm-3">
                                <div class="user-rank-item-outer">
                                    <div class="rank-sliver-img-inner">
                                        <img src="{{ asset('/frontend/') }}/assets/images/sliver.png">
                                    </div>
                                    <div class="content">
                                        <h4 class="content-title">
                                            Silver
                                        </h4>
                                        <p class="content-sub-title">
                                            5% - 10% with gift
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-2 col-sm-3" style="opacity: 0.5">
                                <div class="user-rank-item-outer">
                                    <div class="rank-sliver-img-inner">
                                         <img src="{{ asset('/frontend/') }}/assets/images/sliver.png">
                                    </div>
                                    <div class="content">
                                        <h4 class="content-title">
                                            Silver
                                        </h4>
                                        <p class="content-sub-title">
                                            5% - 10% with gift
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($orderProducts->count() > 50 )
                        <div class="col-md-2 col-sm-3">
                            <div class="user-rank-item-outer">
                                <div class="rank-gold-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/gold.jpeg">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Gold
                                    </h4>
                                    <p class="content-sub-title">
                                        10% - 20% with gift
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-2 col-sm-3" style="opacity: 0.5">
                            <div class="user-rank-item-outer">
                                <div class="rank-gold-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/gold.jpeg">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Gold
                                    </h4>
                                    <p class="content-sub-title">
                                        10% - 20% with gift
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($orderProducts->count() > 120 )
                        <div class="col-md-2 col-sm-3">
                            <div class="user-rank-item-outer">
                                <div class="rank-diamond-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/diamond.png">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Diamond
                                    </h4>
                                    <p class="content-sub-title">
                                        30% - 50% with gift
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-2 col-sm-3" style="opacity: 0.5">
                            <div class="user-rank-item-outer">
                                <div class="rank-diamond-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/diamond.png">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Diamond
                                    </h4>
                                    <p class="content-sub-title">
                                        30% - 50% with gift
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($orderProducts->count() > 220 )
                        <div class="col-md-2 col-sm-3">
                            <div class="user-rank-item-outer">
                                <div class="rank-platinum-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/platinum.png">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Platinum
                                    </h4>
                                    <p class="content-sub-title">
                                        20% profit share
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-2 col-sm-3" style="opacity: 0.5">
                            <div class="user-rank-item-outer">
                                <div class="rank-platinum-img-inner">
                                     <img src="{{ asset('/frontend/') }}/assets/images/platinum.png">
                                </div>
                                <div class="content">
                                    <h4 class="content-title">
                                        Platinum
                                    </h4>
                                    <p class="content-sub-title">
                                        20% profit share
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="user-product-table-wrapper">
                <table class="table table-bordered user-dashboard-product-list">
                    <thead>
                        <tr>
                            <td class="text-center td-image">Image</td>
                            <td class="text-center td-product">Product Name</td>
                            <td class="text-center td-qty">Quantity</td>
                            <td class="text-center td-price">Total Price</td>
                            <td class="text-center td-status">Staus</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $orderProduct)
                            @foreach ($orderProduct->orderDetails as $key => $product)
                                @if($product != null)
                                <tr>
                                    <td class="text-center td-image">
                                        <a href="#">
                                            @if($product->product)
                                            <img src="{{ asset('/product/images/'.$product->product->image) }}">
                                            @else
                                            <span>No product found</span>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-center td-product">
                                        <a href="#">
                                            {{ $product->product->name ?? 'Product name' }}
                                        </a>
                                    </td>
                                    <td class="text-center td-qty">
                                        {{ $product->qty }}
                                    </td>
                                    <td class="text-center td-price">
                                        ৳ {{ $product->qty * $product->price }}
                                    </td>
                                    <td class="text-center td-btn">
                                        @if($product->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif ($product->status == 1)
                                            <span class="badge badge-warning">Shipping</span>
                                        @else
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
