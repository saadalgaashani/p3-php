<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../includes/nav.php"; ?>

<h1>Toevoegen</h1>

<?php if (isset($_GET["error"])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_GET["error"]); ?></p>
<?php endif; ?>

<form method="POST" action="/p3_php/Hoofdopdracht/verwerk.php" id="mijnForm">
    <label for="titel">Titel:</label><br>
    <!-- for is om te linkelen met id -->
    <input 
        type="text" 
        id="titel" 
        name="titel" 
        required 
        maxlength="50"
        value="<?php echo isset($_GET["titel"]) ? htmlspecialchars($_GET["titel"]) : ""; ?>"
    >
    <br><br>

    <label for="status">Status:</label><br>
    <select name="status" id="status" required>
        <option value="">Kies een status</option>
        <option value="nieuw">Nieuw</option>
        <option value="bezig">Bezig</option>
        <option value="klaar">Klaar</option>
        <option value="belangrijk">Belangrijk</option>
    </select>
    <br><br>

<button type="submit" id="submitBtn">Verzenden</button>
</form>

<?php require __DIR__ . "/../includes/footer.php"; ?>