<?php
session_start();
require __DIR__ . "/includes/db.php";

$sql = "SELECT * FROM users WHERE username = :username";
     $stmt = $conn->prepare($sql);
    $stmt->execute([
        'username' => $username,
        
    ]);

    $_SESSION['username'] = "username"; 

if (!isset($_SESSION['username'])) {
    echo "Niet ingelogd"; 

} else {
    echo "Welkom!";
     header("Location: /p3_php/Hoofdopdracht/verwerk.php");  

}
exit;

?>