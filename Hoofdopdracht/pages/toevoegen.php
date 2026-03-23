<h1>Toevoegen</h1>

<form method="POST" action="../verwerk.php">
    <label>Naam:</label><br>
    <input type="text" id="naam" name="naam" required maxlength="50"> <br>
    <small id="counter">0 / 50</small><br><br>


    <label>Aantal:</label><br>
    <input type="number" name="aantal"><br><br>

    <button type="submit">Verzenden</button>
</form>

<?php require __DIR__ . "/../includes/footer.php"; ?>