@extends('default')
@section('title','Blog')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('tivi')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
@endsection
<!-- Menu -->
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
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_post_container">

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_image"><img src="images/blog_1.jpg" alt=""></div>
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">Here’s What You Need to
                                        Know About Online Testing</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">With Changing Students and
                                        Times</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_video_container">
                                <video class="blog_post_video video-js"
                                       data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "images/blog_2.jpg"}'>
                                    <source src="images/mov_bbb.mp4" type="video/mp4">
                                    <source src="images/mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML5 video.
                                </video>
                            </div>
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">Building Skills Outside the
                                        Classroom With New Ways</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_image"><img src="images/blog_3.jpg" alt=""></div>
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">Law Schools Debate a
                                        Contentious Testing Alternative</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_video_container">
                                <video class="blog_post_video video-js"
                                       data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "images/blog_4.jpg"}'>
                                    <source src="images/mov_bbb.mp4" type="video/mp4">
                                    <source src="images/mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML5 video.
                                </video>
                            </div>
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">Building Skills Outside the
                                        Classroom With New Ways</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_image"><img src="images/blog_5.jpg" alt=""></div>
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">Here’s What You Need to
                                        Know About Online Testing</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post -->
                        <div class="blog_post trans_200">
                            <div class="blog_post_body">
                                <div class="blog_post_title"><a href="blog_single.blade.php">With Changing Students and
                                        Times</a></div>
                                <div class="blog_post_meta">
                                    <ul>
                                        <li><a href="#">admin</a></li>
                                        <li><a href="#">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="blog_post_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which path
                                        policymakers should take...</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="load_more trans_200"><a href="#">load more</a></div>
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
<!-- Footer -->

{{--<script src="js/jquery-3.2.1.min.js"></script>--}}
{{--<script src="styles/bootstrap4/popper.js"></script>--}}
{{--<script src="styles/bootstrap4/bootstrap.min.js"></script>--}}
{{--<script src="plugins/easing/easing.js"></script>--}}
{{--<script src="plugins/masonry/masonry.js"></script>--}}
{{--<script src="plugins/video-js/video.min.js"></script>-tivi{--<tivit src="plugins/parallax-js-master/parallax.min.js"></script>--}}
{{--<script src="js/blog.js"></script>--}}

