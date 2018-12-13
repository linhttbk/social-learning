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
    <script src="{{asset('js/countdowntimer.js')}}"></script>

@endsection
@section('content')
    <div class="container-quiz">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel-rank">
                    <div class="rank-header">
                        <h3>Top 5</h3>
                    </div>
                    <div class="rank-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="avatar-rank" class="rounded-circle"
                                     src="{{asset('images/avatar_default.jpg')}}">
                            </div>
                            <div class="col-sm-9">
                                <div class="rank-infor">
                                    <span class="name">User name</span>
                                    <span class="result" style="display: block">10/15</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="rank-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="avatar-rank" class="rounded-circle"
                                     src="{{asset('images/avatar_default.jpg')}}">
                            </div>
                            <div class="col-sm-9">
                                <div class="rank-infor">
                                    <span class="name">User name</span>
                                    <span class="result" style="display: block">10/15</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="rank-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="avatar-rank" class="rounded-circle"
                                     src="{{asset('images/avatar_default.jpg')}}">
                            </div>
                            <div class="col-sm-9">
                                <div class="rank-infor">
                                    <span class="name">User name</span>
                                    <span class="result" style="display: block">10/15</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="rank-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="avatar-rank" class="rounded-circle"
                                     src="{{asset('images/avatar_default.jpg')}}">
                            </div>
                            <div class="col-sm-9">
                                <div class="rank-infor">
                                    <span class="name">User name</span>
                                    <span class="result" style="display: block">10/15</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="rank-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="avatar-rank" class="rounded-circle"
                                     src="{{asset('images/avatar_default.jpg')}}">
                            </div>
                            <div class="col-sm-9">
                                <div class="rank-infor">
                                    <span class="name">User name</span>
                                    <span class="result" style="display: block">10/15</span>
                                </div>
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
                        @if(!empty($listQuestion))
                            @foreach($listQuestion as $key => $data)
                                <button type="button" class="btn" id="{{'bt'.($key+1)}}" name="ques">
                                    <span>{{$key+1}}</span></button>
                            @endforeach
                        @endif
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
                    @if(!empty($listQuestion))
                        @foreach($listQuestion as $key => $data)
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    {{'Câu'. ($key+1).':' .$data->content.'?'}}
                                </h5>
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="{{'optionsRadios'.($key+1)}}" id="optionsRadios1"
                                               value="{{$key+1}}" data-answer="A"
                                               onchange="checkedRadio(this)">
                                        {{($data->answer)->A}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="{{'optionsRadios'.($key+1)}}" id="optionsRadios2"
                                               value="{{$key+1}}" data-answer="B"
                                               onchange="checkedRadio(this)"> {{($data->answer)->B}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="{{'optionsRadios'.($key+1)}}" id="optionsRadios3"
                                               value="{{$key+1}}" data-answer="C"
                                               onchange="checkedRadio(this)"> {{($data->answer)->C}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="{{'optionsRadios'.($key+1)}}" id="optionsRadios4"
                                               value="{{$key+1}}" data-answer="D"
                                               onchange="checkedRadio(this)"> {{($data->answer)->D}}
                                    </label>
                                </div>
                                <div class="hidden">
                                    <label class="answer1" id="answer1">option4</label>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="panel-submit">
                    <input class="btn btn-primary center-block" type="button" value="Gửi bài thi"
                           onclick="submitQuize()">
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

    function submitQuize() {
        var array = @json($listQuestion);
        submitQuiz(array);
    }


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
