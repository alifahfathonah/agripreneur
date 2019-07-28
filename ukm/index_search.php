<?php 
include "koneksi.php";
include "cek_status_login.php";



function selectByKategori($field){
    include "koneksi.php";
    $query = "SELECT * FROM produk WHERE kategori_produk = '".$field."'";
    
    $hsl=mysqli_query($koneksi,$query);

    return $hsl;
}

function selectAll($tabel){
    include "koneksi.php";
    $query = "SELECT * FROM $tabel ";
    
    $hsl=mysqli_query($koneksi,$query);

    return $hsl;
}
function selectBySearch($tabel,$kolom,$key){
    include "koneksi.php";
    $query = "SELECT * FROM $tabel WHERE $kolom LIKE '%".$key."%' ";
  
    $hsl=mysqli_query($koneksi,$query);
    return $hsl;
}


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
hr.batas {
    border-color: #71d85f;
}
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
            <a class="navbar-brand" href="index.php"><img src="img/logo1-white.png" width="220" height="55" alt=""></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1">

            <ul class="nav-cta hidden-xs">
            </ul>

            <ul class="nav navbar-nav navbar-right main-nav">
            <li class="active dropdown  m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Produk
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                    <li>
                        <div class="m-menu-content">
                            <ul class="col-md-6">
                                <li class="dropdown-header">Kuliner</li>
                                <li><a href="index_search.php?kategoriProduk=Makanan">Makanan</a></li>
                                <li><a href="index_search.php?kategoriProduk=Minuman">Minuman</a></li>
                                <li><a href="index_search.php?kategoriProduk=Camilan">Camilan</a></li>
                            </ul>
                            <ul class="col-md-6">
                                <li class="dropdown-header">Alat</li>           
                                <li><a href="index_search.php?kategoriProduk=Kriya">Kriya</a></li>
                                <li><a href="index_search.php?kategoriProduk=Teknologi">Teknologi</a></li>
                                <li><a href="index_search.php?kategoriProduk=Bahan%20Mentah">Bahan Mentah</a></li>
                            </ul>
                        </div>
                    </li>
                    </ul>
                </li>
            <li>
                            <div class="head-search">
                                <form  role="form" method="get">
                                    <!-- Input Group -->
                                    <div class="input-group" >
                                        <input type="text" name="keyword" style="border-radius:3px;" class="form-control" placeholder="Cari produk, komoditas, atau UKM">
                                            <span class="input-group-btn">
                                              <button name="search" type="submit" class="btn btn-hijau">

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
                        <li class=""><a href="program_result.php">  <i class="  fas fa-dollar-sign"></i>Program dan Pendanaan</a></li>
                        <li class=""><a href="indexArtikel.php"> <i class="  fas fa-file-alt"></i>Artikel dan Berita</a></li>
                        <li class=""><a href="indexKonsultasi.php"> <i class='fas fa-chalkboard-teacher'></i>Jasa konsultasi</a></li>

                    </ul>
                </li>

                <?php
                    if (isset($_SESSION["username"])){
                        $qSelectUKM = "SELECT * FROM ukm WHERE pemilik = '".$_SESSION["username"]."'";
                        $hsl = mysqli_query($koneksi,$qSelectUKM);

                        if ($_SESSION['role']==2) {
                        ?>
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
                                                        <img class="radius" src="img/<?=$rcrd2['gambar'];?>"style="width: 40px; height: 40px;">
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
                                        <ul>
                                            <button onclick="window.location='tambah_ukm.php';" class="btn btn-hijau"><label>Tambah UKM</label></button>
                                        </ul>
                                    
                                    </div>
                                

                            </ul>
                        </li>
                            <?php

                        }
                                    
                        

                        echo "
                  <li class='akun dropdown m-menu-pr' data-toggle='dropdown' class='dropdown-toggle'><a href=''>
                  <img src='img/user.png'style='width: 20px; height: 20px; border-radius: 3px;''></a>

                     <ul class='dropdown-menu'>
                        <li class='profilee'>
                            <a href=''>
                            <label style= 'color: #57b846;'>
                             ".$_SESSION['username']."</label>
                            </a>
                        </li>
                        <li><a href='edit_ukm.php'>Pengaturan</a></li>
                        <li><a href='logout.php'>Keluar</a></li>
                    </ul>
                  </li>";


                    }

                    else{
                        ?>
                <li class=""><a href="daftar_akun.php">Daftar</a></li>
                <li><a href="../login.php">Masuk</a></li>
                    <?php
                    }
                ?>

                
                
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>

<section class="centered">
    <div class="row bg-gray">
        <div class="col-md-2 sidebars">
            <div class="">
        
                
   
   
        <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item " data-toggle="collapse" data-parent="#main-menu">Kategori <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="index_search.php?keyword=" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){

                        }else{
                            echo "active";
                        }
                        ?>" data-parent="#sub-menu">Semua Kategori
                     </a>
                    <a href="index_search.php?kategoriProduk=Makanan" class="list-group-item 
                                    <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Makanan"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Makanan</a>
                    <a href="index_search.php?kategoriProduk=Minuman" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Minuman"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Minuman</a>
                     <a href="index_search.php?kategoriProduk=Camilan" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Camilan"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Camilan</a>
                    <a href="index_search.php?kategoriProduk=Kriya" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Kriya"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Kriya</a>
                    <a href="index_search.php?kategoriProduk=Teknologi" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Teknologi"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Teknologi</a>
                    <a href="index_search.php?kategoriProduk=Bahan%20Mentah" class="list-group-item <?php 
                        if(isset($_GET["kategoriProduk"])){
                            if($_GET["kategoriProduk"]=="Bahan Mentah"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Bahan Mentah</a>

                   
                  <!--  <a href="#sub-sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Sub Item 3 <span class="caret"></span></a>
                    <div class="collapse list-group-level2" id="sub-sub-menu">
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 1</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 2</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 3</a>
                    </div>
                    -->
                </div>
                 
            </div>
            </div>
        </div>
        <div class="col-md-9 mainbarss">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link tablinks active" onclick="openTab(event, 'Produk')" href="#"><i class='fas fa-shopping-bag'></i>Produk</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'Ukm')" href="#"><i class='fas fa-store'></i>UKM</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'Komoditas')" href="#"><i class='fas fa-air-freshener'></i>Komoditas</a>
                </li>
                </li>
            </ul>

            <div class="tabcontent" id="Produk" style="display: block;">
                <div class="grid-container ">
             <?php 
             if(isset($_GET["kategoriProduk"])){
                $hslQuery = selectByKategori($_GET["kategoriProduk"]);
                if($hslQuery->num_rows === 0){
                    echo "<div class='alert alert-info'>Produk tidak ditemukan.</div>";
                }else{
                while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="card">
                      <img class="infoProduk" src="img/<?= $rcrd["gambar"]?>" style="width:100%">
                      <div class="container-card p5 m5">
                        <h6><b></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <p><b><?= $rcrd["nama_produk"]?></b></p>
                            </div>
                        </div>
                      </div>
                        <div class="absolom" style="width:100%; padding:10px;"  >
                            <a href="full_produk.php?idProduk=<?= $rcrd["id_produk"]?>" class='btn btn-hijau' style="padding:3px; " >
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>
                    <?php
                }
                }
             }else{
              if(isset($_GET["keyword"])){
                if($_GET["keyword"] != ""){
                    $tabel = "produk";
                    $kolom = "nama_produk";
                    $hslQuery = selectBySearch($tabel,$kolom,$_GET["keyword"]);
                    if($hslQuery->num_rows === 0)
                    {
                        echo 'No results';
                    }
                    while($rcrd = mysqli_fetch_assoc($hslQuery)){
                        ?>
                        <div class="card">
                          <img class="infoProduk" src="img/<?= $rcrd["gambar"]?>" style="width:100%">
                          <div class="container-card p5 m5">
                            <h6><b></b></h6> 
                            <div class="row">
                                <div class="col-md-12">
                                <p><b><?= $rcrd["nama_produk"]?></b></p>
                            <p><?= $rcrd["pemilik_produk"]?></p>
                                </div>
                            </div>
                          </div>
                            <div class="absolom" style="width:100%; padding:10px;"  >
                                <a  href="full_produk.php?idProduk=<?= $rcrd["id_produk"]?>" class='btn btn-hijau' style="padding:3px; " >
                                <label style="font-size:14px;">Baca Lengkap</label> </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                 else{
                     $tabel = "produk";
                $hslQuery = selectAll($tabel);
                while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="card">
                      <img class="infoProduk" src="img/<?= $rcrd["gambar"]?>" style="width:100%">
                      <div class="container-card p5 m5">
                        <h6><b></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <p><b><?= $rcrd["nama_produk"]?></b></p>
                            <p><?= $rcrd["pemilik_produk"]?></p>
                            </div>
                        </div>
                      </div>
                        <div class="absolom" style="width:100%; padding:10px;"  >
                            <a  href="full_produk.php?idProduk=<?= $rcrd["id_produk"]?>" class='btn btn-hijau' style="padding:3px; " >
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>
                    <?php
                }
            }
            }
            }
             ?>

             

                    
        </div>
             </div><!-- DIVAKHIR TAB-->

             <div class="tabcontent" id="Ukm">
                <div class="grid-containers">
                <?php 
                if(isset($_GET["keyword"])){
                    if($_GET["keyword"] != ""){
                     $tabel = "ukm";
                    $kolom = "namaUKM";
                    $hslQuery = selectBySearch($tabel,$kolom,$_GET["keyword"]);
                    if($hslQuery->num_rows === 0)
                    {
                        echo 'No results';
                    }
                    while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="cards" style="height:auto;">
                     <div class="row bb">
                             <div class="col-md-3">
                                  <img class="tn-ukm" src="img/<?= $rcrd["gambar"] ?>">
                            </div>
                            <div class="col-md-9">
                                    <div class="infoukm">
                                        <h6><?=$rcrd["namaUKM"] ?></h6>
                                        <p href=""><i class='fas fa-map-marker-alt'></i><?= $rcrd["alamat"]?></p>
                                    </div>
                            </div>
                     </div>
                     <hr class="batas">
                     <div>
                            <div class="flex-row">
                            <?php 
                            $queryGambar = "SELECT gambar FROM produk WHERE pemilik_produk = '".$rcrd["namaUKM"]."' ";
                            $hslGambar = mysqli_query($koneksi,$queryGambar);
                            
                            if($hslGambar->num_rows === 0)
                                echo "<br>Belum ada produk";
                            $i = 1; 
                            
                            while(($rcrdGambar = mysqli_fetch_assoc($hslGambar)) && ($i <= 3 )){
                               
                                ?>
                                
                                 <img class="thumbnail tn-prd" src="img/<?=$rcrdGambar["gambar"]; ?>"> <!--Contoh Produk yg dipunyai UKM-->
                                  
                                <?php 
                                $i++;
                            }
                            ?>
                            </div>
                         
                     </div>
                    </div>
                    <?php 
                    }
                    }
                    else{
                        $tabel = "ukm";
                        $hslQuery = selectAll($tabel);
                    if($hslQuery->num_rows === 0)
                    {
                        echo 'No results';
                    }
                    while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="cards" style="height:auto;">
                     <div class="row bb">
                             <div class="col-md-3">
                                  <img class="tn-ukm" src="img/<?=$rcrd["gambar"]?>">
                            </div>
                            <div class="col-md-9">
                                    <div class="infoukm">
                                        <h6><a href="infoUKMpublic.php?data=<?= $rcrd["namaUKM"]?>" > <?=$rcrd["namaUKM"] ?></a> </h6>
                                        <p href=""><i class='fas fa-map-marker-alt'></i><?= $rcrd["alamat"]?></p>
                                    </div>
                            </div>
                     </div>
                     <hr class="batas">
                     <div>
                            <div class="flex-row">
                            <?php 
                            $queryGambar = "SELECT gambar FROM produk WHERE pemilik_produk = '".$rcrd["namaUKM"]."' ";
                            $hslGambar = mysqli_query($koneksi,$queryGambar);
                            
                            if($hslGambar->num_rows === 0)
                                echo "<br>Belum ada produk";
                            $i = 1; 
                            
                            while(($rcrdGambar = mysqli_fetch_assoc($hslGambar)) && ($i <= 3 )){
                               
                                ?>
                                
                                 <img class="thumbnail tn-prd" src="img/<?=$rcrdGambar["gambar"]; ?>"> <!--Contoh Produk yg dipunyai UKM-->
                                  
                                <?php 
                                $i++;
                            }
                            ?>
                                 
                            </div>
                         
                     </div>
                    </div>
                    <?php 
                    }
                    }
                }
                ?>
                    
<!-- batas card-->

                </div>
             </div>

             <div class="tabcontent" id="Komoditas">
                 <div class="grid-container ">
             <?php 
              if(isset($_GET["keyword"])){
                if($_GET["keyword"] != ""){
                    $tabel = "komoditas";
                    $kolom = "judul_kmdt";
                    $hslQuery = selectBySearch($tabel,$kolom,$_GET["keyword"]);
                    if($hslQuery->num_rows === 0)
                    {
                        echo 'No results';
                    }
                    while($rcrd = mysqli_fetch_assoc($hslQuery)){
                        ?>
                        <div class="card">
                          <img class="infoProduk" src="img/<?= $rcrd["gambar_kmdt"]?>" style="width:100%">
                          <div class="container-card p5 m5">
                            <h6><b></b></h6> 
                            <div class="row">
                                <div class="col-md-12">
                                <p><b><?= $rcrd["judul_kmdt"]?></b></p>
                                </div>
                            </div>
                          </div>
                            <div class="absolom" style="width:100%; padding:10px;"  >
                                <a  href="full_komoditas.php?idKomoditas=<?= $rcrd["id_kmdt"]?>" class='btn btn-hijau' style="padding:3px; " >
                                <label style="font-size:14px;">Baca Lengkap</label> </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                 else{
                     $tabel = "komoditas";
                $hslQuery = selectAll($tabel);
                while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="card">
                      <img class="infoProduk" src="img/<?= $rcrd["gambar_kmdt"]?>" style="width:100%">
                      <div class="container-card p5 m5">
                        <h6><b></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <p><b><?= $rcrd["judul_kmdt"]?></b></p>
                            </div>
                        </div>
                      </div>
                        <div class="absolom" style="width:100%; padding:10px;"  >
                            <a  href="full_komoditas.php?idKomoditas=<?= $rcrd["id_kmdt"]?>" class='btn btn-hijau' style="padding:3px; " >
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>
                    <?php
                }
            }
            }
            
             ?>

             

                    
        </div>
             </div>

         
    
    </div>
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
</body>
</html>