<?php

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

// 2. Controleer of 'id' in de URL staat met isset
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // 3. Prepared statement met WHERE id = :id
        $stmt = $conn->prepare("SELECT * FROM taken WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // 4. Haal precies één item op
$taak = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query fout: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 23 - Item ophalen</title>
</head>
<body>

    <h1>Taak Details</h1>

    <?php 
    // 5. Toon de data netjes in HTML óf geef een melding als het ID niet bestaat
    if (isset($taak) && $taak) { ?>
   
        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px; max-width: 400px;">
            <h2><?php echo htmlspecialchars($taak['naam']);     // htmlspecialchars voor het veilihheid van de output
            ?></h2>
            <p><strong>Beschrijving:</strong> <?php echo htmlspecialchars($taak['beschrijving']); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($taak['statuse']); ?></p>
        </div>

    <?php } else if (isset($_GET['id'])) { ?>
        
        <p style="color: red;">Er is geen taak gevonden met ID: <?php echo htmlspecialchars($_GET['id']); ?></p>
        
    <?php } else { ?>
        
        <p style="color: orange;">Geen ID meegegeven in de URL. Type bijvoorbeeld '?id=1' achter de link.</p>
        
    <?php } ?>

</body>
</html>