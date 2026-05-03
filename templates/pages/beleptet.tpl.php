<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    require_once('db.php');
    try {
        $sqlSelect = "select id, csaladi_nev, uto_nev, jelszo from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row && password_verify($_POST['jelszo'], $row['jelszo'])) {
            $_SESSION['csaladi_nev'] = $row['csaladi_nev'];
            $_SESSION['uto_nev'] = $row['uto_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
            $uzenet = "Üdvözöljük, " . $row['csaladi_nev'] . " " . $row['uto_nev'] . "!";
            $siker = true;
        } else {
            $uzenet = "Hibás felhasználónév vagy jelszó!";
            $siker = false;
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $siker = false;
    }      
}
?>

<h3><?= $uzenet ?></h3>
<?php if(!$siker) { ?>
    <a href="?oldal=belepes">Próbálja újra!</a>
<?php } else { ?>
    <script>setTimeout(function(){ window.location.href = "."; }, 2000);</script>
<?php } ?>
