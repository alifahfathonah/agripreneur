<?php
include "koneksi.php";

$qgambar="SELECT image FROM gambar WHERE id_produk='".$_GET["id"]."'";
$hsl=mysqli_query($koneksi,$qgambar);
$dir="images/";	
    while ($row=mysqli_fetch_assoc($hsl)) {
	    	if (file_exists($dir.$row['image']))
	    		unlink($dir.$row['image']);
	    }


$sql="DELETE FROM produk WHERE id_produk='".$_GET["id"]."' ";
mysqli_query($koneksi,$sql);
header("Location: setelah_login.php");
?>