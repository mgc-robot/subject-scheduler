/**
 * Created by mark on 7/14/16.
 */
(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var weekday =  [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ];
        var postMeridiem;
        var today = new Date(),
            d = checkTime(weekday[today.getDay()]),
            h = checkTime(today.getHours() % 12 || 12),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        today.getHours() >= 12 ? postMeridiem = 'PM' :  postMeridiem = 'AM';


        document.getElementById('time').innerHTML = d +' '+ h + ":" + m + ":" + s + ' ' + postMeridiem;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
