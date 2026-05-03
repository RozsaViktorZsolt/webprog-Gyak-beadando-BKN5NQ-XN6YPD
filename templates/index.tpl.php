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
            <p>Bejelentkezett: <?= htmlspecialchars($_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")") ?></p>
        <?php endif; ?>
    </div>
    <nav>
        <ul class="navbar">
            <?php foreach ($oldalak as $ut => $adat): ?>
                <?php if (($adat['menun'][0] && !isset($_SESSION['login'])) || ($adat['menun'][1] && isset($_SESSION['login']))): ?>
                    <li><a href="index.php?oldal=<?= $ut ?>" <?= ($oldal == $ut) ? 'class="active"' : '' ?>><?= $adat['szoveg'] ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

    <main>
        <?php 
            $fajl = "./templates/pages/{$keresett_oldal['fajl']}.tpl.php";
            if(file_exists($fajl)) include($fajl); 
        ?>
    </main>

    <footer>
        <p>&copy; 2026 - Készítette: Rózsa Viktor Zsolt & Vass Zoltán</p>
    </footer>
    <script src="./js/validacio.js"></script>
</body>
</html>
