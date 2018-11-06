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
@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">User Mangement</li>
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
                                    {{$totalUser}} Total Users
                                </div>
                            @else
                                <div class="card">
                                    0 Total Users
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-4" id="active-user">
                            <div class="card">
                                {{$totalActive}} Total Active Users
                            </div>
                        </div>
                        <div class="col-lg-4" id="add-new-user">
                            <div class="card">
                                Add New User
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="title-card">
                        <div style="display: inline-block;">Data user</div>
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
                                            <th>No</th>
                                            <th>User's Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>BirthDay</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
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
                                                        <td>Student</td>
                                                        @break
                                                        @case(1)
                                                        <td>Teacher</td>
                                                        @break
                                                        @case(2)
                                                        <td>Editor</td>
                                                        @break
                                                        @default
                                                        <td>Student</td>
                                                        @break
                                                    @endswitch
                                                    @if ($data->status==1)
                                                        <td>Online</td>
                                                    @else
                                                        <td>Offline</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{route('get_edit_User', ['uid'=>$data->uid])}}"><img src="{{asset('admin/img/icon/ic_edit.png')}}"></a>
                                                        <a href="{{route('delete_User', ['uid'=>$data->uid])}}"><img src="{{asset('admin/img/icon/ic_delete.png')}}"></a>
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
