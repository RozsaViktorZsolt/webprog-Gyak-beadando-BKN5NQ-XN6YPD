<?php
$MAPPA = './images/';
$TIPUSOK = array('.jpg', '.png', '.jpeg');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$uzenet = array();

if (isset($_SESSION['login']) && isset($_FILES['fajlok'])) {
    foreach($_FILES['fajlok']['name'] as $k => $nev) {
        $tipus = $_FILES['fajlok']['type'][$k];
        $meret = $_FILES['fajlok']['size'][$k];
        $tmp_nev = $_FILES['fajlok']['tmp_name'][$k];

        if ($meret > 2 * 1024 * 1024) {
            $uzenet[] = "Hiba: $nev túl nagy (max 2MB).";
        } elseif (!in_array($tipus, $MEDIATIPUSOK)) {
            $uzenet[] = "Hiba: $nev nem megfelelő típus (csak JPG, PNG).";
        } else {
            $cel = $MAPPA . strtolower($nev);
            if (file_exists($cel)) {
                $uzenet[] = "Hiba: $nev már létezik a szerveren.";
            } else {
                if(move_uploaded_file($tmp_nev, $cel)) {
                    $uzenet[] = "Sikeres feltöltés: $nev";
                } else {
                    $uzenet[] = "Hiba: Nem sikerült a fájlt a helyére mozgatni.";
                }
            }
        }
    }
}

$kepek = array();
if (file_exists($MAPPA) && is_dir($MAPPA)) {
    $olvaso = opendir($MAPPA);
    if ($olvaso) {
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
    } else {
        $uzenet[] = "Hiba: A mappát nem lehet megnyitni.";
    }
} else {
    $uzenet[] = "Hiba: Az 'images' mappa nem létezik.";
}
?>

<section class="gallery-container">
    <h2>F1 Képgaléria</h2>

    <?php if (isset($_SESSION['login'])) : ?>
        <div class="upload-form">
            <h3>Új kép feltöltése</h3>
            <form action="?oldal=kepek" method="post" enctype="multipart/form-data">
                <input type="file" name="fajlok[]" accept="image/*" multiple required>
                <button type="submit">Képek feltöltése</button>
            </form>
            <div class="messages">
                <?php foreach($uzenet as $u) echo "<p>$u</p>"; ?>
            </div>
        </div>
    <?php else : ?>
        <p class="info-msg"><i>Jelentkezzen be, ha szeretne képeket feltölteni!</i></p>
    <?php endif; ?>

    <div class="gallery-grid">
        <?php if(empty($kepek)): ?>
            <p>Még nincsenek képek a galériában.</p>
        <?php else: ?>
            <?php foreach($kepek as $fajl => $datum): ?>
                <div class="gallery-item">
                    <a href="<?= $MAPPA.$fajl ?>" target="_blank">
                        <img src="<?= $MAPPA.$fajl ?>" alt="<?= $fajl ?>">
                    </a>
                    <div class="item-info">
                        <span class="filename"><?= $fajl ?></span><br>
                        <span class="date"><?= date("Y-m-d H:i", $datum) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>