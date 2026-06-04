<?php
// Database verbinding maken (database 'test')
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Haal alle taken op om te tonen in de lijst
    $stmt = $conn->prepare("SELECT * FROM taken ORDER BY id DESC");
    $stmt->execute();
    $taken = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database fout: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 29 - Lijstpagina</title>
</head>
<body>

    <h1>Mijn Takenlijst</h1>

    <?php if (count($taken) > 0): ?>
        <ul>
            <?php foreach ($taken as $taak): ?>
                <li>
                    <?= htmlspecialchars($taak['naam']) ?> 
                    <a href="delete.php?id=<?= $taak['id'] ?>" style="color: red; margin-left: 10px;">Verwijderen</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Geen taken gevonden in de database. Voeg er eerst een toe in phpMyAdmin.</p>
    <?php endif; ?>

</body>
</html>