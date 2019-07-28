<?php 
include "koneksi.php";




function selectByKategori($field){
    include "koneksi.php";
    $query = "SELECT * FROM artikel WHERE kategori_artikel = '".$field."'";
    
    $hsl=mysqli_query($koneksi,$query);

    return $hsl;
}

function selectAll(){
    include "koneksi.php";
    $query = "SELECT * FROM artikel ";
    
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
                        <li class=""><a href="program_result.php">  <i class="  fas fa-dollar-sign"></i>Program dan Pendanaan</a></li>
                        <li class="active"><a href=""> <i class="  fas fa-file-alt"></i>Artikel dan Berita</a></li>
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

<section class="centered">
    <div class="row bg-gray">
        <div class="col-md-2 sidebars">
            <div class="">
        
                
   
   
        <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item " data-toggle="collapse" data-parent="#main-menu">Kategori <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="indexArtikel.php" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){

                        }else{
                            echo "active";
                        }
                        ?>" data-parent="#sub-menu">Semua Kategori
                     </a>
                    <a href="indexArtikel.php?kategoriArtikel=Pendidikan" class="list-group-item 
                                    <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Pendidikan"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Pendidikan</a>
                    <a href="indexArtikel.php?kategoriArtikel=Bisnis" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Bisnis"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Bisnis</a>
                     <a href="indexArtikel.php?kategoriArtikel=Kesehatan" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Kesehatan"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Kesehatan</a>
                    <a href="indexArtikel.php?kategoriArtikel=Olahraga" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Olahraga"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Olahraga</a>
                    <a href="indexArtikel.php?kategoriArtikel=Pertanian" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Pertanian"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Pertanian</a>
                    <a href="indexArtikel.php?kategoriArtikel=Ekonomi" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Ekonomi"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Ekonomi</a>
                    <a href="indexArtikel.php?kategoriArtikel=Ilmiah" class="list-group-item <?php 
                        if(isset($_GET["kategoriArtikel"])){
                            if($_GET["kategoriArtikel"]=="Ilmiah"){
                                echo "active";
                            }
                        }
                        ?>" data-parent="#sub-menu">Ilmiah</a>
                   
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

                            <div class="head-search" style="margin-bottom:10px;">
                                <form role="form">
                                    <!-- Input Group -->
                                    <div class="input-group" >
                                        <input type="text" style="border-radius:3px;" class="form-control" placeholder="Cari Berita / Artikel">
                                            <span class="input-group-btn">
                                              <button type="submit" class="btn btn-hijau">

                                                <i class="fa fa-search" style="font-size:15px;color: white;"></i>
                                              </button>
                                            </span>

                                    </div>
                                </form>
                            </div>
             <div class="grid-container ">
             <?php 
             if(isset($_GET["kategoriArtikel"])){
                $hslQuery = selectByKategori($_GET["kategoriArtikel"]);
                if($hslQuery->num_rows === 0){
                    echo "<div class='alert alert-info'>Artikel tidak ditemukan.</div>";
                }else{
                while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="card">
                      <img class="infoProduk" src="img/<?= $rcrd["image"]?>" style="width:100%">
                      <div class="container-card p5 m5">
                        <h6><b></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <p><b><?= $rcrd["kategori_artikel"]?></b></p>
                            <p><?= $rcrd["judul_artikel"]?></p>
                            </div>
                        </div>
                      </div>
                        <div class="absolom" style="width:100%; padding:10px;"  >
                            <a href="full_artikel.php?idArtikel=<?= $rcrd["id_artikel"]?>" class='btn btn-hijau' style="padding:3px; " >
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>
                    <?php
                }
                }
             }else{
                $hslQuery = selectAll();
                while($rcrd = mysqli_fetch_assoc($hslQuery)){
                    ?>
                    <div class="card">
                      <img class="infoProduk" src="img/<?= $rcrd["image"]?>" style="width:100%">
                      <div class="container-card p5 m5">
                        <h6><b></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <p><b><?= $rcrd["kategori_artikel"]?></b></p>
                            <p><?= $rcrd["judul_artikel"]?></p>
                            </div>
                        </div>
                      </div>
                        <div class="absolom" style="width:100%; padding:10px;"  >
                            <a href="full_artikel.php?idArtikel=<?= $rcrd["id_artikel"]?>" class='btn btn-hijau' style="padding:3px; " >
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>
                    <?php
                }
             }
             ?>

             

                    
        
    
    </div>
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
                    $('#gambar_artikel').attr('src','images/'+gambarnya);
                    
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
                    
                    
                }
            });
            
            
        });
    });
</script>
    <!-- AKHIR SCRIPT MODAL -->
</body>
</html>