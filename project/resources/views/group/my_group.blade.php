@extends('default')
@section('title','Phat trien phan mem chuyen nghiep')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_group.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">

@endsection
@section('js')

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/my_group.js')}}"></script>

@endsection
@section('content')
    <div class="container-group">
        <div class="row">
            <div class="group-infor col-lg-3">
                <div class="group-information">
                    <div class="group-name">
                        <a href="#">Cong nghe web tien tien</a>
                    </div>

                    <div class="group-type">
                        <span class="fa fa-lock">Nhom kin</span>
                    </div>
                    <div class="menu-group">
                        <ul class="menu-item">
                            <li><a class="menu-item-link" href="#">Gioi thieu</a></li>
                            <li><a class="menu-item-link active" href="#">Thao luan</a></li>
                            <li><a class="menu-item-link" href="#">Thanh vien</a></li>
                            <li><a class="menu-item-link" href="#">Tai lieu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-create-post">
                    <div class="option-post">
                    Dang bai viet
                    </div>
                    <div class="content-post">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg"  alt="Scott Stevens"
                                     class="rounded-circle"/>

                            </div>
                            <div class="col-sm-10">
                                <div>

                                    <form>
                                        <textarea placeholder="Type post here"></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="post-helper">
                        <a href="#">Dang bai</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>


        </div>
    </div>
@endsection
