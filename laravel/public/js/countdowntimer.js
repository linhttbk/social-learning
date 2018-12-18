$(document).ready(function () {
    // Set the date we're counting down to
    var isSubmit = false;
    var listquestion = $('#answer1').data('listquestion');
    var id_quiz = $('#data1').data('quiz');
    var id_chap = $('#data2').data('chap');
    var id_course = $('#data3').data('course');

    var timeStart = new Date();
    var countDownDate = new Date().getTime() + 30 * 60 * 1000 + 2;


// Update the count down every 1 second
    var x = setInterval(function () {


        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        if (distance < 0 && !isSubmit) {
            finishExam();
            document.getElementById("timer").innerHTML = "Hết giờ";
            clearInterval(x);
            var hours = 0;
            var minutes = 0;
            var seconds = 0;
            var countTrue = submitQuiz(listquestion);
            swal('Bạn đã đúng ' + countTrue + '/' + listquestion.length + ' câu, xin chúc mừng!');
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
        var listquestion = $('#answer1').data('listquestion');
        var countTrue = submitQuiz(listquestion);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
            {
                type: 'POST',
                url: '/course/submit',
                data: {
                    score: countTrue,
                    id_quiz: id_quiz,
                    id_chap: id_chap,
                    id_course: id_course,
                    startAt: formatDate(timeStart),
                    endAt: formatDate(new Date())
                },


            }).done(function (data) {
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
                    window.history.back();
                });

        }).fail(function (jqXHR, ajaxOptions, thrownError) {

            swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");

        });
    });

});
var numberQues = document.getElementsByName("ques");

function checkAnswer() {
    var count = 0;
    if (numberDoExam < numberQues.length) {
        document.getElementById("notification").innerText = "Bạn còn " + (numberQues.length - numberDoExam) + " chưa trả lời." +
            "\n Bạn có muốn nộp bài không ?"
    } else {
        document.getElementById("notification").innerText = "Bạn có muốn nộp bài không ?"
    }
    $('#myModal').modal('show');
    $('#finishexam').click(function () {
        $('#myModal').modal('hide');
        count = markScore();
        alert("Bạn trả lời đúng " + count + "/" + numberQues.length + " câu");
    });
}

function finishExam() {
    var count1 = markScore();
    alert("Bạn trả lời đúng " + count1 + "/" + numberQues.length + " câu");
}

function markScore() {
    var count = 0;
    for (var i = 0; i < numberQues.length; i++) {
        var answer = getValueRadioChecked("optionsRadios" + (i + 1));
        var result = document.getElementById("answer" + (i + 1)).textContent;
        if (answer == result) {
            count++;
        }
    }
    return count;
}

function getValueRadioChecked(name) {
    var value;
    var radios = document.getElementsByName(name);
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            value = radios[i].value;
            break;
        }
    }
    return value;
}

var numberDoExam = 0;

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


function submitQuiz(listQuestions) {
    var countTrue = 0;
    for (var key in listQuestions) {
        var valueRadio = document.getElementsByName('optionsRadios' + (parseInt(key) + 1));

        for (var i = 0; i < valueRadio.length; i++) {
            if (valueRadio[i].checked) {
                if (valueRadio[i].dataset.answer == listQuestions[key].true_answer) {
                    countTrue++;
                    break;
                }

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
