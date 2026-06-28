<?php 
session_start();




$_SESSION['user'] = "saad";

if (isset($_SESSION['user'])) {
    echo "<p>" . $_SESSION['user'] . "</p>";
    unset($_SESSION['user']);
 exit();
} 

?>