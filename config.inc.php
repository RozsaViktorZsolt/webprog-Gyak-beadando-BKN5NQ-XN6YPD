<?php
$oldalak = array(
    'fooldal' => array('fajl' => 'fooldal', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)), // Csak belépve (0,1)
    'crud' => array('fajl' => 'crud', 'szoveg' => 'CRUD', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Bejelentkezés', 'menun' => array(1,0)), // Csak kijelentkezve
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1))  // Csak bejelentkezve
);

$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>
