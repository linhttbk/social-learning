@extends('default')
@section('title','Groups')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/group_page.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">

@endsection
@section('js')

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>

@endsection
@section('content')
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="row">
                <div class="col-sm-10">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a>Groups</a></li>
                        </ul>
                    </div>
                </div>
                @if(((Auth::user())->user)->type == 1)
                    <div class="col-sm-2" style="text-align: center">
                        <a href="#" type="button" class="btn btn-default btn-sm"
                           style="text-align: center; background-color: #4bc136; color: white">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tạo nhóm</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="list-group">
        @if(!$listGroups->isEmpty())
            <div class="header-list-group">
                <div>Nhom cua ban</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @php
                                $count =  $listGroups->count();
                                $avg1 =(int)($count/2)  + $count % 2;
                            @endphp
                            @foreach($listGroups as $key => $dataGroup)
                                @if($key==$avg1)
                                    @break
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataGroup->title}}</span></a><br/>
                                                <span> {{($dataGroup->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    Da tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @foreach($listGroups as $key => $dataGroup)
                                @if($key < $avg1)
                                    @continue
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataGroup->title}}</span></a><br/>
                                                <span> {{($dataGroup->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    Da tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!$listJoinGroups->isEmpty())
            <div class="header-list-group">
                <div>Nhom da tham gia</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @php
                                $count2 =  $listJoinGroups->count();
                                $avg2 = (int)($count2/2) + $count2 % 2;
                            @endphp
                            @foreach($listJoinGroups as $key2 => $dataJoin)
                                @if($key2==$avg2)
                                    @break
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataJoin->title}}</span></a><br/>
                                                <span> {{($dataJoin->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    Da tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">

                            @foreach($listJoinGroups as $key2 => $dataJoin)
                                @if($key2 < $avg2)
                                    @continue
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataJoin->title}}</span></a><br/>
                                                <span> {{($dataJoin->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    Da tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!$listOtherGroups->isEmpty())
            <div class="header-list-group">
                <div>Nhom khac</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @php
                                $count3 =  $listOtherGroups->count();
                                $avg3 = (int)($count3/2) + $count3 % 2;
                            @endphp
                            @foreach($listOtherGroups as $key3 => $dataOther)
                                @if($key3==$avg3)
                                    @break
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataOther->title}}</span></a><br/>
                                                <span> {{($dataOther->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @foreach($listOtherGroups as $key3 => $dataOther)
                                @if($key3 < $avg3)
                                    @continue
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataOther->title}}</span></a><br/>
                                                <span> {{($dataOther->members)->count() }} thành viên</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-default btn-sm"
                                                        style="text-align: center">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Tham gia
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection
