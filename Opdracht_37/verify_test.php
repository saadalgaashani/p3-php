

<?php
$wachtwoord = "geheim123";
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
$test = "geheim123";
password_verify($test, $hash);

if (password_verify($test, $hash)) {
    echo "Correct wachtwoord";
} else {
    echo "ONjuist wachtwoord";

}

?>