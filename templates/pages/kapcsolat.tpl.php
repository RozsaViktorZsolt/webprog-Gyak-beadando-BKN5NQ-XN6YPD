<form id="kapcsolatForm" action="index.php?oldal=kapcsolat_kuld" method="post">
    Név: <input type="text" name="nev" id="nev">
    E-mail: <input type="text" name="email" id="email">
    Üzenet: <textarea name="uzenet" id="uzenet"></textarea>
    <button type="submit">Küldés</button>
</form>

<script>
document.getElementById('kapcsolatForm').onsubmit = function(e) {
    let nev = document.getElementById('nev').value;
    if(nev.length < 3) {
        alert("A név túl rövid!");
        e.preventDefault();
    }
};
</script>
