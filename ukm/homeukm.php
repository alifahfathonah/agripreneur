<?php 
include "koneksi.php";
include "cek_status_login.php";
if(isset($_POST["submit"])){

    $queryInsert = "INSERT INTO produk VALUES 
                    ('',
                    '".$_POST["namaProduk"]."',
                    '".$_POST["deskProduk"]."',
                    '".$_GET["ukm"]."')";
    mysqli_query($koneksi,$queryInsert);
    
}


$query = "SELECT * FROM ukm WHERE namaUKM = '".$_GET["ukm"]."' ";

$hsl = mysqli_query($koneksi,$query);
$rcrd = mysqli_fetch_assoc($hsl);

$query2 = "SELECT nama_produk,deskripsi_produk FROM produk WHERE pemilik_produk = '".$_GET["ukm"]."' ";


$hslProd = mysqli_query($koneksi,$query2);



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manipulasi UKM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #form1,#nm2,#nm1{
        display:none;
    }
    </style>
</head>
<body>
    <br>
    <h2>UKM <?= $_GET["ukm"]; ?> </h2>

    Deskripsi UKM : <br>
    <?= $rcrd["deskripsi"]?> 

    <br><br>
    Produk yang dimiliki : <br>
    <?php 
    if(mysqli_num_rows($hslProd)==0 ){
        echo 'tidak ada produk';
    }
    while($rcrdProd = mysqli_fetch_assoc($hslProd)){
        echo "Nama Produk : ";
        echo $rcrdProd['nama_produk'];
        echo "<br>";
        echo "Deskripsi Produk : ";
        echo $rcrdProd['deskripsi_produk'];
        echo "<br>";        
        echo "<br>";
    }
    
    ?>
    <br>
    <button id="formButton">Tambah Produk </button>
    <form id="form1" method="post">
        <br>Nama Produk : <br>
        <input type="text" name = "namaProduk"> <br>
        <br>Deskripsi Produk : <br>
        <input type="text" name="deskProduk"><br>
        Komoditas :<br>
        <button id="tmbKomoditas">Tambah Komoditas Baru </button><br>
        
        Nama Komoditas : <br>
        <input type="text" name="namaKomoditas" id="nm1"><br>
        Deskripsi Komoditas : <br>
        <input type="text" name="deskKomoditas" id="nm2"><br>
        
        <br><button name="submit" type="submit"> submit </button>
    </form>



</body>

<script src="jquery.js"></script>
<script>
$("#formButton").click(function(){
        $("#form1").toggle();
    });
$("#tmbKomoditas").click(function(){
        $("#nm1").toggle();
        $("#nm2").toggle();
    });
</script>
</html>