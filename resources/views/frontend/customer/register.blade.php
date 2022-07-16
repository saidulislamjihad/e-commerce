@extends('frontend.master')

@section('title')
    Customer Register
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
<main class="">
    <section class="login-section">
        <div class="container">
            @if(Session::has('success'))
                <x-alert :message="session('success')" title="Success" type="success"></x-alert>
            @endif
            @if(Session::has('error'))
                <x-alert :message="session('error')" title="Error" type="error"></x-alert>
            @endif

            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <form id="userRegForm" class="form-group" action="{{ route('customer.register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1>User Registation</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" onchange="imagePreview(event)">
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -20px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <img src="" height="150" width="100" id="pre-logo" style="display: none" />
                            <div class="col-md-12">
                                <div class="customer-register-btn-wrapper">
                                    <button type="submit" class="user-reg-btn" style="cursor: pointer">submit</button>
                                    <div class="left-customer-btn-outer">
                                        <a href="{{ route('customer.login.form') }}" class="customer-login-btn-link">Login</a>
                                        <ul>
{{--                                            <li class="facebook">--}}
{{--                                                <a href="{{ url('/auth/facebook') }}">--}}
{{--                                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
                                            <li class="twitter" style="margin-left: 15px;">
                                                <a href="{{ url('/auth/google') }}">
                                                    <i class="fab fa-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('script')
    <script>

    </script>
@endpush
