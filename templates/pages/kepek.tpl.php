<h2>Képgaléria</h2>

<?php if(isset($_SESSION['login'])): ?>
    <div class="feltoltes-box">
        <h3>Új kép feltöltése</h3>
        <form action="index.php?oldal=kepfeltoltes" method="post" enctype="multipart/form-data">
            <input type="file" name="fajl" required>
            <button type="submit">Feltöltés</button>
        </form>
    </div>
<?php endif; ?>

<div class="galeria">
    <?php
    $kepek = glob("uploads/*.{jpg,png,gif}", GLOB_BRACE);
    foreach($kepek as $kep) {
        echo '<img src="'.$kep.'" style="width:200px; margin:10px;">';
    }
    ?>
</div>
