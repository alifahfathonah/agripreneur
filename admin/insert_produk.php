<?php  
	include "cek_status_login.php";
	include "koneksi.php";		

	if ( isset ($_POST["submit"])) {

		$nama_produk =$_POST["namaproduk"];
		$deksripsi_produk=$_POST["deksripsiproduk"];
		$pemilik_produk = $_SESSION["namaUKM"];

		$queryInsert = "INSERT INTO produk 
							VALUES
						('','$nama_produk','$deksripsi_produk','$pemilik_produk')";


		mysqli_query($koneksi,$queryInsert);

		$query="SELECT * FROM produk WHERE nama_produk='".$nama_produk."' AND pemilik_produk = '".
		$pemilik_produk."' ";
		$hasil=mysqli_query($koneksi,$query);
		$value=mysqli_fetch_assoc($hasil);
		$id_produk=$value["id_produk"];


		 $j = 0; //Variable for indexing uploaded image 
		    
			 //Declaring Path for uploaded images
		    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
		    	$target_path = "images/";
		        $validextensions = array("jpeg", "jpg", "png","JPG","PNG");  //Extensions which are allowed
		        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
		        $file_extension = end($ext); //store extensions in the variable
		        $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];
				$target_path = $target_path . $new_img;//set the target path with a new name of image
		        $j = $j + 1;//increment the number of uploaded images according to the files in array       
		      
			  if (  in_array($file_extension, $validextensions)) {
		            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
					               
					$gambar="INSERT INTO `project`.`gambar` (`image`, `id_produk`)
					 VALUES ('".$new_img."', '".$id_produk."');";		

					 mysqli_query($koneksi,$gambar);

		                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
		            } else {//if file was not moved.
		              echo $j. ').<span id="error">please try again!.</span><br/><br/>';
		            }
		        } else {//if file size and file type was incorrect.
		            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
		        }
		    }

		if (mysqli_affected_rows($koneksi) > 0) {
			echo "
				<script>
					alert('data berhasil ditambahkan!');
				</script>
			";
		}else {
			echo "
				<script> 
					alert('data gagal ditambahkan!');
				</script>
			";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Produk</title>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       <script src="js/uploadgambar.js"></script>
       <link rel="stylesheet" type="text/css" href="css/uploadgambar.css">
</head>
<body>

<h2>FORM INPUT PRODUK</h2>
<form action="" method="post" enctype="multipart/form-data">
	Nama Produk : <br>
	<input type="text" name="namaproduk" required><p>
	Deskripsi Produk : <br>
	<textarea name="deksripsiproduk" required></textarea>
          <div id="filediv"><input name="file[]" type="file" id="file" accept="image/*"/></div><br/>
        <input type="button" id="add_more" class="upload" value="Tambah Foto"/>
       <input type="submit" value="Tambah Data" name="submit" id="upload" class="upload"/>

</form>

<a href="setelah_login.php">Kembali ke list Produk</a>
</body>


</html>