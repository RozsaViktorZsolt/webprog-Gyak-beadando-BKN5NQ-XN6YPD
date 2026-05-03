<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['csaladi_nev']) && isset($_POST['uto_nev'])) {
    require_once('db.php');
    try {
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználónév már foglalt!";
            $ujra = true;
        }
        else {
            $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                          values(0, :csaladi_nev, :uto_nev, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':csaladi_nev' => $_POST['csaladi_nev'], ':uto_nev' => $_POST['uto_nev'],
                                 ':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => password_hash($_POST['jelszo'], PASSWORD_DEFAULT))); 
            if($count = $stmt->rowCount()) {
                $uzenet = "Sikeres regisztráció! Most már bejelentkezhet.";
                $ujra = false;
            }
            else {
                $uzenet = "Sikertelen regisztráció!";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>

<h3><?= $uzenet ?></h3>
<?php if($ujra) { ?>
    <a href="?oldal=belepes">Próbálja újra!</a>
<?php } ?>
