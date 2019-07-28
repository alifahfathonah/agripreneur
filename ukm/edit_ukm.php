<?php 
include "koneksi.php";
include "cek_status_login.php";
$qSelectUKM = "SELECT * FROM ukm WHERE pemilik = '".$_SESSION["username"]."'";
        $hsl = mysqli_query($koneksi,$qSelectUKM);

if(isset($_POST["btnTambahProduk"])){
    $ext = explode('.', basename($_FILES['gambarProduk']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
                $target="img/".$new_img;
                if (move_uploaded_file($_FILES['gambarProduk']['tmp_name'], $target))
                    $gambarProduk = $new_img;
    
   
    $queryTambahProduk = "INSERT INTO produk VALUES('',
                          '".$_POST["inputNamaProduk"]."',
                          '".$_POST["inputDeskProduk"]."',
                          '".$_POST["inputPemilikProduk"]."',
                          '".$_POST["kategoriProduk"]."',
                          '".$gambarProduk."')";
    mysqli_query($koneksi,$queryTambahProduk);
    
    if($_POST["namakomoditas"] != ""){
     $ext = explode('.', basename($_FILES['gambar_kmdts']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
                $target="img/".$new_img;
                if (move_uploaded_file($_FILES['gambar_kmdts']['tmp_name'], $target))
                    $gambar = $new_img;

    $queryTambahKomoditas = "INSERT INTO komoditas VALUES ('',
                             '".$_POST["namakomoditas"]."',
                             '".$_POST["deskripsikomoditas"]."',
                             '".$gambar."')";
    mysqli_query($koneksi,$queryTambahKomoditas);
    $querySelectKomoditasRelasi = "SELECT * FROM komoditas WHERE judul_kmdt = '".$_POST["namakomoditas"]."' ";
    $hslSelectKomoditasRelasi = mysqli_query($koneksi,$querySelectKomoditasRelasi);
    $rcrdSelectKomoditasRelasi = mysqli_fetch_assoc($hslSelectKomoditasRelasi);
    $id_komoditas = $rcrdSelectKomoditasRelasi["id_kmdt"];

    $querySelectProdukRelasi = "SELECT * FROM produk WHERE nama_produk = '".$_POST["inputNamaProduk"]."' ";
    $hslSelectProdukRelasi = mysqli_query($koneksi,$querySelectProdukRelasi);
    $rcrdSelectProdukRelasi = mysqli_fetch_assoc($hslSelectProdukRelasi);
    $id_produk = $rcrdSelectProdukRelasi["id_produk"];

    $queryRelasi = "INSERT INTO `kmdt-prod` (id_produk,id_komoditas) VALUES ('".$id_produk."','".$id_komoditas."') ";
    mysqli_query($koneksi,$queryRelasi);

    }elseif($_POST["selectKomoditas"] != ""){
    $querySelectProdukRelasi = "SELECT * FROM produk WHERE nama_produk = '".$_POST["inputNamaProduk"]."' ";
    $hslSelectProdukRelasi = mysqli_query($koneksi,$querySelectProdukRelasi);
    $rcrdSelectProdukRelasi = mysqli_fetch_assoc($hslSelectProdukRelasi);
    $id_produk = $rcrdSelectProdukRelasi["id_produk"];

    $queryRelasi = "INSERT INTO `kmdt-prod` VALUES ('','".$id_produk."','".$_POST["selectKomoditas"]."') ";
    mysqli_query($koneksi,$queryRelasi);


    }
    header("Location:edit_ukm.php?data=".$_POST["inputPemilikProduk"]." ");
}

if(isset($_POST["btnUpdateUKM"])){
    $queryUpdateUKM = "UPDATE ukm SET 
                        deskripsi = '".$_POST["deskripsiUKM"]."'
                        WHERE
                        namaUKM = '".$_POST["namaUKM"]."'";
    mysqli_query($koneksi,$queryUpdateUKM);
    header("Location:edit_ukm.php?data=".$_POST["namaUKM"]."&aksiUKM=sukses");
}

if(isset($_POST["btnUpdateUser"])){

    $queryUpdateUser = "UPDATE user SET
                        `password` = '".$_POST["passwordUser"]."',
                        nama_mas = '".$_POST["namaUser"]."',
                        jk_mas = '".$_POST["jkUser"]."',
                        alamat_mas = '".$_POST["alamatUser"]."',
                        kota_mas = '".$_POST["kotaUser"]."',
                        notelp_mas = '".$_POST["teleponUser"]."', 
                        email_mas = '".$_POST["emailUser"]."' 
                        WHERE 
                        username = '".$_POST["usernameUser"]."' ";
    mysqli_query($koneksi,$queryUpdateUser);
    header("Location:edit_ukm.php?aksi=sukses");
    
}

if(isset($_GET["deleteProd"])){
    $queryDeleteKomoditasProduk = "DELETE FROM `kmdt-prod` WHERE id_produk = '".$_GET["deleteProd"]."'";
    mysqli_query($koneksi,$queryDeleteKomoditasProduk);
    $queryDeleteProduk = "DELETE FROM produk WHERE id_produk = '".$_GET["deleteProd"]."'";
    mysqli_query($koneksi,$queryDeleteProduk);
    header("Location:edit_ukm.php?data=".$_GET["ukm"]." ");
}
if(isset($_GET["deleteKmdt"])){
    
    $queryDeleteKomoditasProduk = "UPDATE `kmdt-prod` SET id_komoditas = 00 WHERE id_komoditas ='".$_GET["deleteKmdt"]."'";
    mysqli_query($koneksi,$queryDeleteKomoditasProduk);
    $queryDeleteKomoditas = "DELETE FROM komoditas WHERE id_kmdt = '".$_GET["deleteKmdt"]."'";
    mysqli_query($koneksi,$queryDeleteKomoditas);
    header("Location:edit_ukm.php?data=".$_GET["ukm"]." ");
}

if(isset($_GET["deleteArtikel"])){
    $queryDeleteProduk = "DELETE FROM artikel WHERE id_artikel = '".$_GET["deleteArtikel"]."'";
    mysqli_query($koneksi,$queryDeleteProduk);
    header("Location:edit_ukm.php?data=".$_GET["ukm"]." ");
}
// TAMBAH ARTIKEL
if (isset($_POST["submitArtikel"])) {
	$kategori_artikel = $_POST["kategoriArtikel"];
	$judul_artikel = $_POST["judulArtikel"];
	$desk_artikel = $_POST["deskripsiArtikel"];
	$isi_artikel = $_POST["isiArtikel"];
	$sumber_artikel = $_POST["sumberArtikel"];
	
	//path buatt store gambar yg udh dupload
    $ext = explode('.', basename($_FILES['gambarArtikel']['name']));//explode file name from dot(.) 
    $file_extension = end($ext); //store extensions in the variable
     $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
     $target="img/".$new_img;
     if (move_uploaded_file($_FILES['gambarArtikel']['tmp_name'], $target))
         $gambarArtikel = $new_img;

    $pemilik = $_POST["inputPemilikArtikel"];

    $queryInsertArtikel = "INSERT INTO artikel VALUES 
	   					('','$kategori_artikel','$judul_artikel','$desk_artikel','$isi_artikel','$sumber_artikel',NULL,'$pemilik','$gambarArtikel')";

	/*if (strpos($_SESSION["nama"], 'staff') !== false) {
	   	$qSelectId = "SELECT id FROM staff WHERE uname = '".$_SESSION["nama"]."' ";
	   	$hasil = mysqli_query($koneksi,$qSelectId);
	   	$value = mysqli_fetch_assoc($hasil);
	   	$pemilik = $value["id"];
	   	//query INSERT
	   	echo $queryInsert = "INSERT INTO artikel VALUES 
	   					('','$kategori_artikel','$judul_artikel','$desk_artikel','$isi_artikel','$sumber_artikel',$pemilik,NULL,'$image')";

	}else{
		$pemilik = $_SESSION["namaUKM"];
		echo $queryInsert = "INSERT INTO artikel VALUES 
	   					('','$kategori_artikel','$judul_artikel','$desk_artikel','$isi_artikel','$sumber_artikel',NULL,'$pemilik','$image')";
	}*/

    mysqli_query($koneksi,$queryInsertArtikel);
    

	//mindahin gambar yg diupload ke folder image
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "gambar udh keupload";
	}
	else
		$msg="ada masalah saat upload gambar";
	
	if (mysqli_affected_rows($koneksi) > 0) {
			echo "
				<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'pemilikberita.php';
				</script>
			";
	}else {
			echo "
				<script> 
					alert('data gagal ditambahkan!');
					document.location.href = 'pemilikberita.php';
				</script>
			";
        }
    
        
        header("Location:edit_ukm.php?data=".$_POST["inputPemilikArtikel"]." ");

}
//AKHIR TAMBAH ARTIKEL
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agripreneur</title>
    <!-- web-fonts -->

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/uploadgambar.css">
    <link href="css/chatbox.css" rel="stylesheet">  

<style type="text/css">
div.ex1 {
    background-color: white;
    width: auto;
    height: 600px;
    overflow: scroll;
}
.head-search {
    width : 400px;
padding: 0px;
    }
.modal-backdrop {
  z-index: -1;
}

.head-search .form-control {
    height : 40px;
    border-radius: 3px;
    }

.head-search .btn {
    padding : 10px 20px;
    }
</style>

</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="uc-mobile-menu-pusher">
<div class="content-wrapper">
<nav class="navbar m-menu navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="img/logo1-white.png" width="220" height="55"alt=""></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1">

            <ul class="nav-cta hidden-xs">
            </ul>

            <ul class="nav navbar-nav navbar-right main-nav">
            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Kategori
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="m-menu-content">
                            <ul class="col-md-6">
                                <li class="dropdown-header">Kuliner</li>
                                <li><a href="indexProduk.php?kategoriProduk=Makanan">Makanan</a></li>
                                <li><a href="indexProduk.php?kategoriProduk=Minuman">Minuman</a></li>
                                <li><a href="indexProduk.php?kategoriProduk=Camilan">Camilan</a></li>
                            </ul>
                            <ul class="col-md-6">
                                <li class="dropdown-header">Alat</li>           
                                <li><a href="indexProduk.php?kategoriProduk=Kriya">Kriya</a></li>
                                <li><a href="indexProduk.php?kategoriProduk=Teknologi">Teknologi</a></li>
                                <li><a href="indexProduk.php?kategoriProduk=Bahan%20Mentah">Bahan Mentah</a></li>
                            </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                            <div class="head-search">
                                <form role="form" method="get" action="index_search.php">
                                    <!-- Input Group -->
                                    <div class="input-group" >
                                        <input type="text" name="keyword" class="form-control" placeholder="Cari produk, komoditas, atau UKM">
                                            <span class="input-group-btn">
                                              <button type="submit" class="btn btn-hijau">

                                                <i class="fa fa-search" style="font-size:15px;color: white;"></i>
                                              </button>
                                            </span>

                                    </div>
                                </form>
                            </div>
                        </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Layanan Kami
                    <span><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu layanan">

                        <li><a href="">  <i class="  fas fa-dollar-sign"></i>Program dan Pendanaan</a></li>
                        <li><a href=""> <i class="  fas fa-file-alt"></i>Artikel dan Berita</a></li>
                        <li><a href=""> <i class='fas fa-chalkboard-teacher'></i>Jasa konsultasi</a></li>

                    </ul>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">UKM
                    <span><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu layanan">
                      <div class="m-menu-content">
                                <?php 
                                    while($rcrd2 = mysqli_fetch_assoc($hsl)){
                                        ?>
                                        <ul class="col-sm-12">
                                        <div class="mt-nav radius">
                                                <img class="radius" src="img/<?=$rcrd2["gambar"];?>"style="width: 40px; height: 40px;">
                                                <div class="badge profile">
                                                <a href="info_ukm.php?data=<?=$rcrd2["namaUKM"];?>" style="color: #57b846;"><?= $rcrd2["namaUKM"] ?></a>
                                                <a href="edit_ukm.php?data=<?=$rcrd2["namaUKM"];?>" style="color: #808080;">Pengaturan</a>
                                                <!-- <label class="block" style="color: #808080;">Masyarakat</label> -->
                                                </div>
                                        </div>
                                        </ul>
                                        <?php
                                    }
                                ?>
                            
                            </div>
                        

                    </ul>
                </li>
                
             <!--   <li class=""><a href="">Daftar</a></li>
                <li><a href="">Masuk</a></li> -->
                  <li class="akun dropdown m-menu-pr" data-toggle="dropdown" class="dropdown-toggle"><a href=""><img src="img/user.png"style="width: 20px; height: 20px; border-radius: 3px;"></a>

                     <ul class="dropdown-menu ">
                        <li class="profilee">
                            <a href="">
                            <label style="  color: #57b846;"><?= $_SESSION["username"]?></label>
                            </a>
                        </li>
                        <li><a href="edit_ukm.php">Pengaturan</a></li>
                        <li><a href="logout.php">Keluar</a></li>
                    </ul>

                  </li>
                
                
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->
<section class="centered">
    <div class="row bg-gray">
    <div class="col-md-2 sidebars">
        <div class="mt-3">
                 <img class="radius" src="img/user.png"style="width: 40px; height: 40px;">
                <div class="badge profile">
                    <a href="edit_ukm.php?" style="color: #57b846;"><?= $_SESSION["username"]?></a>
                    <a href="edit_ukm.php?" style="color: #808080;">User</a>
                   <!-- <label class="block" style="color: #808080;">Masyarakat</label> -->
                </div>
        </div>
        <?php 
        $qSelectUKM3 = "SELECT * FROM ukm WHERE pemilik = '".$_SESSION["username"]."'";
        $hsl3 = mysqli_query($koneksi,$qSelectUKM3);
        while($rcrd = mysqli_fetch_assoc($hsl3)){
            ?>
            <div class="mt-3">
                 <img class="radius" src="img/<?=$rcrd["gambar"];?>"style="width: 40px; height: 40px;">
                <div class="badge profile">
                    <a href="edit_ukm.php?data=<?=$rcrd["namaUKM"];?>" style="color: #57b846;"><?= $rcrd["namaUKM"] ?></a>
                    <a href="edit_ukm.php?data=<?=$rcrd["namaUKM"];?>" style="color: #808080;">UKM</a>
                   <!-- <label class="block" style="color: #808080;">Masyarakat</label> -->
                </div>
            </div>
            <?php

        }

        ?>
   
   
        
    </div>

    <div class="col-md-9 mainbars">
    <div class="flex-row mb-3">
        
    <i class="material-icons" style="font-size:30px; margin-right: 5px;">verified_user </i>
        <label style="font-size:18x; margin-top: 3px;"><?php 
        if(isset($_GET['data'])){
            echo $_GET['data'];
        }else
            echo $_SESSION["username"];
        ?></label>
    </div>
    <?php 
        if(isset($_GET["data"])){
            ?>
            <!-- AWAL NAVBAR TENGAH -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link tablinks active" onclick="openTab(event, 'informasiUKM')" href="#">Informasi UKM</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'produkUKM')" href="#">Produk Anda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'tambahProduk')" href="#">Tambah Produk</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'Komoditas')" href="#">Komoditas Anda</a>
                </li>
                <li class="nav-item ">
                <a class="nav-link tablinks" onclick="openTab(event, 'artikelUKM')" href="#">Artikel Anda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'tambahArtikel')" href="#">Tambah Artikel</a>
                </li>
            </ul>
            <!-- AKHIR NAVBAR TENGAH -->
        <?php
        }else
        {
            ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Informasi user</a>
                </li>
            </ul>
            <?php
        }
    ?>
        


    
        <?php
        if(isset($_GET["data"])){
        $querySelectUKMdata = "SELECT * FROM ukm WHERE namaUKM = '".$_GET["data"]."' ";
        $hsl1 = mysqli_query($koneksi,$querySelectUKMdata);
        $rcrdUKM = mysqli_fetch_assoc($hsl1);
?>
        <div class="tabcontent" style="display:block;" id="informasiUKM" ><!-- DIV TAB-->
        <div class="containerr">
        <?php 
            if(isset($_GET["aksiUKM"])){
                if($_GET["aksiUKM"] == "sukses")
                {
                ?>
                <br>
                <div class="alert alert-success" role="alert">
                            Update data UKM berhasil!
                            
                </div>
                <?php
                }
            }
            ?>
        <br>
        <h5>Informasi UKM</h5>
                <form action="" method="post">
                    <div class="form-row">
                        <label>Nama UKM </label>
                        <input name="namaUKM" type="text" value="<?= $rcrdUKM["namaUKM"] ?>" readonly>
                    </div>
                    <div class="form-row">
                        <label>Deskripsi</label>
                        <textarea rows="5" cols="20" name="deskripsiUKM"><?= $rcrdUKM["deskripsi"] ?> </textarea> 
                    </div>
                    <div class="form-row">
                        <label>Foto UKM</label>
                        <div style="margin-right:30%; " >
                        <img src="img/<?=$rcrdUKM["gambar"];?>" style="width:250px; height:auto">
                        </div><br/>
                    </div>
                    <br>
                    <hr>
                    <input  type="submit" name="btnUpdateUKM" value="Update Info UKM" />
                </form> 
        </div>
        </div> <!-- DIVAKHIR TAB-->

        <div class="tabcontent" id="produkUKM" style="display: none;">
            
            <div class="containerr">
            <h5>Produk UKM</h5>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col" colspan="1" style= "text-align:center;">Aksi</th>
                
                </tr>
            </thead>
            <tbody>
                
            <?php
            $querySelectProduk = "SELECT * FROM produk WHERE pemilik_produk = '".$_GET["data"]."'";
            $hasilProduk = mysqli_query($koneksi,$querySelectProduk);
            $nomor = 1;
            while($recrodProduk = mysqli_fetch_assoc($hasilProduk)){
                
                ?>
                <tr>
                <th scope="row"><?=$nomor ?></th>
                <td><?= $recrodProduk["nama_produk"] ?></td>
                <td><a href="pemeilikberita.php?id=<?=$recrodProduk["id_produk"];?>" class="badge badge-primary float-right ubahProduk" data-toggle="modal" data-target="#formModalProduk" data-id="<?= $recrodProduk["id_produk"] ?>">Update</a></td>
                
                <td><a href="edit_ukm.php?deleteProd=<?=$recrodProduk["id_produk"];?>&ukm=<?=$_GET["data"];?>" class="badge badge-danger float-right delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                </tr>
                <?php
                $nomor++;
            }


            ?>
               
            </tbody>
            </table>
            </div> 
        </div><!-- DIVAKHIR TAB-->
        <div class="tabcontent" id="tambahProduk" style="display: none;">
        <div class="containerr">
        <h5>Tambah Produk</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="inputPemilikProduk" value="<?=$_GET["data"]?>" hidden>
                    <div class="form-row">
                        <label>Kategori Produk  </label>
                        <select style="width:66%;" name="kategoriProduk">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Camilan">Camilan</option>
                            <option value="Kriya">Kriya</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Bahan Mentah">Bahan Mentah</option>

                        </select>
                    </div>
                    <div class="form-row">
                        <label>Nama Produk </label>
                        <input  type="text" name="inputNamaProduk">
                    </div>
                    <div class="form-row">
                        <label>Deskripsi Produk</label>
                        <textarea rows="5" cols="20" name="inputDeskProduk"> </textarea> 
                    </div>

                    <div>
                        <label>Komoditas</label>
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalBuatKomoditas" style="margin-left:230px;" >Tambah Komoditas Baru</button>
                        
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalPilihKomoditas" >Pilih Komoditas </button>
                    </div>
                    <!-- MODAL BUAT KOMODITAS -->
                    <div class="modal fade" id="modalBuatKomoditas" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Komoditas</h4>
                        </div>
                        <div class="modal-body">
                        Nama Komoditas : 
                        <input type="text" name = "namakomoditas">
                        <br>
                        <hr>
                        Deskripsi Komoditas : 
                        <input type="text" name = "deskripsikomoditas">
                        <br>
                        <hr>
                        Gambar Komoditas : 
                        <input type="file" name="gambar_kmdts">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Simpan Komoditas</button>
                        </div>
                    </div>
                    
                    </div>
                    </div>
                    <!-- AKHIR MODAL KOMODITAS-->
                     <!-- MODAL PILIH KOMODITAS -->
                     <div class="modal fade" id="modalPilihKomoditas" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pilih Komoditas</h4>
                        </div>
                        <div class="modal-body">
                        <?php 
                        $querySelectKomoditas = "SELECT * FROM komoditas";
                        $hslKomoditas = mysqli_query($koneksi,$querySelectKomoditas);
                        ?>
                        <select name="selectKomoditas">
                        <?php
                        while($rcrdKomoditas = mysqli_fetch_assoc($hslKomoditas)){
                            ?>
                            <option value = <?= $rcrdKomoditas["id_kmdt"]?>> <?= $rcrdKomoditas["judul_kmdt"]; ?> </option>
                            <?php
                        }
                        ?>
                        </select>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Simpan Komoditas</button>
                        </div>
                    </div>
                    
                    </div>
                    
                    </div>
                    <!-- AKHIR MODAL PILIH KOMODITAS-->
                    <br>
                    <div class="form-row">
                        <label>Gambar Produk</label>
                        <input type="file" name="gambarProduk" id="produk">
                    </div>
                    
                    <br>
                    <hr>
                    <input  type="submit" name="btnTambahProduk" value="Tambah Produk" />
                </form> 
        </div>
        </div><!-- DIVAKHIR TAB-->
        
        <div class="tabcontent" id="artikelUKM" style="display: none;">
        <div class="containerr">
            <h5>Artikel Anda</h5>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori Artikel</th>
                <th scope="col">Judul Artikel</th>
                <th scope="col" colspan="3" style= "text-align:center;">Aksi</th>
                
                </tr>
            </thead>
            <tbody>
                
            <?php
            $querySelectArtikel = "SELECT * FROM artikel WHERE user_ukm = '".$_GET["data"]."'";
            $hasilArtikel = mysqli_query($koneksi,$querySelectArtikel);
            $nomor = 1;
            while($recordArtikel = mysqli_fetch_assoc($hasilArtikel)){
                
                ?>
                <tr>
                <th scope="row"><?=$nomor ?></th>
                <td><?= $recordArtikel["kategori_artikel"] ?></td>
                <td><?= $recordArtikel["judul_artikel"] ?></td>
                <td><a href="pemeilikberita.php?id=<?=$recordArtikel["id_artikel"];?>" class="badge badge-primary float-right tampilModal" data-toggle="modal" data-target="#formModal" data-id="<?= $recordArtikel["id_artikel"] ?>">Readmore</a></td>
                <td><a href="pemeilikberita.php?id=<?=$recordArtikel["id_artikel"];?>" class="badge badge-primary float-right ubahModal" data-toggle="modal" data-target="#formModal" data-id="<?= $recordArtikel["id_artikel"] ?>">Update</a></td>
                
                <td><a href="edit_ukm.php?deleteArtikel=<?=$recordArtikel["id_artikel"];?>&ukm=<?=$_GET["data"];?>" class="badge badge-danger float-right delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                </tr>
                <?php
                $nomor++;
            }


            ?>
               
            </tbody>
            </table>
            
            </div> 
            
        </div><!-- DIVAKHIR TAB-->
        
        <div class="tabcontent" id="Komoditas">
                 <h5>Komoditas Anda</h5>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Komoditas</th>
                <th scope="col" colspan="1" style= "text-align:center;">Aksi</th>
                
                </tr>
            </thead>
            <tbody>
                
            <?php
              $querySelectKomoditas = "SELECT * FROM `kmdt-prod` as tabel1 INNER JOIN komoditas ON tabel1.id_komoditas = komoditas.id_kmdt
                                             INNER JOIN produk ON tabel1.id_produk = produk.id_produk
                                             WHERE produk.pemilik_produk = '".$_GET["data"]."'";
                    $hslSelectKomoditas = mysqli_query($koneksi,$querySelectKomoditas);
            $nomor = 1;
            while($recordKomoditas = mysqli_fetch_assoc($hslSelectKomoditas)){
                if($recordKomoditas["id_kmdt"] == 00){
                    
                }else{

               
                ?>
                <tr>
                <th scope="row"><?=$nomor ?></th>
                <td><?= $recordKomoditas["judul_kmdt"] ?></td>
                <td><a  class="badge badge-primary float-right ubahKomoditas" data-toggle="modal" data-target="#modalUpdateKomoditas" data-id="<?= $recordKomoditas["id_kmdt"] ?>" data-id-pmlk="<?=$_GET['data']?>">Update</a></td>
                
                <td><a href="edit_ukm.php?deleteKmdt=<?=$recordKomoditas["id_kmdt"];?>&ukm=<?=$_GET["data"];?>" class="badge badge-danger float-right delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                </tr>
                <?php
                $nomor++;
            }
            }


            ?>
               
            </tbody>
            </table>
              <div class="modal fade" id="modalUpdateKomoditas" role="dialog">
                    <div class="modal-dialog">
                    <form action="updateKomoditas.php" method="post">
                        
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Komoditas</h4>
                        </div>
                        <div class="modal-body">
                        <input type="text" id="id" name="id_kmdt" hidden>
                        <input type="text" id="id_pmlk" name="id_pmlk" hidden>
                        Nama Komoditas : 
                        <input class="form-control" type="text" name = "namakomoditas" id="nama_kmdt">
                        <br>
                        <hr>
                        Deskripsi Komoditas : 
                        <input  class="form-control" type="text" name = "deskripsikomoditas" id="deskripsi_kmdt">
                        <br>
                        <hr>
                        Gambar Komoditas : 
                        <img id="gambar_kmdt" style="width:100%;max-width:300px">
                        </div>
                        <div class="modal-footer">                                    
                      <button type="submit" name="submitKomoditas" class="btn btn-primary">Ubah</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>

                    </div>
                    </div>
        </div>

        <div class="tabcontent" id="tambahArtikel" style="display: none;">
        <div class="containerr">
        <h5>Tambah Artikel</h5>
        
        <div class="ex1">
        <form method="post"  enctype="multipart/form-data">
        <input type="text" name="inputPemilikArtikel" value="<?=$_GET["data"]?>" hidden>
                    Kategori Artikel : <br>
                      <select class="custom-select" name="kategoriArtikel">
                        <option selected>Pilih...</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Ilmiah">Ilmiah</option>
                    </select>
                    <hr>
                    Judul Artikel : <br>
                    <input type="text" name="judulArtikel" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"><p>
                    <hr>
                    Deskripsi Artikel : <br>
                    <input type="text" name="deskripsiArtikel" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"><p>
                    <hr>
                    Isi Artikel : <br>
                    <textarea class="form-control" rows="7" id="comment" name="isiArtikel"></textarea><p>
                    <hr>
                    Sumber Artikel : <br>
                    <input type="text" name="sumberArtikel" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"><p>
                    <input type="hidden" name="size" value="1000000">
                    <hr>
                    Gambar: <br>
                    <div>
                        <input type="file" name="gambarArtikel" id="gambarArtikel">
                    </div> 
                    <hr>
                    
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submitArtikel">Tambah Artikel !</button>


                </form></div>
                
        </div>
        </div><!-- DIVAKHIR TAB-->
<?php
        }else{
            //USER 
            $querySelectUserData = "SELECT * FROM user WHERE username = '".$_SESSION["username"]."' ";
            $hsl1 = mysqli_query($koneksi,$querySelectUserData);
            $rcrdUser = mysqli_fetch_assoc($hsl1);
            ?>
            
            <div class="containerr">
            <?php 
            if(isset($_GET["aksi"])){
                if($_GET["aksi"] == "sukses")
                {
                ?>
                <br>
                <div class="alert alert-success" role="alert">
                            Update data user berhasil!
                            
                </div>
                <?php
                }
            }
            ?>
            <br>
             <h5>Informasi User</h5>
                <form action="" method="post">
                    <div class="form-row">
                        <label>Username</label>
                        <input  name="usernameUser" type="text" readonly value="<?= $rcrdUser["username"] ?>">
                    </div>
                    <div class="form-row">
                        <label>Password</label>
                        <input name ="passwordUser" type="password" value="<?= $rcrdUser["password"] ?>">
                    </div>
                    <div class="form-row">
                        <label>Nama</label>
                        <input name ="namaUser" type="text" value="<?= $rcrdUser["nama_mas"] ?>">
                    </div>
                    <div class="form-row">
                        <label>Jenis Kelamin</label>
                        <input name ="jkUser" type="text" value="<?= $rcrdUser["jk_mas"] ?>"> 
                    </div>
                    <div class="form-row">
                        <label>Alamat</label>
                        <textarea name ="alamatUser" rows="5" cols="20" value=""><?= $rcrdUser["alamat_mas"] ?> </textarea>
                    </div>
                    <div class="form-row">
                        <label>Kota</label>
                        <input name ="kotaUser" type="text" value="<?= $rcrdUser["kota_mas"] ?>"> 
                    </div>
                    <div class="form-row">
                        <label>No Telepon</label>
                        <input  name="teleponUser"
                        size="3" title="" type="tel" value="<?= $rcrdUser["notelp_mas"] ?>">
                    </div>
                    <div class="form-row">
                        <label>Email</label>
                        <input name ="emailUser" type="email" value="<?= $rcrdUser["email_mas"] ?>"> 
                    </div>
                    <br>
                    <hr>
                    <input  type="submit" name="btnUpdateUser" value="Update Data" />
                </form>  
            <?php
        }
        ?>
        
    </div>

    </div>

</div>
<!-- MODALS LIHAT ARTIKEL-->  
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="artikelupdatedata.php" method="post">
                <div class="modal-body">
                <input type="text" name="pemilik_artikel" id="pemilik_artikel" style="display:none;">
                <input type="text" name="id_artikel" id="id_artikel" style="display:none;">
                Kategori Artikel : <br><br>
                <input class="form-control" name = "kategori_artikel" type="text" id="kategori_artikel" placeholder="Readonly input here…" readonly >
                <hr>
                Judul Artikel : <br><br>
                <input class="form-control" type="text" name = "judul_artikel" id="judul_artikel" placeholder="Readonly input here…" readonly>
                <hr>
                Deskripsi Artikel : <br><br>
                <input class="form-control" type="text" name = "desk_artikel" id="deskripsi_artikel" placeholder="Readonly input here…" readonly>
                <hr>
                Isi Artikel :
                <textarea class="form-control" name = "isi_artikel" id="isi_artikel" rows="3" readonly></textarea>
                <hr>
                Sumber Artikel : <br><br>
                <input class="form-control" type="text" name = "sumber_artikel" id="sumber_artikel" placeholder="Readonly input here…" readonly>
                <hr>
                Gambar : <br><br>
                <img id="gambar_artikel" style="width:100%;max-width:300px" src="images/">
                
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnSave" type="submit" class="btn btn-primary" style=display:none;>Save changes</button>
                </div>
                </form>
                </div>
            </div>
            </div>
  
<!-- AKHIR MODALS -->

<!-- MODALS PRODUK -->
  <!-- Modal -->
  <form action="produkupdatedata.php" method="post">
  <div class="modal fade" id="formModalProduk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Produk</h4>
        </div>
        
        <div class="modal-body">
        <input type="text" id="id_produk" name="id_produk" hidden>
        <input type="text" id="pemilik_produk" name="pemilik_produk" hidden>
        Kategori Produk : <br>
        <select style="width:100%; height:auto; padding : 7px; border-radius:5px;" name="kategoriProduk" id="kategoriProduk">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Camilan">Camilan</option>
                            <option value="Kriya">Kriya</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Bahan Mentah">Bahan Mentah</option>

        </select>
        <hr>
        Nama Produk : <br>
        <input class="form-control" id="namaProduk" type="text" placeholder="Default input" name="namaProduk">
        <hr>
        Deskripsi Produk : <br>
        <input class="form-control" id="deskProduk" type="text" placeholder="Default input" name="deskProduk">
        <hr>
        Gambar : <br><br>
        <img id="gambar_produk" style="width:100%;max-width:300px" src="images/">
        <hr>

        
       
        
        </div>
        <div class="modal-footer">
          <button type="submit" name="submitProduk" class="btn btn-primary">Ubah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>
  </form>
<!-- AKHIR MODALS PRODUK -->
</section>

<div class="chatbox chatbox--tray">
    <div class="chatbox__title">
        <h5><a href="#">Chat Admin</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--right">
            <img src="img/user.png" alt="Picture">
            <p>Hey </p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="img/user.png" alt="Picture">
            <p>iya, ada yang bisa dibantu ?</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
            <img src="img/user.png" alt="Picture">
            <p>Hey Tayo Hey Tayo</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="img/user.png" alt="Picture">
            <p>*******</p>
        </div>
    </div>
    <textarea class="chatbox__message" placeholder="Tulis Pesan"></textarea>
</div>



<footer class="footer">

    <!-- Footer Widget Section -->
    <div class="footer-widget-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <div class="footer-logo">
                          <a href="#"><img src="img/logo1-white.png" width="220" height="55" alt="">      </a>
                        </div>
                        <p>Continually matrix cross functional opportunities whereas ethical information. Compellingly streamline enabled human capital before resource-leveling internal or "organic".</p>

                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <h3>We work for your profit</h3>
                        <p>Distinctively expedite viral materials rather than out-of-the-box solutions. Credibly empower revolutionary ROI rather than unique products. Collaboratively maximize principle-centered ideas before highly efficient data. Phosfluorescently.</p>
                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4 footer-block last">
                    <div class="footer-widget widget_text">
                        <h3>Contact Us Today</h3>
                        <address>
                            Call Us 666 777 888 OR 111 222 333<br>
                            Send an Email on <a href="mailto:#">contact@domain.com</a><br>
                            Visit Us 123 Fake Street- Blla 12358<br>
                            Fake Kingdom<br>
                        </address>

                        <ul class="list-inline social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div><!-- /.col-sm-4 -->
            </div>
        </div>
    </div><!-- /.Footer Widget Section -->

    <div class="copyright-section">
        <div class="container clearfix">
                <span class="copytext">Copyright &copy; 2016 | <a href="https://uicookies.com/downloads/x-corporation-free-bootstrap-html-template/">X-Corporation</a> Designed And Developed By: <strong style="color: #31aae2;">uiCookies.com</strong></span>

            <ul class="list-inline pull-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div><!-- .container -->
    </div><!-- .copyright-section -->
</footer>
<!-- .footer -->

</div>
<!-- .content-wrapper -->
</div>
<!-- .offcanvas-pusher -->


<!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/flexSlider/jquery.flexslider-min.js"></script>
<script src="js/uploadgambar.js"></script>
<script src="js/scripts.js"></script>
<div>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">HTML Templates by uiCookies</a>        
	</div>
    <script type="text/javascript">
    </script>

    <script type="text/javascript">
          function openTab(evt, name) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(name).style.display = "block";
        evt.currentTarget.className += " active";
    }

    </script>

    <!-- SCRIPT MODAL -->

    <script>
    $(function() {

        $('.tampilModal').on('click', function(){
            $('#formModalLabel').html('Lihat Data Artikel');
            $("#btnSave").css("display", "none");
            $('#kategori_artikel').prop('readonly', true);
            $('#judul_artikel').prop('readonly', true);
            $('#deskripsi_artikel').prop('readonly', true);
            $('#isi_artikel').prop('readonly', true);
            $('#sumber_artikel').prop('readonly', true);
            const id = $(this).data('id');
            
            
            $.ajax({
                url:'http://localhost/project/ukm/artikelmodal.php',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#id_artikel').val(data.id_artikel);
                    $('#kategori_artikel').val(data.kategori_artikel);
                    $('#judul_artikel').val(data.judul_artikel);
                    $('#deskripsi_artikel').val(data.desk_artikel);
                    $('#isi_artikel').val(data.isi_artikel);
                    $('#sumber_artikel').val(data.sumber_artikel);
                    var gambarnya = data.image;
                    $('#gambar_artikel').attr('src','img/'+gambarnya);
                    
                }
            });
        });
        
    });

        $(function() {

        $('.ubahModal').on('click', function(){
            $('#formModalLabel').html('Update Data Artikel');
            $("#btnSave").css("display", "block");
            $('#kategori_artikel').prop('readonly', false);
            $('#judul_artikel').prop('readonly', false);
            $('#deskripsi_artikel').prop('readonly', false);
            $('#isi_artikel').prop('readonly', false);
            $('#sumber_artikel').prop('readonly', false);
            const id = $(this).data('id');
            $.ajax({
                url:'http://localhost/project/ukm/artikelmodal.php',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#pemilik_artikel').val(data.user_ukm);
                    $('#id_artikel').val(data.id_artikel);
                    $('#kategori_artikel').val(data.kategori_artikel);
                    $('#judul_artikel').val(data.judul_artikel);
                    $('#deskripsi_artikel').val(data.desk_artikel);
                    $('#isi_artikel').val(data.isi_artikel);
                    $('#sumber_artikel').val(data.sumber_artikel);
                    
                }
            });
            
            
        });
    });

     $(function() {

        $('.ubahProduk').on('click', function(){
            const id = $(this).data('id');
            $.ajax({
                url:'http://localhost/project/ukm/produkmodal.php',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#namaProduk').val(data.nama_produk);
                    $('#deskProduk').val(data.deskripsi_produk);
                    $('#id_produk').val(data.id_produk);
                    $('#pemilik_produk').val(data.pemilik_produk);
                    $('#kategoriProduk').val(data.kategori_produk);
                    var gambarnya = data.gambar;
                    $('#gambar_produk').attr('src','img/'+gambarnya);
                    
                    
                }
            });
            
            
        });
    });


     $(function() {

        $('.ubahKomoditas').on('click', function(){
            const id = $(this).data('id');
            const nama = $(this).data('id-pmlk');
            $.ajax({
                url:'http://localhost/project/ukm/komoditasmodal.php',
                data: {id : id , nama : nama},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#id').val(data.id_kmdt);
                    $('#id_pmlk').val(data.pemilik_produk);
                    $('#nama_kmdt').val(data.judul_kmdt);
                    $('#deskripsi_kmdt').val(data.deskripsi_kmdt);
                    var gambarnya = data.gambar_kmdt;
                    $('#gambar_kmdt').attr('src','img/'+gambarnya);
                    
                    
                }
            });
            
            
        });
    });
</script>

<script>
(function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
        $chatboxTitle.on('click', function() {
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
        $chatboxCredentials.on('submit', function(e) {
            e.preventDefault();
            $chatbox.removeClass('chatbox--empty');
        });
    });
})(jQuery);
</script>   
    <!-- AKHIR SCRIPT MODAL -->
</body>
</html>