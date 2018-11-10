@extends('default')
@section('title','My Courses')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_profile.css')}}">
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet"
          type="text/css"/>
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/login_js.js')}}"></script>
@endsection
@section('content')
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href={{route('home')}}>Home</a></li>
                                <li>My Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Profile-->
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form>
                        <div class="form-group">
                            <label>Họ tên : </label>
                            <div></div>
                            <input type="text" name="name" id="name" tabindex="2" class="form-control"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh : </label>
                            <input placeholder="Ngày sinh " name="birthday" style="height: 45px"
                                   id="datepicker"/>
                        </div>

                        <div class="form-group">
                            <label>Giới tính : </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="boy" checked>Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="girl">Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Email : </label>
                            <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                   placeholder="Email Address" value="">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại : </label>
                            <input type="text" name="phone" id="phone" tabindex="1" class="form-control"
                                   placeholder="Phone" value="">
                        </div>
                        <div class="form-group">
                            <label>Trường : </label>
                            <input type="text" name="school" id="school" tabindex="1" class="form-control"
                                   placeholder="Trường" value="">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input name="" id="" tabindex="4"
                                           class="form-control btn btn-save" value="Thay đổi">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="login-submit" id="info-submit" tabindex="4"
                                           class="form-control btn btn-login" value="Lưu thay đổi">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="avatar-uploader">
                        <div class="avatar-uploader__avatar">
                            <div class="avatar-uploader__avatar-image" style="background-image: url(https://cf.shopee.vn/file/3012b97d6540abb019ca2109dea3941b_tn)"></div>
                        </div>
                        <input class="avatar-uploader__file-input" type="file" accept=".jpg,.jpeg,.png">
                        {{--<button class="btn btn-light btn--m btn--inline">Chọn ảnh</button>--}}
                        <div class="avatar-uploader__text-container">
                            <div class="avatar-uploader__text">Dụng lượng file tối đa 1 MB</div>
                            <div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection