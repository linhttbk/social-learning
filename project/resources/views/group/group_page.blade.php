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
    <script src="{{asset('js/group_page.js')}}"></script>


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
                        <button type="button" id="createGroup" class="btn btn-default btn-sm"
                                style="text-align: center; background-color: #4bc136; color: white">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tạo nhóm
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible" style="margin: 0 20px">
            <strong>{{Session::get('error')}}</strong>
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success alert-dismissible" style="margin: 0 20px">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif
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
                                        <img src="{{empty($dataGroup->thumb_url)?asset('images/bg_group_default.jpg'):$dataGroup->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataGroup->title}}</span></a><br/>
                                                <span> {{($dataGroup->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Đã tham gia

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li>
                                                            <a href="{{route('my_group',['groupId'=>$dataGroup->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('go-setting',['groupId'=>$dataGroup->id ])}}">Cài
                                                                đặt nhóm</a></li>
                                                    </ul>
                                                </div>

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
                                        <img src="{{empty($dataGroup->thumb_url)?asset('images/bg_group_default.jpg'):$dataGroup->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataGroup->title}}</span></a><br/>
                                                <span> {{($dataGroup->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Đã tham gia

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li>
                                                            <a href="{{route('my_group',['groupId'=>$dataGroup->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('go-setting',['groupId'=>$dataGroup->id ])}}">Cài
                                                                đặt nhóm</a></li>
                                                    </ul>
                                                </div>

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
                                        <img src="{{empty($dataJoin->thumb_url)?asset('images/bg_group_default.jpg'):$dataJoin->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataJoin->title}}</span></a><br/>
                                                <span> {{($dataJoin->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Đã tham gia

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li><a href="{{route('my_group',['groupId'=>$dataJoin->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('cancel-group',['groupId'=>$dataJoin->id ])}}">Rời
                                                                nhóm</a></li>
                                                    </ul>
                                                </div>

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
                                        <img src="{{empty($dataJoin->thumb_url)?asset('images/bg_group_default.jpg'):$dataJoin->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataJoin->title}}</span></a><br/>
                                                <span> {{($dataJoin->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Đã tham gia

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li><a href="{{route('my_group',['groupId'=>$dataJoin->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('cancel-group',['groupId'=>$dataJoin->id ])}}">Rời
                                                                nhóm</a></li>
                                                    </ul>
                                                </div>

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
        @if(!$listRequestGroups->isEmpty())
            <div class="header-list-group">
                <div>Nhóm đang chờ</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-group">
                        <div class="list-group-member-item">
                            @php
                                $countReg =  $listRequestGroups->count();
                                $avgReg = (int)($countReg/2) + $countReg % 2;
                            @endphp
                            @foreach($listRequestGroups as $keyReg => $dataReg)
                                @if($keyReg==$avgReg)
                                    @break
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="{{empty($dataReg->thumb_url)?asset('images/bg_group_default.jpg'):$dataReg->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataReg->title}}</span></a><br/>
                                                <span> {{($dataReg->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Chờ xét duyệt

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li><a href="{{route('my_group',['groupId'=>$dataReg->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('cancel-request',['groupId'=>$dataReg->id ])}}">Hủy
                                                                yêu cầu</a></li>
                                                    </ul>
                                                </div>

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

                            @foreach($listRequestGroups as $key2 => $dataRequest)
                                @if($key2 < $avgReg)
                                    @continue
                                @endif
                                <div class="row">
                                    <div class=" col-sm-3">
                                        <img src="{{empty($dataRequest->thumb_url)?asset('images/bg_group_default.jpg'):$dataRequest->thumb_url}}" alt="Scott Stevens"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="#"><span
                                                        class="name-group">{{$dataRequest->title}}</span></a><br/>
                                                <span> {{($dataRequest->members)->count() }} thành viên</span>
                                            </div>
                                            <div id="root-request" class="col-sm-3">
                                                <div>
                                                    <button id="btn-infor" type="button"
                                                            style="text-align: center">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        Chờ xét duyệt

                                                    </button>
                                                    <ul id="menu-request" class="sub-item-request">
                                                        <li>
                                                            <a href="{{route('my_group',['groupId'=>$dataRequest->id ])}}">Xem
                                                                nhóm</a></li>
                                                        <li>
                                                            <a href="{{route('cancel-request',['groupId'=>$dataRequest->id ])}}">Hủy
                                                                yêu cầu</a></li>

                                                    </ul>
                                                </div>
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
                                        <img src="{{empty($dataOther->thumb_url)?asset('images/bg_group_default.jpg'):$dataOther->thumb_url}}" alt="Scott Stevens"
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
                                                <a id="request-group"
                                                   href="{{route('request-group',['id'=>$dataOther->id])}}"
                                                   class="btn btn-default btn-sm">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Tham gia
                                                </a>
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
                                        <img src="{{empty($dataOther->thumb_url)?asset('images/bg_group_default.jpg'):$dataOther->thumb_url}}" alt="Scott Stevens"
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
                                                <a id="request-group"
                                                   href="{{route('request-group',['id'=>$dataOther->id])}}"
                                                   class="btn btn-default btn-sm">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Tham gia
                                                </a>
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

    <div class="modal" id="dialogGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="dialogHeader">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo nhóm mới</h5>
                    <button type="button" id="icClose" class="close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(isset($message))
                    <span class="alert alert-danger">$message</span>
                @endif
                <span class="alert alert-danger" id="message-error"></span>
                <div class="modal-body-dialog">
                    <div class="dialog-description">
                        <div class="dialog-description-header">
                            <i></i>
                            <div><span>Nhóm là không gian tuyệt vời để hoàn thành công việc và chỉ liên lạc với những người bạn muốn. Hãy chia sẻ ảnh và video, trò chuyện, lên kế hoạch và nhiều hoạt động khác.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="form-create-group" action="{{route('create_group')}}" method="post" role="form"
                      onsubmit="return onFormSubmit()">
                    <div><h5>Đặt tên nhóm</h5></div>
                    <input type="text" placeholder="Tên nhóm" name="title" id="name-group-input">
                    <div><h5>Mô tả về nhóm</h5></div>
                    <input type="text" placeholder="Mô tả" name="description" id="desc-input">

                    <div>
                        <div class="title-mode-group"><h5>Chọn quyền riêng tư</h5></div>
                    </div>

                    <div class="mode-group">
                        <div class="mode-group-header">
                            <i class="mode-icon public" id="icon-form-group"></i>
                            <div>
                                <h5 id="title-mode">Nhóm công khai</h5>
                                <i class="dropdown-mode"></i>
                                <span
                                    id="desc-mode">Bất cứ ai cũng tìm được nhóm, xem thành viên và những gì họ đăng.</span>
                            </div>
                        </div>

                    </div>
                    <div class="footer-mode-select">
                        <input type="submit" value="Tạo">
                    </div>
                    <input type="hidden" id="value-mode" value="0" name="mode">
                    {{csrf_field()}}
                </form>
                <div class="dropdown-select-mode" id="dropdown-select">
                    <ul>
                        <li id="select-mode-private">
                            <a href="#">
                                <div>
                                    <i class="mode-icon private"></i>
                                    <h5 class="title-mode-select">Nhóm kín</h5>
                                    <span class="des-mode">Bất cứ ai cũng tìm thấy nhóm và biết được người nào điều hành nhóm. Chỉ thành viên mới xem được ai tham gia nhóm và nội dung họ đăng.</span>
                                </div>
                            </a>
                        </li>
                        <li id="select-mode-public">
                            <a href="#">
                                <div>
                                    <i class="mode-icon public"></i>
                                    <h5 class="title-mode-select">Nhóm công khai</h5>
                                    <span class="des-mode">Bất cứ ai cũng tìm được nhóm, xem thành viên và những gì họ đăng.</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
