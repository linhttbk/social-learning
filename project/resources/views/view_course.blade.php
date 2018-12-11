@extends('default')
@section('title','Course Detail')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/join_course.css')}}">

@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/course.js')}}"></script>
    <script src="{{asset('js/view_course.js')}}"></script>
<<<<<<< HEAD
    @endsection
=======
    <script src="{{asset('js/header.js')}}"></script>
    <script type='text/javascript' src='tivi/jwplayer.js'></script>
    <script type='text/javascript'>
        jQuery('document').ready(function(){
            jwplayer('mediaspace').setup({
                'flashplayer': 'tivi/player.swf',
                'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
                'title': 'Bài 1: Bigbag',
                'width': '1020',
                'height': '500',
                'autoplay' : true
            });
        })
    </script>
@endsection
>>>>>>> ea5be4624fefcec9991c60c0c8d0e91043015e0b
@section("content")

    <!-- Home -->
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('courses')}}">Courses</a></li>
                                <li><a href="{{route('user-courses', ['id'=>(Auth::user())->uid])}}">My Courses</a></li>
                                <li>View Course</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Join Course -->
    <div class="profile">
        <div class="container_course">
            <div class="row">
                <div class="col-lg-8" style="border-right: 1px solid #000">
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
                                                        <div class="dropdown_item_title">
                                                            <span>Lesson {{$key2+1}}:</span> {{$data->title}}
                                                        </div>
                                                        <div class="dropdown_item_text">
                                                            <p>{{$data->des}}</p>
                                                        </div>
                                                        <div class="dropdown_item_text">
                                                            <ol>
                                                                <li><a title="Video" href=''>Xem video</a></li>
                                                                <li><a title="Tải tài liệu" href=''>Tải tài liệu</a></li>
                                                            </ol>
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
                                                    <div class="description-test">Description</div>
                                                </div>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div id="mediaspace" style="margin:5px;">
                        <video width="950" height="450" controls>
                            <source src="{{asset('upload/video/bai1abc.mp4')}}" type="video/mp4">
                            <source src="mov_bbb.ogg" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
