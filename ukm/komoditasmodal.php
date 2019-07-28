<?php 
include "koneksi.php";

$querySelectKomoditas = "SELECT * FROM komoditas INNER JOIN `kmdt-prod` as tabelrelasi 
                        ON komoditas.id_kmdt = tabelrelasi.id_komoditas
                        INNER JOIN produk
                        ON tabelrelasi.id_produk = produk.id_produk
                        WHERE id_kmdt = '".$_POST["id"]."' AND pemilik_produk = '".$_POST["nama"]."'";
$hsl = mysqli_query($koneksi,$querySelectKomoditas);
$rcrd = mysqli_fetch_assoc($hsl);

echo json_encode($rcrd);