<?php
session_start( );
$_SESSION['flash'] = "Opgeslagen!";
header("Location: show_message.php");
exit;
?>