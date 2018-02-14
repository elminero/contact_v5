
$(function() {

    var time = 300;
    var maxTime = time + 1;

    function getDisplayTime() {
        var minutes = Math.floor(time / 60);
        var seconds = time - minutes * 60;

        if (seconds < 10) {
            seconds = "0" + seconds.toString();
        } else {
            seconds = seconds.toString();
        }

        return minutes.toString() + ":" + seconds;
    }


    function timer() {
        time--;

        if (time > 0) {
            document.getElementById("timer").innerHTML = "Logout " + getDisplayTime();
        } else {
            clearInterval(intervalHandler);
            window.location = "/logout";
        }

    }

    var intervalHandler = setInterval(timer, 1000);

    function reStart() {
        time = maxTime;
    }

    document.addEventListener("keydown", reStart);
    document.addEventListener("scroll", reStart);
    document.addEventListener("click", reStart);
    document.addEventListener("mousemove", reStart);
    document.addEventListener("wheel", reStart);

});
