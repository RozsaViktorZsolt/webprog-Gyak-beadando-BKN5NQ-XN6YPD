<?php
session_start();
require_once('./includes/db.inc.php');
require_once('./config.inc.php');

// Meghatározzuk melyik oldalt kell betölteni
$oldal = isset($_GET['oldal']) ? $_GET['oldal'] : 'fooldal';
if (!isset($oldalak[$oldal])) {
    $oldal = 'fooldal';
}
$keresett_oldal = $oldalak[$oldal];

include('./templates/index.tpl.php'); // Ez rajzolja ki az oldalt
?>
