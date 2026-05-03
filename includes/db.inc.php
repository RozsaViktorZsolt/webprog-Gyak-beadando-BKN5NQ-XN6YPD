<?php
$host = 'localhost';
$dbname = '';
$user = '';
$pass = '';
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Hiba az adatbázis-kapcsolatban: " . $e->getMessage());
}
