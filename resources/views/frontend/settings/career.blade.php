@extends('frontend.master')

@section('title')
    Career
@endsection

@section('content')
    <section class="career-section">
        <div class="career-section-banner-outer">
            <img src="{{ asset('/frontend/') }}/assets/images/about-home-bg.jpg">
        </div>
    </section>
    <section class="career-section-about">
        <div class="container">
            <div class="career-section-about-content">
                <div class="career-section-about-heading">
                    <h4 class="heading-inner">
                        About
                    </h4>
                </div>
                <div class="career-section-about-content-description">
                    <p class="des">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p class="des">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p class="des">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="our-mission-section">
        <div class="our-mission-section-heading">
            <h4 class="title">
                our mission
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="our-mission-image-outer">
                        <img src="{{ asset('/frontend/') }}/assets/images/mission.jpg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="our-mission-content">
                        <i>
                            “Make it easy to do business anywhere<br>
                            in the era of the digital economy”
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="future-program-section">
        <div class="future-program-section-heading">
            <h4 class="title">
                future program
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="future-program-section-video-outer">
                        <div class="section-bg-outer">
                            <img src="{{ asset('/frontend/') }}/assets/images/mission.jpg">
                        </div>
                        <div class="video-icon-outer">
                            <a href="https://www.youtube.com/watch?v=knXIBwAWOWo" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="future-program-section-content">
                        <p class="des"> 
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="des"> 
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-location-section">
        <div class="our-location-section-heading">
            <h4 class="title">
                our location
            </h4>
        </div>
        <div class="location-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58373.85930285138!2d90.34326820970769!3d23.87662963880093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d05e7074dd%3A0xd1c58803049f00c7!2sUttara%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1646635801268!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection
