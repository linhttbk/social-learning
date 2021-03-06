@extends('default')
@section('title','Course Detail')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/course.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/course.js')}}"></script>
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
                                <li><a href="{{route('courses')}}">Khóa học</a></li>
                                <li>Chi tiết khóa học</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course -->

    <div class="course">
        <div class="container">
            <div class="row">
            @if(!empty($course))
                <!-- Course -->
                    <div class="col-lg-8">

                        <div class="course_container">
                            <div class="course_title">{{$course->title}}</div>
                            <div
                                class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                                <!-- Course Info Item -->
                                <div class="course_info_item">
                                    <div class="course_info_title">Giáo viên:</div>
                                    <div class="course_info_text"><a href="#">{{($course->user)->name}}</a></div>
                                </div>

                                <!-- Course Info Item -->
                                <div class="course_info_item">
                                    <div class="course_info_title">Đánh giá:</div>
                                    <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                </div>

                                <!-- Course Info Item -->
                                <div class="course_info_item">
                                    <div class="course_info_title">Môn học:</div>
                                    <div class="course_info_text"><a href="#">{{($course->subject)->title}}</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Course Image -->
                            <div class="course_image"><img src="images/course_image.jpg" alt=""></div>

                            <!-- Course Tabs -->
                            <div class="course_tabs_container">
                                <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                    <div class="tab active">Mô tả</div>
                                    <div class="tab">Nội dung</div>
                                    <div class="tab">Đánh giá</div>
                                </div>
                                <div class="tab_panels">

                                    <!-- Description -->
                                    <div class="tab_panel active">
                                        <div class="tab_panel_title">{{$course->title}}</div>
                                        <div class="tab_panel_content">
                                            <div class="tab_panel_text">
                                                <p>{{$course->des}}.</p>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Curriculum -->
                                    <div class="tab_panel tab_panel_2">
                                        <div class="tab_panel_content">
                                            <div class="tab_panel_title">{{$course->title}}</div>
                                            <div class="tab_panel_content">
                                                <div class="tab_panel_text">
                                                    <p>{{$course->des}}</p>
                                                </div>

                                                <!-- Dropdowns -->
                                                <ul class="dropdowns">
                                                    @php $chapters = $course->chapters
                                                    @endphp
                                                    @if($chapters->isEmpty())
                                                        <span
                                                            class="not-found">Not found Chapters for this course </span>
                                                    @else
                                                        @foreach($chapters as $key => $chapter)
                                                            @php
                                                                $lesson = $chapter->lessons;
                                                                 $test = $chapter->test;
                                                            @endphp

                                                            @if($lesson->isEmpty()&& empty($test))

                                                                <li>
                                                                    <div class="dropdown_item">
                                                                        <div class="dropdown_item_title">
                                                                            <span>Chapter {{$key+1}}:</span>
                                                                            {{$chapter->title}}
                                                                        </div>
                                                                        <div class="dropdown_item_text">
                                                                            <p>{{$chapter->des}}</p>

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <li class="has_children">
                                                                    <div class="dropdown_item">
                                                                        <div class="dropdown_item_title">
                                                                            <span>Chapter {{$key+1}}:</span>
                                                                            {{$chapter->title}}
                                                                        </div>
                                                                        <div class="dropdown_item_text">
                                                                            <p>{{$chapter->des}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <ul>
                                                                        @foreach($lesson as $key2=>$data)
                                                                            <li>
                                                                                <div class="dropdown_item">
                                                                                    <div
                                                                                        class="dropdown_item_title">
                                                                                        <span>Lesson {{$key2+1}}
                                                                                            :</span> {{$data->title}}
                                                                                    </div>
                                                                                    <div class="dropdown_item_text">
                                                                                        <p>{{$data->des}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <ul>
                                                                        @if(!empty($test))
                                                                            <div class="dropdown_item"><img
                                                                                    src="{{asset('images/ic_test.png')}}"/>
                                                                                <span class="title-test">Test</span>
                                                                                <div class="description-test">
                                                                                    Description
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </ul>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Reviews -->
                                    <div class="tab_panel tab_panel_3">
                                        <div class="tab_panel_title">Course Review</div>
                                    @php
                                        $sum = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->count('vote');
                                    $avg = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->average('vote');
                                    if($avg==null) $avg=0;
                                    $avg = number_format((float)$avg, 1);
                                    @endphp
                                    <!-- Rating -->
                                        <div class="review_rating_container">
                                            <div class="review_rating">
                                                <div
                                                    class="review_rating_num">{{$avg}}</div>
                                                <div class="review_rating_stars">
                                                    <div class="{{'rating_r rating_r_'.number_format((float)$avg, 0)}}">
                                                        <i></i><i></i><i></i><i></i><i></i>
                                                    </div>
                                                </div>
                                                <div class="review_rating_text">({{ $sum}} Ratings)</div>
                                            </div>
                                            <div class="review_rating_bars">
                                                <ul>
                                                    <li><span>5 Star</span>
                                                        @php
                                                            $vote5 = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->where('vote',5)->count();
                                                            $vote4 = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->where('vote',4)->count();
                                                            $vote3 = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->where('vote',3)->count();
                                                            $vote2 = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->where('vote',2)->count();
                                                            $vote1 = \Illuminate\Support\Facades\DB::table('Rate')->where('id_course',$course->id)->where('vote',1)->count();
                                                        @endphp
                                                        <div class="review_rating_bar">
                                                            <div
                                                                style="width:{{$sum!=0? ($vote5*100/$sum) .'%;':'0%;'}}"></div>
                                                        </div>
                                                    </li>
                                                    <li><span>4 Star</span>
                                                        <div class="review_rating_bar">
                                                            <div
                                                                style="width:{{$sum!=0? ($vote4*100/$sum) .'%;':'0%;'}}"></div>
                                                        </div>
                                                    </li>
                                                    <li><span>3 Star</span>
                                                        <div class="review_rating_bar">
                                                            <div
                                                                style="width:{{$sum!=0? ($vote3*100/$sum) .'%;':'0%;'}}"></div>
                                                        </div>
                                                    </li>
                                                    <li><span>2 Star</span>
                                                        <div class="review_rating_bar">
                                                            <div
                                                                style="width:{{$sum!=0? ($vote2*100/$sum) .'%;':'0%;'}}"></div>
                                                        </div>
                                                    </li>
                                                    <li><span>1 Star</span>
                                                        <div class="review_rating_bar">
                                                            <div
                                                                style="width:{{$sum!=0? ($vote1*100/$sum) .'%;':'0%;'}};"></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Comments -->
                                        <div class="comments_container">
                                            <ul class="comments_list">

                                                @foreach($listRate as $rateItem)
                                                    <li>
                                                        <div
                                                            class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                            <div class="comment_image">
                                                                <div><img style="width: 50px; height: 50px;" class="rounded-circle"
                                                                        src="{{$rateItem->avatar!=null?$rateItem->avatar:asset('images/avatar_default.jpg')}}"
                                                                        alt=""></div>
                                                            </div>
                                                            <div class="comment_content">
                                                                <div
                                                                    class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                                    <div class="comment_author"><a
                                                                            href="#">{{$rateItem->name}}</a>
                                                                    </div>
                                                                    <div class="comment_rating">
                                                                        <div
                                                                            class="{{'rating_r rating_r_'.$rateItem->vote}}">
                                                                            <i></i><i></i><i></i><i></i><i></i></div>
                                                                    </div>
                                                                    <div
                                                                        class="comment_time ml-auto">{{$rateItem->created_at}}</div>
                                                                </div>
                                                                <div class="comment_text">
                                                                    <p>{{$rateItem->comment}}</p>
                                                                </div>
                                                                <div
                                                                    class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                                    <div class="comment_extra comment_likes"><a
                                                                            href="#"><i
                                                                                class="fa fa-heart"
                                                                                aria-hidden="true"></i><span>15</span></a>
                                                                    </div>
                                                                    <div class="comment_extra comment_reply"><a
                                                                            href="#"><i
                                                                                class="fa fa-reply"
                                                                                aria-hidden="true"></i><span>Reply</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Course Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar">

                            <!-- Feature -->
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Thông tin khóa học</div>
                                <div class="sidebar_feature">
                                    <div class="course_price">{{$course->price==0?'Free':'$'.$course->price}}</div>

                                    <!-- Features -->
                                    <div class="feature_list">

                                        <!-- Feature -->
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-clock-o"
                                                                          aria-hidden="true"></i><span>Bắt đầu:</span>
                                            </div>

                                            <div
                                                class="feature_text ml-auto">{{date('d-m-Y', strtotime($course->start_date))}}</div>
                                        </div>
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-clock-o"
                                                                          aria-hidden="true"></i><span>Kết thúc:</span>
                                            </div>

                                            <div
                                                class="feature_text ml-auto">{{date('d-m-Y', strtotime($course->end_date))}}</div>
                                        </div>

                                        <!-- Feature -->
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-file-text-o"
                                                                          aria-hidden="true"></i><span>Chương:</span>
                                            </div>
                                            <div class="feature_text ml-auto">{{count($course->chapters)}}</div>
                                        </div>

                                        <!-- Feature -->
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-question-circle-o"
                                                                          aria-hidden="true"></i><span>Bài học:</span>
                                            </div>
                                            <div class="feature_text ml-auto">6</div>
                                        </div>

                                        <!-- Feature -->
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-users"
                                                                          aria-hidden="true"></i><span>Học viên:</span>
                                            </div>
                                            <div class="feature_text ml-auto">{{count($course->registrations)}}</div>
                                        </div>
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-cart-plus"
                                                                          aria-hidden="true"></i><span>Đăng ký ngay:</span>
                                            </div>
                                            <div class="feature_text ml-auto">
                                                @if($course->end_date > Carbon\Carbon::now())
                                                    @if(Auth::user()->user->type == 1)
                                                        <a
                                                            class="btn btn-primary disabled  btn-xs " href="#"> Không
                                                            hợp lệ
                                                        </a>
                                                    @else
                                                        <a
                                                            class="btn btn-primary btn-xs"
                                                            href="{{route('course-reg',['id'=>$course->id])}}"> Đăng ký
                                                        </a>
                                                    @endif
                                                @else
                                                    <a
                                                        class="btn btn-primary disabled  btn-xs " href="#"> Hết hạn
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Feature -->
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Giáo viên</div>
                                <div class="sidebar_teacher">
                                    <div
                                        class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_image"><img
                                                src="{{is_null(($course->user)->avatar)?asset('images/teacher.jpg'):($course->user)->avatar}}"
                                                alt="">

                                        </div>
                                        <div class="teacher_title">
                                            <div class="teacher_name"><a href="#">{{($course->user)->name}}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Course -->
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Latest Courses</div>
                                <div class="sidebar_latest">

                                    <!-- Latest Course -->
                                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                                        <div class="latest_image">
                                            <div><img src="images/latest_1.jpg" alt=""></div>
                                        </div>
                                        <div class="latest_content">
                                            <div class="latest_title"><a href="course.blade.php">How to Design a Logo a
                                                    Beginners Course</a></div>
                                            <div class="latest_price">Free</div>
                                        </div>
                                    </div>

                                    <!-- Latest Course -->
                                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                                        <div class="latest_image">
                                            <div><img src="images/latest_2.jpg" alt=""></div>
                                        </div>
                                        <div class="latest_content">
                                            <div class="latest_title"><a href="course.blade.php">Photography for
                                                    Beginners
                                                    Masterclass</a></div>
                                            <div class="latest_price">$170</div>
                                        </div>
                                    </div>

                                    <!-- Latest Course -->
                                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                                        <div class="latest_image">
                                            <div><img src="images/latest_3.jpg" alt=""></div>
                                        </div>
                                        <div class="latest_content">
                                            <div class="latest_title"><a href="course.blade.php">The Secrets of Body
                                                    Language</a></div>
                                            <div class="latest_price">$220</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="not-found-course">Course Not found</div>
                @endif
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="newsletter_background"
             style="background-image:url({{asset('images/newsletter_background.jpg')}})"></div>
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

    <!-- Footer -->
@endsection
