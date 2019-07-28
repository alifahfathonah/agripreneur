<?php
include "cek_status_login.php";
include "koneksi.php";
if(isset($_GET["deleteId"])){
    $queryDelete1 = "DELETE FROM artikel WHERE user_ukm =  '".$_GET["deleteId"]."'";
    $queryIdProduk = "SELECT * FROM produk where pemilik_produk='".$_GET["deleteId"]."'";
    
    $hslquery=mysqli_query($koneksi,$queryIdProduk);

    if (mysqli_affected_rows($koneksi)>0){
         while (  $rcrd=mysqli_fetch_assoc($hslquery)) {
         # code...
            $queryDelete4= "DELETE FROM `kmdt-prod` WHERE id_produk='".$rcrd['id_produk']."'";
            mysqli_query($koneksi,$queryDelete4);
     }  
    }

    $queryDelete3 = "DELETE FROM ukm WHERE namaUKM =  '".$_GET["deleteId"]."'";

    mysqli_query($koneksi,$queryDelete1);
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

    <link rel="stylesheet" type="text/css" href="css/tableexport.min.css">
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
                <li>
                  <a href="dashboard.php"><i class='fas fa-chart-area'></i>Dashboard
                  </a>
                </li>
                <li class="active">
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

            <!--content-->
        <br>
        <?php 
        if(isset($_GET["deleteId"])){
            ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>
            <?php
        }
        ?>
        <h2>Database UKM: </h2>
            <form action="excel.php" method="post">
                <button name="excel" class="btn btn-success" style="margin-bottom:10px;">Excel &nbsp;<i class='fas fa-file-excel'></i></button>  
                <input type="text" name="table" value="ukm" hidden>
            </form>
            <p>Note : Untuk melakukan penghapusan terhadap UKM yang melakukan pelanggaran, harus mengajukan terlebeih dahulu kepada pimpinan, untuk form pengajuan bisa mengklick <b>"Pengajuan Penghapusan"</b> <br>
            Bagi staff yang menghapus UKM tanpa surat keterangan pengajuan yang sudah di <i>Approve</i>  oleh pimpinan akan dikenakan sanski sesuai kode etik.</p>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama UKM</th>
                <th scope="col" colspan="3" style="text-align:center;">Aksi</th>
                
                </tr>
            </thead>
            <tbody>
            <?php 
                $nomor = 1;
                while($rcrd = mysqli_fetch_assoc($hslSelect)){
                echo "<tr>";
                echo "<th>$nomor</th>";
                echo "<td>".$rcrd["namaUKM"]."</td>";
                ?>
                <td><a href="pdfPenghapusanUKM.php?namaUKM=<?=$rcrd["namaUKM"];?>&user=<?= $_SESSION["username"];?>" target="_blank" class="badge badge-info float-right mr-5">Pengajuan Penghapusan</a></td>
                <td><a href="pemeilikberita.php?id=<?=$rcrd["namaUKM"];?>" class="badge badge-success float-center tampilModal" data-toggle="modal" data-target="#formModal" data-id="<?= $rcrd["namaUKM"] ?>">Read more..</a></td>
                <td><a href="adminpage.php?deleteId=<?=$rcrd["namaUKM"];?>" class="badge badge-danger  float-center delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                
                <?php
                echo "</tr>";
                $nomor++;
                }
            ?>
            </tbody>
        </table>

        <!-- MODALS -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data UKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nama UKM : <br><br>
                <input class="form-control" name = "nama_ukm" type="text" id="nama_ukm" placeholder="Readonly input here…" readonly >
                <hr>
                Deskripsi UKM :
                <textarea class="form-control" name = "deskripsi_ukm" id="deskripsi_ukm" rows="3" readonly></textarea>
                <hr>
                Pemilik UKM : <br><br>
                <input class="form-control" name = "pemilik_ukm" type="text" id="pemilik_ukm" placeholder="Readonly input here…" readonly >
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
            </div>
            </div>
        </div>
        </div>
        <!-- AKHIR MODALS-->
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

    <!-- MODALS -->
    <script>
    $(function() {

        $('.tampilModal').on('click', function(){
           
            const id = $(this).data('id');
           
            
            
            $.ajax({
                url:'http://localhost/project/admin/ukmtampilmodal.php',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#nama_ukm').val(data.namaUKM);
                    $('#deskripsi_ukm').val(data.deskripsi);
                    $('#pemilik_ukm').val(data.pemilik);
            
                    
                }
            });
        });
        
    });
    </script>

</body>

</html>