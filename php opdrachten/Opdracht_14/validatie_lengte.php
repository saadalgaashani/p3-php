<?php
$titel = "   Test  ";
$titel = trim($titel);
// trim vrwijdert spaties

if (strlen($titel) == 0 ) {
    echo "Titel is verplicht.";
} elseif (strlen($titel) <3) {
    echo "Titel moet minstens 3 tekens bevatten.";
} elseif(strlen($titel) > 50) {
    echo "Titel mag niet meer dan 50 tekens bevatten.";
}
else {
    
    echo "De titel is geldig." ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>