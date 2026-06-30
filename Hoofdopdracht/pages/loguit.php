<?php
session_start();
session_destroy();
header("Location: /p3_php/Hoofdopdracht/pages/login.php");
exit;
?>