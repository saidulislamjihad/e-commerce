<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@if (Auth::guard('web')->check())
        <meta name="user_name" content="{{ Auth::guard('web')->user()->full_name }}">
        <meta name="user_id" content="{{ Auth::guard('web')->user()->id }}">
    @else
        <meta name="user_name" content="">
        <meta name="user_id" content="">
    @endif

		<!-- Favicon icon link -->
	 @include('frontend.includes.style')

     @stack('style')


</head>
<body>
	@include('frontend.includes.header')
    <main class="main-section" id="app">
		<add-cart></add-cart>
        <flash message=""></flash>
        @yield('content')
    </main>

	@include('frontend.includes.footer')

<!-- Jquery CDN-->
@include('frontend.includes.script')
@stack('script')
</body>
</html>
