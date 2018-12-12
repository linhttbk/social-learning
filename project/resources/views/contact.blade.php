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
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
@endsection
@section('content')

    <!-- Home -->

    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
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

        {{--<div class="contact_map">--}}

            {{--<!-- Google Map -->--}}

            {{--<div class="map">--}}
                {{--<div id="google_map" class="google_map">--}}
                    {{--<div class="map_container">--}}
                        {{--<div id="map">--}}
                            {{--<script>--}}
                                {{--// Initialize and add the map--}}
                                {{--function initMap() {--}}
                                    {{--// The location of Uluru--}}
                                    {{--var uluru = {lat: -25.344, lng: 131.036};--}}
                                    {{--// The map, centered at Uluru--}}
                                    {{--var map = new google.maps.Map(--}}
                                        {{--document.getElementById('map'), {zoom: 4, center: uluru});--}}
                                    {{--// The marker, positioned at Uluru--}}
                                    {{--var marker = new google.maps.Marker({position: uluru, map: map});--}}
                                {{--}--}}
                            {{--</script>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}

        <!-- Contact Info -->

        <div class="contact_info_container">
            <div class="container">
                <div class="row">

                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <div class="contact_form">
                            <div class="contact_info_title">Liên hệ</div>
                            <form action="#" class="comment_form">
                                <div>
                                    <div class="form_title">Họ và tên</div>
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
                            <div class="contact_info_title">Thông tin liên hệ</div>
                            <div class="contact_info_text">
                                <p>Hãy liên hệ ngay với chúng tôi khi bạn cần hỗ trợ.</p>
                            </div>
                            <div class="contact_info_location">
                                <div class="contact_info_location_title">Văn phòng Hà Nội</div>
                                <ul class="location_list">
                                    <li>Số 14 Lê Thanh Nghị Hai Bà Trưng Hà Nội</li>
                                    <li>+(84) 0964988900</li>
                                    <li>slearning@bkteam.edu.vn</li>
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

