@extends('admin.default')
@section('title','User Management')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=" {{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('admin/css/fontastic.css')}}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="{{asset('admin/css/font_family_poppins.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/member.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/main_content.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">

@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

@endsection
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">User Management</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">User Mangement</li>
            </ul>
        </div>
        <section class="tables">
            <div class="container-fluid">
                <div class="wrapper">
                    {{--form--}}
                    <form enctype="multipart/form-data" method="post" action="{{$user->uid}}" id="form" class="form">
                        <fieldset>
                            <div class="widget">
                                <div class="title">
                                    <img class="titleIcon" src="">
                                    <h6>Cập nhật Người dùng {{$user->name}}</h6>
                                </div>

                                <ul class="tabs">
                                    <li class="activeTab"><a href="#tab1">Thông tin tài khoản</a></li>
                                    <li class=""><a href="#tab2">Thông tin cá nhân</a></li>
                                    <li class=""><a href="#tab3">Thông tin đào tạo</a></li>
                                </ul>

                                <div class="tab_container">
                                    <div class="tab_content pd0" id="tab1" style="display: block;">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Loại đăng ký : </label>
                                            <select class="form-control" name="type" id="mySelect"
                                                    onchange="initValues()" disabled>
                                                <option
                                                    <?php if ($user->type == 0) echo "selected"?>
                                                    value="0">Học sinh
                                                </option>
                                                <option
                                                    <?php if ($user->type == 1) echo "selected"?>
                                                    value="1">Giáo viên
                                                </option>
                                                <option
                                                    <?php if ($user->type == 2) echo "selected"?>
                                                    value="2">Kiểm duyệt viên
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tài khoản : </label>
                                            <input type="text" name="username" id="usernamereg" tabindex="1" disabled
                                                   class="form-control" placeholder="Username" value="{{$user->uid}}">
                                            <span id="username-error"
                                                  class="input-error-msg"> Vui  lòng  nhap tai khoan</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="changePassword" id="changePassword">
                                            <label>Mật khẩu : </label>
                                            <input type="password" name="password" id="passwordreg" tabindex="2"
                                                   class="form-control password" placeholder="Password" disabled>
                                            <span id="pass-error" class="input-error-msg"> Vui long nhap mat khau</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu: </label>
                                            <input type="password" name="repassword" id="repasswordreg" tabindex="2"
                                                   class="form-control password" placeholder="Xác nhận mật khẩu"
                                                   disabled>
                                            <span id="repass-error"
                                                  class="input-error-msg"> Mat khau khong trung khop</span>
                                        </div>
                                    </div>

                                    <div class="tab_content pd0" id="tab2" style="display: block;">

                                        <div class="form-group">
                                            <label>Họ tên : </label>
                                            <input type="text" name="name" id="name" tabindex="2" class="form-control"
                                                   placeholder="Name" value="{{$user->name}}">
                                            <span id="name-error" class="input-error-msg"> Vui  lòng  nhap ten nguoi dung</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Giới tính : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="male"
                                                <?php if ($user->sex == "male") echo "checked"?>
                                                >Nam
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="female"
                                                <?php if ($user->sex == "female") echo "checked"?>
                                                >Nữ
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Avatar : </label>
                                            <input type="file" name="image" id="image" size="25">
                                            <img alt="Avatar" id="img-avatar" class="rounded-circle"
                                                 src="{{ !empty($user->avatar)? $user->avatar:asset('images/avatar_default.jpg')}}"
                                                 style="width:70px;height:70px"/>
                                            <input type="hidden" name="img_currenrt"
                                                   value="{{asset("upload/avatar/".$user->avatar)}}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Ngày sinh : </label>
                                            <input placeholder="Ngày sinh " name="birthday" id="datepicker"
                                                   value="{{date("d-m-Y", strtotime($user->birthday))}}"
                                                   class="form-control">
                                            <span id="birthday-error"
                                                  class="input-error-msg"> Vui  lòng  chon ngay thang nam sinh</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Email : </label>
                                            <input type="email" name="email" id="email" tabindex="1"
                                                   class="form-control"
                                                   placeholder="Email Address" value="{{$user->email}}">
                                            <span id="mail-error" class="input-error-msg"> Vui  lòng  nhap email kich hoat tai khoan</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại : </label>
                                            <input type="text" name="phone" id="phone" tabindex="1" class="form-control"
                                                   placeholder="Phone" value="{{$user->phone}}">
                                            <span id="phone-error"
                                                  class="input-error-msg"> Vui  lòng  nhap so dien thoai</span>
                                        </div>

                                    </div>

                                    <div class="tab_content pd0" id="tab3" style="display: block;">

                                        <div class="form-group">
                                            <label>Trường : </label>
                                            <input type="text" name="school" id="school" tabindex="1"
                                                   class="form-control"
                                                   placeholder="Trường" value="{{$user->school}}">

                                        </div>
                                        <div class="form-group">
                                            <label>Lớp : </label>
                                            <select class="form-control" name="grade" disabled>
                                                <option
                                                    <?php if ($user->grade == 10) echo "selected"?>
                                                    value="10">Lớp 10
                                                </option>
                                                <option
                                                    <?php if ($user->grade == 11) echo "selected"?>
                                                    value="11">Lớp 11
                                                </option>
                                                <option
                                                    <?php if ($user->grade == 12) echo "selected"?>
                                                    value="12">Lớp 12
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group" id="teacher" name="subjectreg">
                                            <label>Môn giảng dạy : </label>
                                            <select class="form-control" disabled>
                                                @foreach($subject as $sub)
                                                    @if($sub->id > 5)
                                                        <option
                                                            class="fs-option" <?php if ($user->id_sr == $sub->id) echo selected?>>{{$sub->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="censors" name="subjectreg">
                                            <label>Môn đăng ký kiểm duyệt : </label>
                                            <select class="form-control" disabled>
                                                <@foreach($subject as $sub)
                                                    @if($sub->id < 6)
                                                        <option
                                                            class="fs-option" <?php if ($user->id_sr == $sub->id) echo selected?>>{{$sub->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- End tab_container-->

                                <div class="form-group formSubmit" onsubmit="return OnsubmitClick()" >
                                            <input type="submit" class="button" value="Chỉnh sửa">
                                            <input type="reset" class="button" value="Hủy bỏ">

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
    <script type="text/javascript">

        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();


                reader.onload = function (e) {

                    $('#img-avatar').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }

        $("#image").change(function () {

            readURL(this);

        });

    </script>
@endsection

