<?php
session_start();
require __DIR__ . "/includes/db.php";

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];

    $sql = "DELETE FROM items WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);

    $_SESSION["success"] = "Notitie succesvol verwijderd!";
} else {
    $_SESSION["error"] = "Geen geldig ID ontvangen.";
}

header("Location: /p3_php/Hoofdopdracht/pages/home.php");
exit;