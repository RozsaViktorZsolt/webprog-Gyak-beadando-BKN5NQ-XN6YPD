<div class="auth-wrapper">
    <section class="login-section">
        <h2>Bejelentkezés</h2>
        <form action="?oldal=beleptet" method="post">
            <input type="text" name="user" placeholder="Felhasználónév" required>
            <input type="password" name="pw" placeholder="Jelszó" required>
            <button type="submit">Belépés</button>
        </form>
    </section>

    <hr>

    <section class="register-section">
        <h2>Regisztráció</h2>
        <form action="?oldal=regisztral" method="post">
            <input type="text" name="csnev" placeholder="Családi név" required>
            <input type="text" name="unev" placeholder="Utónév" required>
            <input type="text" name="user" placeholder="Felhasználónév" required>
            <input type="password" name="pw" placeholder="Jelszó" required>
            <button type="submit">Regisztráció</button>
        </form>
    </section>
</div>
