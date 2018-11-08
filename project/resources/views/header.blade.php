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
                                    <div class="question">Have any questions?</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>001-1234-88888</div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div>info.deercreative@gmail.com</div>
                                </li>
                            </ul>
                            @if(Auth::check())
                                {{--<div class="top_bar_contact_list ml-auto">--}}
                                {{--<li class="nav-item-dropdown">--}}
                                {{--<a>--}}
                                {{--<img class="avatar" src="{{asset('admin/img/avatar-1.jpg')}}" alt="Xin chào "> {{((Auth::user())->user)->name}}--}}
                                {{--</a>--}}
                                {{--<ul class="sub-menu">--}}
                                {{--<li><a href="#">WordPress</a></li>--}}
                                {{--<li><a href="#"><a href="https://thachpham.com/category/seo" data-wpel-link="internal">SEO</a></a></li>--}}
                                {{--<li><a href="#">Hosting</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--<div class="top_bar_login ml-auto">--}}
                                {{--<div class="login_button"><a href="{{route('logout')}}" data-toggle="modal" data-target=".bs-example-modal-lg">Logout</a></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</li>--}}
                                {{--</div>--}}

                                <div id="menu">
                                    <ul>
                                        <li><a href="#"><img class="avatar" src="{{asset('admin/img/avatar-1.jpg')}}"
                                                             alt="Xin chào "> {{((Auth::user())->user)->name}}
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user-profile',['id'=>(Auth::user())->uid])}}">Hồ sơ cá nhân</a></li>
                                                <li><a href={{route('user-courses',['id'=>(Auth::user())->uid])}}>Khóa học của tôi</a></li>
                                                <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="top_bar_login ml-auto">
                                    <div class="login_button"><a href="{{route('login')}}" data-toggle="modal"
                                                                 data-target=".bs-example-modal-lg">Register or
                                            Login</a></div>
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
                            <a href="#">
                                <div class="logo_text">Unic<span>at</span></div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('courses')}}">Courses</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                            <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                            <!-- Hamburger -->

                            <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
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
