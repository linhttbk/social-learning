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
                            @if(isset($user))
                                <div class="card">


                                    {{count($user)}} Total Users
                                </div>
                            @else
                                <div class="card">


                                    0 Total Users
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-4" id="active-user">
                            @if(isset($user))
                                <div class="card">
                                   @phpgit a
                                    $i= 0;
                                    @endphp
                                    @foreach($user as $data)
                                         @php
                                        $account = $data->account;
                                         @endphp
                                        @if($account['status'] == 1)
                                             @php
                                            $i++;
                                             @endphp
                                            @endif
                                    @endforeach
                                    {{$i}} Total Active Users
                                </div>
                            @else
                                <div class="card">

                                    4 Total Active Users
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4" id="add-new-user">
                            <div class="card">
                                Add New User
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="title-card">Data</div>
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
                                            <th>Sex</th>
                                            <th>Role</th>
                                            <th>Registered date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($user))
                                            @foreach($user as $key => $data)

                                                <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{$data['uid']}}</td>
                                                    <td>{{$data['name']}}</td>
                                                    <td>{{$data['email']}}</td>
                                                    <td>{{$data['phone']}}</td>
                                                    <td>{{$data['birthday']}}</td>
                                                    <td>{{$data['sex']}}</td>

                                                    @switch($data['type'])
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
                                                    <td>{{$data['birthday']}}</td>
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
