@extends('frontend.master')

@section('title')
    Vendor Login
@endsection

@push('style')
	<style>
		.btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: .25em .25em;
			float: right !important;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: .25rem;
            opacity: .5
        }

        .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75
        }

        .btn-close:focus {
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
            opacity: 1
        }

        .btn-close.disabled,
        .btn-close:disabled {
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            opacity: .25
        }

        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%)
        }

		.toast-header {
			display: flex;
			align-items: center;
			padding: .5rem .75rem;
			color: #6c757d;
			background-color: rgba(255, 255, 255, .85);
			background-clip: padding-box;
			border-bottom: 1px solid rgba(0, 0, 0, .05);
			border-top-left-radius: calc(.25rem - 1px);
			border-top-right-radius: calc(.25rem - 1px)
		}

		.toast-header .btn-close {
			margin-right: -.375rem;
			margin-left: .75rem
		}

		.toast-body {
			padding: .75rem
		}

		.modal-header .btn-close {
			padding: .5rem .5rem;
			margin: -.5rem -.5rem -.5rem auto
		}
	</style>
@endpush

@section('content')
    <div class="">
        <section class="login-section">
			<div class="container">
				@if(Session::has('success'))
                <x-alert :message="session('success')" title="Success" type="success"></x-alert>
				@endif
				@if(Session::has('error'))
					<x-alert :message="session('error')" title="Error" type="error"></x-alert>
				@endif
				<div class="row">
					<div class="col-lg-6 col-md-12 m-auto">
						<form id="login-form" action="{{ route('vendor.login') }}" method="post" class="login-form">
                            @csrf
							<div class="col-md-12 m-auto login-custom supplier">
								<h4>Supplies login to your registered account!</h4>
								<div class="col-md-12 form-group px-0">
									<input type="email" name="email" placeholder="Email*" class="form-control" required>
								</div>
								<div class="col-md-12 form-group px-0">
									<input type="password" name="password" placeholder="Password*" class="form-control" required>
								</div>
								<div class="col-md-12">
									<div class="row">
										<a href="{{ route('vendor.forgot.password.form') }}" title="Lost Password" class="lost-pass-link">
											Reset password?
										</a>
									</div>
								</div>
								<div class="col-md-12 px-0">
									<button type="submit">
										Login
									</button>
								</div>
								<p class="link-bottom">
									Not a member yet?
									<a href="{{ route('supplier.register') }}">Register Now</a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
    </div>
@endsection
