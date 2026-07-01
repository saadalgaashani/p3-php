<?php
session_start();

$_SESSION['user'] = "testuser"; 
if (isset($_SESSION['user'])) {
    echo "Ingelogd";
} else {
    echo "Niet ingelogd";
}




?>