<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>POST Test</title>
</head>
<body>

<form method="POST" action="post-test.php">
    <input id="titel" name="titel" type="text">
    <button type="submit">Verzenden</button>
</form>

<pre>   
<?php  // pre om het netjes onder elkaar
print_r($_POST);  // om het zelfde afbelding als mijn docent kte krijgen
 // met _ is bedoel om de hele form te roppen 
?>
</pre>

<?php
$titel = $_POST['titel'] ?? ''; 
echo $titel;
?>

</body>
</html>