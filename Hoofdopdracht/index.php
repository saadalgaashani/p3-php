<?php // Mijn mini-app wordt een: Notities //--> ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notities</title>
    <?php

$appNaam = "Notities";
$trackerType = "Notitie Tracker";
$tagline = "Houd al je notities bij op één plek!";



?>

</head>
<body>
    <h1>  
      Welkom bij je  <?php echo $appNaam; ?>
    </h1>
    <h2> Schrijf je ideeën op, zodat je nooit meer iets vergeet
        <?php echo $trackerType; ?>
    </h2>
    <p> Schrijf. Bewaar. Vergeet niets meer.
        <?php echo $tagline; ?>
    </p>
  <footer>
     
        <P>  <?php $today = date("Y"); echo $today; 
     $appNaam = "Notities";
        echo " - " . $appNaam; 
        
        
        
        
        
        ?>   </P>


        
     
     

     
    
</footer>
    
</body>
</html>