<h2>Kapcsolat</h2>
<form id="kapcsolatForm" action="index.php?oldal=kapcsolat_kuld" method="post" novalidate>
    <div class="form-group">
        <label for="nev">Név:</label>
        <input type="text" name="nev" id="nev">
        <span id="nevHiba" style="color:red;"></span>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email">
        <span id="emailHiba" style="color:red;"></span>
    </div>
    <div class="form-group">
        <label for="uzenet">Üzenet:</label>
        <textarea name="uzenet" id="uzenet"></textarea>
        <span id="uzenetHiba" style="color:red;"></span>
    </div>
    <button type="submit">Küldés</button>
</form>

<script>
document.getElementById('kapcsolatForm').onsubmit = function(e) {
    let valid = true;
    let nev = document.getElementById('nev').value;
    let email = document.getElementById('email').value;
    let uzenet = document.getElementById('uzenet').value;

    // Töröljük az előző hibákat
    document.getElementById('nevHiba').innerText = "";
    document.getElementById('emailHiba').innerText = "";
    document.getElementById('uzenetHiba').innerText = "";

    if (nev.length < 3) {
        document.getElementById('nevHiba').innerText = "A név túl rövid!";
        valid = false;
    }
    if (!email.includes('@')) {
        document.getElementById('emailHiba').innerText = "Érvénytelen e-mail cím!";
        valid = false;
    }
    if (uzenet.length < 10) {
        document.getElementById('uzenetHiba').innerText = "Az üzenet legalább 10 karakter legyen!";
        valid = false;
    }

    if (!valid) {
        e.preventDefault(); // Megállítja a küldést, ha hiba van
    }
};
</script>
