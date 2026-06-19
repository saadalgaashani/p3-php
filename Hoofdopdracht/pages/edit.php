<?php
session_start();

// We linken naar de bestaande database verbindingbestand
require_once __DIR__ . "/../includes/db.php";
// We linken alvast de header en nav voor de lay-out van je app
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/nav.php";

// Stap 1 – ID ontvangen via de URL om te kunnen bepalen welke item wel je roepen.
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Stap 2 – Data ophalen met een prepared statement uit tabel 'items'
        $stmt = $conn->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


        $item = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Query fout: " . $e->getMessage();
    }
}
?>

<div class="container" style="margin: 20px;">
    <h1>Notitie Aanpassen (Edit)</h1>

    <?php 
    // Controleer of het item daadwerkelijk ( beteken of het all bestaaat) bestaat in de database
    if (isset($item) && $item) { ?>
        
<form action="../edit_verwerk.php" method="POST" style="max-width: 500px;">            
    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    <div style="margin-bottom: 15px;">
        <label for="titel">Titel:</label><br>
        <input type="text" id="titel" name="titel" class="edit-field" value="<?= htmlspecialchars($item['titel']) ?>" readonly required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="datum">Datum:</label><br>
        <input type="text" id="datum" name="datum" class="edit-field" value="<?= htmlspecialchars($item['datum']) ?>" readonly required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="status">Status:</label><br>
        <input type="text" id="status" name="status" class="edit-field" value="<?= htmlspecialchars($item['status']) ?>" readonly style="width: 100%; padding: 8px;">
    </div>

    <button id="editBtn" type="button" class="btn" style="padding: 10px 20px; background-color: #555; color: white; border: none; border-radius: 4px; cursor: pointer;">Bewerken</button>
    
    <button id="saveBtn" type="submit" class="btn btn-primary" style="display: none; padding: 10px 20px;">Opslaan</button>
    
    <a href="home.php" style="margin-left: 10px; color: lightblue;">Annuleren</a>
</form>

    <?php } else if (isset($_GET['id'])) { ?>
        
        <p style="color: red;">Er is geen notitie gevonden met ID: <?= htmlspecialchars($_GET['id']) ?></p>
        <a href="home.php" style="color: lightblue;">Terug naar overzicht</a>
        
    <?php } else { ?>
        
        <p style="color: orange;">Geen ID meegegeven in de URL! Type bijvoorbeeld '?id=1' achter de link.</p>
        <a href="home.php" style="color: lightblue;">Terug naar overzicht</a>
        
    <?php } ?>
</div>

<?php 
// Sluit netjes af met de footer
require_once __DIR__ . "/../includes/footer.php"; 
?>