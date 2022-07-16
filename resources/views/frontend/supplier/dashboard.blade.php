@extends('frontend.master')

@section('title')
    Vendor deshboard
@endsection

@section('content')
    <section class="supplier-product-section">
        <div class="container-fluid">
            @if(Session::has('success'))
            <x-alert :message="session('success')" title="Success" type="success"></x-alert>
            @endif
            @if(Session::has('error'))
                <x-alert :message="session('error')" title="Error" type="error"></x-alert>
            @endif
           <supplier-dashboard :vendor_id="{{ $vendorId }}"></supplier-dashboard>
        </div>
    </section>
@endsection
