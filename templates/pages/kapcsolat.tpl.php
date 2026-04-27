function ellenoriz() {
    var hiba = "";
    var email = document.getElementById("email").value;
    if (email.indexOf("@") == -1) { hiba += "Érvénytelen email!\n"; }
    // többi mező...
    if (hiba != "") { alert(hiba); return false; }
    return true;
}
