<?php 
include "koneksi.php";

$querySelectArtikel = "SELECT * FROM artikel WHERE id_artikel = ".$_POST["id"]." ";
$hsl = mysqli_query($koneksi,$querySelectArtikel);
$rcrd = mysqli_fetch_assoc($hsl);

echo json_encode($rcrd);
