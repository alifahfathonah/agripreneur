<?php
include "cek_status_login.php";

echo "Selamat datang Admin  ".$_SESSION["nama"]." <br>";
echo "INI AFTER LOGIN ADMIN";


?>

<form action="halamanberita.php">
	<button> Ke halaman Berita</button>


</form>

<form action="pemilikberita.php">
	<button> Halaman berita yang anda Input </button>


</form>