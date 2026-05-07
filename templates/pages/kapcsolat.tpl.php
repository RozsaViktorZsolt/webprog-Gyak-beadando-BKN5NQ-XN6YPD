<?php
$hibak = [];
$siker = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);

    if (strlen($nev) < 5) {
        $hibak[] = "A név legalább 5 karakter hosszú kell legyen!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Érvénytelen e-mail cím formátum!";
    }
    if (empty($uzenet)) {
        $hibak[] = "Az üzenet nem lehet üres!";
    }

    if (empty($hibak)) {
        try {
            $sql = "INSERT INTO uzenetek (nev, email, uzenet, datum) VALUES (:nev, :email, :uzenet, NOW())";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':nev' => $nev,
                ':email' => $email,
                ':uzenet' => $uzenet
            ]);
            $siker = true;
        } catch (PDOException $e) {
            $hibak[] = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}
?>

<section class="contact-container">
    <h2>Kapcsolat</h2>

    <?php if ($siker): ?>
        <div class="success-msg">Üzenetét sikeresen elküldtük!</div>
    <?php endif; ?>

    <?php if (!empty($hibak)): ?>
        <div class="error-msg">
            <ul>
                <?php foreach ($hibak as $hiba): ?>
                    <li><?= $hiba ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form name="kapcsolatForm" action="?oldal=kapcsolat" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="nev">Név:</label>
            <input type="text" id="nev" name="nev">
        </div>
        <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="uzenet">Üzenet:</label>
            <textarea id="uzenet" name="uzenet" rows="5"></textarea>
        </div>
        <button type="submit">Küldés</button>
    </form>
</section>