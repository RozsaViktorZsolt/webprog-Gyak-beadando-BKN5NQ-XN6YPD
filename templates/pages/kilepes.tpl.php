<?php
$data = $_SESSION;
unset($_SESSION["login"]);
unset($_SESSION["csaladi_nev"]);
unset($_SESSION["uto_nev"]);
session_destroy();
?>
<h3>Kijelentkezett: <?= $data['csaladi_nev']." ".$data['uto_nev']." (".$data['login'].")" ?></h3>
<script>setTimeout(function(){ window.location.href = "."; }, 2000);</script>
