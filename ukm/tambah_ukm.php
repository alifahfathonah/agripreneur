<?php
include "koneksi.php";
include "cek_status_login.php";
echo $_SESSION["username"];
echo "HOME USER";

if(isset($_POST["submit"])){

                $ext = explode('.', basename($_FILES['image']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
                $target="img/".$new_img;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            
    $query = "INSERT INTO ukm VALUES 
                ('".$_POST['nama']."',
                '".$_POST['deskripsi']."',
                '".$_SESSION["username"]."',
                '".$_POST['alamat']."',
                '".$_POST['no_telp']."',
                '".$new_img."') ";

    mysqli_query($koneksi,$query);

    $query2  = "UPDATE user SET role = 2 WHERE username = '".$_SESSION["username"]."' " ;
    mysqli_query($koneksi,$query2);

    $_SESSION["role"]=2;

    header("Location: tambah_ukm_berhasil.php");
    
}

?>

<html lang="en" >

<head>
  <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah UKM</title>
  
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
      <link rel="stylesheet" href="css/daftar_akun.css">
</head>

<body>
  <!-- multistep form -->
<div></div>

<form id="msform"  method="post" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active" style="margin-left:240px;">

<li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Tambah Ukm</h2>
<!--<p class="help-block">List your strengths here.</p>-->
         <input type="text" placeholder="Nama UKM" name="nama" required>
          <textarea col="30" row="30" placeholder="Deskripsi UKM" name="deskripsi"></textarea>
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>

    <fieldset>
        <h2 class="fs-title">Detail</h2>
        <input type="text" placeholder="Nomor Hp" name="no_telp" >
        <input type="file" class="form-control" name="image"/>
         <textarea col="30" row="30" placeholder="Alamat UKM" name="alamat"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class=" action-button" value="Submit" />
    </fieldset>

</form>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script  src="js/daftar_akun.js"></script>

</html>
