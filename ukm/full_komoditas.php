<?php 
session_start();
include "koneksi.php";
include_once "program.php";
include_once "database.php";
include_once "rupiah.php";

if (isset($_S["username"])) {
    # code...
$qSelectUKM = "SELECT * FROM ukm WHERE pemilik = '".$_SESSION["username"]."'";
        $hsl = mysqli_query($koneksi,$qSelectUKM);

}

$database = new Database();
$db = $database->getConnection();
 
$program = new program($db);

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
    <link rel="stylesheet" type="text/css" href="css/custom_checkbox.css">
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
            <li class="dropdown  m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Kategori
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
                                        <input type="text" style="border-radius:3px;" class="form-control" placeholder="Cari produk, komoditas, atau UKM">
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

<section class="centered" style="margin-left:10%; margin-bottom:700px;" >
<?php 
$queryProduk = "SELECT * FROM komoditas WHERE id_kmdt = ".$_GET["idKomoditas"]." ";
$hslProduk = mysqli_query($koneksi,$queryProduk);
$rcrdProduk = mysqli_fetch_assoc($hslProduk);
?>
    <div class="row bg-gray">
        <div class="col-md-11 mainbarss">
            <h5 style="font-size:20px;"><?= $rcrdProduk["judul_kmdt"]?></h5>
            <h3 style="font-size:14px;" ><?= $rcrdProduk["deskripsi_kmdt"]?></h3>
            <div class="row">
                <div class="col-md-8 deskripsi" style=""> <!-- ini bagian isi Produk -->
                    <img src="img/<?= $rcrdProduk["gambar_kmdt"]?>"> <!--ambil dari db-->
                    <p><?= $rcrdProduk["deskripsi_kmdt"]?></p>
                </div>
                <div class="col-md-3 green-border singkat">
                    <div class="masing">
                        <label><i class='fas fa-book-open mr-5' style='color:#57b846; margin-right:5px;'></i>Judul Komoditas</label>
                        <p><?= $rcrdProduk["judul_kmdt"]?></p>    
                    </div>
                    
                </div>
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
<div>
        <a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">HTML Templates by uiCookies</a>        
    </div>

</script>
    <!-- AKHIR SCRIPT MODAL -->
</body>
</html>