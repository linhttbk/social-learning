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
    <script src="{{asset('js/header.js')}}"></script>
    <script>
        function myFunction(name) {
            var x = document.getElementById("myVideo");
            isSupp = x.canPlayType("video/mp4");
            if (isSupp == "") {
                x.src = "mov_bbb.ogg";
            } else {
                x.src = "{{asset("upload/video")}}"+"/"+name;
            }
            x.load();
        }
    </script>

@endsection
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
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="list_lesson">
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
                                                                <li><a title="Video" class="video" onclick="myFunction('{{$data->url}}')">Xem video</a></li>
                                                                <li><a  title="Tải tài liệu" href=''>Tải tài liệu</a></li>
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
                <div class="col-sm-7">
                    <div id="mediaspace" style="margin:5px;">
                        <video id="myVideo" width="700" height="400" controls src="{{asset('upload/video/bai2.mp4')}}">
                            Your browser does not support HTML5 video!
                        </video>
                        {{--<iframe id="myVideo" width="700" height="400" src="https://www.youtube.com/embed/dRu9hULOqYY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="box-right">
                        <div class="tittle-box-right">
                            <h2> Thống kê truy cập </h2>
                        </div>
                        <div class="content-box">
                            <center>
                                <!-- Histats.com  START  (standard)-->
                                <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                                <a href="http://www.histats.com" target="_blank" title="hit counter" ><script  type="text/javascript" >
                                        try {Histats.start(1,2138481,4,401,118,80,"00011111");
                                            Histats.track_hits();} catch(err){};
                                    </script></a>
                                <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2138481&101" alt="hit counter" border="0"></a></noscript>
                                <!-- Histats.com  END  -->
                            </center>
                        </div>
                    </div>
                    <div class="box-right">
                        <div class="title tittle-box-right">
                            <h2> Hỗ trợ trực tuyến </h2>
                        </div>
                        <div class="content-box">
                            <div class='support'>
                                <p>
                                    <img style="margin-bottom:-3px" src="{{asset('images/phone.png')}}"> 0981.240.434
                                </p>

                                <p>
                                    <a rel="nofollow" href="mailto:huybuivan5797@gmail.com">
                                        <img style="margin-bottom:-3px" src="{{asset('images/email.png')}}"> Email: huybuivan5797@gmail.com
                                    </a>
                                </p>
                                <p>Facebook: <a href="https://www.facebook.com/huy.buivan.127"> Bùi Văn Huy</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="box-right">
                        <div class="title tittle-box-right">
                            <h2> Quảng cáo </h2>
                        </div>
                        <div class="content-box">
                            <a href="">
                                <img  style="width: 188px" src="{{asset('images/ads.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
