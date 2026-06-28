<?php
session_start();
$_SESSION['user'] = "waleed";
if (isset($_SESSION['user'])) {
    echo "<p>" . $_SESSION['user'] . "</p>";
    unset($_SESSION['user']);
    exit();
}


?>