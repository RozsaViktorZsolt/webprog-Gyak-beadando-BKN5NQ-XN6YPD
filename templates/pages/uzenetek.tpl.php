<?php
if (!isset($_SESSION['login'])) {
    echo "<p class='info-msg'>Ehhez az oldalhoz csak bejelentkezett felhasználók férhetnek hozzá!</p>";
    return;
}

try {
    $sql = "SELECT nev, email, uzenet, datum FROM uzenetek ORDER BY datum DESC";
    $stmt = $dbh->query($sql);
    $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Hiba az üzenetek lekérdezésekor: " . $e->getMessage();
}
?>

<section class="messages-container">
    <h2>Beérkezett üzenetek</h2>

    <?php if (isset($hiba)): ?>
        <p class="error-msg"><?= $hiba ?></p>
    <?php elseif (empty($uzenetek)): ?>
        <p>Nincsenek még beérkezett üzenetek.</p>
    <?php else: ?>
        <table class="messages-table">
            <thead>
                <tr>
                    <th>Dátum</th>
                    <th>Név</th>
                    <th>E-mail</th>
                    <th>Üzenet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uzenetek as $uz): ?>
                    <tr>
                        <td><?= $uz['datum'] ?></td>
                        <td><?= htmlspecialchars($uz['nev']) ?></td>
                        <td><?= htmlspecialchars($uz['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($uz['uzenet'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>