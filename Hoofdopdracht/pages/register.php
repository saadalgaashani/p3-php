<?php
session_start();

require __DIR__ . "/../includes/header.php"; 
    require __DIR__ . "/../includes/bezoek_nav.php";
require __DIR__ . "/../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $wachtwoord = trim($_POST['wachtwoord'] ?? '');

    if (empty($username) || empty($wachtwoord)) {
        echo "<p>Fout: Alle velden zijn verplicht!</p>";
        exit;
    }



    if (strlen($username) < 3) {
        echo "<p>Fout: Gebruikersnaam moet minimaal 3 karakters hebben.</p>";
        exit;
    }
    
    $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :wachtwoord)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':wachtwoord' => $hash
    ]);
    
    echo "<p>Gebruiker succesvol toegevoegd!</p>";
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
</head>
<body>
    <form method="POST">
        <label>username</label><br>
        <input 
            type="text" 
            name="username" 
            maxlength="50"
            value="<?php echo isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : ""; ?>"
        >
        <br>
        
        <label>wachtwoord</label><br>
        <input 
            type="password" 
            id="wachtwoord" 
            name="wachtwoord" 
            maxlength="50"
       >
       <br>

       <input type="checkbox" id="toonWachtwoord">
       <label for="toonWachtwoord">zichtbaar maken</label>
       <br><br>

        <button type="submit">registreren</button>
    </form>

    

</body>
</html>
<?php require __DIR__ . "/../includes/footer.php"; ?>