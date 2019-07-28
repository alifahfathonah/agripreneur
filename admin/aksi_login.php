<?php
 $un = $_GET["uname"];
 $ps = $_GET["psw"];
 
 $q = "SELECT * FROM user
	   WHERE
	      username = '$un' 
		  AND
		  password = '$ps'";
 include "koneksi.php";
 
 $hsl = mysqli_query($koneksi,$q);
 if($rcrd = mysqli_fetch_assoc($hsl)){
    session_start();
	$_SESSION["nama"] = $rcrd["username"];
	
	$_SESSION["status"] = $rcrd["role"];
	
	header("location:setelah_login.php");	
 } 
 else{
   header("location:halamanawal.php?login=gagal");
 }
?>