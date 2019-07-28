<?php 

include "koneksi.php";

$queryUpdateProd = " UPDATE komoditas SET
                    judul_kmdt = '".$_POST['namakomoditas']."',
                    deskripsi_kmdt = '".$_POST['deskripsikomoditas']."'
                    WHERE
                    id_kmdt = '".$_POST['id_kmdt']."'";

if (mysqli_query($koneksi, $queryUpdateProd)) {
    header("Location:edit_ukm.php?aksi=sukseskmdt&data=".$_POST['id_pmlk']."");
} else {
    header("Location:edit_ukm.php?aksi=gagal");;
}                   