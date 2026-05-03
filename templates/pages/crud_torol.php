<?php
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("DELETE FROM versenyzok WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: index.php?oldal=crud");
?>
