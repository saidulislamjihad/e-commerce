@extends('frontend.master')

@section('title')
    Order Tracking
@endsection

@push('style')
    <style>
        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding: 20px;
            margin-top: 70px;
            border-radius: 10px
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .icon {
            width: 100%;
            max-width: 60px;
            height: 60px;
        }

        .icon-content {
            padding-bottom: 20px
        }

        .custom-search{
            margin: auto;
        }
    </style>
@endpush

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/category-banner1.jpg">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title">
                Order tracking
            </h3>
        </div>
    </section>
    <div class="col-md-12">
        <div class="container px-1 px-md-4 py-5 mx-auto">
            @if(Session::has('error'))
                <x-alert :message="session('error')" title="Error" type="error"></x-alert>
            @endif
            <div class="card">
                <form action="{{ url('/order/track') }}" method="get" class="form-group search-form-outer custom-search">
                    @csrf
                    <input type="search" name="orderId" maxlength="5" required class="form-control" placeholder="Search your tracking number...">
                    <button class="search-btn" type="submit" title="Search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="row d-flex justify-content-between px-3 top">
                    <div class="d-flex">
                        <h5>ORDER NO #{{ $orderTrack->orderId ?? '00000' }}</h5>
                    </div>
                    <div class="d-flex flex-column text-sm-right"></div>
                </div> <!-- Add class 'active' to progress -->
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        @if(!empty($orderTrack))
                            <ul id="progressbar" class="text-center">
                                @if($orderTrack->status == 0)
                                    <li class="active step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                @elseif ($orderTrack->status == 1)
                                    <li class="active step0"></li>
                                    <li class="active step0"></li>
                                    <li class="step0"></li>
                                @elseif ($orderTrack->status == 2)
                                    <li class="active step0"></li>
                                    <li class="active step0"></li>
                                    <li class="active step0"></li>
                                @else
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                @endif
                            </ul>
                            @else
                            <ul id="progressbar" class="text-center">
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-between top">
                    <div class="row d-flex justify-content-center icon-content">
                        <div class="">
                            <p class="font-weight-bold">Order Pending</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center icon-content">
                        <div class="">
                            <p class="font-weight-bold">Order Transit</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center icon-content">
                        <div class="">
                            <p class="font-weight-bold">Order Delivered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush
