@extends('default')
@section('title','Home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/main_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('plugins/easing/easing.js')}}"></script>
    <script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script type="text/javascript" src="{{asset('raty/jquery.raty.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $.fn.raty.defaults.path = "{{asset('raty/img')}}";
            $('.raty').raty({
                score: function () {
                    return $(this).attr('data-score');
                },
                readOnly: true,
            });
        });
    </script>
@endsection
<!-- Header -->
@section('content')
    <!-- Menu -->

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
                <li class="menu_mm"><a href="{{route('home')}}">Home</a></li>
                <li class="menu_mm"><a href="{{route('about')}}">About</a></li>
                <li class="menu_mm"><a href="{{route('courses')}}">Courses</a></li>
                <li class="menu_mm"><a href="{{route('blog')}}">Blog</a></li>
                <li class="menu_mm"><a href="{{route('contact')}}">Contact</a></li>

            </ul>
        </nav>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="home_slider_title">Học tập trực tuyến</div>
                                    <div class="home_slider_subtitle">Phương pháp học tập thời đại mới</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="home_slider_title">Học tập trực tuyến</div>
                                    <div class="home_slider_subtitle">Phương pháp học tập thời đại mới</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="home_slider_title">Học tập trực tuyến</div>
                                    <div class="home_slider_subtitle">Phương pháp học tập thời đại mới</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Home Slider Nav -->

        <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>

    <!-- Team -->

    <div class="team">
        <div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg"
             data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Giáo viên kinh nghiệm nhất</h2>
                        <div class="section_subtitle"><p>Những giáo viên có nhiều năm kinh nghiệm giảng dạy, phương pháp
                                dạy đặc biệt với nhiều học viên thi đạt thành tích cao trong các kì thi tại trường học,
                                trung học
                                phổ thông và tuyển sinh đại học.</p></div>
                    </div>
                </div>
            </div>
            @if(!empty($teachers))
                <div class="row team_row">
                    @foreach($teachers as $data)
                        <div class="col-lg-3 col-md-6 team_col">
                            <div class="team_item">
                                <div class="team_image"><img
                                        src="{{empty($data->avatar)?asset('images/avatar_default.jpg'):$data->avatar}}"
                                        alt=""></div>
                                <div class="team_body">
                                    <div class="team_title"><a href="#">{{$data->name}}</a></div>
                                    <div class="team_subtitle">{{($data->mySubject)->title}}</div>
                                    <div class="social_list">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row team_row">

                    <!-- Team Item -->
                    <div class="col-lg-3 col-md-6 team_col">
                        <div class="team_item">
                            <div class="team_image"><img src="images/team_1.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Vũ Mai Phương</a></div>
                                <div class="team_subtitle">Tiếng Anh 12</div>
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
                            <div class="team_image"><img src="images/team_2.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Nguyen Nhat Hai</a></div>
                                <div class="team_subtitle">Tiếng Anh 10</div>
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
                            <div class="team_image"><img src="images/team_3.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Nguyen Nhat Quang</a></div>
                                <div class="team_subtitle">Tiếng Anh 11</div>
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
                            <div class="team_image"><img src="images/team_4.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Pham Nhat Vuong</a></div>
                                <div class="team_subtitle">Toán 12</div>
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
            @endif
        </div>
    </div>

    <!-- Popular Courses -->

    <div class="courses">
        <div class="section_background parallax-window" data-parallax="scroll"
             data-image-src="images/courses_background.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Khóa học phổ biến nhất!</h2>
                        <div class="section_subtitle"><p>Những khóa học sau đâu được nhiều học viên tin tưởng đăng kí
                                học tập và có điểm bình chọn cao nhất từ đầu năm đến hiện tại!</p></div>
                    </div>
                </div>
            </div>
            <div class="row courses_row">
            @if(!empty($result))
                @foreach($result as $data)
                    <!-- Course -->
                        <div class="col-lg-4 course_col">
                            <div class="course">
                                <div class="course_image"><img src="images/course_1.jpg" alt=""></div>
                                <div class="course_body">
                                    <h3 class="course_title"><a
                                            href="<?php ?>{{route('course_detail',['id'=>$data->id])}}">{{$data->title}}</a>
                                    </h3>
                                    <div class="course_teacher">{{$data->name}}</div>
                                    <div class="course_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                    </div>
                                </div>
                                <div class="course_footer">
                                    <div
                                        class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                        <div class="course_info">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            <span>{{$data->count_student}}</span>
                                        </div>
                                        <span class='raty' style='margin:5px' id='9' data-score=4></span>
                                        | Tổng số: <b class='rate_count'>8</b>
                                        <div class="course_price ml-auto">
                                            @if($data->price==0)
                                                Free
                                            @else
                                                ${{$data->price}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                <!-- Course -->
                    <div class="col-lg-4 course_col">
                        <div class="course">
                            <div class="course_image"><img src="images/course_1.jpg" alt=""></div>
                            <div class="course_body">
                                <h3 class="course_title"><a
                                        href="{{route('course_detail',['id'=>$data->id])}}">{{$data->title}}</a>
                                </h3>
                                <div class="course_teacher">{{$data->name}}</div>
                                <div class="course_text">
                                    <p>{{$data->des}}</p>
                                </div>
                            </div>
                            <div class="course_footer">
                                <div
                                    class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="course_info">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        <span>{{$data->count_student}}</span>
                                    </div>
                                    <span class='raty' style='margin:5px' id='9' data-score=4></span>
                                    | Tổng số: <b class='rate_count'>8</b>
                                    <div class="course_price ml-auto">
                                        @if($data->price==0)
                                            Free
                                        @else
                                            ${{$data->price}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
            </div>
            <div class="row">
                <div class="col">
                    <div class="courses_button trans_200"><a href="{{route('courses')}}">Xem tất cả khóa học</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Events -->

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Sự kiện sắp diễn ra</h2>
                        <div class="section_subtitle"><p>Các sự kiện vô cùng hấp dẫn sắp diễn ra trong tháng 12 này. Hãy
                                chờ đợi và săn những khóa học cực hot cho bản thân.</p></div>
                    </div>
                </div>
            </div>
            <div class="row events_row">

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event event_left">
                        <div class="event_image"><img src="images/event_1.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-start justify-content-start">
                            <div class="event_date">
                                <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                    <div class="event_day trans_200">19</div>
                                    <div class="event_month trans_200">Dec</div>
                                </div>
                            </div>
                            <div class="event_content">
                                <div class="event_title"><a href="#">Làm chủ các môn trắc nghiệm khó hay dễ?</a></div>
                                <div class="event_info_container">
                                    <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>15.00 - 19.30</span>
                                    </div>
                                    <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 Hà Nội</span>
                                    </div>
                                    <div class="event_text">
                                        <p>Trắc nghiệm là những môn rất khó đạt điểm tối đa...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event event_mid">
                        <div class="event_image"><img src="images/event_2.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-start justify-content-start">
                            <div class="event_date">
                                <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                    <div class="event_day trans_200">20</div>
                                    <div class="event_month trans_200">Dec</div>
                                </div>
                            </div>
                            <div class="event_content">
                                <div class="event_title"><a href="#">Bí quyết tập trung trong giờ học</a>
                                </div>
                                <div class="event_info_container">
                                    <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>09.00 - 17.30</span>
                                    </div>
                                    <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 Thư viện TQB</span>
                                    </div>
                                    <div class="event_text">
                                        <p>Bí quyết đạt được sự tập trung cao trong học...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event event_right">
                        <div class="event_image"><img src="images/event_3.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-start justify-content-start">
                            <div class="event_date">
                                <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                    <div class="event_day trans_200">01</div>
                                    <div class="event_month trans_200">Sep</div>
                                </div>
                            </div>
                            <div class="event_content">
                                <div class="event_title"><a href="#">Thay thế hình thức thi toeic</a></div>
                                <div class="event_info_container">
                                    <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>13.00 - 18.30</span>
                                    </div>
                                    <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 CFL</span>
                                    </div>
                                    <div class="event_text">
                                        <p>Toeic là 1 dạng thức thi tiếng Anh có tiếng ở Bách Khoa...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

