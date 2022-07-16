@extends('frontend.master')

@section('title')
    Contact Us
@endsection

@push('style')

@endpush


@section('content')
<section class="contact-us-banner-section">
    <div class="contact-us-banner-image">
        <img src="{{ asset('/frontend/') }}/assets/images/banner.png">
    </div>
    <div class="contact-banner-content">
        <h3 class="contact-banner-title">
           Contact Us
        </h3>
    </div>
</section>
<section class="contact-page-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-map-marked"></i>
            </div>
            <div class="contact-info-text">
              <h2>address</h2>
              <span>Housebuilding, Uttara Dhaka-1230</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-info-text">
              <h2>E-mail</h2>
              <span>trustshopperbd24@gmail.com</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="contact-info-text">
              <h2>office time</h2>
              <span>Mon - Thu  10:00 am - 7.00 pm</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="contact-page-form" method="post">
        <h2>Get in Touch</h2>
        @if(Session::has('success'))
            <x-alert :message="session('success')" title="Success" type="success"></x-alert>
        @endif
        @if(Session::has('error'))
            <x-alert :message="session('error')" title="Error" type="error"></x-alert>
        @endif
        <form action="{{ url('/contact') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="single-input-field">
                <input type="text" placeholder="Your Name" name="name" required/>
                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="single-input-field">
                <input type="email" placeholder="E-mail" name="email" required/>
                <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="single-input-field">
                <input type="tel" placeholder="Phone Number" name="phone" required/>
                <span style="color: red"> {{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="single-input-field">
                <input type="text" placeholder="Subject" name="subject" required/>
                <span style="color: red"> {{ $errors->has('subject') ? $errors->first('subject') : ' ' }}</span>
              </div>
            </div>
            <div class="col-md-12 message-input">
              <div class="single-input-field">
                <textarea  placeholder="Write Your Message" name="message" required></textarea>
                <span style="color: red"> {{ $errors->has('message') ? $errors->first('message') : ' ' }}</span>
              </div>
            </div>
            <div class="single-input-fieldsbtn">
              <input type="submit" value="Send Now"/>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-12">
      <div class="contact-page-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14594.222054982216!2d90.40310324373033!3d23.869912449703918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHousebuilding%2C%20Uttara%20Dhaka-1230!5e0!3m2!1sen!2sbd!4v1646469460098!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" frameborder="0" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection
