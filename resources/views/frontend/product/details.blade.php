@extends('frontend.master')

@section('title')
    Product details
@endsection

@section('content')
<main class="">
    <section class="product-details-section">
        <product-details :details="{{ $details }}"></product-details>
    </section>
    <section class="related-product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="related-product-section-title">
                        related product
                    </h4>
                    <related-product :related="{{ $related }}"></related-product>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection