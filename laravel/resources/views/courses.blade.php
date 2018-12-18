@extends('default')
@section('title','Courses')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/courses.css')}}">
    <link rel="stylesheet" href="{{asset('css/courses_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/courses.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script type="text/javascript" src="{{asset('raty/jquery.raty.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $.fn.raty.defaults.path = "{{asset('raty/img')}}";
            $('.raty').raty({
                score: function() {
                    return $(this).attr('data-score');
                },
                readOnly  : true,
            });
        });
    </script>
@endsection
@section('content')

    <!-- Menu -->

    <!-- Home -->

    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses -->

    <div class="courses">
        <div class="container">
            <div class="row">

                <!-- Courses Main Content -->
                <div class="col-lg-8">
                    <div class="courses_search_container">
                        <form action="#" id="courses_search_form"
                              class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <input type="search" class="courses_search_input" placeholder="Search Courses"
                                   required="required">
                            <select id="courses_search_select" class="courses_search_select courses_search_input">
                                <option>All</option>
                                @if(!empty($subject))
                                    @foreach($subject as $data)
                                        <option>{{$data->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button action="submit" class="courses_search_button ml-auto">search now</button>
                        </form>
                    </div>
                    <div class="courses_container">
                        <div class="row courses_row">
                            @if(!empty($result))
                                @foreach($result as $data)
                                    <div class="col-lg-6 course_col">
                                        <div class="course">
                                            {{--<div class="course_image"><img src="images/course_4.jpg" alt=""></div>--}}
                                            <div class="course_body">
                                                <h3 class="course_title"><a
                                                        href="{{route('course_detail',['id'=>$data->id])}}">{{$data->title}}</a>
                                                </h3>
                                                <div class="course_teacher"><a href="#">{{$data->name}}</a></div>
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
                                                    <span class='raty' style = 'margin:5px' id='9' data-score=4></span>
                                                    | Tổng số: <b  class='rate_count'>8</b>
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
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        <div class="course_image"><img src="images/course_4.jpg" alt=""></div>
                                        <div class="course_body">
                                            <h3 class="course_title"><a href="course.blade.php">Software Training</a>
                                            </h3>
                                            <div class="course_teacher">Mr. John Taylor</div>
                                            <div class="course_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod
                                                    tempor</p>
                                            </div>
                                        </div>
                                        <div class="course_footer">
                                            <div
                                                class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="course_info">
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                    <span>20 Student</span>
                                                </div>
                                                <div class="course_info">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>5 Ratings</span>
                                                </div>
                                                <div class="course_price ml-auto">$130</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        {{$result->links()}}
                        {{--<div class="row pagination_row">--}}
                        {{--<div class="col">--}}
                        {{--<div--}}
                        {{--class="pagination_container d-flex flex-row align-items-center justify-content-start">--}}
                        {{--<ul class="pagination_list">--}}
                        {{--<li class="active"><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--<div class="courses_show_container ml-auto clearfix">--}}
                        {{--<div class="courses_show_text">Showing <span class="courses_showing">1-6</span>--}}
                        {{--of <span class="courses_total">26</span> results:--}}
                        {{--</div>--}}
                        {{--<div class="courses_show_content">--}}
                        {{--<span>Show: </span>--}}
                        {{--<select id="courses_show_select" class="courses_show_select">--}}
                        {{--<option>06</option>--}}
                        {{--<option>12</option>--}}
                        {{--<option>24</option>--}}
                        {{--<option>36</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <!-- Courses Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">

                        <!-- Categories -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Categories</div>
                            <div class="sidebar_categories">
                                @if(!empty($subject))
                                    @php
                                        showCategories($subject)

                                    @endphp
                                @endif
                            </div>
                        </div>

                        <!-- Latest Course -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Latest Courses</div>
                            <div class="sidebar_latest">
                                @if(!empty($result))
                                    @foreach($result as $key=>$data)
                                        @if($key >2)
                                            @break
                                        @endif
                                        <div class="latest d-flex flex-row align-items-start justify-content-start">
                                            {{--<div class="latest_image">--}}
                                            {{--<div><img src={{is_null($data->avatar)?asset('images/latest_1.jpg'):$data->avatar}} alt=""></div>--}}
                                            {{--</div>--}}
                                            <div class="latest_content">
                                                <div class="latest_title"><a
                                                        href="{{route('course_detail',['id'=>$data->id])}}">{{$data->title}}</a></div>
                                                <div class="latest_tearcher"><a href="#">{{$data->name}}</a></div>
                                                <div class="course_text"> {{$data->des}}</div>
                                                <div
                                                    class="latest_price">{{$data->price == 0 ? 'Free':  $data->price}}</div>
                                            </div>
                                        </div>
                                @endforeach
                            @endif

                            <!-- Gallery -->
                                <div class="sidebar_section">
                                    <div class="sidebar_section_title">Instagram</div>
                                    <div class="sidebar_gallery">
                                        <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_1_large.jpg">
                                                    <img src="images/gallery_1.jpg" alt="">
                                                </a>
                                            </li>
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_2_large.jpg">
                                                    <img src="images/gallery_2.jpg" alt="">
                                                </a>
                                            </li>
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_3_large.jpg">
                                                    <img src="images/gallery_3.jpg" alt="">
                                                </a>
                                            </li>
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_4_large.jpg">
                                                    <img src="images/gallery_4.jpg" alt="">
                                                </a>
                                            </li>
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_5_large.jpg">
                                                    <img src="images/gallery_5.jpg" alt="">
                                                </a>
                                            </li>
                                            <li class="gallery_item">
                                                <div
                                                    class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                                                    +
                                                </div>
                                                <a class="colorbox" href="images/gallery_6_large.jpg">
                                                    <img src="images/gallery_6.jpg" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Tags -->
                                <div class="sidebar_section">
                                    <div class="sidebar_section_title">Tags</div>
                                    <div class="sidebar_tags">
                                        <ul class="tags_list">
                                            <li><a href="#">creative</a></li>
                                            <li><a href="#">unique</a></li>
                                            <li><a href="#">photography</a></li>
                                            <li><a href="#">ideas</a></li>
                                            <li><a href="#">wordpress</a></li>
                                            <li><a href="#">startup</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Banner -->
                                <div class="sidebar_section">
                                    <div
                                        class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="sidebar_banner_background"
                                             style="background-image:url(images/banner_1.jpg)"></div>
                                        <div class="sidebar_banner_overlay"></div>
                                        <div class="sidebar_banner_content">
                                            <div class="banner_title">Free Book</div>
                                            <div class="banner_button"><a href="#">download now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->

            {{--<div class="newsletter">--}}
                {{--<div class="newsletter_background parallax-window" data-parallax="scroll"--}}
                     {{--data-image-src="images/newsletter.jpg"--}}
                     {{--data-speed="0.8"></div>--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col">--}}
                            {{--<div--}}
                                {{--class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">--}}

                                {{--<!-- Newsletter Content -->--}}
                                {{--<div class="newsletter_content text-lg-left text-center">--}}
                                    {{--<div class="newsletter_title">sign up for news and offers</div>--}}
                                    {{--<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals--}}
                                        {{--we--}}
                                        {{--offer--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<!-- Newsletter Form -->--}}
                                {{--<div class="newsletter_form_container ml-lg-auto">--}}
                                    {{--<form action="#" id="newsletter_form"--}}
                                          {{--class="newsletter_form d-flex flex-row align-items-center justify-content-center">--}}
                                        {{--<input type="email" class="newsletter_input" placeholder="Your Email"--}}
                                               {{--required="required">--}}
                                        {{--<button type="submit" class="newsletter_button">subscribe</button>--}}
                                    {{--</form>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    @endsection
    <!-- Footer -->
    @php
        function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
        {
            $cate_child = array();
            foreach ($categories as $key => $item)
            {
                if ($item->id_parent == $parent_id)
                {
                    $cate_child[] = $item;
                    unset($categories[$key]);
                }
            }
            if ($cate_child)
            {
                if($parent_id ==0) echo '<ul>';
                else echo '<ul class = "sub-menu">';
                foreach ($cate_child as $key => $item)
                {
                    echo '<li><a href="#">'.$item->title . '</a>';
                    showCategories($categories, $item->id , $char.'|---', ++$stt);
                    echo '</li>';
                }
                echo '</ul>';
            }
        }
        function cmp($a, $b)
        {
        return $a->create_date > $b->create_date;
        }
    @endphp
