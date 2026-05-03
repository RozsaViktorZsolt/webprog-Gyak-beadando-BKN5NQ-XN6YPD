<?php
session_start(); 
include('config.inc.php');
include(dirname(__FILE__) . '/includes/db.inc.php');

if (isset($oldalak)) {
    echo "<!-- DEBUG: A tömb sikeresen betöltve -->";
} else {
    echo "<h1 style='color:red;'>HIBA: A config.inc.php továbbra sem töltődött be!</h1>";
}

$oldal = isset($_GET['oldal']) ? $_GET['oldal'] : 'fooldal';

if (isset($oldalak[$oldal])) {
    $keresett_oldal = $oldalak[$oldal];
} else {
    $keresett_oldal = $oldalak['fooldal'];
}

if (!isset($keresett_oldal['fajl']) || empty($keresett_oldal['fajl'])) {
    $keresett_oldal['fajl'] = 'home'; 
}

include('./templates/index.tpl.php');
?>
