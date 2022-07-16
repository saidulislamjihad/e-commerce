@extends('frontend.master')

@section('title')
    About Us
@endsection

@section('content')
    <section class="about-us-section">
        <div class="about-us-heading-wrapper">
            <div class="section-heading-bg-banner-outer">
                <img src="{{ asset('/frontend/') }}/assets/images/about-home-bg.jpg">
            </div>
        </div>
    </section>
    <section class="our-story-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="our-story-section-heading">
                        <h4 class="heading-inner">
                            Our Story
                        </h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our-story-section-content">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                        </p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                        </p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our-story-section-content">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                        </p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                        </p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-values-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="our-values-section-heading">
                        <h4 class="heading-inner">
                            Our Values
                        </h4>
                    </div>
                </div>
                <div class="col-md-8 m-auto">
                    <div class="our-values-section-image">
                        <h4 class="image-inner">
                            <img src="{{ asset('/frontend/') }}/assets/images/our-valus.png">
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-promise-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="our-promise-section-heading">
                        <h4 class="heading-inner">
                            Our Promise
                        </h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our-promise-section-content">
                        <ul class="our-promise-section-content-list">
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our-promise-section-content">
                        <ul class="our-promise-section-content-list">
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="our-promise-section-content-list-item">
                                <i class="fas fa-hand-point-right"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
