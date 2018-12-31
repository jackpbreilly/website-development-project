var countDownDate = new Date("Dec 25, 2018 00:00:00").getTime();

var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));

    document.getElementById("days-till-christmas").innerHTML = days + " Days To Go! ";

    // If the count down is over
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days-till-christmas").innerHTML = "";
    }
}, 1000);