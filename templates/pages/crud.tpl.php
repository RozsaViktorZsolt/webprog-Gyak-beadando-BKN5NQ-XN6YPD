<?php
// Adatok lekérése
$stmt = $dbh->query("SELECT id, nev, csapat, eletkor, varos FROM pilotak");
$pilotak = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="crud-container">
    <a href="index.php?oldal=crud_uj" class="btn-add">Add New</a>
    <table>
        <thead>
            <tr>
                <th>Név</th>
                <th>Életkor</th>
                <th>Csapat</th>
                <th>Város</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pilotak as $pilota): ?>
            <tr>
                <td><?= htmlspecialchars($pilota['nev']) ?></td>
                <td><?= $pilota['eletkor'] ?></td>
                <td><?= htmlspecialchars($pilota['csapat']) ?></td>
                <td><?= htmlspecialchars($pilota['varos']) ?></td>
                <td>
                    <a href="index.php?oldal=crud_szerkeszt&id=<?= $pilota['id'] ?>" class="btn-edit">Edit</a>
                    <a href="index.php?oldal=crud_torol&id=<?= $pilota['id'] ?>" class="btn-delete" onclick="return confirm('Biztosan törlöd?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
