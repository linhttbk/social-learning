@extends('default')
@section('title','Buy Course')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_reg.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/course_reg.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
@endsection

@section('content')
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('courses')}}">Courses</a></li>
                                <li>Course Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="course-container">

        <div class="course-container-infor">
            <div class="course-container-title">Dang ky khoa hoc</div>
            @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('error')}}</p>
            @elseif(Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <div class="course-detail">
                <div class="course_title">Tieng Anh 10</div>
                <div class="course_information" style="text-align: center">
                    @if(!empty($course))
                        <table style="display: inline-block">
                            <tbody>
                            <tr>
                                <td>Giao Vien:</td>
                                <td><a href="#">{{($course->user)->name}}</a></td>
                            </tr>
                            <tr>
                                <td>Start date:</td>
                                <td>{{date('d-m-Y', strtotime($course->start_date))}}</td>
                            </tr>
                            <tr>
                                <td>End date:</td>
                                <td>{{date('d-m-Y', strtotime($course->end_date))}}</td>
                            </tr>
                            <tr>
                                <td>Gia tien:</td>
                                <td>{{$course->price.''}}<span>&#8363;</span></td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>
            <img src="{{Captcha::src()}}">
            <div class="error-captcha"></div>
            <form method="post" action="{{route('buy_course',['id'=> $course->id ])}}">
                @csrf
                @if ($errors->has('captcha'))
                    <span class="error-captcha">{{ $errors->first('captcha') }}</span>
                @endif
                <input type="text" id="captcha" name="captcha">
                {{--<div id="payment-course"><a href="{{route('buy_course',['id'=>$id])}}" class="btn btn-primary"> Thanh--}}
                {{--Toan</a>--}}
                {{--</div>--}}
                <input type="submit" value="Thanh toan" class="btn btn-primary">
            </form>
        </div>
    </div>

@endsection
