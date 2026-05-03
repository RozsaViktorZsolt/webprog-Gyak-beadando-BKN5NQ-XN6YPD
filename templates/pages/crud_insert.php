<?php
// includes/crud_insert.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = $_POST['nev'];
    $eletkor = $_POST['eletkor'];
    $csapat = $_POST['csapat'];
    $varos = $_POST['varos'];

    $sql = "INSERT INTO versenyzok (nev, eletkor, csapat, varos) VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nev, $eletkor, $csapat, $varos]);

    header("Location: index.php?oldal=crud");
    exit;
}
?>
