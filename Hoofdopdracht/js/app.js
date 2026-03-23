// Dark mode
const knop = document.getElementById("darkModeBtn");

if (knop) {
    knop.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
    });
}


// Tijd tonen
const nu = new Date();
let uur = nu.getHours();
let minuut = nu.getMinutes();

if (minuut < 10) {
    minuut = "0" + minuut;
}

const dbTime = document.getElementById("dbTime");

if (dbTime) {
    dbTime.textContent = "Database geladen om: " + uur + ":" + minuut;
}


// Counter
const input = document.getElementById("naam");
const counter = document.getElementById("counter");

if (input && counter) {
    input.addEventListener("input", function () {
        const lengte = input.value.length;
        counter.textContent = lengte + " / 50";
    });
}