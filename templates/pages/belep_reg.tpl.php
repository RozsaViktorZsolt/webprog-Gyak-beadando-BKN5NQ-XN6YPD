<section class="auth-container">
    <div class="login-box">
        <h2>Bejelentkezés</h2>
        <form action="?oldal=beleptet" method="post">
            <input type="text" name="felhasznalo" placeholder="Felhasználónév" required>
            <input type="password" name="jelszo" placeholder="Jelszó" required>
            <button type="submit">Belépés</button>
        </form>
    </div>

    <hr>

    <div class="register-box">
        <h2>Regisztráció</h2>
        <form action="?oldal=regisztral" method="post">
            <input type="text" name="csaladi_nev" placeholder="Családi név" required>
            <input type="text" name="uto_nev" placeholder="Utónév" required>
            <input type="text" name="felhasznalo" placeholder="Felhasználónév (Login)" required>
            <input type="password" name="jelszo" placeholder="Jelszó" required>
            <button type="submit">Regisztráció</button>
        </form>
    </div>
</section>
