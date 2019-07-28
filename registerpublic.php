<?php
include("koneksi.php");
if(isset($_POST['submit'])){
    $query = "INSERT INTO user (`username`, `password`, `nama_mas`, `jk_mas`, `alamat_mas`, `kota_mas`, `notelp_mas`, `email_mas`, `role`) VALUES
             ('".$_POST["username"]."',
             '".$_POST["password"]."',
             '".$_POST["nama"]."',
             '".$_POST["jeniskelamin"]."',
             '".$_POST["alamat"]."',
             '".$_POST["kota"]."',
             '".$_POST["notelp"]."',
             '".$_POST["email"]."', 1 )";

$hsl = mysqli_query($koneksi,$query);
echo "berhasil";   
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form method=post>
<h1> REGISTER </h1>
<br>
Username<br>
<input type="text" name="username"><br>
password<br>
<input type="text" name="password"><br>
nama<br>
<input type="text" name="nama"><br>
jeniskelamin<br>
<input type="text" name="jeniskelamin"><br>
alamat<br>
<input type="text" name="alamat"><br>
kota<br>
<input type="text" name="kota"><br>
notelp<br>
<input type="text" name="notelp"><br>
email<br>
<input type="text" name="email"><br>

<button type="submit" name="submit">Submit</button>

</form>

</body>
</html>