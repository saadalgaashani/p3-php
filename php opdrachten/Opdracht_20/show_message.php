<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Flash message</title>
</head>
<body>

<h1>Flash message test</h1>

<?php if (isset($_SESSION['flash'])): ?>
    <p><?php echo $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); ?>
     <?php else: ?>
    <p>Geen melding gevonden.</p>
      <?php endif; ?>

</body>
</html>