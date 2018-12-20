@extends('default')
@section('title','My Courses')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_course.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweet.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/my_course.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/sweet_alert.js')}}"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            //raty
            $('#binhluan').hide();
            $('#submit-comment').on('click', function () {
                var score = $('#ratebar').data('score');
                var idCourse = $('#ratebar').data('idcourse');
                var comment = $('#comment').val();
                if (comment == "") {
                    swal("Oops!", "Vui lòng điền comment!", "error");
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax(
                        {
                            type: 'POST',
                            url: '',
                            data: {
                                id: idCourse,
                                score: score,
                                comment: comment
                            },
                            dataType: 'json',

                        }).done(function (data) {
                        if (data.success == 1) {
                            $('#ratebar').data('score', data.score);
                            swal(
                                {
                                    title: 'Thong bao',
                                    text: 'Gui danh gia thanh cong',
                                    type: 'success',


                                });
                            $('#binhluan').hide();
                        }


                    }).fail(function (jqXHR, ajaxOptions, thrownError) {

                        swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");

                    });
                }

            });
            $('.raty_detailt').raty({
                score: function () {
                    return $(this).attr('data-score');
                },
                half: true,
                click: function (score, evt) {
                    $('#binhluan').show();

                }
            });
        });
    </script>
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
                                <li><a href={{route('home')}}>Home</a></li>
                                <li>My Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Courses -->
    <div class="courses">
        <div class="container">
            <div class="row">
                <!-- Courses Main Content -->
                <div class="col-lg-8">
                    <div class="courses_search_container">
                        <form action="#" id="courses_search_form"
                              class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <input type="search" class="courses_search_input" placeholder="Search Courses"
                            >
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
                    <div class="row courses_row">
                        @if(!empty($result))
                            @foreach($result as $data)
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        {{--<div class="course_image"><img src="images/course_4.jpg" alt=""></div>--}}
                                        <div class="course_body">
                                            <h3 class="course_title"><a
                                                        href="{{route('course_detail_registered',['id'=>$data->id])}}">{{$data->title}}</a>
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
                                                <div id="rate-content">
                                                    <span class='raty raty_detailt' style='margin:5px' id="ratebar"
                                                          data-score="{{$data->score}}" data-idcourse="{{$data->id}}"></span>
                                                </div>
                                                <div class="course_price ml-auto">
                                                    @if($data->price==0)
                                                        Free
                                                    @else
                                                        ${{$data->price}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course_footer" id="binhluan" style="padding-bottom: 10px">
                                            <label>Bình luận:</label>
                                            <div class="footer-comment input-group mb-3">
                                                <div class="input-group add-on">
                                                    <input class="form-control" placeholder="Search" name="srch-term"
                                                           id="comment" type="text" required>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" id="submit-comment"
                                                                type="submit"><i class="fa fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_section_title"> Thông báo</div>
                        </div>
                        <div class="notify-item">
                            <a href="#"> Bài học x của khóa học y cần phải mở ngày hôm
                                nay </a><span>By Admin 5 phut truoc</span></div>
                        <div class="notify-item" style="color: red">
                            <a href="#"> Bài học x của khóa học y cần phải mở ngày hôm
                                nay </a><span>By Admin 5 phut truoc</span></div>
                        <div class="notify-all">
                            <a href="#" class="btn btn-primary">Xem tat ca</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
