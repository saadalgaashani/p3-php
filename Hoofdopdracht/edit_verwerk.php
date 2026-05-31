<?php
session_start();
// Zorg dat het pad naar je db.php correct is vanaf deze locatie
require __DIR__ . "/includes/db.php";

$fouten = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Vang het (verborgen) ID op zodat PHP weet wélke rij aangepast moet worden
    $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
    $titel = trim($_POST["titel"] ?? "");
    $status = trim($_POST["status"] ?? "");
    $datum = trim($_POST["datum"] ?? ""); // We vangen de datum op die de gebruiker heeft ingevuld (bijv. 2028)

    // 1. Validatie
    if ($id <= 0) {
        $fouten[] = "Ongeldig item ID.";
    }
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
    if ($datum === "") {
        $fouten[] = "Datum is verplicht.";
    }

    // 2. UPDATE uitvoeren als er geen fouten zijn
    if (empty($fouten)) {
        try {
            // We gebruiken UPDATE en WHERE id = :id om alleen deze specifieke notitie te wijzigen
            $sql = "UPDATE items SET titel = :titel, datum = :datum, status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ":titel"  => $titel,
                ":datum"  => $datum,
                ":status" => $status,
                ":id"     => $id
            ]);

            $_SESSION["success"] = "Item succesvol aangepast!";
            header("Location: /p3_php/Hoofdopdracht/pages/home.php");
            exit;

        } catch (PDOException $e) {
            $_SESSION["error"] = "Database fout: " . $e->getMessage();
            header("Location: /p3_php/Hoofdopdracht/pages/edit.php?id=" . $id);
            exit;
        }
    } else {
        $_SESSION["error"] = implode(" ", $fouten);
        header("Location: /p3_php/Hoofdopdracht/pages/edit.php?id=" . $id);
        exit;
    }

} else {
    header("Location: /p3_php/Hoofdopdracht/pages/home.php");
    exit;
}