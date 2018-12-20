@extends('admin.default')
@section('title','Document Management')
@section('css')
    <link rel="stylesheet" href=" {{asset('admin/css/bootstrap4/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=" {{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/main_content.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/add-course.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/sweet.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!--  //<script type="text/javascript" src="{{asset('js/crud_js.js')}}"></script> -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/ajax.lib.js')}}"></script>
    <script src="{{asset('js/sweet_alert.js')}}"></script>
    <script src="{{asset('js/add-course.js')}}"></script>
    <script src="{{asset('admin/js/course.js')}}"></script>
@endsection
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Quan ly khoa hoc</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Trang chu</a></li>
                <li class="breadcrumb-item active">Them khoa hoc</li>
            </ul>
        </div>
        <section class="tables">
            <div class="container-fluid">
                <div class="wrapper">
                    {{--form--}}
                    <form method="post" action="{{route('add-user')}}" id="form"
                          class="form"
                          onsubmit="return onSubmitAddUserCLick()">
                        <fieldset>
                            <div class="widget">
                                <div class="title">
                                    <img class="titleIcon" src="">
                                    <h6>Cập nhật Người dùng</h6>

                                </div>

                                <ul class="tabs">
                                    <li class="activeTab"><a href="#tab1">Thông tin Khoa hoc</a></li>
                                    <li class=""><a href="#tab2">Chi tiet khoa hoc</a></li>
                                    <li class=""><a href="#tab3">Lich khoa hoc</a></li>
                                </ul>

                                <div class="tab_container">
                                    <div class="tab_content pd0" id="tab1" style="display: block;">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Mon hoc: </label>
                                            <select class="form-control" name="type" id="mySelect">
                                                @if(isset($allSubject))
                                                    @foreach($allSubject as $key =>$data)
                                                        @if($key==0)
                                                            <option selected="selected"
                                                                    value="{{$data->id}}">{{$data->title}}</option>
                                                        @else
                                                            <option value="{{$data->id}}">{{$data->title}}</option>
                                                        @endif

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ten khoa hoc : </label>
                                            <input type="text" name="coursenamereg" id="coursenamereg" tabindex="1"
                                                   class="form-control" placeholder="Ten khoa hoc" value="">
                                            <span id="coursenamereg-error"
                                                  class="input-error-msg"> Vui  lòng  nhap ten khoa hoc</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mo ta: </label>
                                            <input type="text" name="descourse" id="des-course" tabindex="2"
                                                   class="form-control" placeholder="Mo ta khoa hoc">
                                            <span id="pass-error" class="input-error-msg"> Vui long nhap mo ta cho khoa hoc</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Giao vien: </label>
                                            <input type="text" name="teachercourse" id="teachercourse" tabindex="2"
                                                   data-toggle="modal" data-target="#modalTeacher"
                                                   class="form-control">
                                            <span id="teacher-error" class="input-error-msg"> Vui long nhap mo ta cho khoa hoc</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Gia khoa hoc: </label>
                                            <input type="text" name="pricecourse" id="pricecourse" tabindex="2"
                                                   class="form-control"><span>&#8363;</span>
                                            <span id="teacher-error" class="input-error-msg"> Vui long nhap mo ta cho khoa hoc</span>
                                        </div>
                                    </div>

                                    <div class="tab_content pd0" id="tab2" style="display: block;">


                                        <div class="form-group">
                                            <label>Ngày bat dau : </label>
                                            <input type="date" name="startdate" min="1000-01-01" id="startdate"
                                                   max="3000-12-31" class="form-control"
                                                   value="{{\Illuminate\Support\Carbon::now()->toDateString()}}">

                                            <span id="startdate-error"
                                                  class="input-error-msg"> Vui  lòng  chon ngay bat dau</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày ket thuc : </label>
                                            <input type="date" name="enddate" min="1000-01-01"
                                                   max="3000-12-31" class="form-control" id="enddate"
                                                   value="{{\Illuminate\Support\Carbon::now()->addMonth(5)->toDateString()}}">

                                            <span id="enddate-error"
                                                  class="input-error-msg"> Vui  lòng   ngay ket thuc khoa hoc</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Chuong trinh: </label>
                                            <table class="table table-bordered" id="table-select-chapter"
                                                   style="margin: 0 10px">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Ten chuong</th>
                                                    <th>Mo ta</th>
                                                    <th>So Bai hoc</th>
                                                    <th>Hanh dong</th>
                                                </tr>
                                                </thead>
                                                <tbody id="myBody">
                                                <tr>

                                                </tr>
                                                </tbody>
                                            </table>
                                            <ul class="page-paginate" id="myPager"></ul>
                                            <div class="div-center">
                                                <button type="button" id="button-add" data-toggle="modal"
                                                        data-target="#modalChapter"><i class="fa fa-plus">
                                                        Them
                                                    </i></button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab_content pd0" id="tab3" style="display: block;">
                                        <div class="form-group">
                                            <label>Chuong trinh: </label>
                                            <div id="data-lesson" data-lessons="{{$lessons}}"></div>
                                            <table class="table table-bordered" id="table-select-lesson"
                                                   style="margin: 0 10px">
                                                <thead>
                                                <tr>
                                                    <th>Chuong</th>
                                                    <th>Bai</th>
                                                    <th>Tieu de</th>
                                                    <th>Bat dau</th>
                                                </tr>
                                                </thead>
                                                <tbody id="bodyLesson">
                                                <tr>

                                                </tr>
                                                </tbody>
                                            </table>
                                            <ul class="page-paginate" id="myPagerLesson"></ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- End tab_container-->

                                <div class="form-group formSubmit">
                                    <input id="btn-submit" data-url="/admin-cp/courses/add-course" type="button"
                                           class="button" value="Thêm mới">
                                    <input type="reset" class="button" value="Hủy bỏ"
                                    >
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- Form -->
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="modalTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chon giao vien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="header-modal">
                            <label>Tim kiem: <input id="search-teacher" type="text" onkeyup="searchTeacher()"></label>

                        </div>
                        @if(isset($teachers))
                            <div id="hidden" data-teachers="{{$teachers}}"></div>
                        @endif
                        <div id="list-teacher" class="list-teacher">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Huy bo</button>
                        <button type="button" id="add-teacher" class="btn btn-primary" data-dismiss="modal">Luu lai</button>

                    </div>
                </div>
            </div>
        </div>

        <!--Modal Add Chapter-->
        <div class="modal fade" id="modalChapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div id="chapter-hidden" data-chapters="{{$chapters}}"></div>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="header-modal">
                            <label style="float: left; margin-left: 10px"> <input id="chapter-all" type="checkbox">
                                Select All</label>
                            <label>Tim kiem: <input id="search-chapter" type="text" onkeyup="searchTeacher()"></label>
                        </div>
                        <div id="list-chapter" class="list-chapter">
                            <table id="table-chapter" class="table table-bordered" style="margin: 0 10px">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ten chuong</th>
                                    <th>So bai</th>

                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="button-chapter" data-dismiss="modal">
                            OK
                        </button>

                    </div>
                </div>
            </div>
        </div>

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
