@extends('frontend.master')

@section('title')
    Vendor Register
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
    <section class="registation-section">
        <div class="container">
            @if(Session::has('success'))
                <x-alert :message="session('success')" title="Success" type="success"></x-alert>
            @endif
            @if(Session::has('error'))
                <x-alert :message="session('error')" title="Error" type="error"></x-alert>
            @endif

            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="regForm" action="{{ route('vendor.register.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1>Supplier Registation</h1>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <input type="text" placeholder="First name..." oninput="this.className = ''" name="first_name">
                            <span style="color: red"> {{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</span>
                            <input type="text" placeholder="Last name..." oninput="this.className = ''" name="last_name">
                            <span style="color: red"> {{ $errors->has('last_name') ? $errors->first('last_name') : ' ' }}</span>
                            <div class="supplier-logo-input">
                                <label for="suppLogo">Logo</label>
                                <input id="suppLogo" type="file" placeholder="Logo..." oninput="this.className = ''" name="logo">
                                <span style="color: red"> {{ $errors->has('logo') ? $errors->first('logo') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="tab">
                            <input type="email" placeholder="E-mail..." oninput="this.className = ''" name="email">
                            <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                            <input type="number" placeholder="Phone..." oninput="this.className = ''" name="phone">
                            <span style="color: red"> {{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                            <input type="text" placeholder="Shop Name..." oninput="this.className = ''" name="shop_name">
                            <span style="color: red"> {{ $errors->has('shop_name') ? $errors->first('shop_name') : ' ' }}</span>
                        </div>
                        <div class="tab">
                            <input type="text" placeholder="Address..." oninput="this.className = ''" name="address">
                            <span style="color: red"> {{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                            <input type="password" placeholder="Password..." oninput="this.className = ''" name="password">
                            <span style="color: red"> {{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                 <button type="button" id="prevBtn" onclick="nextPrev(-1)">
                                      Previous
                                  </button>
                                  <button type="button" id="nextBtn" onclick="nextPrev(1)">
                                      Next
                                  </button>
                            </div>
                        </div>
                          <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
