<?php
// includes/kapcsolat_kuld.php
$hibak = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);

    // PHP Validáció
    if (empty($nev) || strlen($nev) < 3) $hibak[] = "Érvénytelen név!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Érvénytelen e-mail!";
    if (empty($uzenet) || strlen($uzenet) < 10) $hibak[] = "Túl rövid üzenet!";

    if (count($hibak) == 0) {
        // Mentés az adatbázisba
        $sql = "INSERT INTO uzenetek (nev, email, uzenet, datum) VALUES (:nev, :email, :uzenet, NOW())";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':nev' => $nev,
            ':email' => $email,
            ':uzenet' => $uzenet
        ]);
        // Átirányítás egy köszönő oldalra vagy üzenet megjelenítése
        header("Location: index.php?oldal=kapcsolat_siker");
        exit;
    }
}
?>
