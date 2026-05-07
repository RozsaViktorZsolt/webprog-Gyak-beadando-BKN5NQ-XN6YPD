<?php
    $MAPPA = './images/';
    $TIPUSOK = array ('.jpg', '.png', '.jpeg');
    $MEDIATIPUSOK = array('image/jpeg', 'image/png');
    $uzenet = array();

    if (isset($_SESSION['login']) && isset($_FILES['fajlok'])) {
        foreach($_FILES['fajlok']['name'] as $k => $nev) {
            $tipus = $_FILES['fajlok']['type'][$k];
            $meret = $_FILES['fajlok']['size'][$k];
            $tmp_nev = $_FILES['fajlok']['tmp_name'][$k];

            if ($meret > 2 * 1024 * 1024) {
                $uzenet[] = " Hiba: $nev túl nagy (max 2MB).";
            } elseif (!in_array($tipus, $MEDIATIPUSOK)) {
                $uzenet[] = " Hiba: $nev nem megfelelő típus (csak JPG, PNG).";
            } else {
                $cel = $MAPPA . strtolower($nev);
                if (file_exists($cel)) {
                    $uzenet[] = " Hiba: $nev már létezik a szerveren.";
                } else {
                    move_uploaded_file($tmp_nev, $cel);
                    $uzenet[] = " Sikeres feltöltés: $nev";
                }
            }
        }
    }

    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strrpos($fajl, ".")));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
    arsort($kepek);
?>
