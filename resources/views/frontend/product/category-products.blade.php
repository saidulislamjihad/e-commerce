@extends('frontend.master')

@section('title')
{{ $categoryProducts->name }}
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/category-banner.jpg">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title">
               {{ $categoryProducts->name }} Products
            </h3>
        </div>
    </section>
    <div id="app">
        <category-products-list :category="{{ $categoryProducts }}"></category-products-list>
    </div>

@endsection

@push('script')
@endpush
