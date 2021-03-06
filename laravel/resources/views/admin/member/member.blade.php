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
    <link rel="stylesheet" href="{{asset('admin/css/member.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{asset('admin/js/member.js')}}"></script>
@endsection
<!-- Main Navbar-->
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
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý người dùng</li>
            </ul>
        </div>
        <section class="tables">
            <div class="container-fluid">
                <div>
                    <div id="title-card">Dash Board</div>
                    <div class="row">
                        <div class="col-lg-4" id="total-user">
                            @if(isset($totalUser))
                                <div class="card">
                                    {{' Tổng số thành viên '.$totalUser}}
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-4" id="active-user">
                            <div class="card">
                                {{'Đã kích hoạt '.$totalActive}}
                            </div>
                        </div>
                        <div class="col-lg-4" id="add-new-user">
                            <div class="card" id="card-add-user">
                                <a id="add-user" href="{{route('add-member')}}" style="display: inline-block">
                                    <div id="card-overlay">+</div>
                                </a>
                                Thêm thành viên
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="title-card">
                        <div style="display: inline-block;">Thông tin thành viên</div>
                        @include('errors.note')
                        <div style=" float:right;display: inline-block">

                            <form class="input-group" name="form-search" action="{{route('search')}}" method="get">
                                <input type="text" class="form-control" name="key-search" placeholder="Search"/>
                                <button class="input-group-addon" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>

                                        <tr>
                                            <th>STT</th>
                                            <th>Tài khoản</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Ngày sinh</th>
                                            <th>Vai trò</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($user_pagination))
                                            @foreach($user_pagination as $key => $data)

                                                <tr>
                                                    <th scope="row">{{$key + $user_pagination->firstItem()}}</th>
                                                    <td>{{$data->uid}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>{{$data->phone}}</td>
                                                    <td>{{$data->birthday}}</td>
                                                    @switch($data->type)
                                                        @case(0)
                                                        <td>Học sinh</td>
                                                        @break
                                                        @case(1)
                                                        <td>Giáo viên</td>
                                                        @break
                                                        @case(2)
                                                        <td>Kiểm duyệt viên</td>
                                                        @break
                                                        @default
                                                        <td>Học sinh</td>
                                                        @break
                                                    @endswitch
                                                    @if ($data->emailverify==1)
                                                        <td>Đã kích hoạt</td>
                                                    @else
                                                        <td>Chưa kích hoạt</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{route('get_edit_User', ['uid'=>$data->uid])}}"><img
                                                                src="{{asset('admin/img/icon/ic_edit.png')}}"></a>
                                                        <a href="{{route('delete_User', ['uid'=>$data->uid])}}"><img
                                                                src="{{asset('admin/img/icon/ic_delete.png')}}"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Otto</td>

                                            </tr>
                                        @endif

                                        </tbody>
                                    </table>
                                    @if (isset($user_pagination))
                                        @if (isset($key_search))
                                            {{ $user_pagination->appends(['key-search'=>$key_search])->links() }}
                                        @else
                                            {{ $user_pagination->links() }}
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
