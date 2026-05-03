<?php
$host = 'localhost';
$dbname = 'forma1_gyak';
$user = 'forma_1gyak';
$pass = 'Kukamatyi1';
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Hiba az adatbázis-kapcsolatban: " . $e->getMessage());
}
