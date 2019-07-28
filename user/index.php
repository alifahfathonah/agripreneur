<?php
include "koneksi.php";
session_start();
if (isset($_SESSION["username"])) {
    # code...
$qSelectUKM = "SELECT * FROM ukm WHERE pemilik = '".$_SESSION["username"]."'";
        $hsl = mysqli_query($koneksi,$qSelectUKM);
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
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
     .navbar-default {
        background-color   : transparent;
        padding            : 30px 0;
        border-color       : transparent;
        -webkit-transition : all .5s ease-in-out;
        -moz-transition    : all .5s ease-in-out;
        transition         : all .5s ease-in-out;
        }

    .sticky-nav.navbar-default {
        
        background-color : #57b846;
        padding          : 15px 0;
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
            <a class="navbar-brand" href="index.html"><img src="img/logo1-white.png" width="220" height="55" alt=""></a>
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
                                <form role="form" action="../login.php">
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

<div id="x-corp-carousel" class="carousel slide hero-slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#x-corp-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#x-corp-carousel" data-slide-to="1"></li>
        <li data-target="#x-corp-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img style=" width: 100%;height: 800px;"src="img/carou1.jpg" alt="Hero Slide">

            <div class="carousel-caption">
                <h1>Selamat Datang !</h1>

                <p>Kami menghadirkan berbagai informasi, pengetahuan, dan
                 kesempatan bisnis untuk pengembangan usaha anda di bidang pertanian
                 maupun di bidang lainnya</p>
            </div>
        </div>
        <div class="item">
            <img style=" width: 100%;height: 800px;" src="img/carou2.jpg" alt="...">

            <div class="carousel-caption">
                <h1 style="color: black;">Daftarkan UKM</h1>

                <p style="color: black;">Daftarkan UKM anda. membuat UKM otomatis terdaftar di Online Database System 
                        di Sistem ini</p><br>
                <?php
                    if (isset($_SESSION['role'])){
                        if($_SESSION['role'] == 1){
                    ?>
                            <button class='btn btn-hijauu' onclick="window.location.href='tambah_ukm.php';"><label>Daftar menjadi Mitra UKM </label></button>
                    <?php 
                        }
                        else{
                            echo "";
                        }
                    }
                    else{
                        ?>
                        <button class='btn btn-hijauu' onclick="window.location.href='daftar_akun.php';"><label>Ingin daftar menjadi Mitra UKM ? <br>Register AKUN terlebih dahulu! </label></button>
                        <?php
                    }
                    ?>
                </div>
        </div>
        <div class="item">
            <img style=" width: 100%;height: 800px;" src="img/carou3.jpg" alt="...">

            <div class="carousel-caption">
                <h1 style="color: black;">Produk, UKM, Komoditas</h1>

                <p style="color: black;">Cari informasi produk, UKM, dan Komoditas yang anda Inginkan </p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#x-corp-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#x-corp-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- #x-corp-carousel-->

<section class="x-services ptb-100 gray-bg">

    <section class="section-title">
        <div class="container text-center">
            <h2>Layanan Kami</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive r100" src="img/register.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Registrasi Usaha</a></h3>

                        <p>membuat UMKM otomatis terdaftar di Online Database System 
                        di Sistem ini</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive r100" src="img/program.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="program_result.php">Program dan Pendanaan</a></h3>
                        <p>berbagai informasi seputar program pendukung dan 
                        akses pendanaan bagi UKM yang ingin mengembangkan usahanya.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive r100" src="img/konsultan.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="indexKonsultasi.php">Konsultan</a></h3>

                        <p> kami turut menghadirkan 
                        berbagai informasi jasa konsultasi dari mitra-mitra terpilih. .</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive r100" src="img/artikel.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="indexArtikel.php">Artikel</a></h3>

                        <p>artikel ulasan bisnis, dan berita-berita 
                        penting untuk memperkaya wawasan pelaku 
                        usaha yang ingin naik kelas.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- .x-services -->

<section class="x-features">
    <section class="section-title">
        <div class="container text-center">
            <h2>Peran Kami</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 img-left">
                <img class="img-responsive" src="img/img-about.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="promo-content">
                        <h3>
                        Kami memberi informasi untuk meningkatkan bisnis Ukm anda
                        </h3>

                        <p>Untuk mempermudah UKM mengakses pengetahuan bisnis, 
                        kami menyediakan kamus bisnis, ratusan artikel ulasan 
                        kasus-kasus bisnis, dan berita-berita penting untuk memperkaya
                         sudut pandang dan wawasan pelaku usaha yang ingin naik kelas..</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-life-ring"></i>
                    </div>
                    <div class="promo-content">
                        <h3>Kami mempromosikan produk Ukm anda</h3>
                        <p>Mempromosikan produk-produk kepada masyarakat</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-calculator"></i>
                    </div>
                    <div class="promo-content last-type">
                        <h3>Mengembangkan Ukm</h3>

                        <p>Dengan bermitra dengan pemerintah dan berbagai pihak yang ingin 
                        mendukung UKM, kami menyediakan berbagai informasi seputar program
                         pendukung dan akses pendanaan bagi UKM yang ingin mengembangkan usahanya.</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- .x-features -->
<!-- .team -->

<section class="client-logo ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2>Mitra Kami</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><</a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/bbp2tp.png" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img style="width:140%;" src="img/ipb.png" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"></a>
            </div>
        </div>
    </div>
    <!--end of .container -->
</section>
<!-- /.client-logo -->


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
<script src="js/scripts.js"></script>
<script type="text/javascript"> $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("sticky-nav");
        } else {
            $(".navbar-fixed-top").removeClass("sticky-nav");
        }
    });
</script>
<div/>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">HTML Templates by uiCookies</a>        
	</div>
</body>
</html>