Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}

function getDate(weekDayAr, selDate) {
    const selDateArray = selDate.split("-");

    const currentDate = new Date();
    const date = new Date(Number(selDateArray[0]), Number(selDateArray[1]) - 1, Number(selDateArray[2]), currentDate.getHours());

    let weekDay = date.getDay();
    if (weekDay == 0) {
        weekDay = 6;
    } else {
        weekDay -= 1;
    }

    return date.addDays(weekDayAr - weekDay).toISOString().split('T')[0];
}

let raw;
let column;

function clicked(event) {
    for (i = 8; i <= 8 * 24 + 7; i++) {
        document.getElementById(String(i)).classList.remove("clicked");
        document.getElementById(String(i)).setAttribute("class", "grid-item");
    }
    event.target.setAttribute("class", "clicked");

    raw = parseInt(event.target.id / 8, 10);
    column = event.target.id % 8;
    const days = [
        "Uhrzeit",
        "Montag",
        "Dienstag",
        "Mitwoch",
        "Donnerstag",
        "Freitag",
        "Samstag",
        "Sonntag"
    ];

    const date = document.getElementById('selDate').valueAsDate;
    let weekDay = date.getDay();
    if (weekDay == 0) {
        weekDay = 6;
    } else {
        weekDay -= 1;
    }
    const dateString = document.getElementById('selDate').valueAsDate.addDays((column - 1) - weekDay).toLocaleDateString("de-DE");

    document.getElementById("selected").innerHTML = "Time: " + String(raw) + ", Day: " + days[column] + ", Date: " + dateString;
}


function weekBack(event) {
    event.preventDefault();
    window.location.replace("/?date=" + document.getElementById('selDate').valueAsDate.addDays(-7).toISOString().split('T')[0]);
}

function weekFurther(event) {
    event.preventDefault();

    window.location.replace("/?date=" + document.getElementById('selDate').valueAsDate.addDays(7).toISOString().split('T')[0]);

}

