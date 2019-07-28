<?php 
include "koneksi.php";

$querySelect = "SELECT * FROM ukm WHERE namaUKM = '".$_POST["id"]."' ";
$hsl = mysqli_query($koneksi,$querySelect);
$rcrd = mysqli_fetch_assoc($hsl);

echo json_encode($rcrd);
