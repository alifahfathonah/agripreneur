<?php 
include "koneksi.php";
include "cek_status_login.php";

if(isset($_GET["deleteId"])){
    $queryDelete = "DELETE FROM artikel WHERE id_artikel = '".$_GET["deleteId"]."'";
    mysqli_query($koneksi,$queryDelete);
}
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
                
                <li>
                  <a href="dashboard.php"><i class='fas fa-chart-area'></i>Dashboard
                  </a>
                </li>
                <li>
                    <a href="adminpage.php">
                    <i class='fas fa-building'></i>
                    UKM</a>
                </li>
                <li >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="  fas fa-file-alt"></i>
                    Artikel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="active">
                            <a href="halamanberita.php">Semua Artikel</a>
                        </li>
                        <li>
                            <a href="pemilikberita.php">Artikelku</a>
                        </li>
                    </ul>
                </li>
                <li class="">
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

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="#">Page</a>
                            </li>
                             <li class="nav-item dropdown">
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

            <!-- AWAL LIHAT -->
		<?php

			 $q = "SELECT * FROM artikel";	


			 $hslArtikel = mysqli_query($koneksi,$q);
    	?>
        <div class="tabcontent" id="Lihat">
                <h2>Database Artikel : </h2>
                 <br>
                 <div class="row">
                    <div class="col-md-1">
                          <button class="btn btn-info"><a href="cetakPDF.php?<?= $_SESSION["username"] ?>" target="_blank"> PDF &nbsp;<i class='fas fa-file-pdf'></i></a></button><br> 
                    </div>
                     
                    <div class="col-md-1">
                        <form action="excel.php" method="post">
                         <button name="excel" class="btn btn-success" style="margin-bottom:10px;">Excel &nbsp;<i class='fas fa-file-excel'></i></button>   
                            <input type="text" name="table" value="artikel" hidden>
                        </form>
                    </div>
                 </div>
            
            <br>
            
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori Artikel</th>
                            <th scope="col">Judul Artikel</th>
                            <th scope="col" colspan="2" style="text-align: center;">Action</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            
                        
                
			<?php 
                $nomor = 1;
				while ($rcrdArtikel = mysqli_fetch_assoc($hslArtikel)) {
                     echo "<tr>";
                     echo "<th>$nomor</th>";
					 echo "<td>".$rcrdArtikel["kategori_artikel"]."</td>";
                     echo "<td>".$rcrdArtikel["judul_artikel"]."</td>";
                     ?>
                     
                     <td><a href="pemeilikberita.php?id=<?=$rcrdArtikel["id_artikel"];?>" class="badge badge-success float-right tampilModal" data-toggle="modal" data-target="#formModal" data-id="<?= $rcrdArtikel["id_artikel"] ?>">Read more..</a></td>
                    
                     <td><a href="halamanberita.php?deleteId=<?=$rcrdArtikel["id_artikel"];?>" class="badge badge-danger float-right delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                     
                     
                     <?php
                     echo "<tr>";
                     $nomor++;
				}

			?>
                        </tbody>

			</table>
            </div>

            <!-- MODALS LIHAT -->
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
                <input type="text" name="id_artikel" id="id_artikel" style="display:none;">
                Pemilik artikel : <br><br>
                <input class="form-control" name = "pemilik_artikel" type="text" id="pemilik_artikel" placeholder="Readonly input here…" readonly >
                <hr>
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
                <input class="form-control" type="text" id="gambar_artikel" placeholder="Readonly input here…" readonly>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnSave" type="submit" class="btn btn-primary" style=display:none;>Save changes</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- AKHIR LIHAT -->
           </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type='text/javascript' src="js/jquery-3.3.1.min.js"> </script>
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
                url:'http://localhost/project/admin/artikelubahmodal.php',
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
                    if(!data.user_staff ){
                        $('#pemilik_artikel').val(data.user_ukm);
                    }else
                        $('#pemilik_artikel').val(data.user_staff);
                    
                }
            });
        });
        
    });
    </script>
</body>

</html>