
<?php 
session_start();

 require __DIR__ . "/../includes/header.php"; 
 require __DIR__ . "/../includes/nav.php"; 
 require __DIR__ . "/../includes/db.php";

$stmt = $conn->prepare("SELECT * FROM items ORDER BY id DESC");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


$appNaam = "Notities";
$trackerType = "Notitie Tracker";
$tagline = "Houd al je notities bij op één plek!";
?>





<h1>Welkom bij je <?php echo $appNaam; ?></h1>
<h2>Schrijf je ideeën op, zodat je nooit meer iets vergeet <?php echo $trackerType; ?></h2>
<p>Schrijf. Bewaar. Vergeet niets meer. <?php echo $tagline; ?></p>

<?php if (isset($_SESSION["success"])): ?>
    <div id="flash-message" class="flash success" style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">
        <?php echo htmlspecialchars($_SESSION["success"]); ?>
    </div>
    <?php unset($_SESSION["success"]); ?>
<?php endif; ?>

<?php if (isset($_SESSION["error"])): ?>
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
        <?php echo htmlspecialchars($_SESSION["error"]); ?>
    </div>
    <?php unset($_SESSION["error"]); ?>
<?php endif; ?>


<h2>Notities</h2>

<?php if (count($items) > 0): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <!-- htmlspecialchars om de hakers te voorkomen ( de code in het invulveld wordt normaal tekst) -->
                <?php echo htmlspecialchars($item["titel"]); ?>
                - <?php echo htmlspecialchars($item["datum"]); ?>
                - <?php echo htmlspecialchars($item["status"]); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Er zijn nog geen items toegevoegd.</p>
<?php endif; ?>

<?php require __DIR__ . "/../includes/footer.php"; ?>