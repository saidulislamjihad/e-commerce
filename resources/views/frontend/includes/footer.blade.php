<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-column-1-wrapper">
                    <div class="footer-logo">
                        <img src="{{ asset('frontend/') }}/assets/logo/Trustshoper final files 3-02.jpg">
                    </div>
                    <p class="office-address">
                        House#06, Level#03 Road-1/A, Sector#09 Housebuilding, Uttara Dhaka-1230.
                    </p>
                    <ul class="footer-column-1-link">
                        <li>
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i>
                                 Housebuilding, Uttara Dhaka-1230
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-mobile-alt"></i>
                                Phone: +8801608-957638
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-envelope"></i>
                                trustshopperbd24@gmail.com
                            </a>
                        </li>
                    </ul>
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
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-useful-links-wrapper">
                    <h5 class="useful-links-heading">
                        Usefullinks
                    </h5>
                    <ul class="footer-useful-links-list">
                        <li>
                            <a href="{{ url('/privacy-policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/return-policy') }}">
                                Return Policy
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ url('/payment-policy') }}">--}}
{{--                                Payment Policy--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/refund-policy') }}">--}}
{{--                                Return Policy--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{ url('/term-conditions') }}">
                                Terms & Conditions
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ url('/career') }}">--}}
{{--                                Career--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-menu-wrapper">
                    <h5 class="footer-menu-heading">
                        Abouts
                    </h5>
                    <ul class="footer-menu-list">
                        <li>
                            <a href="{{ url('/vendor/registration') }}">
                                Vendor Registration
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/vendor/login/form') }}">
                                Vendor Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/customer/register-form') }}">
                                User Registration
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/customer/login-form') }}">
                                User Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contact-us') }}">
                                Contact Us
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ url('/about-us') }}">--}}
{{--                                About Us--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-recent-post-wrapper">
                    <h5 class="recent-post-heading">
                        subscription
                    </h5>
                    <form class="form-group">
                        <input type="text" name="subscription" class="form-control subscribe-input" placeholder="Subscription">
                        <button class="subscription-btn" type="submit" title="Search">
                            subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-section">
        <div class="container">
            <div class="col-center">
                <div class="footer-bottom-left-info">
                    <i class="fas fa-copyright"></i>
                    {{ date('Y') }} CREATED BY
                    <a href="#">
                        <strong>
                            <span>
                                TrustShopper
                            </span>
                        </strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="scroll-back-top" >
        <i class="fas fa-chevron-up"></i>
    </a>
</footer>
