<?php 

include "koneksi.php";

$queryUpdateProd = " UPDATE produk SET
                    nama_produk = '".$_POST['namaProduk']."',
                    deskripsi_produk = '".$_POST['deskProduk']."',
                    kategori_produk = '".$_POST['kategoriProduk']."'
                    WHERE
                    id_produk = '".$_POST['id_produk']."'";

if (mysqli_query($koneksi, $queryUpdateProd)) {
    header("Location:edit_ukm.php?aksi=suksesProduk&data=".$_POST['pemilik_produk']."");
} else {
    header("Location:edit_ukm.php?aksi=gagal");;
}                   