@extends('default')
@section('title','Buy Course')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_reg.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/quiz.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/countdowntimer.js')}}"></script>
    <script src="{{asset('js/ranklist.js')}}"></script>
@endsection
@section('content')

    <div id="container" >
        <div class="row">
            <div class="col-lg-3 ">
                <div class="panel panel-default listuser">
                    <div class="panel-heading c-list">
                        <span class="title" style="position: relative;" id="title">Thành tích</span>
                        <ul class="pull-right c-controls">
                            <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip"
                                   data-placement="top" title="Toggle Search"><span
                                        class="fa fa-ellipsis-v"></span></a></li>
                        </ul>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-xs-12">
                            <div class="input-group c-search">
                                <input type="text" class="form-control" id="contact-list-search">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span
                                        class="glyphicon glyphicon-search"></span></button>
                            </span>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group" id="contact-list">
                        <li class="list-group-item">
                            <div class="col-xs-12 col-sm-3">
                                <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                     class="img-responsive img-circle"/>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <span class="name">Kiên</span><br/>
                                500 <span class="glyphicon glyphicon-star" data-toggle="tooltip"
                                          title="Điểm"></span>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="panel panel-primary" id="panel-top-quiz">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Danh sách câu hỏi
                        </h3>
                    </div>
                    <div class="panel-body">
                        <button type="button" class="btn" id="bt1" name="ques">1</button>
                        <button type="button" class="btn" id="bt2" name="ques">2</button>
                        <button type="button" class="btn" id="bt3" name="ques">3</button>
                        <label style="float: right">Thời gian làm bài : <span id="timer"></span></label>
                    </div>
                    <div class="panel-footer" style="height: 80px">
                        <p>Tình trạng hoàn thành</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" id="status" style="width: 0%">
                                <span id="status1">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary ques">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Câu 1 : What is your name ?
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1"
                                       onchange="checkedRadio('optionsRadios1')">
                                A
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1"
                                       onchange="checkedRadio('optionsRadios1')">
                                B
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1"
                                       onchange="checkedRadio('optionsRadios1')">
                                C
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1"
                                       onchange="checkedRadio('optionsRadios1')">
                                D
                            </label>
                        </div>
                        <div class="hidden">
                            <label class="answer1" id="answer1">option4</label>
                        </div>

                    </div>

                </div>
                <div class="panel-submit">
                    <input class="btn btn-primary center-block" type="button" value="Gửi bài thi"
                           onclick="checkAnswer()">
                </div>
            </div>
            <div class="col-xs-1 column"></div>
        </div>
        <!--Modal-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông báo</h4>
                    </div>
                    <div class="modal-body">
                        <p id="notification"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary finish" id="finishexam">Nộp bài</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $('[data-command="toggle-search"]').on('click', function (event) {
            event.preventDefault();
            $(this).toggleClass('hide-search');

            if ($(this).hasClass('hide-search')) {
                $('.c-search').closest('.row').slideUp(100);
            } else {
                $('.c-search').closest('.row').slideDown(100);
            }
        })

        $('#contact-list').searchable({
            searchField: '#contact-list-search',
            selector: 'li',
            childSelector: '.col-xs-12',
            show: function (elem) {
                elem.slideDown(100);
            },
            hide: function (elem) {
                elem.slideUp(100);
            }
        })
    });
</script>
</body>
</html>
