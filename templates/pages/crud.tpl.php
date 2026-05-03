<h2>Forma-1 Adatkezelés</h2>
<a href="index.php?oldal=crud_add" class="btn">Add New</a>
<table>
    <tr>
        <th>Név</th>
        <th>Életkor</th>
        <th>Csapat</th>
        <th>Akciók</th>
    </tr>
    <?php
    $stmt = $dbh->query("SELECT * FROM versenyzok"); // A táblanevet ellenőrizd az SQL-edben!
    while($sor = $stmt->fetch(PDO::FETCH_ASSOC)):
    ?>
    <tr>
        <td><?= htmlspecialchars($sor['nev']) ?></td>
        <td><?= $sor['eletkor'] ?></td>
        <td><?= htmlspecialchars($sor['csapat']) ?></td>
        <td>
            <a href="index.php?oldal=crud_edit&id=<?= $sor['id'] ?>">Edit</a>
            <a href="index.php?oldal=crud_del&id=<?= $sor['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
