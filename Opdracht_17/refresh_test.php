<?php
require_once("../Hoofdopdracht/includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
    // als er een POST request is, voer dan deze code uit
    {
    $titel = $_POST["titel"];
    // gebruik het input van het formulier

    $sql = "INSERT INTO items (titel, datum, status) VALUES (:titel, :datum, :status)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":titel" => $titel,
        ":datum" => 20260416,
        ":status" => "nieuw"
    ]);


     
      header("Location: refresh_test.php");
      // na het opslaan op het database wordt je ingelogt als GET  niet als POST.
    exit;
    // stop de uitvoering van het script.


    // 1) pagina tonen is GET request (dus je formuleer laten zien)

    // 2) actie uitvoeren is POST request (dus je verwerkt het formulier en opslaten in database)
}

 
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Refresh test</title>
</head>
<body>
    
    <h1>Refresh test</h1>

    <form method="POST" action="">
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" required>
        <button type="submit">Opslaan</button>
    </form>
</body>
</html>