<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/login_css.css')}}">
    <script type="text/javascript" src="{{asset('js/login_js.js')}}"></script>
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js"
            type="text/javascript"></script>
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet"
          type="text/css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Đăng nhập</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Đăng ký</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="{{route('post_login')}}" method="post" role="form"
                                  style="display: block;" onsubmit="return onSubmitLogin()">
                                @include('errors.note')
                                <div class="form-group">
                                    <label>Tài khoản : </label>
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="">
                                    <span id="username-login-error"
                                          class="input-error-msg"> Vui  lòng  nhap tai khoan</span>
                                </div>
                                <input type="hidden" name="urlback" value="{{\Illuminate\Support\Facades\URL::previous()}}">
                                <div class="form-group">
                                    <label>Mật khẩu : </label>
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Password">
                                    <span id="pass-login-error" class="input-error-msg"> Vui long nhap mat khau</span>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Nhớ mật khẩu</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="https://phpoll.com/recover" tabindex="5"
                                                   class="forgot-password">Quên mật khẩu?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                            <form id="register-form" action="{{url('register')}}" method="post"
                                  onsubmit=" return onSubmitCLick()"
                                  role="form" style="display: none;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Loại đăng ký : </label>
                                    <select class="form-control" name="type" id="mySelect" onchange="initValues()">
                                        <option selected="selected" value="0">Học sinh</option>
                                        <option value="1">Giáo viên</option>
                                        <option value="2">Kiểm duyệt viên</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tài khoản : </label>
                                    <input type="text" name="usernamereg" id="usernamereg" tabindex="1"
                                           class="form-control" placeholder="Username" value="">
                                    <span id="username-error" class="input-error-msg"> Vui  lòng  nhap tai khoan</span>
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
                                    <span id="repass-error" class="input-error-msg"> Mat khau khong trung khop</span>
                                </div>
                                <div class="form-group">
                                    <label>Họ tên : </label>
                                    <input type="text" name="name" id="name" tabindex="2" class="form-control"
                                           placeholder="Name">
                                    <span id="name-error" class="input-error-msg"> Vui  lòng  nhap ten nguoi dung</span>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh : </label>
                                    <input placeholder="Ngày sinh " name="birthday" style="height: 45px" id="datepicker"/>
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit"
                                                   tabindex="4" class="form-control btn btn-register" value="Đăng ký"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @if(Session::has('exist'))
        <script type="text/javascript">
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $('#register-form-link').addClass('active');
        </script>
    @endif
    @if(Session::has('success'))
        <script type="text/javascript">
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $('#login-form-link').addClass('active');
        </script>
    @endif
</div>
</body>
</html>
