const knop = document.getElementById("darkModeBtn");

knop.addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
});

const nu = new Date();
let uur = nu.getHours();
let minuut = nu.getMinutes();

if (minuut < 10) {
    minuut = "0" + minuut;
}

const dbTime = document.getElementById("dbTime");
dbTime.textContent = "Database geladen om: " + uur + ":" + minuut;