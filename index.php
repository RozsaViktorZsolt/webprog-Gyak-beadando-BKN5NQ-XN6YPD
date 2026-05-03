<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('./config.inc.php');
include('./includes/db.inc.php');
session_start();
// ... az oldalválasztó logika helye ...
include('./templates/index.tpl.php');
$keres = $oldalak['home'];
if (isset($_GET['oldal'])) {
    if (isset($oldalak[$_GET['oldal']]) && file_exists("./templates/pages/{$oldalak[$_GET['oldal']]['fajl']}.tpl.php")) {
        $keres = $oldalak[$_GET['oldal']];
    } else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }
}
include('./templates/index.tpl.php');
?>
