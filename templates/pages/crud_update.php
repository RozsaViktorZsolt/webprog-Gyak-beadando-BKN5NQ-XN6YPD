<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $sql = "UPDATE versenyzok SET nev = ?, csapat = ?, eletkor = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_POST['nev'], $_POST['csapat'], $_POST['eletkor'], $_POST['id']]);
    
    header("Location: index.php?oldal=crud");
}
?>
