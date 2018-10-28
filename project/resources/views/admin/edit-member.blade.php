@extends('admin.default')
@section('title','User Management')
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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin/css/edit_member_css.css')}}">
    <script type="text/javascript" src="{{asset('js/login_js.js')}}"></script>
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js"
            type="text/javascript"></script>
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet"
          type="text/css"/>
@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
@endsection

@section('content')
    <div class="panel-body">
        <div class="col-lg-12">
            <form id="register-form" action="" method="post"
                  onsubmit=" return onSubmitCLick()" role="form">
                <div class="form-group">
                                    <label>Loại đăng ký : </label>
                                    <select class="form-control" id="mySelect" onchange="initValues()">
                                        <option selected="selected" value="hs">Học sinh</option>
                                        <option value="gv">Giáo viên</option>
                                        <option value="kdv">Kiểm duyệt viên</option>
                                    </select>
                                </div>
                <div class="form-group">
                                    <label>Tài khoản : </label>
                                    <input type="text" name="usernamereg" id="usernamereg" tabindex="1"
                                           class="form-control" placeholder="Username" value="">
                                    <span id="username-error" class="input-error-msg"> Vui  lòng  nhập tài khoản</span>
                                </div>
                <div class="form-group">
                                    <label>Mật khẩu : </label>
                                    <input type="password" name="passwordreg" id="passwordreg" tabindex="2"
                                           class="form-control" placeholder="Password">
                                    <span id="pass-error" class="input-error-msg"> Vui lòng nhập mật khẩu</span>
                                </div>
                <div class="form-group">
                                    <label>Nhập lại mật khẩu: </label>
                                    <input type="password" name="repasswordreg" id="repasswordreg" tabindex="2"
                                           class="form-control" placeholder="Xác nhận mật khẩu">
                                    <span id="repass-error" class="input-error-msg"> Mật khẩu không trùng khớp</span>
                                </div>
                <div class="form-group">
                                    <label>Họ tên : </label>
                                    <input type="text" name="name" id="name" tabindex="2" class="form-control"
                                           placeholder="Name">
                                    <span id="name-error" class="input-error-msg"> Vui  lòng  nhập tên người dùng</span>
                                </div>
                <div class="form-group">
                                    <label>Ngày sinh : </label>
                                    <input placeholder="Ngày sinh " style="height: 45px" id="datepicker"/>
                                    <span id="birthday-error"
                                          class="input-error-msg"> Vui  lòng  chọn ngày tháng năm sinh
                                    </span>
                                </div>

                <div class="form-group">
                                    <label>Giới tính : </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" checked>Nam
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Nữ
                                    </label>
                                </div>
                <div class="form-group">
                                    <label>Email : </label>
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control"
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
                <div class="form-group">
                                    <label>Trường : </label>
                                    <input type="text" name="school" id="school" tabindex="1" class="form-control"
                                           placeholder="Trường" value="">

                                </div>
                <div class="form-group">
                                    <label>Lớp : </label>
                                    <select class="form-control">
                                        <option>Lớp 10</option>
                                        <option>Lớp 11</option>
                                        <option>Lớp 12</option>

                                    </select>
                                </div>
                <div class="form-group" id="teacher">
                                    <label>Môn giảng dạy : </label>
                                    <select class="form-control">
                                        <option class="fs-option">Toán</option>
                                        <option class="fs-option">Lý</option>
                                        <option class="fs-option">Hóa</option>
                                        <option>Tiếng Anh</option>
                                        <option>Ngữ Văn</option>
                                    </select>
                                </div>
                <div class="form-group" id="censors">
                                    <label>Môn đăng ký kiểm duyệt : </label>
                                    <select class="form-control">
                                        <option>Toán</option>
                                        <option>Lý</option>
                                        <option>Hóa</option>
                                        <option>Tiếng Anh</option>
                                        <option>Ngữ Văn</option>
                                    </select>
                                </div>
                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit"
                                                   tabindex="4" class="form-control btn btn-register" value="Thay đổi"
                                            >
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
    </div>
@endsection