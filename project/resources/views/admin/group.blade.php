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
@endsection
@section('js')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Members</th>
                                        <th>Posts</th>
                                        <th>Date Created</th>
                                        <th>Owner</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a>Group A</a></td>
                                        <td> This is group A</td>
                                        <td> Public</td>
                                        <td> 50</td>
                                        <td> 12</td>
                                        <td> 20-12-2018</td>
                                        <td><a><img width="30px" height="30px"
                                                    src="{{asset('admin/img/avatar-2.jpg')}}">Than Linh</a></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a>Group A</a></td>
                                        <td> This is group A</td>
                                        <td> Public</td>
                                        <td> 50</td>
                                        <td> 12</td>
                                        <td> 20-12-2018</td>
                                        <td><a><img width="30px" height="30px"
                                                    src="{{asset('admin/img/avatar-2.jpg')}}">Than Linh</a></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a>Group A</a></td>
                                        <td> This is group A</td>
                                        <td> Public</td>
                                        <td> 50</td>
                                        <td> 12</td>
                                        <td> 20-12-2018</td>
                                        <td><a><img width="30px" height="30px"
                                                    src="{{asset('admin/img/avatar-2.jpg')}}">Than Linh</a></td>

                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a>Group A</a></td>
                                        <td> This is group A</td>
                                        <td> Public</td>
                                        <td> 50</td>
                                        <td> 12</td>
                                        <td> 20-12-2018</td>
                                        <td><a><img width="30px" height="30px"
                                                    src="{{asset('admin/img/avatar-2.jpg')}}">Than Linh</a></td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tool-group">
                            <input id="check-all" name="check-all" type="checkbox">
                            <label>Check all</label>
                            <i>With selected</i>
                            <a href="#"> <img src="{{asset('admin/img/group/ic_edit_group.png')}}">Edit</a>
                            <a href="#"><img src="{{asset('admin/img/group/ic_delete_group.png')}}">Delete</a>
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
