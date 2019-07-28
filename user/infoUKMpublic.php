<?php 
include "koneksi.php";



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

<style type="text/css">
    
    .modal-backdrop {
  z-index: -1;
}
.head-search {
    width : 400px;
padding: 0px;
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
<div class="content-wrapper white-bg">
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
            <a class="navbar-brand" href="index.php"><img src="img/Logo1-white.png" width="220" height="55"alt=""></a>
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
                                <form role="form">
                                    <!-- Input Group -->
                                    <div class="input-group" >
                                        <input type="text" class="form-control" placeholder="Cari produk, komoditas, atau UKM">
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

                        <li><a href="program_result.php">  <i class="  fas fa-dollar-sign"></i>Program dan Pendanaan</a></li>
                        <li><a href="indexArtikel.php"> <i class="  fas fa-file-alt"></i>Artikel dan Berita</a></li>
                        <li><a href="indexKonsultasi.php"> <i class='fas fa-chalkboard-teacher'></i>Jasa konsultasi</a></li>

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
<!-- .nav -->
<section class="containers">
<div class="mt-100">
    <div class="row mb-3">
        <div class="col-md-2">
                <?php
                $queryDeskUKM = "SELECT * FROM ukm WHERE namaUKM = '".$_GET["data"]."' ";
                $hslDeskUKM = mysqli_query($koneksi,$queryDeskUKM);
                $rcrdDeskUKM = mysqli_fetch_assoc($hslDeskUKM);
                ?>
                <img class="radius" src="img/<?= $rcrdDeskUKM['gambar']?>"style="width: 170px; height: 170px;">
        </div>
        <div class="col-md-8">  
            <div class="flex-column line">
                  
                <label style="font-size:25px; color:#57b846;"><?= $_GET["data"];?></label>
                <p><?= $rcrdDeskUKM["deskripsi"]?> </p>
            </div>  
            <div class="flex-column line">
                <div class="flex-row mr-b-0">
                        <i class="fas fa-clock"></i>
                        <p class="mr-p-3">1 menit yang lalu</p>
                        <i class='fas fa-map-marker-alt'></i>
                        <p><?= $rcrdDeskUKM['alamat']?></p>
                </div>
                <div class="flex-row">
                        <i class="fas fa-home"></i>
                        <p class="mr-p-3">Online</p>
                        <i class='fas fa-door-open'></i>
                        <p>November 2018</p>
                </div>
            </div>
      
        </div>
    </div>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link tablinks active" onclick="openTab(event, 'produk')" href="#">Produk</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'komoditas')" href="#">Komoditas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link tablinks" onclick="openTab(event, 'artikel')" href="#">Artikel/berita</a>
                </li>
            </ul>

        <div class="tabcontent" id="produk" style="display: block;">
            
            <div class="containerr">
                <div class="row">
                <div class="col-md-12 gray-bg radius p-3">
                     <div class="head-search">
                        <form role="form">
                                    <!-- Input Group -->
                         <div class="input-group" >
                             <input type="text" class="form-control" placeholder="Cari produk">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-hijau">
                                        <i class="fa fa-search" style="font-size:15px;color: white;"></i>
                                    </button>
                                 </span>
                        </div>
                        </form>
                    </div>
                </div>
                </div>

                <div class="grid-container ">
                <?php 
                    $querySelectProduk = "SELECT * FROM produk WHERE pemilik_produk = '".$_GET["data"]."' ";
                    $hslSelectProduk = mysqli_query($koneksi,$querySelectProduk);
                    while($rcrdSelectProduk = mysqli_fetch_assoc($hslSelectProduk)){  
                ?>
                    <div class="card" style="height:auto">
                      <img class="infoProduk" src="img/<?= $rcrdSelectProduk["gambar"]?>" alt="Avatar" style="width:100%;" data-toggle="modal" data-target="#formModalProduk" data-id="<?= $rcrdSelectProduk["id_produk"] ?>" data-nama="<?= $_GET["data"] ?>">
                      <div class="container-card">
                        <h5><b><?= $rcrdSelectProduk["nama_produk"]?></b></h5> 
                        <p><?= $rcrdSelectProduk["pemilik_produk"]?></p> 
                      </div>
                    </div>
                <?php 
                }
                ?>
                    
                
                     
                     
                </div>
                

            </div> 
        </div>
        <div class="tabcontent" id="komoditas">
            <div class="containerr ">
                <div class="row">
                <div class="col-md-12 gray-bg radius p-3">
                     <div class="head-search">
                        <form role="form">
                                    <!-- Input Group -->
                         <div class="input-group" >
                             <input type="text" class="form-control" placeholder="Cari Komoditas">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-hijau">
                                        <i class="fa fa-search" style="font-size:15px;color: white;"></i>
                                    </button>
                                 </span>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
                
                <div class="grid-container ">
                    <?php 
                    $querySelectKomoditas = "SELECT * FROM `kmdt-prod` as tabel1 INNER JOIN komoditas ON tabel1.id_komoditas = komoditas.id_kmdt
                                             INNER JOIN produk ON tabel1.id_produk = produk.id_produk
                                             WHERE produk.pemilik_produk = '".$_GET["data"]."'";
                    $hslSelectKomoditas = mysqli_query($koneksi,$querySelectKomoditas);
                    while($rcrdSelectKomoditas = mysqli_fetch_assoc($hslSelectKomoditas)){
                    

                    
                    ?>
                    <div class="card">
                      <img class="infoKomoditas" src="img/kriya.jpg" alt="Avatar" style="width:100%;" data-toggle="modal" data-target="#formModalKomoditas" data-id="<?= $rcrdSelectKomoditas["id_kmdt"] ?>" data-nama="<?= $_GET["data"] ?>">
                      <div class="container-card">
                        <h5><b><?= $rcrdSelectKomoditas["judul_kmdt"]?></b></h5> 
                        
                      </div>
                    </div>

                    <?php
                    }
                    ?>

                </div>
            </div> 
        </div>
        <div class="tabcontent" id="artikel">
            <div class="containerr">
                <div class="row">
                <div class="col-md-12 gray-bg radius p-3">
                     <div class="head-search">
                        <form role="form">
                                    <!-- Input Group -->
                         <div class="input-group " > 
                            <select name="kategori" class="form-control">
                              <option value="artikel">Artikel</option>
                              <option value="berita">Berita</option>
                            </select>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="grid-container ">
                <?php 
                    $querySelectArtikel = "SELECT * FROM artikel WHERE user_ukm = '".$_GET["data"]."' ";
                    $hslSelectArtikel = mysqli_query($koneksi,$querySelectArtikel);
                    while($rcrdSelectArtiekl = mysqli_fetch_assoc($hslSelectArtikel)){

                   
                ?>
                
                
                    <div class="card" style="height:auto;">
                      <img class="infoArtikel" src="img/<?= $rcrdSelectArtiekl["image"]?>" alt="Avatar" style="width:100%;" data-toggle="modal" data-target="#modalArtikel" data-id="<?= $rcrdSelectArtiekl["id_artikel"] ?>" >
                      <div class="container-card">
                        <h5><b><?= $rcrdSelectArtiekl["judul_artikel"]?></b></h5> 
                        <p>Mamanskuy Store</p> 
                      </div>
                    </div>

                    <?php
                     }
                    ?>
                    

                </div>
            </div> 
        </div>
</div>

<!-- MODALS PRODUK -->
  <!-- Modal -->
  <form>
  <div class="modal fade" id="formModalProduk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informasi Produk</h4>
        </div>
        
        <div class="modal-body">
        <input type="text" id="id_produk" name="id_produk" hidden>
        <input type="text" id="pemilik_produk" name="pemilik_produk" hidden>
        Nama Produk : <br>
        <input class="form-control" id="namaProduk" type="text" placeholder="Default input" name="namaProduk">
        <hr>
        Deskripsi Produk : <br>
        <input class="form-control" id="deskProduk" type="text" placeholder="Default input" name="deskProduk">
        <hr>
        
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>
  </form>
<!-- AKHIR MODALS PRODUK -->
<!-- MODALS ARTIKEL -->

<div class="modal fade" id="modalArtikel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- MODALS KOMODITAS -->

<div class="modal fade" id="formModalKomoditas" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informasi Komoditas</h4>
        </div>
        
        <div class="modal-body">
        <input type="text" id="id_produk" name="id_produk" hidden>
        <input type="text" id="pemilik_produk" name="pemilik_produk" hidden>
        Nama Komoditas : <br>
        <input class="form-control" id="namaKomoditas" type="text" placeholder="Default input" name="namaKomoditas">
        <hr>
        Deskripsi Komoditas : <br>
        <input class="form-control" id="deskKomoditas" type="text" placeholder="Default input" name="deskKomoditas">
        <hr>
        Produk yang menggunakan komoditas ini : <br>
        <input class="form-control" id="produkKomoditas" type="text" placeholder="Default input" name="produkKomoditas" >
        <hr>
        
        <?php 
            
        ?>
        
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>
<!-- AKHIR MODAL KOMODITAS -->

</section>

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

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
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
<div/>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">HTML Templates by uiCookies</a>        
	</div>
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
    $(function() {

        $('.infoProduk').on('click', function(){
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
                    
                    
                }
            });
            
            
        });
    });

    $(function() {

        $('.infoArtikel').on('click', function(){
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
                    $('#gambar_artikel').attr('src','images/'+gambarnya);
                    
                }
            });
        });

        });

$(function() {

$('.infoKomoditas').on('click', function(){
    const id = $(this).data('id');
    const nama = $(this).data('nama');
    $.ajax({
        url:'http://localhost/project/ukm/komoditasmodal.php',
        data: {id : id, nama: nama},
        method: 'post',
        dataType: 'json',
        
        success: function(data){
            $('#namaKomoditas').val(data.judul_kmdt);
            $('#deskKomoditas').val(data.deskripsi_kmdt);
            $('#idKomoditas').val(data.id_kmdt);
            $('#produkKomoditas').val(data.nama_produk);
            
            
            
        }
    });
    
    
    
});
});
    </script>
</body>
</html>