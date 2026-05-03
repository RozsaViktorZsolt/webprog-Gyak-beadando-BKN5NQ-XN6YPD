<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webprog Projekt</title>
    <link rel="stylesheet" href="./css/stilus.css">
</head>
<body>
    <header>
        <?php if(isset($_SESSION['login'])): ?>
            <p>Bejelentkezett: <?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></p>
        <?php endif; ?>
        <nav>
            <ul class="main-menu">
                <?php foreach ($oldalak as $ut => $old): 
                    if (($old['menun'][0] && !isset($_SESSION['login'])) || 
                        ($old['menun'][1] && isset($_SESSION['login']))): ?>
                        <li><a href="index.php?oldal=<?= $ut ?>"><?= $old['szoveg'] ?></a></li>
                    <?php endif; 
                endforeach; ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php include("./templates/pages/{$keresett_oldal['fajl']}.tpl.php"); ?>
    </main>
</body>
</html>
