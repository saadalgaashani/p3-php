

<?php 
$naam = trim($_POST['naam'] ?? '');
$leeftijd = trim($_POST['leeftijd'] ?? '');

if (empty($naam)) {
    echo "Naam is verplicht.";
    exit;

}elseif (strlen($naam) < 3) {
    echo "Naam moet minimaal 3 tekens bevatten.";
    exit;
}elseif (!is_numeric($leeftijd)) {
    echo "Leeftijd moet een getal zijn.";
    exit;
}
?>