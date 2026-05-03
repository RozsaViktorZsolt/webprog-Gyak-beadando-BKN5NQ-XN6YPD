<?php
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("SELECT * FROM versenyzok WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $adat = $stmt->fetch();
}
?>

<h2>Versenyző szerkesztése</h2>
<form action="index.php?oldal=crud_update" method="post">
    <input type="hidden" name="id" value="<?= $adat['id'] ?>">
    <p>Név: <input type="text" name="nev" value="<?= htmlspecialchars($adat['nev']) ?>"></p>
    <p>Csapat: <input type="text" name="csapat" value="<?= htmlspecialchars($adat['csapat']) ?>"></p>
    <p>Életkor: <input type="number" name="eletkor" value="<?= $adat['eletkor'] ?>"></p>
    <button type="submit">Módosítás mentése</button>
</form>
