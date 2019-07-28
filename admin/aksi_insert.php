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


		 $j = 0; //Variable for indexing uploaded image 
		    
			$target_path = "images/"; //Declaring Path for uploaded images
		    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

		        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
		        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
		        $file_extension = end($ext); //store extensions in the variable
		        
				$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
		        $j = $j + 1;//increment the number of uploaded images according to the files in array       
		      
			  if (($_FILES["file"]["size"][$i] < 100000) //Approx. 100kb files can be uploaded.
		                && in_array($file_extension, $validextensions)) {
		            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
		                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
		            } else {//if file was not moved.
		                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
		            }
		        } else {//if file size and file type was incorrect.
		            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
		        }
		    }

						
		/*$queryInsert.= "INSERT INTO gambar VALUES ('$image',)"; */

		mysqli_query($koneksi,$queryInsert);

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
					document.location.href = 'setelah_login.php';
				</script>
			";
		}

	}
?>