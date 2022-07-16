@extends('frontend.master')

@section('title')
    Vendor Profile
@endsection

@section('content')
<section class="profile-setting-section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="supplier-product-section-title-outer">
                    <h4 class="title-inner">
                        Profile Setting
                    </h4>
                </div>
           </div>
            <div class="col-md-10 m-auto">
                <div class="profile-informaion-wrapper card p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="general-information-wrapper">
                                <h4 class="general-info-title">
                                    General Information
                                </h4>
                                <form class="form-group">
                                    <input type="text" name="fname" placeholder="First Name" class="form-control">
                                    <input type="text" name="lname"  placeholder="Last Name" class="form-control">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control">
                                    <input type="number" name="phone" placeholder="Your Number" class="form-control">
                                    <input type="text" name="shop_name" placeholder="Shop Name" class="form-control">
                                    <input type="text" name="address" placeholder="Address" class="form-control">
                                    <input type="file" name="logo" class="form-control">
                                    <button type="submit" class="general-info-btn-inner">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="password-information-wrapper">
                                <h4 class="password-title">
                                    Password
                                </h4>
                                <form class="form-group">
                                    <input type="password" name="old_password" placeholder="Old Password" class="form-control">
                                    <input type="password" name="new_password"  placeholder="New Password" class="form-control">
                                    <input type="password" name="c_password" placeholder="Confirm Password" class="form-control">
                                    <button type="submit" class="pass-btn-inner">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
