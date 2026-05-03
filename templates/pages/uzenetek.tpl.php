<?php
// Adatok lekérése a módosításhoz az ID alapján
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("SELECT * FROM versenyzok WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $adat = $stmt->fetch();
}
?>

<h2>Versenyző szerkesztése</h2>
<form action="index.php?oldal=crud_update" method="post">
    <input type="hidden" name="id" value="<?= $adat['id'] ?>">
    <label>Név: <input type="text" name="nev" value="<?= htmlspecialchars($adat['nev']) ?>"></label><br>
    <label>Csapat: <input type="text" name="csapat" value="<?= htmlspecialchars($adat['csapat']) ?>"></label><br>
    <button type="submit">Módosítások mentése</button>
</form>
<div style="overflow-x:auto;">
    <table>
    <tr>
        <th>Küldő neve</th>
        <th>Üzenet</th>
        <th>Időpont</th>
    </tr>
    <?php while ($sor = $stmt->fetch()): ?>
    <tr>
        <td><?= empty($sor['nev']) ? "Vendég" : htmlspecialchars($sor['nev']) ?></td>
        <td><?= htmlspecialchars($sor['uzenet']) ?></td>
        <td><?= $sor['kuldes_ideje'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</div>
