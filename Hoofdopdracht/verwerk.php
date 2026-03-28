<?php
// hier is arry voor fouten en succesmelding
$fouten = [];
$succesMelding = "";

// Controleer of de data is verstuurd
if (isset($_POST['naam']) && isset($_POST['aantal'])) {
    
    // verwijder spaties
 $naam = trim($_POST['naam']);
    $aantal = trim($_POST['aantal']);

    // Validatie voor Naam 
    if (strlen($naam) == 0) {
        $fouten[] = "Naam is verplicht en mag niet leeg zijn.";
      } elseif (strlen($naam) < 3) {
        $fouten[] = "Naam moet minimaal 3 tekens bevatten.";
    } elseif (strlen($naam) > 50) {
        $fouten[] = "Naam mag maximaal 50 tekens bevatten.";
    }

    // Validatie voor Aantal 
    if (strlen($aantal) == 0) {
        $fouten[] = "Aantal is verplicht.";
    } elseif (!is_numeric($aantal)) {
        $fouten[] = "Voer bij aantal een geldig getal in";
    }

    // zijn er 0 fouten ? Dan is het succes!!!!!!!!!!!
    if (empty($fouten)) {
        $succesMelding = "Succes! Alles is correct ingevuld.";
    }

} 
else {
    $fouten[] = "Geen data ontvangen via het formulier.";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Verwerking</title>
</head>
<body>

    <h1>Verwerking van je Notitie</h1>

    <?php
    // Toon de foutmeldingen als er iets mis is gegaan
    if (!empty($fouten)) {
        echo '<div style="color: red; border: 1px solid red; padding: 10px;">';
        echo '<strong>Let op, er zijn fouten:</strong><ul>';
        foreach ($fouten as $fout) {
            echo "<li>$fout</li>";
        }
        echo '</ul></div>';
    }

    // Toon de succesmelding en de ingevulde data als alles klopt
    if (!empty($succesMelding)) {
        echo '<div style="color: green; border: 1px solid green; padding: 10px;">';
        echo '<strong>' . $succesMelding . '</strong>';
        echo '</div>';
        
        echo "<p>Je ingevulde naam: " . htmlspecialchars($naam) . "</p>";
        echo "<p>Je ingevulde aantal: " . htmlspecialchars($aantal) . "</p>";
        /* Door htmlspecialchars($naam) te gebruiken,
       leest de browser het niet meer als een gevaarlijk script dat hij moet uitvoeren.
         maar gewoon als een plat stukje tekst.  */  
    }
    ?>

    <br><br>
    <a href="/p3_php/Hoofdopdracht/pages/toevoegen.php">Ga terug naar het formulier</a>

</body>
</html>