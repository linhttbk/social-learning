@extends('admin.default')
@section('title','User Management')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/vendor/bootstrap/css/bootstrap.min.css ')}}">
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
    <link rel="stylesheet" href="{{asset('admin/css/main_content.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('admin/css/add-member.css')}}">

@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="{{asset('admin/js/html5.shiv.3.7.3.min.js')}}"></script>
    <script src="{{asset('admin/js/respond.min.js')}}"></script><![endif]-->
    <script src="{{asset('admin/js/add-member.js')}}"></script>
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
            <div id="content-error">
                   <span id="form-error"
                         class="alert alert-danger"> Vui  lòng  nhap day du thong tin</span></div>
            @if(Session::has('error'))
                <span id="form-error" style="display: block;margin: 0 30px"
                      class="alert alert-danger">{{Session::get('error')}}</span>
            @elseif(Session::has('success'))
                <span id="form-error" style="display: block;margin: 0 30px"
                      class="alert alert-success">{{Session::get('success')}}</span>
            @endif

            <div class="container-fluid">
                <div class="wrapper">
                    {{--form--}}
                    <form enctype="multipart/form-data" method="post" action="{{route('add-user')}}" id="form"
                          class="form"
                          onsubmit="return onSubmitAddUserCLick()">
                        <fieldset>
                            <div class="widget">
                                <div class="title">
                                    <img class="titleIcon" src="">
                                    <h6>Cập nhật Người dùng</h6>

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
                                                    onchange="initValues()">
                                                <option selected="selected" value="0">Học sinh</option>
                                                <option value="1">Giáo viên</option>
                                                <option value="2">Kiểm duyệt viên</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tài khoản : </label>
                                            <input type="text" name="usernamereg" id="usernamereg" tabindex="1"
                                                   class="form-control" placeholder="Username" value="">
                                            <span id="username-error"
                                                  class="input-error-msg"> Vui  lòng  nhap tai khoan</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu : </label>
                                            <input type="password" name="passwordreg" id="passwordreg" tabindex="2"
                                                   class="form-control" placeholder="Password">
                                            <span id="pass-error" class="input-error-msg"> Vui long nhap mat khau</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu: </label>
                                            <input type="password" name="repasswordreg" id="repasswordreg" tabindex="2"
                                                   class="form-control" placeholder="Xác nhận mật khẩu">
                                            <span id="repass-error"
                                                  class="input-error-msg"> Mat khau khong trung khop</span>
                                        </div>
                                    </div>

                                    <div class="tab_content pd0" id="tab2" style="display: block;">

                                        <div class="form-group">
                                            <label>Họ tên : </label>
                                            <input type="text" name="name" id="name" tabindex="2" class="form-control"
                                                   placeholder="Name">
                                            <span id="name-error" class="input-error-msg"> Vui  lòng  nhap ten nguoi dung</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Avatar : </label>
                                            <input type="file" name="image" id="image" size="25"  accept=".jpg,.jpeg,.png">
                                        </div>

                                        <div class="form-group">
                                            <label>Ngày sinh : </label>
                                            <input placeholder="Ngày sinh " name="birthday" id="datepicker"

                                                   class="form-control">

                                            <span id="birthday-error"
                                                  class="input-error-msg"> Vui  lòng  chon ngay thang nam sinh</span>
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
                                            <input type="email" name="email" id="email" tabindex="1"
                                                   class="form-control"
                                                   placeholder="Email Address" value="">
                                            <span id="mail-error" class="input-error-msg"> Vui  lòng  nhap email kich hoat tai khoan</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại : </label>
                                            <input type="text" name="phone" id="phone" tabindex="1" class="form-control"
                                                   placeholder="Phone" value="">
                                            <span id="phone-error"
                                                  class="input-error-msg"> Vui  lòng  nhap so dien thoai</span>
                                        </div>

                                    </div>

                                    <div class="tab_content pd0" id="tab3" style="display: block;">

                                        <div class="form-group">
                                            <label>Trường : </label>
                                            <input type="text" name="school" id="school" tabindex="1"
                                                   class="form-control"
                                                   placeholder="Trường" value="">

                                        </div>
                                        <div class="form-group">
                                            <label>Lớp : </label>
                                            <select class="form-control" name="grade">
                                                <option value="10">Lớp 10</option>
                                                <option value="11">Lớp 11</option>
                                                <option value="12">Lớp 12</option>

                                            </select>
                                        </div>
                                        <div class="form-group" id="teacher" name="subjectreg">
                                            <label>Môn giảng dạy : </label>
                                            <select class="form-control">
                                                <option class="fs-option">Toán</option>
                                                <option class="fs-option">Lý</option>
                                                <option class="fs-option">Hóa</option>
                                                <option>Tiếng Anh</option>
                                                <option>Ngữ Văn</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="censors" name="subjectreg">
                                            <label>Môn đăng ký kiểm duyệt : </label>
                                            <select class="form-control">
                                                <option>Toán</option>
                                                <option>Lý</option>
                                                <option>Hóa</option>
                                                <option>Tiếng Anh</option>
                                                <option>Ngữ Văn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- End tab_container-->

                                <div class="form-group formSubmit">
                                    <input type="submit" class="button" value="Thêm mới">
                                    <input type="reset" class="button" value="Hủy bỏ"
                                    >
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
