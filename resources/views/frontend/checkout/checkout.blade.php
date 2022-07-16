@extends('frontend.master')

@section('title')
    Checkout products
@endsection

@section('content')
    <section class="product-page-banner-section">
        <div class="banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/banner.png">
        </div>
        <div class="banner-content">
            <h3 class="banner-content-title" style="color: #02075d; font-weight: 700">
                Customer Checkout
            </h3>
        </div>
    </section>
    <section class="billing-shipping-address-section">
        <div class="container">
            <form class="order-details-invoice-form" action="{{ route('customer.checkout') }}" method="POST">
                @csrf
                <div class="row billing-info-and-payment-method">
                    <div class="col-md-6 billing-info-box-outer">
                        <div class="customer-all-info-wrapper">
                            <h3 class="title">
                                Billing Address
                            </h3>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>First Name <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Email <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Country <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="country_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>City <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="city_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row state-zip-country">
                                <div class="col-md-6 form-group">
                                    <label>District <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="distric_name" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address <small class="text-danger" style="font-size: 15px;">*</small></label>
                                <textarea class="form-control" name="address" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 payment-method-box-outer">
                        <div class="shipping-address-wrapper">
                            <h3 class="title">
                                Shipping Address
                            </h3>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>First Name <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Email <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Country <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="country_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>City <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="city_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row state-zip-country">
                                <div class="col-md-6 form-group">
                                    <label>District <small class="text-danger" style="font-size: 15px;">*</small></label>
                                    <input type="text" name="distric_name" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address <small class="text-danger" style="font-size: 15px;">*</small></label>
                                <textarea class="form-control" name="address" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 placeorder-btn-inner">
                        <button type="submit" class="placeorder-btn" style="border: none;">
                            Place Order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('script')

@endpush
