// Amikor sikeres a jelszó ellenőrzés:
$_SESSION['login'] = $felhasznalo['login'];
$_SESSION['csn'] = $felhasznalo['csaladi_nev']; // Az adatbázisodból jön
$_SESSION['un'] = $felhasznalo['uto_nev'];      // Az adatbázisodból jön
