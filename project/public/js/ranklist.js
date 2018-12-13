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
    var valueRadio = document.getElementsByName(optionsRadios);
    var btnNumber = optionsRadios.substr(13, optionsRadios.length);
    var numberQues = document.getElementsByName("ques");
    var count = 0;
    for (var i = 0; i < valueRadio.length; i++) {
        if (valueRadio[i].checked) {
            document.getElementById("bt" + btnNumber).style.background = 'green';
            break;
        }
    }
    // for (var j = 0; j < btnNumber.length; j++) {
    //     if (document.getElementById("bt"+(j+1)).style.background == 'green') {
    //         count ++;
    //     }
    // }

    for (var j = 0; j < numberQues.length; j++) {
        if(document.getElementById("bt"+(j+1)).style.background == 'green'){
            count++;
        }
    }
    document.getElementById("status").style.width = count / (numberQues.length) * 100 + "%";
    document.getElementById("status1").innerText = Math.round(count / (numberQues.length) * 100 * 100) / 100 + "%";
}