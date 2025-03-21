// public/js/countdown.js

document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    function countdown(countdownElem, datetime) {
        var targetDate = new Date(datetime).getTime();

        var interval = setInterval(function () {
            var now = new Date().getTime();
            var distance = targetDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const countdownElements = document.querySelectorAll(countdownElem);
            countdownElements.forEach(countdownElement => {
                if (countdownElement.querySelector(".days")) {
                    countdownElement.querySelector(".days").innerHTML = days;
                }
                countdownElement.querySelector(".hours").innerHTML = hours;
                countdownElement.querySelector(".minutes").innerHTML = minutes;
                countdownElement.querySelector(".seconds").innerHTML = seconds;

                if (distance < 0) {
                    clearInterval(interval);
                    countdownElement.innerHTML = "EXPIRED";
                }
            });
        }, 1000);
    }

    // Fetch the event datetime
    fetch('/get-event-datetime')
        .then(response => response.json())
        .then(data => {
            if (data.datetime) {
                countdown(".et-countdown", data.datetime);
            } else {
                console.error('No datetime found in the response');
            }
        })
        .catch(error => {
            console.error('Error fetching event datetime:', error);
        });
});
