<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webprog Projekt - BKN5NQ, XN6JPD</title>
    <link rel="stylesheet" href="./css/stilus.css">
</head>
<body>
    <header>
        <div class="user-bar">
            <?php if(isset($_SESSION['login'])): ?>
                <p>Bejelentkezett: <strong><?= htmlspecialchars($_SESSION['csaladi_nev'] . " " . $_SESSION['uto_nev'] . " (" . $_SESSION['login'] . ")") ?></strong></p>
            <?php endif; ?>
        </div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <?php foreach ($oldalak as $kod => $oldal): ?>
                        <?php 
                            // Menü megjelenítése a bejelentkezési állapot alapján
                            // menun[0] -> látható, ha nincs belépve
                            // menun[1] -> látható, ha be van lépve
                            $lathato = (!isset($_SESSION['login']) && $oldal['menun'][0]) || 
                                       (isset($_SESSION['login']) && $oldal['menun'][1]);
                            
                            if ($lathato): 
                        ?>
                            <li <?= (isset($_GET['oldal']) && $_GET['oldal'] == $kod) ? 'class="active"' : '' ?>>
                                <a href="index.php?oldal=<?= $kod ?>">
                                    <?= $oldal['szoveg'] ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <?php 
            $fajl = "./templates/pages/{$keresett_oldal['fajl']}.tpl.php";
            if(file_exists($fajl)) {
                include($fajl);
            } else {
                echo "<h2>Hiba: A sablonfájl nem található!</h2>";
                echo "<p>Hiányzó fájl: $fajl</p>";
            }
        ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> - Készítette: Rózsa Viktor Zsolt & Vass Zoltán</p>
    </footer>
    <script src="./js/validacio.js"></script>
</body>
</html>
