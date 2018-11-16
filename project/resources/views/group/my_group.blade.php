@extends('default')
@section('title','Phat trien 2phan mem chuyen nghiep')
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
    <div class="container-group">
        <div class="row">
            <div class="group-infor col-lg-3">
                <div class="group-information">
                    <div class="group-name">
                        <a href="#">Cong nghe web tien tien</a>
                    </div>

                    <div class="group-type">
                        <span class="fa fa-lock">Nhom kin</span>
                    </div>
                    <div class="menu-group">
                        <ul class="menu-item">
                            <li><a class="menu-item-link" href="#">Gioi thieu</a></li>
                            <li><a class="menu-item-link active" href="#">Thao luan</a></li>
                            <li><a class="menu-item-link" href="#">Thanh vien</a></li>
                            <li><a class="menu-item-link" href="#">Tai lieu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box-create-post card">
                    <div class="option-post">
                        Dang bai viet
                    </div>
                    <div class="content-post">
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                     class="rounded-circle"/>

                            </div>
                            <div class="col-sm-11">
                                <div>
                                    <form>
                                        <textarea placeholder="Type post here"></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="post-helper">
                        <a href="#">Dang bai</a>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header content-post">
                        <div class="row user-name">
                            <div class="col-sm-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg" class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 20px">
                                <label><br></label>
                            </div>
                            <div class="col-sm-10">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>Hà Nội 11/11/2018</small>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                        </div>
                        <div class="row comment" style="padding-top: 30px">
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">Like +1</button>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Bình luận" onfocus="comment('comment-post-1')">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-share-alt">Chia sẻ</span>
                                </button>
                            </div>
                        </div>
                        <div class="row comment" id="comment-post-1" style="padding-top: 30px; display: none">
                            <div class="col col-sm-12">
                                <div class="card border">
                                    <div id="post">
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post media p-2">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class=" align-self-center mr-2 mt-2 rounded-circle" style="width:60px;">
                                        <div class="media-body" style="padding-top: 20px">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Nhập nội dung bình luận" id="post-comment">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default">Gửi</button>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default" onclick="displayComment('comment-post-1')">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header content-post">
                        <div class="row user-name">
                            <div class="col-sm-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg" class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 20px">
                                <label><br></label>
                            </div>
                            <div class="col-sm-10">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>Hà Nội 11/11/2018</small>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                        </div>
                        <div class="row comment" style="padding-top: 30px">
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">Like +1</button>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Bình luận" onfocus="comment('comment-post-2')">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-share-alt">Chia sẻ</span>
                                </button>
                            </div>
                        </div>
                        <div class="row comment" id="comment-post-2" style="padding-top: 30px; display: none">
                            <div class="col col-sm-12">
                                <div class="card border">
                                    <div id="post">
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post media p-2">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class=" align-self-center mr-2 mt-2 rounded-circle" style="width:60px;">
                                        <div class="media-body" style="padding-top: 20px">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Nhập nội dung bình luận" id="post-comment">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default">Gửi</button>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default" onclick="displayComment('comment-post-2')">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <div class="card-header content-post">
                        <div class="row user-name">
                            <div class="col-sm-1">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg" class="rounded-circle">
                            </div>
                            <div class="my_col" style="column-width: 20px">
                                <label><br></label>
                            </div>
                            <div class="col-sm-10">
                                <span style="font-weight: bold;color: black">Vũ Văn Kiên</span>
                                <br>
                                <small>Hà Nội 11/11/2018</small>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                            Hôm nay tôi buồn buồn  ?
                        </div>
                        <div class="row comment" style="padding-top: 30px">
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">Like +1</button>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Bình luận" onfocus="comment('comment-post-3')">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-share-alt">Chia sẻ</span>
                                </button>
                            </div>
                        </div>
                        <div class="row comment" id="comment-post-3" style="padding-top: 30px; display: none">
                            <div class="col col-sm-12">
                                <div class="card border">
                                    <div id="post">
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media p-2">
                                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>
                                                <div class="media p-2">
                                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Jane Doe" class="mr-2 mt-2 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                        <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                        <p>Lorem ipsum...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post media p-2">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="John Doe" class=" align-self-center mr-2 mt-2 rounded-circle" style="width:60px;">
                                        <div class="media-body" style="padding-top: 20px">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Nhập nội dung bình luận" id="post-comment">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default">Gửi</button>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-default" onclick="displayComment('comment-post-3')">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <script>
        function comment(x) {
            var status = document.getElementById(x).style.display;
            if(status == "none"){
                status = 'block';
            }
            document.getElementById(x).style.display = status;
        }

        function displayComment(x) {
            document.getElementById(x).style.display = 'none';
        }
    </script>
@endsection
