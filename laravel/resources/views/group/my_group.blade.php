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
@endsection
@section('js')

    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/my_group.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection
@section('content')
    <div class="container-group" style="margin-top: 130px">
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
                            <li><a class="menu-item-link active" href="{{route('my_group',['groupId'=>$id_group])}}">Thảo
                                    luận</a></li>
                            <li><a class="menu-item-link" href="{{route('user_my_group',['groupId'=>$id_group])}}">Thành
                                    viên</a></li>
                            <li><a class="menu-item-link" href="#">Tài liệu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form enctype="multipart/form-data" action="{{route('my_post_data', ['groupId'=>$id_group])}}"
                      method="post"
                      onsubmit="return postDocument()">
                    <div class="box-create-post card">
                        @include('errors.note')
                        <div class="option-post">
                            Đăng bài viết
                        </div>
                        <div class="content-post">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img
                                        src="{{empty(Auth::user()->user->avatar)?asset('images/avatar_default.jpg'):Auth::user()->user->avatar}}"
                                        alt="Scott Stevens"
                                        class="rounded-circle"/>

                                </div>
                                <div class="col-sm-11">
                                    <div>
                                        <textarea style="width: 100%" placeholder="Nhập nội dung bài đăng"
                                                  id="data_post" name="data_post"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-helper">
                            <div>
                                <label class="file">
                                    <span class="file-label">Choose a file&hellip;</span>
                                    <input type="file" name="file"
                                           accept=".csv,.txt,.docx,.doc,.xlsx,.xls,.sql,.sqlite">
                                    <span class="file-value" aria-hidden="true"></span>
                                </label>
                                <input type="submit" value="Đăng bài" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{csrf_field()}}
                </form>
                @if(!empty($listPost))
                    @foreach($listPost as $key => $post)
                        <div class="card" style="margin-top: 20px">
                            <div class="card-header content-post">
                                <div class="row user-name">
                                    <div class="col-sm-1">
                                        <img
                                            src="{{$post->member->avatar!=null?$post->member->avatar:asset('images/avatar_default.jpg')}}"
                                            class="rounded-circle">
                                    </div>
                                    <div class="my_col" style="column-width: 20px">
                                        <label><br></label>
                                    </div>
                                    <div class="col-sm-10">
                                        <span style="font-weight: bold;color: black">{{$post->member->name}}</span>
                                        <br>
                                        <small>{{$post->create_at}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row" style="padding: 0 20px; color: black">{{$post->content}}
                                </div>
                                <div class="row" style="padding: 0 20px;"><a href="{{$post->url_attach}}"
                                                                             target="_blank" download>Tài liệu đính
                                        kèm</a></div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input class="form-control pull-left" id="btn-{{$post->id}}" type="button"
                                               value="Bình luận" onclick="comment({{$post->id}})">
                                    </div>
                                </div>
                                <div class="row" id="comment-post-{{$post->id}}" style="display: none">
                                    <div class="col col-sm-12">
                                        <div class="card border">
                                            <div id="post">
                                                @foreach($post->comments as $key => $comment)
                                                    <div class="media">
                                                        <img
                                                            src="{{empty(Auth::user()->user->avatar)?asset('images/avatar_default.jpg'):Auth::user()->user->avatar}}"
                                                            alt="John Doe" class="mr-2 mt-2 rounded-circle"
                                                            style="width:60px;">
                                                        <div class="media-body">
                                                            <p>
                                                                <b style="color: black">{{$comment->myComment->name}}</b><br>
                                                                <small>{{$comment->create_at}}</small>
                                                            </p>
                                                            <p style="color: black">{{$comment->content}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-divider"></div>
                                                @endforeach
                                            </div>
                                            <div class="post media">
                                                <img
                                                    src="{{empty(Auth::user()->user->avatar)?asset('images/avatar_default.jpg'):Auth::user()->user->avatar}}"
                                                    alt="John Doe"
                                                    class=" align-self-center mr-2 mt-2 rounded-circle"
                                                    style="width:50px; height: 50px">
                                                <div class="media-body" style="padding-top: 20px">
                                                    <form action="" method="post">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nhập nội dung bình luận"
                                                                       id="post-comment">
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <button type="button" class="btn btn-default">Gửi
                                                                </button>
                                                            </div>
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-1">
                                                                <button class="btn btn-default"
                                                                        onclick="displayComment({{$post->id}})">Hủy
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if(Auth::user()->uid == $group->uid)
                <div class="col-lg-3">
                    <div class="card" style="height: 440px; overflow-y: auto">
                        <div class="card-header">
                            Danh sách yêu cầu tham gia nhóm,chỉ admin được phép phê duyệt!
                            <br>
                            <a href="{{route('acceptAllRequest-group', ['idGroup'=>$id_group,'listRequest' => $listRequest])}}"><u>Chấp nhận tất cả <i
                                        class="fa fa-arrow-right" aria-hidden="true"></i></u></a>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @if(!empty($listRequest))
                                    @foreach($listRequest as $key => $request)
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img src="{{asset('images/avatar_default.jpg')}}"
                                                     class="rounded-circle">
                                            </div>
                                            <div class="my_col col-sm-1">
                                            </div>
                                            <div class="col-sm-8">
                                                <span style="display: none">{{$request->id}}</span>
                                                <span style="font-weight: bold;color: black">{{$request->uid}}</span>
                                                <br>
                                                <small>Thời gian : {{$request->request_time}}</small>
                                            </div>
                                            <div class="col-sm-1">
                                                <ul class="list-inline">
                                                    <li>
                                                        <a href="{{route('acceptRequest-group', ['id'=>$request->id])}}"><i
                                                                class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('destroyRequest-group', ['id'=>$request->id,'uid'=>$request->uid])}}"><i
                                                                class="fa fa-times" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        function comment(x) {
            var status = document.getElementById('comment-post-' + x).style.display;

            if (status == "none") {
                status = 'block';
            }
            document.getElementById('comment-post-' + x).style.display = status;
            document.getElementById('btn-' + x).style.display = 'none';
        }

        function displayComment(x) {
            document.getElementById('comment-post-' + x).style.display = 'none';
            document.getElementById('btn-' + x).style.display = 'block';
        }
    </script>
    <script>
        function postDocument() {
            var data = document.getElementById("data_post").value;
            if ('' == data) {
                return false;
            }
            return true;
        }
    </script>
@endsection
