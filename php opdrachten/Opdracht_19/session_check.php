<?php 
session_start( );
$_SESSION['kleur'] = 'lila';

// wij slagen de data met session

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Test</title>
</head>
<body>
<h1>Session test</h1>
<p>
    Mijn opgeslagen waarde is:
    <?php
    echo $_SESSION['kleur']; ?>
</p>

</body>
</html>