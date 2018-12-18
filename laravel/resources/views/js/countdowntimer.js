
// Set the date we're counting down to
var countDownDate = new Date().getTime()+30*60*1000+2;

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate- now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("timer").innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
        finishExam();
        document.getElementById("timer").innerHTML = "Hết giờ"
        clearInterval(x);
    }
}, 1000);
