<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projektmunka</title>
    <link rel="stylesheet" href="./css/stilus.css">
</head>
<body>
    <header>
        <?php if(isset($_SESSION['login'])) { ?>
            <p>Bejelentkezett: <?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></p>
        <?php } ?>
        <nav>
            <ul>
                <?php foreach ($oldalak as $ut => $oldal) { 
                    // Logika a menüpontok megjelenítésére jogosultság szerint
                    if (($oldal['menun'][0] && !isset($_SESSION['login'])) || 
                        ($oldal['menun'][1] && isset($_SESSION['login']))) { ?>
                        <li><a href="index.php?oldal=<?= $ut ?>"><?= $oldal['szoveg'] ?></a></li>
                <?php } } ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php include("./templates/pages/{$keresett_oldal['fajl']}.tpl.php"); ?>
    </main>

    <footer>&copy; 2026 - Web-programozás 1 Projekt</footer>
</body>
</html>
