<?php
require_once('db.php');

$hibak = [];
$nev = trim($_POST['nev']);
$email = trim($_POST['email']);
$targy = trim($_POST['targy']);
$szoveg = trim($_POST['szoveg']);


if(strlen($nev) < 3) $hibak[] = "Érvénytelen név!";
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Érvénytelen e-mail!";
if(empty($targy)) $hibak[] = "Hiányzó tárgy!";
if(empty($szoveg)) $hibak[] = "Üres üzenet!";

if(empty($hibak)) {
    try {
        $sql = "INSERT INTO uzenetek (bejelentkezett_id, nev, email, targy, szoveg) VALUES (:bid, :nev, :email, :targy, :szoveg)";
        $stmt = $dbh->prepare($sql);
        
        $bid = null; 
        if(isset($_SESSION['login'])) {
            $s = $dbh->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes = ?");
            $s->execute([$_SESSION['login']]);
            $bid = $s->fetchColumn();
        }

        $stmt->execute([
            ':bid' => $bid,
            ':nev' => $nev,
            ':email' => $email,
            ':targy' => $targy,
            ':szoveg' => $szoveg
        ]);

        echo "<h3>Köszönjük az üzenetet!</h3>";
        echo "<p><b>Beküldött adatok:</b></p>";
        echo "Név: " . htmlspecialchars($nev) . "<br>";
        echo "Tárgy: " . htmlspecialchars($targy) . "<br>";
        echo "Üzenet: " . nl2br(htmlspecialchars($szoveg));
    } catch (PDOException $e) {
        echo "Hiba a mentés során: " . $e->getMessage();
    }
} else {
    foreach($hibak as $hiba) echo "<p style='color:red;'>$hiba</p>";
    echo "<a href='?oldal=kapcsolat'>Vissza az űrlaphoz</a>";
}
?>
