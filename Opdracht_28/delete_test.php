<?php
// 1. Database verbinding maken (met je database 'test')
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

// 2. Testdata klaarzetten (we kiezen een ID om te verwijderen)
$id = 1;

try {
    // 3. De DELETE query voorbereiden met een prepared statement en placeholder
    // We wissen uit de tabel 'taken' waar het id matcht
    $sql = "DELETE FROM taken WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // 4. Het ID veilig binden en de query uitvoeren
    $stmt->execute([
        ':id' => $id
    ]);

    // Succesmelding tonen op het scherm
    echo "<h1>Opdracht 28 Gelukt!</h1>";
    echo "De taak met ID <strong>" . $id . "</strong> is succesvol verwijderd uit de database.";

} catch (PDOException $e) {
    echo "Er ging iets mis met het verwijderen: " . $e->getMessage();
}
?>