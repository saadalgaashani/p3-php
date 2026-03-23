
<h1>Item succesvol ontvangen</h1>

<?php
if (isset($_POST['naam']) && isset($_POST['aantal'])) {
 // isset = als het variable is hier schrijf het 
 //$_POST['naam'] = pak het variable uit deze form

 // && = als beide voorwaarden  er zijn 

    $naam = htmlspecialchars($_POST['naam']);
    $aantal = htmlspecialchars($_POST['aantal']);

    echo "<p>Naam: $naam</p>";
    echo "<p>Aantal: $aantal</p>";

} else {
    echo "<p>Geen data ontvangen</p>";
}
?>

<a href="/p3_php/Hoofdopdracht/pages/toevoegen.php">Terug</a>

