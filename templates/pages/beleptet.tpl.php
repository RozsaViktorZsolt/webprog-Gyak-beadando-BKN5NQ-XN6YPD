<h2>Bejelentkezés</h2>
<form action="index.php?oldal=beleptet" method="post">
    <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br><br>
    <input type="password" name="jelszo" placeholder="Jelszó" required><br><br>
    <button type="submit">Belépés</button>
</form>

<hr>
<h2>Regisztráció</h2>
<form action="index.php?oldal=regisztral" method="post">
    <input type="text" name="csn" placeholder="Családi név" required><br><br>
    <input type="text" name="un" placeholder="Utónév" required><br><br>
    <input type="text" name="login" placeholder="Felhasználónév" required><br><br>
    <input type="password" name="pw" placeholder="Jelszó" required><br><br>
    <button type="submit">Regisztráció</button>
</form>
