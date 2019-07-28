<?php  
	include "koneksi.php";		


	if (isset($_POST["submit"])) {
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$role = 1;

		$queryRegister = "INSERT INTO user 
							VALUES
							('$username','$password','$role')";

		mysqli_query($koneksi,$queryRegister);

		if (mysqli_affected_rows($koneksi) > 0) {
			echo "
				<script>
					alert('Registrasi Berhasil! Silahkan Login Kembali!');
					document.location.href = 'halamanawal.php';
				</script>
			";
		}else {
			echo "
				<script> 
					alert('data gagal ditambahkan!');
					document.location.href = 'halamanawal.php';
				</script>
			";
		}


	}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "" method="post">
		Username : <br>
		<input type="text" name="txtUsername" required><p>
		Password : <br>
		<input type="text" name="txtPassword" required><p>
		<button type="submit" name="submit">Register !</button>		

	</form>

</body>
</html>