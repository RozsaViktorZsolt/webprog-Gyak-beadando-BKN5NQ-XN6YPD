<?php
$uzenet = "";
$hiba = "";
$szerkesztendo = null;

if (isset($_SESSION['login'])) {
    if (isset($_POST['action']) && $_POST['action'] == 'torol') {
        try {
            $sql = "DELETE FROM pilota WHERE az = :az";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':az' => $_POST['az']]);
            $uzenet = "A pilóta sikeresen törölve az adatbázisból.";
        } catch (PDOException $e) {
            $hiba = "Hiba a törlés során. Lehet, hogy már van hozzárendelt eredménye? Részletek: " . $e->getMessage();
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'mentes') {
        $nev = trim($_POST['nev']);
        
        if (empty($nev)) {
            $hiba = "A név megadása kötelező!";
        } else {
            try {
                if (empty($_POST['az'])) {
                    $sql = "INSERT INTO pilota (nev) VALUES (:nev)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([':nev' => $nev]);
                    $uzenet = "Új pilóta sikeresen rögzítve.";
                } else {
                    $sql = "UPDATE pilota SET nev = :nev WHERE az = :az";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([':nev' => $nev, ':az' => $_POST['az']]);
                    $uzenet = "A pilóta adatai frissítve.";
                }
            } catch (PDOException $e) {
                $hiba = "Hiba a mentés során: " . $e->getMessage();
            }
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'szerkeszt') {
        try {
            $sql = "SELECT * FROM pilota WHERE az = :az";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':az' => $_POST['az']]);
            $szerkesztendo = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $hiba = "Hiba az adatok betöltésekor: " . $e->getMessage();
        }
    }
}

$pilotak = [];
try {
    $stmt = $dbh->query("SELECT * FROM pilota ORDER BY nev ASC");
    $pilotak = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Hiba a lista betöltésekor: " . $e->getMessage();
}
?>

<section class="crud-container">
    <h2>Forma-1 Pilóták (CRUD)</h2>

    <?php if ($uzenet): ?>
        <div class="success-msg"><?= $uzenet ?></div>
    <?php endif; ?>
    <?php if ($hiba): ?>
        <div class="error-msg"><?= $hiba ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['login'])): ?>
        <div class="form-box">
            <h3><?= $szerkesztendo ? 'Pilóta adatainak módosítása' : 'Új pilóta felvétele' ?></h3>
            <form action="?oldal=crud" method="POST">
                <input type="hidden" name="action" value="mentes">
                <input type="hidden" name="az" value="<?= $szerkesztendo ? $szerkesztendo['az'] : '' ?>">
                
                <div class="form-group">
                    <label for="nev">Pilóta neve:</label>
                    <input type="text" id="nev" name="nev" value="<?= $szerkesztendo ? htmlspecialchars($szerkesztendo['nev']) : '' ?>" required>
                </div>
                
                <button type="submit" class="btn-primary"><?= $szerkesztendo ? 'Módosítás mentése' : 'Felvétel' ?></button>
                <?php if ($szerkesztendo): ?>
                    <a href="?oldal=crud" class="btn-secondary">Mégse</a>
                <?php endif; ?>
            </form>
        </div>
    <?php else: ?>
        <p class="info-msg"><i>A pilóták szerkesztéséhez vagy törléséhez jelentkezzen be!</i></p>
    <?php endif; ?>

    <table class="crud-table">
        <thead>
            <tr>
                <th>Azonosító</th>
                <th>Név</th>
                <?php if (isset($_SESSION['login'])): ?>
                    <th class="actions-col">Műveletek</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pilotak)): ?>
                <tr>
                    <td colspan="3">Nincsenek adatok az adatbázisban.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($pilotak as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['az']) ?></td>
                        <td><?= htmlspecialchars($p['nev']) ?></td>
                        
                        <?php if (isset($_SESSION['login'])): ?>
                            <td class="actions">
                                <form action="?oldal=crud" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="action" value="szerkeszt">
                                    <input type="hidden" name="az" value="<?= $p['az'] ?>">
                                    <button type="submit" class="btn-edit">Szerkesztés</button>
                                </form>
                                
                                <form action="?oldal=crud" method="POST" style="display:inline-block;" onsubmit="return confirm('Biztosan törölni szeretné ezt a pilótát?');">
                                    <input type="hidden" name="action" value="torol">
                                    <input type="hidden" name="az" value="<?= $p['az'] ?>">
                                    <button type="submit" class="btn-delete">Törlés</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>