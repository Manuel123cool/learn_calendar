function deleteRequest(event) {
    if (!column) {
        prompt("Bitte ein feld auswählen.");
        return;
    }

    event.preventDefault();
    const date = document.getElementById("selDate").value;
    const finalDate = getDate(column - 1, date);
    let data = {raw: raw, column: column, text: document.getElementById("lname").value, date: finalDate};

    fetch("/delete", {
        method: "POST",
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}, 
        
        body: JSON.stringify(data)
    })
    .then(response=>response.text())
    .then(data=>{ 
        console.log(data); 
        window.location.replace("/");
    })
}

document.addEventListener("DOMContentLoaded", (event) => {
    document.getElementById("send").addEventListener("submit", (event1) => {
        if (!column) {
            prompt("Bitte ein feld auswählen.");
            return;
        }

        event1.preventDefault();
        
        const date = document.getElementById("selDate").value;
        const finalDate = getDate(column - 1, date);
        let data = {raw: raw, column: column, text: document.getElementById("lname").value, date: finalDate};
    
        fetch("/store", {
            method: "POST",
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}, 
            
            body: JSON.stringify(data)
        })
        .then(response=>response.text())
        .then(data=>{ 
            console.log(data); 
            window.location.replace("/");
        })
    });

    (function() {
        const date = new Date();

        let weekDay = date.getDay();
        if (weekDay == 0) {
            weekDay = 6;
        } else {
            weekDay -= 1;
        }
        console.log(weekDay);

        let hours = date.getHours() ;
        if (hours == 0) {
            hours = 24;
        } else {
            hours -= 1;
        }
        console.log(hours);

        const weekElem = document.querySelector('#grid-container :nth-child(' + String(weekDay + 2) + ')');
        weekElem.classList.add("currentDate");

        const hourElem = document.querySelector('#grid-container :nth-child(' + String((hours + 1) * 8 + 1) + ')');
        hourElem.classList.add("currentDate");

        document.getElementById('selDate').valueAsDate = new Date();
    }());
});