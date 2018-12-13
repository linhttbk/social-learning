@extends('admin.default')
@section('title','Document Management')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=" {{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('admin/css/fontastic.css')}}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/main_content.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">

@endsection
@section('js')
  <!--  //<script type="text/javascript" src="{{asset('js/crud_js.js')}}"></script> -->

@endsection
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">CoursePlan</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">CoursePlan</li>
            </ul>
        </div>
        <section class="tables">
            <div class="container-fluid">
                <div class="wrapper">
                    {{--form--}}
                    <form enctype="multipart/form-data" method="post" action="" id="form" class="form" onsubmit="return OnsubmitClick()">
                        <fieldset>
                            	<div class="tab_container">
                                    <div class="tab_content pd0" style="display: inline-block;">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <form class="input-group" name="form-search" action="{{route('search_course_plan')}}" method="post">
                                         <div class="form-group">
                                        <label>Khóa học: </label>
                                            <select id="course_reg" name="course_reg">
                                                @foreach($allCourse as $course)
                                                     <option class="fs-option">{{$course->title}}
                                                         </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        <button class="input-group-addon" type="submit">
                                                <i class="fa fa-search"></i>
                                        </button>
                                        </form>
                                        @if(Session::has('search_success'))
                                        <select id="course_reg" name="course_reg">
                                                @foreach($courseDetail as $course)
                                                     <option class="fs-option">{{$course->title}}
                                                         </option>
                                                @endforeach

                                        </select>
                                        @endif
                                    </div>
                                    
                                    <div class="widget">
                                        <div class="form-group formSubmit" >
                                                    <input type="submit" class="button" value="Thêm" >
                                                    <input type="reset" class="button" value="Hủy bỏ">
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                    </form>
                </div>
                <!-- Form -->
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Your company &copy; 2017-2019</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Design by <a href="https://bootstrapious.com/admin-templates"
                                        class="external">Bootstrapious</a>
                        </p>
                        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection
