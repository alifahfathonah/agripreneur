<?php
include "cek_status_login.php";
include "koneksi.php";
if(isset($_GET["deleteId"])){
    $queryDelete1 = "DELETE FROM artikel WHERE user_ukm =  '".$_GET["deleteId"]."'";
    $queryDelete2 = "DELETE FROM produk WHERE pemilik_produk =  '".$_GET["deleteId"]."'";
    $queryDelete3 = "DELETE FROM ukm WHERE namaUKM =  '".$_GET["deleteId"]."'";
    mysqli_query($koneksi,$queryDelete1);
    mysqli_query($koneksi,$queryDelete2);
    mysqli_query($koneksi,$queryDelete3);
    
}


$querySelect = "SELECT * FROM ukm";
$hslSelect = mysqli_query($koneksi,$querySelect);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="images/Logo2.png" style="width:200px; height:200px; ">
            </div>

            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li class="active">
                  <a href=""><i class='fas fa-chart-area'></i>Dashboard
                  </a>
                </li>
                <li >
                    <a href="adminpage.php">
                    <i class='fas fa-building'></i>
                    UKM</a>
                </li>
                <li >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="  fas fa-file-alt"></i>
                    Artikel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="halamanberita.php">Semua Artikel</a>
                        </li>
                        <li>
                            <a href="pemilikberita.php">Artikelku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="create_program.php">
                    <i class="  fas fa-dollar-sign"></i>
                    Program Pendanaan</a>
                </li>
                <li>
                    <a href="create_konsultan.php">
                <i class='fas fa-chalkboard-teacher'></i>
                    Konsultasi</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="#">Page</a>
                            </li>
                             <li class="nav-item dropdown ">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["username"]; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                              </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <!--CONTENT-->
    <div class="row">
        <div id="ukm" class="col-md-5 chart">
            
        </div>
        <div id="program" class="col-md-5 chart">
            
        </div>
    </div>
    <div class="row">
        <div id="produk" class="col-md-5 chart">
            
        </div>
        <div id="konsultan" class="col-md-5 chart">
            
        </div>
    </div>


        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type='text/javascript' src="js/jquery-3.3.1.min.js"> </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
        <script type="text/javascript" src="js/fusioncharts.js">
    </script>
    <script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js">
    </script>
    <script type="text/javascript">
    FusionCharts.ready(function(){
        var G1 = new FusionCharts({
            "type":"doughnut2d",
            "renderAt":"program",
            "width":"400",
            "height":"400",
            "dataFormat":"jsonurl",
            "dataSource":"jsonProgramKategori.php"
        });
        G1.render();

         var G2 = new FusionCharts({
            "type":"pie2d",
            "renderAt":"ukm",
            "width":"400",
            "height":"400",
            "dataFormat":"jsonurl",
            "dataSource":"jsonRoleUser.php"
        });
        G2.render();


         var G3 = new FusionCharts({
            "type":"pyramid",
            "renderAt":"konsultan",
            "width":"400",
            "height":"400",
            "dataFormat":"jsonurl",
            "dataSource":"jsonKonsultan.php"
        });
        G3.render();


         var G4 = new FusionCharts({
            "type":"pie3d",
            "renderAt":"produk",
            "width":"400",
            "height":"400",
            "dataFormat":"jsonurl",
            "dataSource":"jsonProduk.php"
        });
        G4.render();
    });
    </script>

</body>

</html>