<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webprog Projekt - BKN5NQ, XN6JPD</title>
    <!-- Fontos: Ellenőrizd, hogy a Bootstrap vagy a saját CSS-ed nem rejti-e el a listát -->
    <link rel="stylesheet" href="./css/stilus.css">
</head>
<body>
    <header>
        <div class="user-bar">
            <?php if(isset($_SESSION['login'])): ?>
                <p>Bejelentkezett: <?= htmlspecialchars($_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")") ?></p>
            <?php endif; ?>
        </div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <?php foreach ($oldalak as $kod => $oldal): ?>
                        <?php if ($oldal['menun'][0]): // Megjelenítés, ha az első érték nem 0 ?>
                            <li <?= ($kod == $oldal['fajl'] || (isset($_GET['oldal']) && $_GET['oldal'] == $kod)) ? 'class="active"' : '' ?>>
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
        <p>&copy; 2026 - Készítette: Rózsa Viktor Zsolt & Vass Zoltán</p>
    </footer>
    <script src="./js/validacio.js"></script>
</body>
</html>
