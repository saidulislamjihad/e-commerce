@extends('frontend.master')

@section('title')
    Feature products
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/category-banner1.jpg">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title">
                Future Product
            </h3>
        </div>
    </section>
    <div id="app">
        <feature-products-list></feature-products-list>
    </div>

@endsection

@push('script')
@endpush
