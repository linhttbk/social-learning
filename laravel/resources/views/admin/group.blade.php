@extends('admin.default')
@section('title','Group Management')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
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
    <link rel="stylesheet" href="{{asset('admin/css/group.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweet.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{asset('admin/js/group.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/ajax.lib.js')}}"></script>
    <script src="{{asset('js/sweet_alert.js')}}"></script>
@endsection
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Group Management</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Group Management</li>
            </ul>
        </div>
        <!-- Courses -->
        <section class="client no-padding-top">
            <div class="container-fluid">
                <div class="nav-top-group">
                    <div class="menu-top-group">
                        <ul>
                            <li><a href="#">All<span class="badge">(5)</span></a></li>
                            <li><a href="#">Public<span class="badge">(5)</span></a></li>
                            <li><a href="#">Private<span class="badge">(5)</span></a></li>
                        </ul>
                    </div>
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
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ten</th>
                                        <th>Mo Ta</th>
                                        <th>Kieu nhom</th>
                                        <th>Thanh vien</th>
                                        <th>Bai dang</th>
                                        <th>Ngay tao</th>
                                        <th>Admin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($results))
                                        @foreach($results as $data)
                                            <tr>
                                                <td><input value="{{$data->id}}" type="checkbox" class="checkitem"></td>
                                                <td><a>{{$data->title}}</a></td>
                                                <td> {{$data->des}}</td>
                                                <td> {{$data->mode?'Kin':'Cong khai'}}</td>
                                                <td> {{$data->members}}</td>
                                                <td> {{$data->posts}}</td>
                                                <td> {{date('d-m-Y', strtotime($data->group_create_at))}}</td>
                                                <td><a><img width="30px" height="30px"
                                                            src="{{$data->avatar?$data->avatar: asset('images/avatar_default.jpg')}}">{{$data->name}}
                                                    </a></td>

                                            </tr>
                                        @endforeach
                                    @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tool-group">
                            <input id="check-all" name="check-all" type="checkbox">
                            <label>Check all</label>
                            <i>With selected</i>
                            <a href="#"> <img src="{{asset('admin/img/group/ic_edit_group.png')}}">Edit</a>
                            <a id="delete-group" data-url="/admin-cp/groups/delete" href="#"><img
                                    src="{{asset('admin/img/group/ic_delete_group.png')}}">Delete</a>
                        </div>
                        <div id="paginate">
                            {{ $results->links() }}
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
                                        class="external">Bootstrapious</a></p>
                        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection
