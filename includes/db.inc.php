<?php
$host = 'localhost';
$dbname = 'nbibeadando';
$user = 'nbibeadando';
$pass = 'XN6JPD';
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Hiba az adatbázis-kapcsolatban: " . $e->getMessage());
}
