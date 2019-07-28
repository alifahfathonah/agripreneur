<?php
include("koneksi.php");
if(isset($_GET['submit'])){
    $query = "INSERT INTO user (`username`, `password`, `nama_mas`, `jk_mas`, `alamat_mas`, `kota_mas`, `notelp_mas`, `email_mas`, `role`) VALUES
             ('".$_GET["username"]."',
             '".$_GET["password"]."',
             '".$_GET["nama"]."',
             '".$_GET["jeniskelamin"]."',
             '".$_GET["alamat"]."',
             '".$_GET["kota"]."',
             '".$_GET["notelp"]."',
             '".$_GET["email"]."', 1 )";
$hsl = mysqli_query($koneksi,$query);
header("location:daftar_akun_berhasil.php");
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Akun</title>
  
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
      <link rel="stylesheet" href="css/daftar_akun.css">
</head>

<body>
  <!-- multistep form -->
<form id="msform"  method="get">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">

<li></li>
<li></li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">
Buat Akun</h2>
<!--<p class="help-block">List your strengths here.</p>-->
    	 <input type="text" placeholder="Username" name="username" required>
		<input type="password" placeholder="Password" name="password" required>
    	<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>

	<fieldset>
		<h2 class="fs-title">Nama dan Email</h2>
		<input type="text" placeholder="Nama" name="nama">
    	<input type="text" placeholder="Email" name="email" required>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Detail</h2>
			<h6 style="text-align: left;" class="fs-title">Jenis Kelamin</h6>
			<label class="container">Pria
			  <input type="radio" checked="checked" value="L" name="jeniskelamin">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Wanita
			  <input type="radio" name="jeniskelamin" value="P">
			  <span class="checkmark"></span>
			</label>
		<input type="text" placeholder="Nomor Hp" name="notelp" >
		<input type="text" placeholder="Kota" name="kota">
		<textarea col="30" row="30" placeholder="Alamat" name="alamat"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="action-button" value="Submit" />
	</fieldset>

</form>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script  src="js/daftar_akun.js"></script>

</html>
