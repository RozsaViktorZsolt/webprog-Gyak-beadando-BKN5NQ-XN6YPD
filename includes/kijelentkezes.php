<?php
// Töröljük a munkamenet adatait
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

$uzenet = "Sikeresen kijelentkezett!";
?>
<h3><?= $uzenet ?></h3>
<p>Átirányítás a főoldalra...</p>
<script>setTimeout(function(){ window.location.href = "index.php"; }, 2000);</script>
