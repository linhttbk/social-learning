@extends('default')
@section('title','About')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    <link rel="stylesheet" href="{{asset('css/about_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
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
                                <li><a href="{{route('home')}}">Trang chủ</a></li>
                                <li>Về chúng tôi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Chào mừng đến với SLearning</h2>
                        <div class="section_subtitle"><p>Mạng xã hội học tập miễn phí hàng đầu Việt Nam</p></div>
                    </div>
                </div>
            </div>
            <div class="row about_row">

                <!-- About Item -->
                <div class="col-lg-4 about_col about_col_left">
                    <div class="about_item">
                        <div class="about_item_image"><img src="{{asset('images/about_1.jpg')}}" alt=""></div>
                        <div class="about_item_title"><a href="#">Câu chuyện của chúng tôi</a></div>
                        <div class="about_item_text">
                            <p>Hồi còn là sinh viên, tôi không có nhiều tiền để nghĩ đến mua một vài khóa học online
                                nâng cao kiến thức...</p>
                        </div>
                    </div>
                </div>

                <!-- About Item -->
                <div class="col-lg-4 about_col about_col_middle">
                    <div class="about_item">
                        <div class="about_item_image"><img src="{{asset('images/about_2.jpg')}}" alt=""></div>
                        <div class="about_item_title"><a href="#">Sứ mệnh</a></div>
                        <div class="about_item_text">
                            <p>Cung cấp những khóa học miễn phí với chất lượng giảng dạy đến từ giáo sư tiến sĩ đầu
                                ngành...</p>
                        </div>
                    </div>
                </div>

                <!-- About Item -->
                <div class="col-lg-4 about_col about_col_right">
                    <div class="about_item">
                        <div class="about_item_image"><img src="{{asset('images/about_3.jpg')}}" alt=""></div>
                        <div class="about_item_title"><a href="#">Tầm nhìn </a></div>
                        <div class="about_item_text">
                            <p>Xây dựng mạng xã hội học tập lớn nhất từ trước đến nay, đem cơ hội học tập đến nhiều
                                người có hoàn cảnh khó khăn...</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Feature -->

    <div class="feature">
        <div class="feature_background" style="background-image:url(images/courses_background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Tại sao lại chọn chúng tôi?</h2>
                        <div class="section_subtitle"><p>Chúng tôi cung cấp các khóa học hoàn toàn miễn phí với chất
                                lượng cao luôn làm hài lòng tất cả.</p></div>
                    </div>
                </div>
            </div>
            <div class="row feature_row">

                <!-- Feature Content -->
                <div class="col-lg-6 feature_col">
                    <div class="feature_content">
                        <!-- Accordions -->
                        <div class="accordions">

                            <div class="elements_accordions">

                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center">
                                        <div>Giải Best Website 2018</div>
                                    </div>
                                    <div class="accordion_panel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.</p>
                                    </div>
                                </div>

                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center active">
                                        <div>You’re learning from the best.</div>
                                    </div>
                                    <div class="accordion_panel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.</p>
                                    </div>
                                </div>

                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center">
                                        <div>Our degrees are recognized worldwide.</div>
                                    </div>
                                    <div class="accordion_panel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.</p>
                                    </div>
                                </div>

                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center">
                                        <div>We encourage our students to go global.</div>
                                    </div>
                                    <div class="accordion_panel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Accordions End -->
                    </div>
                </div>

                <!-- Feature Video -->
                <div class="col-lg-6 feature_col">
                    <div class="feature_video d-flex flex-column align-items-center justify-content-center">
                        <div class="feature_video_background" style="background-image:url(images/video.jpg)"></div>
                        <a class="vimeo feature_video_button" href="https://player.vimeo.com/video/99340873?title=0"
                           title="OH, PORTUGAL - IN 4K - Basti Hansen - Stock Footage">
                            <img src="images/play.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team -->

    <div class="team">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">The Best Tutors in Town</h2>
                        <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit
                                venenatis sem</p></div>
                    </div>
                </div>
            </div>
            <div class="row team_row">

                <!-- Team Item -->
                <div class="col-lg-3 col-md-6 team_col">
                    <div class="team_item">
                        <div class="team_image"><img src="{{asset('images/team_1.jpg')}}" alt=""></div>
                        <div class="team_body">
                            <div class="team_title"><a href="#">Jacke Masito</a></div>
                            <div class="team_subtitle">Marketing & Management</div>
                            <div class="social_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Item -->
                <div class="col-lg-3 col-md-6 team_col">
                    <div class="team_item">
                        <div class="team_image"><img src="{{asset('images/team_2.jpg')}}" alt=""></div>
                        <div class="team_body">
                            <div class="team_title"><a href="#">William James</a></div>
                            <div class="team_subtitle">Designer & Website</div>
                            <div class="social_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Item -->
                <div class="col-lg-3 col-md-6 team_col">
                    <div class="team_item">
                        <div class="team_image"><img src="{{asset('images/team_3.jpg')}}" alt=""></div>
                        <div class="team_body">
                            <div class="team_title"><a href="#">John Tyler</a></div>
                            <div class="team_subtitle">Quantum mechanics</div>
                            <div class="social_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Item -->
                <div class="col-lg-3 col-md-6 team_col">
                    <div class="team_item">
                        <div class="team_image"><img src="{{asset('images/team_4.jpg')}}" alt=""></div>
                        <div class="team_body">
                            <div class="team_title"><a href="#">Veronica Vahn</a></div>
                            <div class="team_subtitle">Math & Physics</div>
                            <div class="social_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Counter -->

    <div class="counter">
        <div class="counter_background" style="background-image:url(images/counter_background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="counter_content">
                        <h2 class="counter_title">Register Now</h2>
                        <div class="counter_text"><p>Simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry’s standard dumy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p></div>

                        <!-- Milestones -->

                        <div
                            class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">

                            <!-- Milestone -->
                            <div class="milestone">
                                <div class="milestone_counter" data-end-value="15">0</div>
                                <div class="milestone_text">years</div>
                            </div>

                            <!-- Milestone -->
                            <div class="milestone">
                                <div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div>
                                <div class="milestone_text">years</div>
                            </div>

                            <!-- Milestone -->
                            <div class="milestone">
                                <div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div>
                                <div class="milestone_text">years</div>
                            </div>

                            <!-- Milestone -->
                            <div class="milestone">
                                <div class="milestone_counter" data-end-value="320">0</div>
                                <div class="milestone_text">years</div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="counter_form">
                <div class="row fill_height">
                    <div class="col fill_height">
                        <form class="counter_form_content d-flex flex-column align-items-center justify-content-center"
                              action="#">
                            <div class="counter_form_title">courses now</div>
                            <input type="text" class="counter_input" placeholder="Your Name:" required="required">
                            <input type="tel" class="counter_input" placeholder="Phone:" required="required">
                            <select name="counter_select" id="counter_select" class="counter_input counter_options">
                                <option>Choose Subject</option>
                                <option>Subject</option>
                                <option>Subject</option>
                                <option>Subject</option>
                            </select>
                            <textarea class="counter_input counter_text_input" placeholder="Message:"
                                      required="required"></textarea>
                            <button type="submit" class="counter_form_button">submit now</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Partners -->

    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="partners_slider_container">
                        <div class="owl-carousel owl-theme partners_slider">

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="{{asset('images/partner_1.png')}}" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{----}}
{{--<script src="js/jquery-3.2.1.min.js"></script>--}}
{{--<script src="styles/bootstrap4/popper.js"></script>--}}
{{--<script src="styles/bootstrap4/bootstrap.min.js"></script>--}}
{{--<script src="plugins/greensock/TweenMax.min.js"></script>--}}
{{--<script src="plugins/greensock/TimelineMax.min.js"></script>--}}
{{--<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>--}}
{{--<script src="plugins/greensock/animation.gsap.min.js"></script>--}}
{{--<script src="plugins/greensock/ScrollToPlugin.min.js"></script>--}}
{{--<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>--}}
{{--<script src="plugins/easing/easing.js"></script>--}}
{{--<script src="plugins/parallax-js-master/parallax.min.js"></script>--}}
{{--<script src="plugins/colorbox/jquery.colorbox-min.js"></script>--}}
{{--<script src="js/about.js"></script>--}}
