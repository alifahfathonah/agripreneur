<?php  
include "cek_status_login.php";
include "koneksi.php";

if ( isset ($_POST["submit"])) {

		$nama_ukm =$_POST["namaukm"];
		$deskripsi_ukm = $_POST["deskripsiukm"];
		$pemilik_ukm = $_SESSION["nama"];

		

		$queryInsert = "INSERT INTO ukm 
							VALUES
						('$nama_ukm','$deskripsi_ukm','$pemilik_ukm')";
		

		mysqli_multi_query($koneksi,$queryInsert);

		

		

		if (mysqli_affected_rows($koneksi) > 0) {
		
			$queryUpdate= "UPDATE user
						SET role = 2 WHERE username = '$pemilik_ukm' "; 
			mysqli_multi_query($koneksi,$queryUpdate);


			echo "

				<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'halamanawal.php';
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

<form action="" method="post">
	Nama UKM : <br>
	<input type="text" name="namaukm"><p>
	Deskripsi UKM : <br>
	<textarea name="deskripsiukm"></textarea><br>

	<button type="submit" name="submit">Daftar Mejadi Mitra UKM!</button>


	

</form>