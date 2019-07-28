<?php 

include "koneksi.php";

$queryUpdate = " UPDATE artikel SET
                kategori_artikel = '".$_POST['kategori_artikel']."',
                judul_artikel = '".$_POST['judul_artikel']."',
                desk_artikel = '".$_POST['desk_artikel']."',
                isi_artikel = '".$_POST['isi_artikel']."',
                desk_artikel = '".$_POST['desk_artikel']."' 
                WHERE
                id_artikel = '".$_POST['id_artikel']."' ";


if (mysqli_query($koneksi, $queryUpdate)) {
    header("Location:edit_ukm.php?aksi=suksesArtikel&data=".$_POST['pemilik_artikel']."");
} else {
    header("Location:edit_ukm.php?aksi=gagalArtikel");;
}
