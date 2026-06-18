<?php
$wachtwoord = "geheim123";
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

echo $hash;
?>  