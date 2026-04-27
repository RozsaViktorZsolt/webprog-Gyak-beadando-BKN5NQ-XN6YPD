<form action="?oldal=kapcsolat_mentes" method="post" onsubmit="return validateContact();">
    Név: <input type="text" name="nev" id="nev_id"><br>
    Email: <input type="text" name="email" id="email_id"><br>
    Üzenet: <textarea name="szoveg" id="szoveg_id"></textarea><br>
    <input type="submit" value="Küldés">
</form>

<script>
function validateContact() {
    let nev = document.getElementById('nev_id').value;
    let email = document.getElementById('email_id').value;
    let uzenet = document.getElementById('szoveg_id').value;
    let errors = [];

    if(nev.length < 3) errors.push("A név túl rövid!");
    if(!email.includes("@")) errors.push("Érvénytelen email cím!");
    if(uzenet.trim() == "") errors.push("Az üzenet nem lehet üres!");

    if(errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}
</script>
