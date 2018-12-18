@extends('admin.default')
@section('title','Document Management')
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
    <link rel="stylesheet" href="{{asset('admin/css/main_content.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">

@endsection
@section('js')
  <!--  //<script type="text/javascript" src="{{asset('js/crud_js.js')}}"></script> -->

@endsection
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
                <div class="wrapper">
                    {{--form--}}
                    <form enctype="multipart/form-data" method="post" action="{{route('post_add_document')}}" id="form" class="form" onsubmit="return OnsubmitClick()">
                        <fieldset>
                            <div class="widget">
                                <div class="title">
                                    <img class="titleIcon" src="">
                                    <h6>Thêm tài liệu</h6>
                                </div>

                                <div class="tab_container">
                                    <div class="tab_content pd0" style="display: block;">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Loại môn học: </label>
                                            <select id="subject_reg" name="subject_reg" tabindex="1">
                                                <@foreach($allSubject as $sub)
                                                        <option class="fs-option">{{$sub->title}}
                                                            </option>
                                                        }
                                                @endforeach
                                            </select>
                                        <div class="form-group">
                                            <label>Link tài liệu: </label>
                                            <input type="text" name="document_link" id="document_link" tabindex="2"
                                                   class="form-control" placeholder="Link tài liệu" value="">
                                            <span id="document-link-error" class="input-error-msg"> Vui  lòng  nhap lại link</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả tài liệu: </label>
                                            <input type="text" name="document_des" id="document_des" tabindex="3" 
                                                   class="form-control" placeholder="Mô tả tài liệu" value="">
                                            <span id="document-des-error" class="input-error-msg"> Vui  lòng  nhap lại mô tả</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group formSubmit" >
                                            <input type="submit" class="button" value="Chỉnh sửa" >
                                            <input type="reset" class="button" value="Hủy bỏ">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- Form -->
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
    function OnsubmitClick(){
        var doclink =document.getElementById("document_link").value;
        var docdess =document.getElementById("document_des").value;
        alert(doclink+"-"+docdess);
        if(doclink==""||docdess==""){
            if(doclink=="")
                document.getElementById("document-link-error").display="block";
            if(doclink=="")
                document.getElementById("document-des-error").display="block";
            return false;
        }
        return true;
    }
</script>
@endsection
