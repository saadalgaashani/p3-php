<?php
session_start();

$_SESSION['user'] = "admin";

if (!isset($_SESSION['user'])) {
    echo "Niet ingelogd";
} else {
    echo "Welkom!";
}



?>