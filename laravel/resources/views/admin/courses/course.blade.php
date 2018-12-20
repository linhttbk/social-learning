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
    <script src="{{asset('admin/js/course.js')}}"></script>
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
                    <div id="title-card">Thong ke</div>
                    <div class="row">
                        <div class="col-lg-4" id="total-user">
                            @if(isset($totalCourses))
                                <div class="card">
                                    Tong so khoa hoc {{': '.$totalCourses}}
                                </div>
                            @else
                                <div class="card">
                                    Tong so khoa hoc : 0
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-4" id="active-user">
                            <div class="card">
                                Khoa hoc moi {{':'.$recent_courses}}
                            </div>
                        </div>
                        <div class="col-lg-4" id="add-new-user">
                            <div class="card" id="card-add-user">
                                <a id="add-user" href="{{route('add-courses')}}" style="display: inline-block">
                                    <div id="card-overlay">+</div>
                                </a>
                                Tao khoa hoc
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="title-card">
                        <div style="display: inline-block;">Data user</div>
                        @include('errors.note')
                        <div style=" float:right;display: inline-block">

                            <form class="input-group" name="form-search" action="{{route('search-courses')}}"
                                  method="get">
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
                                            <th>Stt</th>
                                            <th>Ten khoa hoc</th>
                                            <th>Mon hoc</th>
                                            <th>Giao vien</th>
                                            <th>Hoc sinh dang ky</th>
                                            <th>Ngay bat dau</th>
                                            <th>Ngay ket thuc</th>
                                            <th>Trang thai</th>
                                            <th>Hanh Dong</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $date_now = new \Carbon\Carbon();
                                        ?>
                                        @if(isset($result))
                                            @foreach($result as $key => $data)

                                                <tr>
                                                    <th scope="row">{{$key + $result->firstItem()}}</th>
                                                    <td>{{$data->title}}</td>
                                                    <td>{{$data->subject}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->count_student}}</td>
                                                    <td>{{$data->start_date}}</td>
                                                    <td>{{$data->end_date}}</td>
                                                    @if($data->start_date < $date_now && $data->end_date > $date_now)
                                                        <td>Dang chay</td>
                                                    @elseif($data->end_date < $date_now)
                                                        <td>Ket thuc</td>
                                                    @else
                                                        <td>Chua chay</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{route('edit-course', ['id'=>$data->id])}}"><img
                                                                src="{{asset('admin/img/icon/ic_edit.png')}}"></a>
                                                        <a href="{{route('delete-course', ['id'=>$data->id])}}"><img
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
                                    @if (isset($result))
                                        @if (isset($key_search))
                                            {{ $result->appends(['key-search'=>$key_search])->links() }}
                                        @else
                                            {{ $result->links() }}
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
