<?php
if(isset($_POST['user']) && isset($_POST['pw']) && isset($_POST['csnev']) && isset($_POST['unev'])) {
    try {
        $sqlSelect = "SELECT id FROM felhasznalok WHERE bejelentkezes = :login";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':login' => $_POST['user']));
        
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználónév már foglalt!";
        } else {
            $sqlInsert = "INSERT INTO felhasznalok(csaladi_nev, uto_nev, bejelentkezes, jelszo) 
                          VALUES(:csnev, :unev, :login, :pw)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(
                ':csnev' => $_POST['csnev'], 
                ':unev' => $_POST['unev'],
                ':login' => $_POST['user'], 
                ':pw' => password_hash($_POST['pw'], PASSWORD_DEFAULT)
            )); 
            $uzenet = "Sikeres regisztráció! Most már bejelentkezhet.";
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba történt: " . $e->getMessage();
    }      
}
?>
<h3><?= $uzenet ?></h3>
<a href="?oldal=bejelentkezes">Vissza a belépéshez</a>
