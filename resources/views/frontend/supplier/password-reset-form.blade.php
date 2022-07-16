@extends('frontend.master')

@section('title')
    Customer Reset Password
@endsection

@section('content')
    <div class="">
		<section class="login-section">
			<div class="container">
				<div class="col-lg-8 col-md-12 m-auto">
					@if(Session::has('success'))
                     <x-alert :message="session('success')" title="Success" type="success"></x-alert>
			        @endif
			        @if(Session::has('error'))
				     <x-alert :message="session('error')" title="Error" type="error"></x-alert>
			        @endif
					<form id="login-form" class="login-form" action="{{ route('vendor.new.password', $email) }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="col-lg-8 col-md-12 login-custom">
							<h4>New password set!</h4>
							<div class="col-md-12 form-group px-0">
								<input type="password" name="password" placeholder="New password*" class="form-control @error('password') is-invalid @enderror" required>
								<x-error>
									{{ $errors->has('password') ? $errors->first('password') : ' ' }}
								</x-error>
							</div>
                            <div class="col-md-12 form-group px-0">
								<input type="password" name="password_confirmation" placeholder="Confirm password*" class="form-control @error('password_confirmation') is-invalid @enderror" required>
								<x-error>
									{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ' ' }}
								</x-error>
							</div>
							<div class="col-md-12 px-0">
								<button type="submit">
									Send
								</button>
							</div>
							<p class="link-bottom">
								Not a member yet?
								<a href="{{ route('supplier.register') }}">Register Now</a> |
								<a href="{{ route('vendor.login.form') }}">Login</a>
							</p>
						</div>
					</form>
				</div>
			</div>
		</section>
    </div>
@endsection
