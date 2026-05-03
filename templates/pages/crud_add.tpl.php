<h2>Új versenyző hozzáadása</h2>
<form action="index.php?oldal=crud_insert" method="post" class="crud-form">
    <label>Név: <input type="text" name="nev" required></label><br>
    <label>Életkor: <input type="number" name="eletkor" required></label><br>
    <label>Csapat: <input type="text" name="csapat" required></label><br>
    <label>Város: <input type="text" name="varos"></label><br>
    <button type="submit" class="btn-save">Mentés</button>
    <a href="index.php?oldal=crud">Mégse</a>
</form>
