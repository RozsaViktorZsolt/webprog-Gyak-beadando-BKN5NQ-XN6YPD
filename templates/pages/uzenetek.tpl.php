<?php
if (!isset($_SESSION['login'])) {
    die("Nincs jogosultsága az oldal megtekintéséhez!");
}

// Üzenetek lekérése fordított időrendben
$stmt = $dbh->query("SELECT nev, uzenet, kuldes_ideje FROM kapcsolat_uzenetek ORDER BY kuldes_ideje DESC");
?>

<h2>Beérkezett üzenetek</h2>
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
