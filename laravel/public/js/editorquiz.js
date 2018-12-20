$(document).ready(function () {
    // Set the date we're counting down to
    var isSubmit = false;
    var listquestion = $('#answer1').data('listquestion');
    var id_quiz = $('#data1').data('quiz');
    var id_chap = $('#data2').data('chap');
    var uid = $('#data3').data('uid');
    var timeStart = new Date();
    var countDownDate = new Date().getTime() + 30 * 60 * 1000 + 2;


// Update the count down every 1 second
    var x = setInterval(function () {


        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        if (distance < 0 && !isSubmit) {
            $("#timer").html("Hết giờ");
            clearInterval(x);
            var hours = 0;
            var minutes = 0;
            var seconds = 0;
            var countTrue = checkTrue();
            postQuiz(countTrue);
        } else {
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        }
        // Time calculations for days, hours, minutes and seconds


        // Output the result in an element with id="demo"
        document.getElementById("timer").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";
        // If the count down is over, write some text

    }, 1000);

    $('#submitquiz').on('click', function () {
        var countTrue = checkTrue();
        postQuiz(countTrue);
    });

    function postQuiz(countTrue) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
            {
                type: 'POST',
                url: '/editor/submit',
                data: {
                    score: countTrue,
                    id_quiz: id_quiz,
                    id_chap: id_chap,
                    uid: uid,
                    startAt: formatDate(timeStart),
                    endAt: formatDate(new Date())
                },


            }).done(function (data) {
            if (data.success == 1) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "Da nop bai";
                isSubmit = true;
                // swal('Bạn đã đúng ' + countTrue + '/15 câu, xin chúc mừng!').then((value) => {
                //     swal(`The returned value is: ${value}`);
                // });
                swal(
                    {
                        title: 'Ket qua',
                        text: 'Bạn đã đúng ' + countTrue + '/' + listquestion.length + ' câu, xin chúc mừng!',
                        type: 'success',

                    }, function () {

                        var topTest = data.data;
                        var panelRank = $('.panel-rank').eq(0);
                        panelRank.empty();
                        panelRank.append('<div class="rank-header">\n' +
                            '                        <h3>Top 5</h3>\n' +
                            '                    </div>');
                        for (var i = 0; i < topTest.length; i++) {
                            var topTestItem = topTest[i];
                            var avatar = topTestItem.avatar != null ? topTestItem.avatar : '/images/avatar_default.jpg';
                            panelRank.append('<div class="rank-item"> ' +
                                '<div class="row">' +
                                '<div class="col-sm-3">' +
                                '<img id="avatar-rank" class="rounded-circle" ' +
                                'src="' + avatar + '">' +
                                '</div>' +
                                '<div class="col-sm-9"> ' +
                                '<div class="rank-infor"> ' +
                                ' <span class="name">' + topTestItem.name + '</span> ' +
                                ' <span class="result" style="display: block">' + topTestItem.score + '/15' + '</span> ' +
                                '</div> ' +
                                '</div> ' +
                                '</div>' +
                                '</div>');
                        }

                    });
            }


        }).fail(function (jqXHR, ajaxOptions, thrownError) {

            swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");

        });
    }


});


function checkedRadio(optionsRadios) {
    var name = optionsRadios.name;
    var valueRadio = document.getElementsByName(name);
    var btnNumber = optionsRadios.value;
    var count = 0;
    var number = 0;
    for (var i = 0; i < valueRadio.length; i++) {
        if (valueRadio[i].checked) {
            document.getElementById("bt" + btnNumber).style.backgroundColor = 'green';
            break;
        }
    }

    for (var j = 0; j < 15; j++) {
        var id = "bt" + (j + 1);
        var color = document.getElementById("bt" + (j + 1)).style.backgroundColor;
        if (color == 'green') {
            count++;
        }
    }


    document.getElementById("status").style.width = count / (15) * 100 + "%";
    document.getElementById("status1").innerText = Math.round(count / (15) * 100 * 100) / 100 + "%";
}

function checkTrue() {
    var panelBody = $('div.ques .panel-body');
    var countTrue = 0;
    for (var i = 0; i < panelBody.length; i++) {
        var panelBodyItem = panelBody.eq(i);
        var answer = panelBodyItem.find('.question').eq(0);
        var radio = panelBodyItem.find('.radio');
        for (var j = 0; j < radio.length; j++) {
            var radioItem = radio.eq(j);
            var inputItem = radioItem.find('input:first');
            if (inputItem.data('answer') == answer.data('answer')) {
                if (inputItem.is(":checked")) {
                    countTrue++;
                }
                radioItem.addClass('true');
            } else {
                if (inputItem.is(":checked")) {
                    radioItem.addClass('wrong');
                }
            }
        }

    }
    $('#submitquiz').prop('disabled', true);
    return countTrue;

}

function submitQuiz(listQuestions) {
    var countTrue = 0;
    for (var key in listQuestions) {
        var valueRadio = document.getElementsByName('optionsRadios' + (parseInt(key) + 1));

        for (var i = 0; i < valueRadio.length; i++) {
            if (valueRadio[i].dataset.answer == listQuestions[key].true_answer) {
                if (valueRadio[i].checked) {
                    countTrue++;
                }
                valueRadio[i].addClass('active');
            }

        }

    }
    return countTrue;

}

function formatDate(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var second = date.getSeconds();
    return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + second;
}
