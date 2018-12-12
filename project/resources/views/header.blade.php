<body>
<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                <li>
                                    <div class="question">Bạn có câu hỏi nào?</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>0964988900</div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div>slearning@bkteam.edu.vn</div>
                                </li>
                            </ul>
                            @if(Auth::check())
                                <div id="menu-user">
                                    <ul>
                                        <li class="infor-user"><a href="#"><img class="avatar"
                                                                                src="{{asset('admin/img/avatar-1.jpg')}}"
                                                                                alt="Xin chào "> {{((Auth::user())->user)->name}}
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user-profile',['id'=>(Auth::user())->uid])}}">Hồ
                                                        sơ cá nhân</a></li>
                                                <li><a href={{route('user-courses',['id'=>(Auth::user())->uid])}}>Khóa
                                                        học của tôi</a></li>
                                                <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- Notifications-->
                                </div>
                                <li style="display: inline; position:relative;" class="nav-item-dropmenu"><a
                                        id="notifications"
                                        rel="nofollow" data-target="#"
                                        href="#"
                                        class="badge-notifications"
                                        data-badge="27"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        class="nav-link"><i
                                            class="fa fa-bell-o" style="color: white"></i></a>

                                    <ul class="dropdown-menu">
                                        <li class="head text-light bg-blue">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12">
                                                    <span>Notifications (3)</span>
                                                    <a href="#" id="mark-notifications" class="float-right text-light">Mark
                                                        all as read</a>
                                                </div>
                                            </div>
                                        </li>
                                        <ul class="notifications-item">
                                            <li class="notification-box bg-gray">
                                                <a href="#">

                                                    <div class="row">
                                                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                            <img src="{{asset('images/avatar_default.jpg')}}"
                                                                 class=" rounded-circle">
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8">
                                                            <strong class="text-info">David John<span>
                                                            Lorem ipsum dolor sit amet, consectetur 222k2k2k2k2kk2k2k2k22kk2kk2k2
                                                        </span></strong>

                                                            <small class="text-warning">27.11.2015, 15:00</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-box">
                                                <a href="#">

                                                    <div class="row">
                                                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                            <img src="{{asset('admin/img/avatar-0.jpg')}}"
                                                                 class="rounded-circle">
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8">
                                                            <strong class="text-info">David John <span>
                                                            Lorem ipsum dolor sit amet, consectetur 222k2k2k2k2kk2k2k2k22kk2kk2k2
                                                        </span></strong>

                                                            <small class="text-warning">27.11.2015, 15:00</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-box bg-gray">
                                                <a href="#">

                                                    <div class="row">
                                                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                            <img src="{{asset('admin/img/avatar-0.jpg')}}"
                                                                 class=" rounded-circle">
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8">
                                                            <strong class="text-info">David John<span>
                                                            Lorem ipsum dolor sit amet, consectetur 222k2k2k2k2kk2k2k2k22kk2kk2k2
                                                        </span></strong>

                                                            <small class="text-warning">27.11.2015, 15:00</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>

                                        <li class="footer-notificatons">
                                            <a href="" class="text-light">View All</a>
                                        </li>
                                    </ul>


                                </li>
                            @else
                                <div class="top_bar_login ml-auto">
                                    <div class="login_button"><a href="{{route('login')}}" data-toggle="modal"
                                                                 data-target=".bs-example-modal-lg">Đăng ký hoặc đăng nhập</a></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="{{route('home')}}">
                                <div class="logo_text">S<span>Learning</span></div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li><a href="{{route('home')}}">Trang chủ</a></li>
                                <li><a href="{{route('about')}}">Về chúng tôi</a></li>
                                <li><a href="{{route('courses')}}">Khóa học</a></li>
                                <li><a href="{{route('group_page')}}">Nhóm học tập</a></li>
                                <li><a href="{{route('contact')}}">Liên hệ</a></li>
                            </ul>
                            <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                            <!-- Hamburger -->

                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Search Panel -->
    <div class="header_search_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" class="header_search_form">
                            <input type="search" class="search_input" placeholder="Search" required="required">
                            <button
                                class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--Login-->
<!-- <div class="modal fade bs-example-modal-lg" id="myModal" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                <h4><span class="glyphicon glyphicon-lock"></span> Đăng nhập</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                  <form role="form">
                    <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Tài khoản</label>
                      <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                    </div>
                <div class="form-group">
                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mật khẩu</label>
                      <input type="password" class="form-control" id="psw" placeholder="Enter password">
                </div>
                <div class="checkbox">
                      <label><input type="checkbox" value="" checked>Nhớ mật khẩu</label>
                      <label class="pull-right"><input type="checkbox" value="" id="visiblePass">Hiện mật khẩu</label>
                </div>
                      <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Đăng nhập</button>
                  </form>
            </div>
            <div class="modal-footer">
                  <p>Chưa có tài khoản ? <a href="#">Đăng ký</a>&nbsp&nbsp&nbsp<a href="#">Quên mật khẩu ?</a></p>
            </div>
          </div>
    </div>
  </div>	 -->
{{--</body>--}}
{{--</html>--}}
