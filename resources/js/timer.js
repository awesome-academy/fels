$(document).ready(function() {
    function getTimeRemaining(endtime) {
        let t = Date.parse(endtime) - Date.parse(new Date());
        let seconds = Math.floor((t / 1000) % 60);
        let minutes = Math.floor((t / 1000 / 60) % 60);
        return {
          'total': t,
          'minutes': minutes,
          'seconds': seconds
        };
    }

    function initialize(id, endtime) {
        let clock = document.getElementById(id);
        let minutesSpan = clock.querySelector('.minutes');
        let secondsSpan = clock.querySelector('.seconds');

        function updateTime() {
            let t = getTimeRemaining(endtime);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
            clearInterval(timeinterval);
            $('#submit').trigger("click");
            window.localStorage.removeItem('timer');
            }
        }

        updateTime();
        let timeinterval = setInterval(updateTime, 1000);
    }

    let time = $('#time').val();
    let deadline = new Date(Date.parse(new Date()) + 60 *time * 1000);
    if (!window.localStorage.getItem('timer')) {
        window.localStorage.setItem('timer', deadline);
    }
    deadline = window.localStorage.getItem('timer');
    initialize('timer', deadline);

    $("#submit").click(function(e) {
        let messages = Lang.get('test.want_submit');
        if(!confirm(messages)) {
            e.preventDefault();
        } else {
            window.localStorage.removeItem("timer");
        }
    });
});
