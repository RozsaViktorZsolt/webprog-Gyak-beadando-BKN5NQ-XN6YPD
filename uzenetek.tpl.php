<table>
    <tr>
        <th>Időpont</th>
        <th>Küldő</th>
        <th>Üzenet</th>
    </tr>
    <?php foreach($uzenetek as $u): ?>
    <tr>
        <td><?= $u['idopont'] ?></td>
        <td><?= (!empty($u['felhasznalo_nev'])) ? $u['felhasznalo_nev'] : "Vendég" ?></td>
        <td><?= htmlspecialchars($u['szoveg']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
