<?php
include "cek_status_login.php";
include "koneksi.php";
if(isset($_GET["deleteId"])){
    $queryDelete = "DELETE FROM artikel WHERE id_artikel = '".$_GET["deleteId"]."'";
    mysqli_query($koneksi,$queryDelete);
}
if (isset($_POST["submit"])) {
	$kategori_artikel = $_POST["kategoriArtikel"];
	$judul_artikel = $_POST["judulArtikel"];
	$desk_artikel = $_POST["deskripsiArtikel"];
	$isi_artikel = $_POST["isiArtikel"];
	$sumber_artikel = $_POST["sumberArtikel"];
	$ext = explode('.', basename($_FILES['gambarArtikel']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
                $target="../ukm/img/".$new_img;
                if (move_uploaded_file($_FILES['gambarArtikel']['tmp_name'], $target))
                    $gambarArtikel = $new_img;

    $pemilik = $_SESSION["username"];

    $queryInsert = "INSERT INTO artikel VALUES 
	   					('','$kategori_artikel','$judul_artikel','$desk_artikel','$isi_artikel','$sumber_artikel','$pemilik',NULL,'$gambarArtikel')";

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

	mysqli_query($koneksi,$queryInsert);

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

}


/*if (strpos($_SESSION["nama"], 'staff') !== false) {
   	$qSelectId = "SELECT id FROM staff WHERE uname = '".$_SESSION["nama"]."' ";
   	$hasil = mysqli_query($koneksi,$qSelectId);
   	$value = mysqli_fetch_assoc($hasil);
   	$pemilik = $value["id"];

}else*/
	$pemilik = $_SESSION["username"];

$q = "SELECT * FROM artikel WHERE user_staff = '$pemilik'";


$hslArtikel = mysqli_query($koneksi,$q);



  ?>

<style type="text/css">
	img{
		width: 100px;
		height: 100px;
    }
    .rightt{
        position: relative;
      left: 75%;
     }
     .round{
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #57b846;
        margin: 5px;
     }
     .modal-content{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        border: none;
     }
      .modal-content h3,h4,h5{
        color: black;
     }
     .modal-header{
         background: #57b846;
     }
      .modal-header > h4,h5,h3{
         color: white;
     }
    .text{
        width: 200px;
     white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
</style>

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
    <link rel="stylesheet" type="text/css" href="css/tablink.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
    
    </style>
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
                        <li>
                            <a href="halamanberita.php">Semua Artikel</a>
                        </li>
                        <li class="active">
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

            <div class="tab">
              <button class="tablinks" onclick="openTab(event, 'Buat')">Buat</button>
              <button class="tablinks active" onclick="openTab(event, 'Lihat')">Lihat</button>
            </div>
            <?php 
            if(isset($_GET["aksi"])){
                if($_GET["aksi"] == "sukses"){
                    ?>
                        <div class="alert alert-success" role="alert">
                            Update data berhasil!
                        </div>
                    <?php
                }
                else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Update data gagal!
                    </div>
                    <?php
                }
            }
            ?>
            <!--AWAL LIHAT -->
            <div class="tabcontent" id="Lihat">
                <h2>Berita yang anda Post : </h2>
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori Artikel</th>
                            <th scope="col">Judul Artikel</th>
                            <th scope="col" colspan="3" style="text-align: center;">Action</th>
                           
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
                     <td><a href="pemeilikberita.php?id=<?=$rcrdArtikel["id_artikel"];?>" class="badge badge-primary float-right ubahModal" data-toggle="modal" data-target="#formModal" data-id="<?= $rcrdArtikel["id_artikel"] ?>">Update</a></td>
                     <td><a href="pemilikberita.php?deleteId=<?=$rcrdArtikel["id_artikel"];?>" class="badge badge-danger float-right delete" onclick="return confirm('Apakah adan yakin ingin menghapus?');">Delete</a></td>
                     
                     
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
            <!-- AKHIR LIHAT -->


            <!-- AWAL BUAT-->
            <br>
            
                

            <div id="Buat" class="tabcontent" style="display: none;"> 
            <div class="jumbotron">
                <div class="container">
            <h2>Form Tambah Berita</h2>

                <form method="post"  enctype="multipart/form-data">

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
                        <input type="file" name="gambarArtikel">
                    </div> 
                    <hr>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Tambah Berita !</button>


                </form>

            </div>
            </div>
            </div>
            <!-- AKHIR BUAT -->
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
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<!-- MODALS -->
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
                    var gambarnya = data.image;
                    $('#gambar_artikel').attr('src','../ukm/img/'+gambarnya);
                    
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
                    
                }
            });
            
            
        });
    });
</script>
</body>

</html>