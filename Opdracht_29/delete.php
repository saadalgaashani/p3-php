<?php
// 1. Database verbinding maken
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

// CHECKLIST: ID ophalen met $_GET
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if ($id > 0) {
        try {
            // CHECKLIST: DELETE query uitvoeren met prepared statement
            $sql = "DELETE FROM taken WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            die("Fout bij verwijderen: " . $e->getMessage());
        }
    }
}

// CHECKLIST: Redirect na verwijderen terug naar de lijstpagina
header("Location: index.php");
exit;
?>
