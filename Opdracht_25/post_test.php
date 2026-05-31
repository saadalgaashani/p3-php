<?php
// We controleren eerst of het formulier daadwerkelijk is verstuurd via POST
$titelWaarde = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {  //Dit is een controlekamer. PHP kijkt hier: 
// "Is de gebruiker op deze pagina gekomen door op de 'Verzenden' knop te drukken (POST)? 
// Of is hij hier gekomen door gewoon de link in te typen (GET)?" Alleen als er echt geklikt is, voert hij de code hierboven uit.
    // Haal de waarde van 'titel' op uit de $_POST array
    $titelWaarde = isset($_POST['titel']) ? $_POST['titel'] : "";
   // Uitleg: Dit is een verkorte if/else regel (een ternary operator). Er staat eigenlijk:

// Controleer (isset): Zit er in de envelop ($_POST) een briefje met de naam 'titel'?

// ? (Ja): Stop die tekst dan in de variabele $titelWaarde.

// : (Nee): Maak $titelWaarde leeg "".
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 25 - POST data uitlezen</title>
</head>
<body>

    <h1>POST Test Formulier</h1>

<form action="" method="POST" style="margin-bottom: 20px;">
            <label Kahn for="titel">Voer een titel in:</label><br>  
            <!-- Uitleg: Dit zorgt ervoor dat er een tekstje boven je invoerveld komt te staan.
             Het for="titel" gedeelte is een onzichtbaar linkje naar de id="titel" van je inputveld. -->
        <input type="text" id="titel" name="titel" value="<?= htmlspecialchars($titelWaarde) ?>" required>
        <button type="submit">Verzenden</button>
    </form>

    <hr>

    <h2>Resultaat op het scherm:</h2>

    <!-- <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?> Uitleg: Hier splitst de weg zich. PHP zegt:
         "Als de pagina is verzonden via POST, laat dan de HTML-code zien die hier direct onder staat." -->
        
        
        <p><strong>Volledige inhoud van $_POST (print_r):</strong></p>
        <pre><?php print_r($_POST); ?></pre>
         <!-- Uitleg: print_r() is een speciale PHP-functie om de complete 
        inhoud van een "envelop" (een array) te dumpen. De <pre> tags eromheen zorgen ervoor dat de browser
             de spaties en enters netjes toont, zodat je de computercode makkelijk kunt lezen (zoals die Array ( [titel] => hi )). -->

        <p><strong>Specifieke waarde van titel:</strong> <?php echo htmlspecialchars($titelWaarde); ?></p>
        <!-- Uitleg: Hier pakken we de tekst die we in blok 3 hebben opgeslagen ($titelWaarde) en printen (echo) we die op
         het scherm. htmlspecialchars() zorgt ervoor dat hackers geen gevaarlijke scripts kunnen uitvoeren via het invoerveld. -->

    <?php else: ?>
        <!-- Uitleg: "Maar... is de pagina NIET verzonden via POST? (Dus laadt de pagina voor de allereerste keer?)
        " Dan negeert PHP de codes hierboven, en laat hij de regel hieronder zien: -->
        <p style="color: orange;">Vul het formulier hierboven in en klik op Verzenden om de POST-data te bekijken.</p>
    <?php endif; ?>
    <!-- Uitleg: Dit is simpelweg het slotakkoord. Hier vertel je PHP dat de if/else controle is afgelopen en dat de normale HTML daarna weer door mag gaan. -->

</body>
</html>