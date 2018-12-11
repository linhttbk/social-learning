@extends('default')
@section('title','Contact')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
@endsection
@section('content')
    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container">
            <div class="menu_close">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button
                    class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="menu_mm"><a href="index.html">Home</a></li>
                <li class="menu_mm"><a href="#">About</a></li>
                <li class="menu_mm"><a href="#">Courses</a></li>
                <li class="menu_mm"><a href="#">Blog</a></li>
                <li class="menu_mm"><a href="#">Page</a></li>
                <li class="menu_mm"><a href="contact.blade.php">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">

        <!-- Contact Map -->

        <div class="contact_map">

            <!-- Google Map -->

            <div class="map">
                <div id="google_map" class="google_map">
                    <div class="map_container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Contact Info -->

        <div class="contact_info_container">
            <div class="container">
                <div class="row">

                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <div class="contact_form">
                            <div class="contact_info_title">Contact Form</div>
                            <form action="#" class="comment_form">
                                <div>
                                    <div class="form_title">Name</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                                <div>
                                    <div class="form_title">Email</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                                <div>
                                    <div class="form_title">Message</div>
                                    <textarea class="comment_input comment_textarea" required="required"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="comment_button trans_200">submit now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-6">
                        <div class="contact_info">
                            <div class="contact_info_title">Contact Info</div>
                            <div class="contact_info_text">
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                    it has a distribution of letters.</p>
                            </div>
                            <div class="contact_info_location">
                                <div class="contact_info_location_title">New York Office</div>
                                <ul class="location_list">
                                    <li>T8/480 Collins St, Melbourne VIC 3000, New York</li>
                                    <li>1-234-567-89011</li>
                                    <li>info.deercreative@gmail.com</li>
                                </ul>
                            </div>
                            <div class="contact_info_location">
                                <div class="contact_info_location_title">Australia Office</div>
                                <ul class="location_list">
                                    <li>Forrest Ray, 191-103 Integer Rd, Corona Australia</li>
                                    <li>1-234-567-89011</li>
                                    <li>info.deercreative@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="newsletter_background" style="background-image:url(images/newsletter_background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                        <!-- Newsletter Content -->
                        <div class="newsletter_content text-lg-left text-center">
                            <div class="newsletter_title">sign up for news and offers</div>
                            <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we
                                offer
                            </div>
                        </div>

                        <!-- Newsletter Form -->
                        <div class="newsletter_form_container ml-lg-auto">
                            <form action="#" id="newsletter_form"
                                  class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                <input type="email" class="newsletter_input" placeholder="Your Email"
                                       required="required">
                                <button type="submit" class="newsletter_button">subscribe</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--<script src="js/jquery-3.2.1.min.js"></script>--}}
{{--<script src="styles/bootstrap4/popper.js"></script>--}}
{{--<script src="styles/bootstrap4/bootstrap.min.js"></script>--}}
{{--<script src="plugins/easing/easing.js"></script>--}}
{{--<script src="plugins/parallax-js-master/parallax.min.js"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>--}}
{{--<script src="plugins/marker_with_label/marker_with_label.js"></script>--}}
{{--<script src="js/contact.js"></script>--}}

