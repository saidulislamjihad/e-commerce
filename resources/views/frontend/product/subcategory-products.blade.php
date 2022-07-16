@extends('frontend.master')

@section('title')
{{ $subcategoryProducts->name }}
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/category-banner1.jpg">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title">
               {{ $subcategoryProducts->name }} Products
            </h3>
        </div>
    </section>
    <div id="app">
        <subcategory-products-list :subcategory="{{ $subcategoryProducts }}"></subcategory-products-list>
    </div>

@endsection

@push('script')
@endpush
