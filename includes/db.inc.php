<?php
// includes/db.inc.php
$host = 'localhost';
$dbname = 'adatb'; // Ide a tárhelyen lévő adatbázis nevét írd
$user = 'adatbf';  // A tárhelyes felhasználóneved
$pass = '****';    // A jelszavad

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass,
                  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    die("Hiba az adatbázis csatlakozásnál: " . $e->getMessage());
}
?>
