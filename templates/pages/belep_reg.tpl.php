<div class="auth-container">
    <div class="login-box">
        <h2>Bejelentkezés</h2>
        <form action="?oldal=beleptet" method="post">
            <input type="text" name="user" placeholder="Felhasználónév" required><br>
            <input type="password" name="pw" placeholder="Jelszó" required><br>
            <button type="submit">Belépés</button>
        </form>
    </div>
    <hr>
    <div class="register-box">
        <h2>Regisztráció</h2>
        <form action="?oldal=regisztral" method="post">
            <input type="text" name="csnev" placeholder="Családi név" required><br>
            <input type="text" name="unev" placeholder="Utónév" required><br>
            <input type="text" name="user" placeholder="Felhasználónév" required><br>
            <input type="password" name="pw" placeholder="Jelszó" required><br>
            <button type="submit">Regisztráció</button>
        </form>
    </div>
</div>
