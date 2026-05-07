function validateForm() {
    let nev = document.getElementById('nev').value;
    let email = document.getElementById('email').value;
    let uzenet = document.getElementById('uzenet').value;
    let hibak = [];

    if (nev.length < 5) {
        hibak.push("A névnek legalább 5 karakternek kell lennie!");
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        hibak.push("Érvénytelen e-mail cím!");
    }

    if (uzenet.trim() === "") {
        hibak.push("Kérjük, írjon be egy üzenetet!");
    }

    if (hibak.length > 0) {
        alert(hibak.join("\n"));
        return false;
    }
    return true;
}