<?php
// 1) Maak connectie met PDO (gebruik je eigen db.php of zet het hier neer)
require_once("../Hoofdopdracht/includes/db.php");
// 2) Testdata
$titel = "Test item";
$datum = 20260415;
$status = "nieuw";

// 3) Prepared statement (vul de placeholders aan)
// placeholders
$sql = "INSERT INTO items (titel, datum, status) VALUES (:titel, :datum, :status)";
// prepared statement
$stmt = $conn->prepare($sql);

// 4) Uitvoeren met execute (kies 1 manier)
// Manier A: execute met array
$stmt->execute([
     ":titel" => $titel,
    ":datum" => $datum,
    ":status" => $status
]);

echo "Insert gelukt (als je geen error ziet).";