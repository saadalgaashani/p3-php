<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p3_games";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $conn->prepare("SELECT title FROM games");
    $stmt->execute();

    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "Connected successfully";

}

catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}

?>

<ul>
    <?php
    if (count($games) > 0) {
        foreach ($games as $game) {
            echo "<li>" . $game["title"] . "</li>";
        }
    } else {
        echo "Er zijn nog geen games gevonden.";
    }
    ?>
</ul>