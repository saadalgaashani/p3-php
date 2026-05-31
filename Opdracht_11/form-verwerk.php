<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Form verwerken</title>
</head>
<body>

<form method="POST" action="form-verwerk.php">
    <label>Naam:</label>
    <input type="text" name="naam" required>

    <br><br>

    <label>Aantal:</label>
    <input type="number" name="aantal">

    <br><br>

    <button type="submit">Verzenden</button>
</form>

<?php
if (isset($_POST['naam']) && isset($_POST['aantal'])) {
 // isset = als het variable is hier schrijf het 
 //$_POST['naam'] = pak het variable uit deze form

 // && = als beide voorwaarden  er zijn 

    $naam = $_POST['naam'];
    $aantal = $_POST['aantal'];
    // hier zeg je dat sla de data op deze twee variablen

    echo "<p>Naam: $naam</p>";
    echo "<p>Aantal: $aantal</p>";

    // hier print het riesultaat
}
?>

</body>
</html>