@extends('default')
@section('title','Phat trien phan mem chuyen nghiep')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_group.css')}}">
    <link rel="stylesheet" href="{{asset('css/user_my_group.css')}}">

@endsection
@section('js')

    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/my_group.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection
@section('content')
    <div class="container-group" style="margin-top: 110px">
        <div class="row">
            <div class="group-infor col-lg-3">
                <div class="group-information">
                    <div class="group-name">
                        <a href="#">Công nghệ web tiên tiến</a>
                    </div>

                    <div class="group-type">
                        <span class="fa fa-lock">Nhóm kín</span>
                    </div>
                    <div class="menu-group">
                        <ul class="menu-item">
                            <li><a class="menu-item-link" href="#">Giới thiệu</a></li>
                            <li><a class="menu-item-link" href="#">Thảo luận</a></li>
                            <li><a class="menu-item-link active" href="#">Thành viên</a></li>
                            <li><a class="menu-item-link" href="#">Tài liệu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>{{'Thành viên: '.$countMember }}</h5>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()"
                                           placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <ul id="userGroup">
                        @if(isset($adminGroup))
                            <li class="list-group-item">
                                <div class="card card-inner">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <img style="width: 80px; height: 80px"
                                                     src="{{empty($adminGroup->avatar)?asset('images/avatar_default.jpg'):$adminGroup->avatar}}"
                                                     class="rounded-circle"/>
                                                <hr>
                                                <p class="text-center">Admin</p>
                                            </div>
                                            <div class="col-sm-10">
                                                <p><a href="#"><h4><strong>{{$adminGroup->name}}</strong></h4></a></p>
                                                <p>{{$adminGroup->phone}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($groupMember))
                            @foreach($groupMember as $data)
                                <li class="list-group-item">
                                    <div class="card card-inner" style="margin: 0;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <img style="width: 80px; height: 80px"
                                                         src="{{empty($data->avatar)?asset('images/avatar_default.jpg'):$data->avatar}}"
                                                         class="rounded-circle"/>
                                                    <hr>
                                                    <p class="text-secondary text-center">Thành viên</p>
                                                </div>
                                                <div class="col-sm-10">
                                                    <p><a href="#"><h4><strong>{{$data->name}}</strong></h4></a></p>
                                                    <p>{{$data->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="group-request">
                    sdsdsd
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, ul, li, strong, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("userGroup");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                strong = li[i].getElementsByTagName("strong")[0];
                txtValue = strong.textContent || strong.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        var number = document.getElementsByClassName('list-group-item').length - 1;
        document.getElementById('numberUser').innerHTML = number;
    </script>
@endsection
