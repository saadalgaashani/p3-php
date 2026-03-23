<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../includes/nav.php"; ?>
<?php require __DIR__ . "/../includes/db.php"; ?>

<?php
$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Notities</h1>

<?php if (count($items) > 0) { ?>
    <ul>
        <?php foreach ($items as $item) { ?>
            <li>
                <?= $item["titel"]; ?> - <?= $item["datum"]; ?> - <?= $item["status"]; ?>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>Er zijn nog geen items toegevoegd.</p>
<?php } ?>

<?php require __DIR__ . "/../includes/footer.php"; ?>