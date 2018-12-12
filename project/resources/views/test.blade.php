@extends('default')
@section('title','Blog')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/quiz.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/ranklist.js')}}"></script>
    <script src="{{asset('js/countdowntimer.js')}}"></script>

@endsection
@section('content')
    <div class="container-quiz">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel-rank">
                    <div class="rank-header">
                        <h3>Thanh tich</h3>
                    </div>
                    <div class="rank-content">
                        <div class="rank-item">
                            <img class="rounded-circle" src="{{asset('images/avatar_default.jpg')}}">
                           <div class="rank-infor">
                               <span >User 1</span>
                               <span style="display: block">User 2</span>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="panel quiz-primary">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            Danh sách câu hỏi
                        </h5>
                    </div>
                    <div class="panel-body">
                        <button type="button" class="btn" id="bt1" name="ques">1</button>
                        <button type="button" class="btn" id="bt2" name="ques">2</button>
                        <button type="button" class="btn" id="bt3" name="ques">3</button>
                        <label style="float: right">Thời gian làm bài : <span id="timer"></span></label>
                    </div>
                    <div class="panel-footer">
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
                        <h5 class="panel-title">
                            Câu 1 : What is your name ?
                        </h5>
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
                                <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2"
                                       onchange="checkedRadio('optionsRadios1')"> B
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios3" value="option3"
                                       onchange="checkedRadio('optionsRadios1')"> C
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios1" id="optionsRadios4" value="option4"
                                       onchange="checkedRadio('optionsRadios1')"> D
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
