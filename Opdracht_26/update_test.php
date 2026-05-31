<?php
// 1. Database verbinding maken (met je bekende database 'test')
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database fout: " . $e->getMessage());
}

// 2. Testdata klaarzetten (zoals gevraagd in de opdracht)
$nieuweNaam = "Dit is een super nieuwe titel!";
$id = 1;

try {
    // 3. De UPDATE query voorbereiden met een prepared statement
    // We passen de kolom 'naam' aan van de tabel 'taken' waar het id matcht
    $sql = "UPDATE taken SET naam = :naam WHERE id = :id";
//     In PHP en SQL staan :naam and :id voor placeholders (tijdelijke plaatsvervangers) of named parameters.

// Je kunt ze het beste vergelijken met lege vakjes in een invulformulier.
// Waarom gebruiken we ze?
// Normaal gesproken zou je misschien geneigd zijn om de variabelen direct in de SQL-tekst te plakken, zoals dit:
// "UPDATE taken SET naam = '$nieuweNaam' WHERE id = $id"

// Dat is echter heel gevaarlijk! Als een gebruiker via een invulveld kwaadaardige code typt, 
// kan hij jouw database hacken of wissen (dit heet SQL-injectie).

// Door :naam en :id te gebruiken, zeg je eigenlijk tegen de database:

"Let op, hier komen straks gegevens te staan, maar ik geef ze pas op het allerlaatste moment los aan je door."
    $stmt = $conn->prepare($sql);

    // 4. De variabelen veilig binden en de query uitvoeren
    $stmt->execute([
        ':naam' => $nieuweNaam,
        ':id'   => $id
    ]);

    // Succesmelding tonen op het scherm
    echo "<h1>Opdracht 26 Gelukt!</h1>";
    echo "De taak met ID " . $id . " is in de database aangepast naar: <strong>" . $nieuweNaam . "</strong>";

} catch (PDOException $e) {
    echo "Er ging iets mis met de query: " . $e->getMessage();
}
?>