@extends('admin.default')
@section('title','Courses')
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
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('admin/css/courses.css')}}">
@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
@endsection
@section('content')
    <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Courses</h2>
                </div>
            </header>
            <!-- Breadcrumb-->
            <div class="breadcrumb-holder container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Courses            </li>
                </ul>
            </div>
            <!-- Courses -->
            <section class="client no-padding-top">
                <div class="container-fluid">
                    <br>
                    <div class="comment">
                        <p><i class="fa fa-circle" style="color: #1CB94E"></i> Khóa học đang hoạt động</p>
                        <p><i class="fa fa-circle" style="color: #8e81f1"></i> Khóa học đã kết thúc</p>
                    </div>
                    <div class="row courses_row">
                        <!-- Work Amount  -->
                        <?php
                        $date_now = new \Carbon\Carbon();
                        ?>
                        @if(isset($result))
                            @foreach($result as $key => $data)
                                <div class="col-lg-4">
                                    <div class="work-amount card">
                                        <div class="card-close">
                                            <div class="dropdown">
                                                <button type="button" id="closeCard1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                        class="fa fa-ellipsis-v"></i></button>
                                                <div aria-labelledby="closeCard1"
                                                     class="dropdown-menu dropdown-menu-right has-shadow">
                                                    <a href="#" class="dropdown-item remove">
                                                        <i class="fa fa-times"></i>Close</a><a href="#"
                                                                                               class="dropdown-item edit">
                                                        <i class="fa fa-gear"></i>Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course">
                                            <div class="course_image"><img src="images/course_1.jpg" alt="">
                                                @if($data->start_date < $date_now && $data->end_date > $date_now)
                                                    <i class="fa fa-circle" aria-hidden="true" style="color: #1CB94E"></i>
                                                @elseif($data->end_date < $date_now)
                                                    <i class="fa fa-circle" aria-hidden="true" style="color: #8e81f1"></i>
                                                @endif
                                            </div>

                                            <div class="course_body">
                                                <h3 class="course_title"><a href="course.blade.php">{{$data->title}}</a></h3>
                                                <div class="course_teacher">Mr. John Taylor</div>
                                                <div class="course_text">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                                </div>
                                            </div>
                                            <div class="course_footer">
                                                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                    <div class="course_info">
                                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                        <span>{{$data->count_student}}Học viên</span>
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
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(isset($result))
                    {{$result->links()}}
                @endif
            </section>
            <!-- Page Footer-->
            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Your company &copy; 2017-2019</p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
@endsection
