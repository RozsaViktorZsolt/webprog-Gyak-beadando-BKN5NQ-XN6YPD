<?php
// Szerveroldali ellenőrzés (PHP)
$hibak = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);

    // Ellenőrzés: tilos a HTML 'required', ezért itt nézzük meg
    if (empty($nev)) $hibak[] = "A név kitöltése kötelező!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Hibás e-mail formátum!";
    if (strlen($uzenet) < 10) $hibak[] = "Az üzenetnek legalább 10 karakternek kell lennie!";

    if (count($hibak) == 0) {
        try {
            // Mentés az adatbázisba
            $sql = "INSERT INTO kapcsolat_uzenetek (nev, email, uzenet, kuldes_ideje) VALUES (:nev, :email, :uzenet, NOW())";
            $stmt = $dbh->prepare($sql); // A $dbh a PDO kapcsolatod
            $stmt->execute([
                ':nev' => $nev,
                ':email' => $email,
                ':uzenet' => $uzenet
            ]);
            $siker = "Az üzenetet sikeresen mentettük!";
        } catch (PDOException $e) {
            $hibak[] = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}
?>
