<?php 
include "cek_status_login.php";
include "koneksi.php";


if (isset($_POST["submit"])) {
	$kategori_artikel = $_POST["kategoriArtikel"];
	$judul_artikel = $_POST["judulArtikel"];
	$desk_artikel = $_POST["deskripsiArtikel"];
	$isi_artikel = $_POST["isiArtikel"];
	$sumber_artikel = $_POST["sumberArtikel"];
	
	//path buatt store gambar yg udh dupload
	$target="images/".basename($_FILES['image']['name']);
	$image=$_FILES['image']['name'];

    $pemilik = $_SESSION["username"];

    $queryInsert = "INSERT INTO artikel VALUES 
	   					('','$kategori_artikel','$judul_artikel','$desk_artikel','$isi_artikel','$sumber_artikel','$pemilik',NULL,'$image')";

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
                <h3>Admin Page</h3>
            </div>

            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li>
                    <a href="#">UKM</a>
                </li>
                <li >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Artikel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="halamanberita.php">Semua Artikel</a>
                        </li>
                        <li class="active">
                            <a href="pemilikberita.php" >Artikelku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Program dan Pendanaan</a>
                </li>
                <li>
                    <a href="#">Konsultasi</a>
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
                                  <a class="dropdown-item" href="#">Logout</a>
                                </div>
                              </li>
                        </ul>
                    </div>
                </div>
            </nav>

				<link rel="stylesheet" type="text/css" href="style.css">
				<h2>Form Tambah Berita</h2>

				<form method="post"  enctype="multipart/form-data">

				Kategori Artikel : <br>
				<input type="text" name="kategoriArtikel"><p>
				Judul Artikel : <br>
				<input type="text" name="judulArtikel"><p>
				Deskripsi Artikel : <br>
				<input type="text" name="deskripsiArtikel"><p>
				Isi Artikel : <br>
				<input type="text" name="isiArtikel"><p>
				Sumber Artikel : <br>
				<input type="text" name="sumberArtikel"><p>
				<input type="hidden" name="size" value="1000000">
				<div>
					<input type="file" name="image">
				</div> 

				<button type="submit" name="submit">Tambah Berita !</button>


				</form>

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
</body>

</html>