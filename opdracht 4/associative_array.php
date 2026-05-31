<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
    $games = [
        [
            "title" => "GTA V",
            "genre" => "Action",
            "rating" => 8
        ],
        [
            "title" => "FIFA 25",
            "genre" => "Sport",
            "rating" => 7
        ],



    ];
    
    ?>
    <main><h1>Top 2 Games</h1>
    <h2> game 1 </h2>

    <p>Title: <?= $games[0]["title"]; ?></p>
    <p>Gnre: <?= $games[0]["genre"]; ?></p>
    <p>Rating: <?= $games[0]["rating"];?></p>

    <h2> game 2 </h2>

    <p>Title: <?= $games[1]["title"];?></p>
    <p>Gnre: <?= $games[1]["genre"];?></p>
    <p>Rating: <?= $games[1]["rating"];?></p>


</main>
    
</body>
</html>