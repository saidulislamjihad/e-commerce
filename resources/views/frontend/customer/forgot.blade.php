@extends('frontend.master')

@section('title')
    Customer Login
@endsection

@section('content')
    <div class="">
		<section class="login-section">
			@if(Session::has('success'))
                <x-alert :message="session('success')" title="Success" type="success"></x-alert>
			@endif
			@if(Session::has('error'))
				<x-alert :message="session('error')" title="Error" type="error"></x-alert>
			@endif
			<div class="container">
				<div class="col-lg-8 col-md-12 m-auto">
					<form id="login-form" class="login-form" action="{{ route('customer.forgot.password') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="col-lg-8 col-md-12 login-custom">
							<h4>User forgot password!</h4>
							<div class="col-md-12 form-group px-0">
								<input type="email" name="email" placeholder="Email*" class="form-control @error('email') is-invalid @enderror" required>
								<x-error>
									{{ $errors->has('email') ? $errors->first('email') : ' ' }}
								</x-error>
							</div>
							<div class="col-md-12 px-0">
								<button type="submit">
									Login
								</button>
							</div>
							<p class="link-bottom">
								Not a member yet?
								<a href="{{ route('customer.register.form') }}">Register Now</a> |
								<a href="{{ route('customer.login.form') }}">Login</a>
							</p>
						</div>
					</form>
				</div>
			</div>
		</section>
    </div>
@endsection
