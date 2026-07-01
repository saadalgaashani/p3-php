<?php
session_start();

// Omdat dit bestand in pages/ staat, moeten we omhoog met ../
require __DIR__ . "/../includes/header.php"; 
require __DIR__ . "/../includes/bezoek_nav.php";
require __DIR__ . "/../includes/db.php";

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $wachtwoord = trim($_POST['wachtwoord'] ?? '');

    if (empty($username) || empty($wachtwoord)) {
        $error_message = "Fout: Alle velden zijn verplicht!";
    } elseif (strlen($username) < 3) {
        $error_message = "Fout: Gebruikersnaam moet minimaal 3 karakters hebben.";
    } else {


        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            
            'username' => $username
        
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($wachtwoord, $user['password'])) {

            $_SESSION['user'] = $user['username']; 
            
            // Beiden staan in de map pages/, dus we kunnen direct naar home.php sturen
            header("Location: home.php");
            exit;
        } else {
            $error_message = "Fout: verkeerde gebruikersnaam of wachtwoord!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>
    <h2>Inloggen</h2>

    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Gebruikersnaam</label><br>
        <input 
            type="text" 
            name="username" 
            maxlength="50"
            value="<?php echo isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : ""; ?>"
        >
                    <!-- value is verkorting van if/else op een -->

        <br>
        
        <label>Wachtwoord</label><br>
        <input 
            type="password" 
            id="wachtwoord" 
            name="wachtwoord" 
            maxlength="50"
        >
        <br>

        <input type="checkbox" id="toonWachtwoord">
        <label for="toonWachtwoord">Zichtbaar maken</label>
        <br><br>

        <button type="submit">LOGIN</button> <br>
    </form> <br>

   
</body>
</html>

<?php require __DIR__ . "/../includes/footer.php"; ?>