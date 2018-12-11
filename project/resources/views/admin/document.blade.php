@extends('admin.default')
@section('title','Document Management')
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
<!--     <script type="text/javascript" src="{{asset('js/admin/document_management_js.js')}}"></script> -->
@endsection
<!-- Main Navbar-->
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Document Management</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Document Mangement</li>
            </ul>
        </div>
        <section class="tables">
            <div class="container-fluid">
                <div>
                    <div id="title-card">Dash Board</div>
                    <div class="row">
                        <div class="col-lg-4" id="total-user">
                            @if(isset($totalDocument))
                                <div class="card">
                                    {{$totalDocument}} Total Doc
                                </div>
                            @else
                                <div class="card">
                                    0 Total Doc
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-4" id="active-user">
                            <div class="card">
                                {{$totalRead}} Total Have Read Doc
                            </div>
                        </div>
                        <div class="col-lg-4" id="add-new-user">
                                <div class="card">
                                    <a href="{{route('add_doccument')}}">
                                    Add New Doc
                                </a>
                                </div>
                    </div>
                </div>
                <div>
                    <div id="title-card">
                        <div style="display: inline-block;">Data Document</div>
                        @include('errors.note')
                        <div style=" display: block">
                            <label class="col-sm-3 form-control-label">Select</label>
                            <table class="table table-striped table-hover">
                             <tr>
                                <th>
                                    <div class="col-sm-9">
                                    <select name="subject" id="subject" class="form-control mb-3" onchange="initSelectValueDocument()" >
                                            <option value="1" selected="selected">toán</option>
                                            <option value="2">lý</option>
                                            <option value="3">hóa</option>
                                            <option value="4">văn</option>
                                            <option value="5">tiếng anh</option>
                                    </select>
                                    </div>
                                </th>
                                <th>
                                    <div class="col-sm-9" id="1" style="display: block;">
                                        <select id="subject_reg1" class="form-control mb-3" onchange="initSelectValueDocumentReg()">
                                            <option value="Toán 10" id="toan" selected="selected">Toán 10</option>
                                            <option value="Toán 11" id="toan">Toán 11</option>
                                            <option value="Toán 12" id="toan">Toán 12</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9" id="2" style="display: none;">
                                        <select id="subject_reg2" class="form-control mb-3" onchange="initSelectValueDocumentReg()">
                                            <option id="ly" value="Lý 10" selected="selected">lý 10</option>
                                            <option id="ly" value="Lý 11">lý 11</option>
                                            <option id="ly" value="Lý 12">lý 12</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9" id="4" style="display: none;">
                                        <select id="subject_reg4" class="form-control mb-3" onchange="initSelectValueDocumentReg()">
                                            <option value="Văn 10" id="van" selected="selected">văn 10</option>
                                            <option value="Văn 11" id="van">văn 11</option>
                                            <option value="Văn 12" id="van">văn 12</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9" id="3" style="display: none;">
                                        <select id="subject_reg3" class="form-control mb-3" onchange="initSelectValueDocumentReg()">
                                            <option id="hoa" value="Hóa Học 10" selected="selected">hóa 10</option>
                                            <option id="hoa" value="Hóa Học 11">hóa 11</option>
                                            <option id="hoa" value="Hóa Học 12">hóa 12</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9" id="5" style="display: none;">
                                        <select id="subject_reg5" class="form-control mb-3" onchange="initSelectValueDocumentReg()">
                                            <option id="anh" value="Tiếng Anh 10" selected="selected">tiếng anh 10</option>
                                            <option id="anh" value="Tiếng Anh 11">tiếng anh 11</option>
                                            <option id="anh" value="Tiếng Anh 12">tiếng anh 12</option>
                                        </select>
                                    </div> 
                                </th>
                                <th>
                                    <form class="input-group" name="form-search" action="{{route('search_document')}}" method="get">
                                        <select name="subject_hide_select" style="display: none;">
                                            <option id="subject_reg_select" value="Toán 10"></option>
                                        </select>
                                        <input type="text" class="form-control" name="key-search" placeholder="Search"/>
                                        <button class="input-group-addon" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id Document</th>
                                            <th>Subject</th>
                                            <th>Url</th>
                                            <th>Des</th>
                                            <th>User Id</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($document_pagination))
                                            @foreach($document_pagination as $key => $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->title}}</td>
                                                    <td><a href="{{$data->url}}"> link tài liệu tham khảo</td>
                                                    <td>{{$data->des}}</td>
                                                    <td>{{$data->uid}}</td>
                                                    @if ($data->status==1)
                                                        <td>Have read</td>
                                                    @else
                                                        <td>Not read</td>
                                                    @endif
                                                    <td>

                                                        <a href="{{route('edit_document', ['id'=>$data->id])}}"><img src="{{asset('admin/img/icon/ic_edit.png')}}"></a>
                                                        <a href="{{route('delete_document', ['id'=>$data->id])}}"><img src="{{asset('admin/img/icon/ic_delete.png')}}"></a>

                                                        <a href=""><img src="{{asset('admin/img/icon/ic_edit.png')}}"></a>
                                                        <a href=""><img src="{{asset('admin/img/icon/ic_delete.png')}}"></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
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
                                    @if (isset($document_pagination))
                                        @if (isset($key_search))
                                            {{ $document_pagination->appends(['key-search'=>$key_search])->links() }}
                                        @else
                                            {{ $document_pagination->links() }}
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
    <script type="text/javascript">
        function initSelectValueDocument() {
            var type = document.getElementById("subject").value;
            if (type == "1") {
                document.getElementById("1").style.display = "block";
                document.getElementById("2").style.display = "none";
                document.getElementById("3").style.display = "none";
                document.getElementById("4").style.display = "none";
                document.getElementById("5").style.display = "none";
                document.getElementById("subject_reg_select").value = document.getElementById("toan").value;
            } else if (type == "2") {
                document.getElementById("1").style.display = "none";
                document.getElementById("2").style.display = "block";
                document.getElementById("3").style.display = "none";
                document.getElementById("4").style.display = "none";
                document.getElementById("5").style.display = "none";
                 document.getElementById("subject_reg_select").value = document.getElementById("ly").value;
            } else if (type == "3") {
                document.getElementById("1").style.display = "none";
                document.getElementById("2").style.display = "none";
                document.getElementById("3").style.display = "block";
                document.getElementById("4").style.display = "none";
                document.getElementById("5").style.display = "none";
                document.getElementById("subject_reg_select").value = document.getElementById("hoa").value;
            } else if (type == "4") {
                document.getElementById("1").style.display = "none";
                document.getElementById("2").style.display = "none";
                document.getElementById("3").style.display = "none";
                document.getElementById("4").style.display = "block";
                document.getElementById("5").style.display = "none";
                document.getElementById("subject_reg_select").value = document.getElementById("van").value;
            }
            else {
                document.getElementById("1").style.display = "none";
                document.getElementById("2").style.display = "none";
                document.getElementById("3").style.display = "none";
                document.getElementById("4").style.display = "none";
                document.getElementById("5").style.display = "block";
                document.getElementById("subject_reg_select").value = document.getElementById("anh").value;
            }
        }
    function initSelectValueDocumentReg(){
        var type = document.getElementById("subject").value;
            if (type == "1") {
                var e = document.getElementById("subject_reg1");
                var strUser = e.options[e.selectedIndex].value;
                document.getElementById("subject_reg_select").value=strUser;
            }
            else if (type == "2") {
                var e = document.getElementById("subject_reg2");
                var strUser = e.options[e.selectedIndex].value;
                document.getElementById("subject_reg_select").value=strUser;
            }
            else if (type == "3") {
                var e = document.getElementById("subject_reg3");
                var strUser = e.options[e.selectedIndex].value;
                document.getElementById("subject_reg_select").value=strUser;
            }
            else if (type == "4") {
                var e = document.getElementById("subject_reg4");
                var strUser = e.options[e.selectedIndex].value;
                document.getElementById("subject_reg_select").value=strUser;
            }
            else if (type == "5") {
                var e = document.getElementById("subject_reg5");
                var strUser = e.options[e.selectedIndex].value;
                document.getElementById("subject_reg_select").value=strUser;
            }
    } 
    </script>
@endsection
