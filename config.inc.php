$dbh = new PDO('mysql:host=localhost;dbname=ADATBÁZIS_NEVE', 'FELHASZNÁLÓNÉV', 'JELSZÓ',
      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
