Forma–1 Adatbázis Kezelő Webalkalmazás

Funkciók

- Bejelentkezési rendszer: Biztonságos regisztráció és belépés jelszó-hasheléssel.
- Képgaléria: Dinamikus képfeltöltési lehetőség bejelentkezett felhasználóknak.
- Kapcsolati űrlap: Üzenetküldési lehetőség JavaScript és PHP validációval, adatbázisba mentéssel.
- Üzenetek megtekintése: Csak bejelentkezett felhasználók számára elérhető lista a beérkezett üzenetekről.
- CRUD Modul: Pilóták adatainak listázása, új pilóta felvétele, módosítása és törlése.
- Multimédia:YouTube és saját videók beágyazása, Google Térkép integráció.

 Alkalmazott technológiák

- Backend: PHP (PDO az adatbázis-kezeléshez)
- Frontend: HTML5, CSS3 (Flexbox), JavaScript
- Adatbázis: MySQL
- Szerver: Nethely tárhely környezet
 Projekt felépítése

- `/includes`: Adatbázis kapcsolat és segédfájlok.
- `/templates`: Megjelenítésért felelős sablonok (Header, Footer, Index).
- `/templates/pages`: Az egyes aloldalak logikája és HTML kódja.
- `/images`: Feltöltött képek és statikus média elemek.
- `/css`: Stíluslapok.
- `/js`: Kliensoldali szkriptek.

Telepítés

1. Töltse fel a fájlokat egy PHP-képes webszerverre.
2. Importálja a `sql` fájlt az adatbázisba.
3. Konfigurálja az `includes/db.inc.php` fájlt a saját adatbázis-hozzáféréseivel.
