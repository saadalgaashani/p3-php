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
        // hier zeg je tel  met input (saad) value (4) length (tellen)
        counter.textContent = lengte + " / 50";
        // hiet zeg je zet de lengte op de scherm met /50
    });
}


// Easter Egg 

const footer = document.getElementById("mijnFooter");

let clickTeller = 0;

if (footer) {
    footer.addEventListener("click", function() {
        
        // 4. Verhoog de teller met 1
        clickTeller++; 
        
        // 5. Check of de teller op 5 staat
        if (clickTeller === 5) {
            alert("🐰 Easter Egg gevonden! Backend validatie is belangrijk, maar pauze nemen ook!");
            
            clickTeller = 0; 
        }
    });
}