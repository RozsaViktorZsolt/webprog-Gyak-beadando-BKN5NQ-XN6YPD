<?php
if(isset($_POST['user']) && isset($_POST['pw'])) {
    // Nem kell require, mert az index.php már betöltötte a $dbh-t
    try {
        $sqlSelect = "SELECT id, csaladi_nev, uto_nev, jelszo FROM felhasznalok WHERE bejelentkezes = :login";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':login' => $_POST['user']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);

        if($row && password_verify($_POST['pw'], $row['jelszo'])) {
            $_SESSION['csaladi_nev'] = $row['csaladi_nev'];
            $_SESSION['uto_nev'] = $row['uto_nev'];
            $_SESSION['login'] = $_POST['user'];
            $uzenet = "Üdvözöljük, " . $row['csaladi_nev'] . " " . $row['uto_nev'] . "!";
            header("Refresh: 2; url=.");
        } else {
            $uzenet = "Hibás felhasználónév vagy jelszó!";
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
    }      
}
?>
<h3><?= $uzenet ?></h3>
<?php if(!isset($_SESSION['login'])) : ?>
    <a href="?oldal=bejelentkezes">Próbálja újra</a>
<?php endif; ?>
