<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['csaladi_nev']) && isset($_POST['uto_nev'])) {
    require_once('./includes/db.inc.php');
    try {
        // 1. Ellenőrizzük, létezik-e már a felhasználó
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználónév már foglalt!";
            $siker = false;
        } else {
            // 2. Mentés (FONTOS: password_hash használata!)
            $sqlInsert = "insert into felhasznalok (csaladi_nev, uto_nev, bejelentkezes, jelszo) 
                          values (:csn, :un, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':csn' => $_POST['csaladi_nev'],
                ':un' => $_POST['uto_nev'],
                ':bejelentkezes' => $_POST['felhasznalo'],
                ':jelszo' => password_hash($_POST['jelszo'], PASSWORD_DEFAULT)
            ));
            $uzenet = "Sikeres regisztráció! Most már bejelentkezhet.";
            $siker = true;
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
        $siker = false;
    }
}
?>
<h3><?= $uzenet ?></h3>
<?php if($siker): ?>
    <a href="index.php?oldal=belepes">Ugrás a bejelentkezéshez</a>
<?php else: ?>
    <a href="index.php?oldal=belepes">Próbálja újra a regisztrációt!</a>
<?php endif; ?>
