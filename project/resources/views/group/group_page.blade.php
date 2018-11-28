@extends('default')
@section('title','Groups')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/group_page.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">

@endsection
@section('js')

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>

@endsection
@section('content')
    <div class="home">
        <div class="breadcrumbs_container">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a >Groups</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2"  style="text-align: center" >
                        <a href="#" type="button" class="btn btn-default btn-sm"
                                style="text-align: center; background-color: #4bc136; color: white">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tạo nhóm</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="list-group">
        <div class="header-list-group">
            <div>Nhom cua ban</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-group">
                    <div class="list-group-member-item">
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-group">
                    <div class="list-group-member-item">
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9" >
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3" >
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Da tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a class="group-link" href="#"><span class="name-group">Tên group 1 </span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-list-group">
            <div>Nhom khac</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-group">
                    <div class="list-group-member-item">
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-group">
                    <div class="list-group-member-item">
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9" >
                                        <a href="#"><span class="name-group">Tên group 1</span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3" >
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Da tham gia
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <a class="group-link" href="#"><span class="name-group">Tên group 1 </span></a><br/>
                                        <span> 999.999 thành viên</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-default btn-sm"
                                                style="text-align: center">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Tham gia
                                        </button>
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
