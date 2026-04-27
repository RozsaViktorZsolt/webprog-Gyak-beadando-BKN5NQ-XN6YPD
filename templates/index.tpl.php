<header>
    <h1>Weboldal címe</h1>
    <?php if(isset($_SESSION['login'])) : ?>
        <div class="user-info">
            Bejelentkezett: <?= $_SESSION['csaladi_nev']." ".$_SESSION['uto_nev']." (".$_SESSION['login'].")" ?>
        </div>
    <?php endif; ?>
</header>
