<?php
session_start();
require __DIR__ . "/includes/db.php";

$fouten = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titel = trim($_POST["titel"] ?? "");
    $status = trim($_POST["status"] ?? "");
    $datum = (int) date("Y-m-d");

    // validatie
    if ($titel === "") {
        $fouten[] = "Titel is verplicht.";
    } elseif (strlen($titel) < 2) {
        $fouten[] = "Titel moet minimaal 2 tekens hebben.";
    } elseif (strlen($titel) > 50) {
        $fouten[] = "Titel mag maximaal 50 tekens hebben.";
    }

    if ($status === "") {
        $fouten[] = "Status is verplicht.";
    }

    // insert als er geen fouten zijn
    if (empty($fouten)) {
        $sql = "INSERT INTO items (titel, datum, status) VALUES (:titel, :datum, :status)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":titel" => $titel,
            ":datum" => $datum,
            ":status" => $status
        ]);
           $_SESSION["success"] = "Item succesvol toegevoegd!";
        header("Location: /p3_php/Hoofdopdracht/pages/home.php");
        exit;
    } else {
        $_SESSION["error"] = implode(" ", $fouten);
        header("Location: /p3_php/Hoofdopdracht/pages/toevoegen.php");
        exit;
    }

} else {
    header("Location: /p3_php/Hoofdopdracht/pages/toevoegen.php");
    exit;
}