if ($jelszo_ok) {
    $_SESSION['login'] = $user['login_nev'];
    $_SESSION['csn'] = $user['csaladi_nev']; // Adatbázis 'csaladi_nev' oszlopa
    $_SESSION['un'] = $user['uto_nev'];      // Adatbázis 'uto_nev' oszlopa
    header("Location: index.php");
}
