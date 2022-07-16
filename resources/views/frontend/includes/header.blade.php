 <header class="header-main-section">
    <div class="header-main-top">
        <div class="header-main-top-left">
            <div class="contact-number-outer">
                <a href="tel:+8801608-957638" class="phone-number">
                    <i class="fas fa-phone-volume"></i>
                    <span>+8801608-957638</span>
                </a>
            </div>
            <div class="store-locator-outer">
                <a href="mailto:trustshoper24@gmail.com" class="store-locator-inner">
                    <i class="fas fa-envelope"></i>
                    <span>trustshopperbd24@gmail.com</span>
                </a>
            </div>
        </div>
        <div class="header-main-top-right">
            <ul class="login-register-list">
                @if(auth('supplier')->check())
                <li class="login-register-list-item">
                    <a href="#">
                        {{ auth('supplier')->user()->full_name }}
                    </a>
                </li>
                @else
                <li class="login-register-list-item">
                    <a href="{{ route('supplier.register') }}">
                        vendor registration
                    </a>
                </li>
                <li class="login-register-list-item">
                    <a href="{{ route('vendor.login.form') }}">
                        vendor login
                    </a>
                </li>
                @endif
                @if(auth('web')->check())
                <li class="login-register-list-item">
                    <a href="#">
                        {{ auth('web')->user()->full_name }}
                    </a>
                </li>
                @else
                <li class="login-register-list-item">
                    <a href="{{ route('customer.register.form') }}">
                        user registration
                    </a>
                </li>
                <li class="login-register-list-item">
                    <a href="{{ route('customer.login.form') }}">
                        user login
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="header-main-top-right-icon">
            <ul class="socials-link-list">
                <li class="socials-link-list-item">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="socials-link-list-item">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="socials-link-list-item">
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="socials-link-list-item">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header-main-center">
        <div class="header-logo-outer">
            <a href="{{ url('/') }}" class="header-logo">
                <img src="{{ asset('frontend/') }}/assets/logo/Trustshoper final files 3-01.png" style="height: 80px;">
            </a>
            <a href="{{ url('/') }}" class="header-responsive-logo">
                <img src="{{ asset('frontend/') }}/assets/logo/Trustshoper-final-files-3.png">
            </a>
        </div>
        <div class="search-bar-wrapper">
            <div class="category-wrapper">
                <a href="javascript:void(0)" class="category-title header-center">
                    <i class="fas fa-bars"></i>
                    <span>all category</span>
                </a>
                <ul class="header-center-sidebar-main-nav-wrapper">
                    @foreach ($categories as $category)
                        <li class="main-nav-item item-has-mega-menu">
                            <a href="#" class="main-nav-item-link">
                                {{ $category->name }}
                            </a>
                            <ul class="nav-item-mega-menu">
                                @foreach ($category->subcategories->chunk(4) as $subcategory)
                                    <li class="nav-item-mega-menu-item">
                                        <ul class="mega-menu-has-submenu">
                                            @foreach ($subcategory as $subcat)
                                                <li class="mega-menu-has-submenu-item">
                                                    <a href="{{ route('subcategory.products', $subcat->slug) }}" class="link">{{ $subcat->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="search">
                <search></search>
            </div>
        </div>
        <div class="header-center-right-item">
            <div class="login-register-right-section">
                <div class="responsive-login-list-wrapper">
                    <a href="javascript:void(0)" class="responsive-login-icon">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="responsive-login-list">
                        <li class="responsive-login-list-item">
                            <a href="{{ route('supplier.register') }}">
                                Vendor registration
                            </a>
                        </li>
                        <li class="responsive-login-list-item">
                            <a href="{{ route('vendor.login.form') }}">
                                Vendor login
                            </a>
                        </li>
                        <li class="responsive-login-list-item">
                            <a href="{{ route('customer.register.form') }}">
                                User registration
                            </a>
                        </li>
                        <li class="responsive-login-list-item">
                            <a href="{{ route('customer.login.form') }}">
                                User login
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="user-supplier-profile-wrapper">
                    @if(auth('supplier')->check())
                    <div class="supplier-profile-outer">
                        <a href="javascript:void(0)" class="supplier-profile-img-inner">
                            <img class="supplier-profile-img" src="{{ asset('avatar/'.auth('supplier')->user()->logo) }}">
                        </a>
                        <ul class="supplier-right-items-wrapper">
                            <li class="supplier-right-item">
                                <a href="{{ route('vendor.deshboard') }}" class="supplier-right-item-link">
                                    {{ auth('supplier')->user()->first_name }}
                                </a>
                            </li>
                            <li class="supplier-right-item">
                                <a href="{{ route('vendor.deshboard') }}" class="supplier-right-item-link">
                                    Dashboard
                                </a>
                            </li>
                            <li class="supplier-right-item">
                                <a href="{{ route('vendor.profile') }}" class="supplier-right-item-link">
                                    Profile Settings
                                </a>
                            </li>
                            <li class="supplier-right-item">
                                <a href="{{ route('vendor.product.upload.form') }}" class="supplier-right-item-link">
                                    Product Upload
                                </a>
                            </li>
                            <li class="supplier-right-item">
                                <a href="{{ route('vendor.product.order') }}" class="supplier-right-item-link">
                                    Orders
                                </a>
                            </li>
                            <li class="supplier-right-item">
                                <a href="{{ route('logout') }}" class="supplier-right-item-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @elseif (auth('web')->check())
                        <div class="supplier-profile-outer">
                            <a href="javascript:void(0)" class="supplier-profile-img-inner">
                                <img class="supplier-profile-img" src="{{ auth('web')->user()->avatar }}">
                            </a>
                            <ul class="supplier-right-items-wrapper">
                                <li class="supplier-right-item">
                                    <a href="javascript:void(0)" class="supplier-right-item-link">
                                        {{ auth('web')->user()->full_name }}
                                    </a>
                                </li>
                                 <li class="supplier-right-item">
                                    <a href="{{ route('user.deshboard') }}" class="supplier-right-item-link">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="supplier-right-item">
                                    <a href="{{ route('logout') }}" class="supplier-right-item-link" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                    <div class="my-account">
                        <a href="javascript:void(0)" class="my-account-link my-c-btn">
                            <div class="dropdown-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </a>
                        <ul class="my-account-submenu my-c-popup">
                            <li class="my-account-submenu-item">
                                <a href="#" class="my-account-submenu-link">
                                    Demo text
                                </a>
                            </li>
                            <li class="my-account-submenu-item">
                                <a href="#" class="my-account-submenu-link">
                                    Demo text
                                </a>
                            </li>
                            <li class="my-account-submenu-item">
                                <a href="#" class="my-account-submenu-link">
                                    Demo text
                                </a>
                            </li>
                            <li class="my-account-submenu-item">
                                <a href="#" class="my-account-submenu-link">
                                    Demo text
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="header-main-bottom">
        @if(!Request::is('/'))
        <div class="category-wrapper">
            <a href="javascript:void(0)" class="category-title">
                <i class="fas fa-bars"></i>
                all category
            </a>
            <ul class="sidebar-main-nav-wrapper">
                @foreach ($categories as $category)
                    <li class="main-nav-item item-has-mega-menu">
                        <a href="#" class="main-nav-item-link">
                            {{ $category->name }}
                        </a>
                        <ul class="nav-item-mega-menu">
                            @foreach ($category->subcategories->chunk(4) as $subcategory)
                                <li class="nav-item-mega-menu-item">
                                    <ul class="mega-menu-has-submenu">
                                        @foreach ($subcategory as $subcat)
                                            <li class="mega-menu-has-submenu-item">
                                                <a href="{{ route('subcategory.products', $subcat->slug) }}" class="link">{{ $subcat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        @else
        <div class="home-category-wrapper">
            <a href="javascript:void(0)" class="category-title">
                <i class="fas fa-bars"></i>
                all category
            </a>
            <ul class="sidebar-main-nav-wrapper">
                @foreach ($categories as $category)
                    <li class="main-nav-item item-has-mega-menu">
                        <a href="#" class="main-nav-item-link">
                            {{ $category->name }}
                        </a>
                        <ul class="nav-item-mega-menu">
                            @foreach ($category->subcategories->chunk(4) as $subcategory)
                                <li class="nav-item-mega-menu-item">
                                    <ul class="mega-menu-has-submenu">
                                        @foreach ($subcategory as $subcat)
                                            <li class="mega-menu-has-submenu-item">
                                                <a href="{{ route('subcategory.products', $subcat->slug) }}" class="link">{{ $subcat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="site-hot-offer-wrapper">
            <ul class="site-hot-offer-list">
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/feature/products') }}" class="site-hot-offer-list-item-link">
                        feature
                    </a>
                </li>
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/hot/products') }}" class="site-hot-offer-list-item-link">
                        hot
                    </a>
                </li>
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/discount/products') }}" class="site-hot-offer-list-item-link">
                        discount
                    </a>
                </li>
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/new-arrival/products') }}" class="site-hot-offer-list-item-link">
                        new arrival
                    </a>
                </li>
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/top/products') }}" class="site-hot-offer-list-item-link">
                        top
                    </a>
                </li>
{{--                <li class="site-hot-offer-list-item">--}}
{{--                    <a href="{{ url('/upcomming/products') }}" class="site-hot-offer-list-item-link">--}}
{{--                        upcoming--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="site-hot-offer-list-item">--}}
{{--                    <a href="{{ url('/all/blogs') }}" class="site-hot-offer-list-item-link">--}}
{{--                        blog--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="site-hot-offer-list-item">
                    <a href="{{ url('/order/track') }}" class="site-hot-offer-list-item-link">
                        Order track
                    </a>
                </li>
            </ul>
        </div>
        <div class="responsive-hot-offer-wrapper">
            <a href="#">
                <i class="fab fa-hotjar"></i>
                <span>offer</span>
            </a>
            <ul class="responsive-hot-offer-list">
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/feature/products') }}" class="responsive-hot-offer-list-item-link">
                        feature
                    </a>
                </li>
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/hot/products') }}" class="responsive-hot-offer-list-item-link">
                        hot
                    </a>
                </li>
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/discount/products') }}" class="responsive-hot-offer-list-item-link">
                        discount
                    </a>
                </li>
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/new-arrival/products') }}" class="responsive-hot-offer-list-item-link">
                        new arrival
                    </a>
                </li>
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/api/top/products') }}" class="responsive-hot-offer-list-item-link">
                        top
                    </a>
                </li>
{{--                <li class="responsive-hot-offer-list-item">--}}
{{--                    <a href="{{ url('/upcomming/products') }}" class="responsive-hot-offer-list-item-link">--}}
{{--                        upcoming--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="responsive-hot-offer-list-item">--}}
{{--                    <a href="{{ url('/blogs') }}" class="responsive-hot-offer-list-item-link">--}}
{{--                        blog--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="responsive-hot-offer-list-item">
                    <a href="{{ url('/order/track') }}" class="responsive-hot-offer-list-item-link">
                        Order track
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
