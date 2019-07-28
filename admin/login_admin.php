<?php  
include "koneksi.php";

if (isset($_POST["submit"])) {

	 $queryCheck = "SELECT * FROM staff
		   WHERE
		      uname = '".$_POST["username"]."' 
			  AND
			  password = '".$_POST["password"]."'";

	 $hsl = mysqli_query($koneksi,$queryCheck);

	 if($rcrd = mysqli_fetch_assoc($hsl)){
	    session_start();
		$_SESSION["nama"] = $rcrd["uname"];
		
		
		
		header("location:adminpage.php");	
	 } 
	 else{
	   header("location:login_admin.php?login=gagal");
	 }




}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		Username : <br>
		<input type="text" name="username"><p>
		Password : <br>
		<input type="text" name="password"><p>

		<button type="submit" name="submit"> LOGIN </button>
		

	</form>
</body>
</html>


