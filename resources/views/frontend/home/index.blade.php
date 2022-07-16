@extends('frontend.master')

@section('title')
    Home
@endsection

@section('content')
    <main class="" id="app">
        <add-cart></add-cart>
        <flash message=""></flash>
        <section class="main-home-section">
            <div class="container-fluid px-0">
                <div class="main-home-sidebar-nav-outer">
                    <div class="main-home-sidebar-nav">
                        <ul class="sidebar-main-nav-wrapper">
                            @foreach ($categories as $category)
                                <li class="main-nav-item item-has-mega-menu">
                                    <a href="#" class="main-nav-item-link">
                                        {{ $category->name }}
                                    </a>
                                    <ul class="nav-item-mega-menu">
                                        @foreach ($category->subcategories->chunk(4) as $subcategory)
                                            <li class="nav-item-mega-menu-item">
                                                <ul class="mega-menu-has-submenu">
                                                    @foreach ($subcategory as $subcat)
                                                        <li class="mega-menu-has-submenu-item">
                                                            <a href="{{ route('subcategory.products', $subcat->slug) }}" class="link">{{ $subcat->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="home-slider-items-wrapper owl-carousel">
                    @foreach($sliders as $slider)
                        <div class="home-slider-item">
                            <div class="slider-item-image">
                                <a href="#">
                                    <img src="{{ asset('setting/'.$slider->image) }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="selling-feature-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="list-features">
                            <div class="list-features-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="list-features-content">
                                <h5 class="content-heading">
                                    Free Delivery
                                </h5>
                                <p class="content-subheading">
                                    For orders over 10K
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="list-features">
                            <div class="list-features-icon">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="list-features-content">
                                <h5 class="content-heading">
                                    7 Days Return
                                </h5>
                                <p class="content-subheading">
                                    If goods have problems
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="list-features">
                            <div class="list-features-icon">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="list-features-content">
                                <h5 class="content-heading">
                                    Secure Payment
                                </h5>
                                <p class="content-subheading">
                                    100% secure payment
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="list-features">
                            <div class="list-features-icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="list-features-content">
                                <h5 class="content-heading">
                                    9am-11pm Support
                                </h5>
                                <p class="content-subheading">
                                    Dedicated support
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="slider-bottom-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bottom-image">
                            <a href="#" class="image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-1.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bottom-image">
                            <a href="#" class="image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="category-section">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="category-section-item">
                                <div class="category-item-image">
                                    <a href="{{ url('/products/'.$category->slug) }}" class="image">
                                        <img src="{{ asset('category/'.$category->image) }}" />
                                    </a>
                                </div>
                                <a href="{{ url('/products/'.$category->slug) }}" class="category-name">
                                    {{ $category->name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="product-items-section">
            <feature-products></feature-products>
        </section>
        <section class="offer-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-items-section">
            <hot-products></hot-products>
        </section>
        <section class="offer-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-items-section">
            <discount-products></discount-products>
        </section>
        <section class="offer-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-items-section">
            <new-arrival-products></new-arrival-products>
        </section>
        <section class="offer-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-items-section">
            <index-top-products></index-top-products>
        </section>
        <section class="offer-banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="offer-banner">
                            <a href="#" class="offer-banner-image">
                                <img src="{{ asset('frontend/') }}/assets/images/slider-bottom-banner-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <section class="product-items-section">--}}
{{--            <index-upcoming-products></index-upcoming-products>--}}
{{--        </section>--}}
        <section class="company-slider-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">
                                our client
                                <div class="title-bottom-animarion">
                                    <img :src="'frontend/assets/logo/Trustshoper-Icon.png'">
                                </div>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="company-slider-items-wrapper owl-carousel">
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-1.jpg">
                            </div>
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-2.jpg">
                            </div>
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-3.jpg">
                            </div>
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-4.jpg">
                            </div>
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-5.jpg">
                            </div>
                            <div class="company-slider-item">
                                <img src="{{ asset('frontend/') }}/assets/images/company-1.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <section class="bolg-section-wrapper">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="blog-section-title">--}}
{{--                            <h2 class="title">--}}
{{--                                blog--}}
{{--                            </h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @foreach ($blogs as $blog)--}}
{{--                        <div class="col-lg-2 col-md-4 col-sm-6">--}}
{{--                            <a href="{{ url('blog-details/'.$blog->slug) }}" class="bolg-item-wrapper">--}}
{{--                                <img src="{{ asset('blogs/'.$blog->image) }}">--}}
{{--                                <h4 class="bolg-item-title">--}}
{{--                                    {{ $blog->title ?? "No blog title found" }}--}}
{{--                                </h4>--}}
{{--                                <p class="bolg-item-des">--}}
{{--                                   {{\Illuminate\Support\Str::limit(strip_tags($blog->description, 200))}}--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="view-all-btn-outer">--}}
{{--                            <a href="{{ url('/all/blogs') }}" class="view-all-btn">--}}
{{--                                View All--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </main>
@endsection

@push('script')

@endpush
