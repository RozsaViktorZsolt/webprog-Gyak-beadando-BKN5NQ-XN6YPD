if ($jelszo_ok) { // Ez a password_verify() eredménye
    $_SESSION['login'] = $_POST['felhasznalo'];
    $_SESSION['csn'] = $row['csaladi_nev']; // Ügyelj rá, hogy 'row' vagy 'user' a változóneved!
    $_SESSION['un'] = $row['uto_nev'];
    
    // Az átirányítás előtt fontos, hogy ne legyen semmilyen kiírás (echo) az oldalon
    header("Location: index.php");
    exit(); // Megállítjuk a scriptet az átirányítás után
}
