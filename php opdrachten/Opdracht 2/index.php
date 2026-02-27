<?php

$ingelogd =true;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    saad is mijn naam
</h1>
    <?php

    if($ingelogd === true){
        echo  "je bent ingelogd";
    } else{
        echo  "je bent niet ingelogd";
    }
    ?>
    

    
</body>
</html>