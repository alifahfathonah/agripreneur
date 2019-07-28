<?php 
include "koneksi.php";

$querySelectProduk = "SELECT * FROM produk WHERE id_produk = ".$_POST["id"]." ";
$hsl = mysqli_query($koneksi,$querySelectProduk);
$rcrd = mysqli_fetch_assoc($hsl);

echo json_encode($rcrd);
