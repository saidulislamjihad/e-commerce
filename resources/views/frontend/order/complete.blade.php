@extends('frontend.master')

@section('title')
    Order complete
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/banner.png">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title" style="color: #02075d; font-weight: 700">
                Order Complete
            </h3>
        </div>
    </section>
    <form action="{{ route('customer.payment') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="billing-shipping-address-section">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="shopping-cart-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="order-complete-section">
                                    <div class="success-icon-inner">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="success-msg">
                                        <h4 class="msg">
                                            Your order has been successfully submited. Right now your order is pendding.
                                        </h4>
                                    </div>
                                    <div class="back-to-home-btn-inner">
                                        <a href="{{ url('/') }}" class="btn btn-primary">
                                            Back to Home
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

@push('script')

@endpush
