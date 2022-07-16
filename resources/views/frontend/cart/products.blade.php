@extends('frontend.master')

@section('title')
    Cart products
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/banner-bg-image.jpg">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title">
                Cart Product
            </h3>
        </div>
    </section>
    <div id="app">
        <cart-products :auth_user="{{ $auth_user }}"></cart-products>
    </div>

@endsection

@push('script')
@endpush
