@extends('frontend.master')

@section('title')
    Blogs
@endsection

@section('content')
    <section class="blogs-banner-section">
        <div class="blog-banner-bg-image">
            <img src="{{ asset('/frontend/') }}/assets/images/aboutus-banner.jpg">
        </div>
        <div class="blog-banner-content">
            <h3 class="blog-banner-content-title">
               Blogs
            </h3>
        </div>
    </section>
     <section class="bolgs-section-wrapper">
        <div class="container-fluid">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <a href="{{ url('blog-details/'.$blog->slug) }}" class="bolg-item-wrapper">
                            <img src="{{ asset('/blogs/'.$blog->image) }}" />
                            <h4 class="bolg-item-title">
                                {{ $blog->title }}
                            </h4>
                            <p class="bolg-item-des">
                               {{\Illuminate\Support\Str::limit(strip_tags($blog->description, 200))}}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
