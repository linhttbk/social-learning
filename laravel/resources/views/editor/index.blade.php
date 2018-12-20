@extends('editor.default')
@section('title','Dash Board')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/vendor/bootstrap/css/bootstrap.min.css ')}}">
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
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <style>
        .list-group {
            padding-left: 80px;
            display: none;
            position: absolute;
            min-width: 40px;
            z-index: 1;
        }

        .dropdown:hover .list-group {
            display: block;
        }

    </style>
@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/my_group.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection

<!-- Content Page-->
@section('content')
    <div class="container-group" style="margin-top: 110px">
        <div class="row">
            <div class="col-lg-3" style="padding-left: 35px;">
                <nav class="navbar">
                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <label style="font-size: 20px">Danh mục tài liệu</label>
                        </li>
                        <li class="nav-item active">
                            <a href="#"><u>Tài liệu đang chờ</u>&nbsp;<span
                                        class="badge badge-danger badge-pill">12</span></a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item">
                            <a href="#"><u>Tài liệu đã đăng</u>&nbsp;<span
                                        class="badge badge-success badge-pill">12</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-9" style="background-color: white">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"
                                     class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 70px">
                                <label><br></label>
                            </div>
                            <div class="col col-sm-7">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>12h00 17/12/2018</small>
                            </div>
                            <div class="col-lg-1 pull-right dropdown">
                                <a href="#"><i class='fa fa-caret-down' style='font-size:24px;padding-left: 100px'></i></a>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#"><i class='fa fa-check'>&nbsp;Chấp nhận</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <i class='fa fa-times-circle'>&nbsp;Hủy</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">Mô tả :</div>
                        <div class="row" style="padding: 0 20px; color: black">Đề thi Toán THPT chuyên Thái Bình
                        </div>
                        <div class="row">Link :</div>
                        <div class="row" style="padding: 0 20px; color: black">
                            <iframe src="https://drive.google.com/file/d/0B--xz5SoSs0FdVZNMFUwT1hNMDA/preview"
                                    width="100%" height="300"></iframe>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"
                                     class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 70px">
                                <label><br></label>
                            </div>
                            <div class="col col-sm-7">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>12h00 17/12/2018</small>
                            </div>
                            <div class="col-lg-1 pull-right dropdown">
                                <a href="#"><i class='fa fa-caret-down' style='font-size:24px;padding-left: 100px'></i></a>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#"><i class='fa fa-check'>&nbsp;Chấp nhận</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <i class='fa fa-times-circle'>&nbsp;Hủy</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">Mô tả :</div>
                        <div class="row" style="padding: 0 20px; color: black">Đề thi Toán THPT chuyên Thái Bình
                        </div>
                        <div class="row">Link :</div>
                        <div class="row" style="padding: 0 20px; color: black">
                            <iframe src="https://drive.google.com/file/d/1WSSBONuveDp6qQs_9Ucthc1x8AmH-0Aa/preview"
                                    width="640" height="300"></iframe>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"
                                     class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 70px">
                                <label><br></label>
                            </div>
                            <div class="col col-sm-7">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>12h00 17/12/2018</small>
                            </div>
                            <div class="col-lg-1 pull-right dropdown">
                                <a href="#"><i class='fa fa-caret-down' style='font-size:24px;padding-left: 100px'></i></a>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#"><i class='fa fa-check'>&nbsp;Chấp nhận</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <i class='fa fa-times-circle'>&nbsp;Hủy</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">Mô tả :</div>
                        <div class="row" style="padding: 0 20px; color: black">Đề thi Toán THPT chuyên Thái Bình
                        </div>
                        <div class="row">Link :</div>
                        <div class="row" style="padding: 0 20px; color: black">
                            <iframe src="https://drive.google.com/file/d/1WSSBONuveDp6qQs_9Ucthc1x8AmH-0Aa/preview"
                                    width="640" height="300"></iframe>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"
                                     class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 70px">
                                <label><br></label>
                            </div>
                            <div class="col col-sm-7">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>12h00 17/12/2018</small>
                            </div>
                            <div class="col-lg-1 pull-right dropdown">
                                <a href="#"><i class='fa fa-caret-down' style='font-size:24px;padding-left: 100px'></i></a>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#"><i class='fa fa-check'>&nbsp;Chấp nhận</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <i class='fa fa-times-circle'>&nbsp;Hủy</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">Mô tả :</div>
                        <div class="row" style="padding: 0 20px; color: black">Đề thi Toán THPT chuyên Thái Bình
                        </div>
                        <div class="row">Link :</div>
                        <div class="row" style="padding: 0 20px; color: black">
                            <iframe src="https://drive.google.com/file/d/1WSSBONuveDp6qQs_9Ucthc1x8AmH-0Aa/preview"
                                    width="640" height="300"></iframe>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"
                                     class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 70px">
                                <label><br></label>
                            </div>
                            <div class="col col-sm-7">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>12h00 17/12/2018</small>
                            </div>
                            <div class="col-lg-1 pull-right dropdown">
                                <a href="#"><i class='fa fa-caret-down' style='font-size:24px;padding-left: 100px'></i></a>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#"><i class='fa fa-check'>&nbsp;Chấp nhận</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <i class='fa fa-times-circle'>&nbsp;Hủy</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">Mô tả :</div>
                        <div class="row" style="padding: 0 20px; color: black">Đề thi Toán THPT chuyên Thái Bình
                        </div>
                        <div class="row">Link :</div>
                        <div class="row" style="padding: 0 20px; color: black">
                            <iframe src="https://drive.google.com/file/d/1WSSBONuveDp6qQs_9Ucthc1x8AmH-0Aa/preview"
                                    width="640" height="300"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

