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
?>


<?php
// Controleer of id  wel is meegegeven in de URL met isset
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Geselecteerd item: " . $id;
} else {
    echo "Geen ID meegegeven in de URL! Type bijvoorbeeld '?id=3' achter de link.";
}
?>

