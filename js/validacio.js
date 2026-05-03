function validal() {
    let ok = true;
    const nev = document.getElementById('nev').value.trim();
    const email = document.getElementById('email').value.trim();
    const targy = document.getElementById('targy').value.trim();
    const szoveg = document.getElementById('szoveg').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    
    document.querySelectorAll('[id^="error_"]').forEach(el => el.innerHTML = '');

    if (nev.length < 3) {
        document.getElementById('error_nev').innerHTML = 'A név túl rövid!';
        ok = false;
    }
    if (!emailRegex.test(email)) {
        document.getElementById('error_email').innerHTML = 'Érvénytelen e-mail cím!';
        ok = false;
    }
    if (targy === '') {
        document.getElementById('error_targy').innerHTML = 'Adja meg a tárgyat!';
        ok = false;
    }
    if (szoveg === '') {
        document.getElementById('error_szoveg').innerHTML = 'Az üzenet nem lehet üres!';
        ok = false;
    }
    return ok;
}
