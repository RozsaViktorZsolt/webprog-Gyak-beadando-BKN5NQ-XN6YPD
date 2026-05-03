<?php
$host = 'localhost'; 
$dbname = 'forma1_gyak'; 
$user = 'forma_1gyak'; 
$password = 'Kukamatyi1'; 

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Hiba az adatbázis-kapcsolatban: " . $e->getMessage());
}
?>
