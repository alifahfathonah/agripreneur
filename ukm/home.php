<?php 
include "koneksi.php";
include "cek_status_login.php";
echo $_SESSION["username"];

if(isset($_POST["submit"])){

    $query = "INSERT INTO ukm VALUES 
                ('".$_POST['namaUKM']."',
                '".$_POST['deskUKM']."',
                '".$_SESSION["username"]."') ";

    mysqli_query($koneksi,$query);

    $query2  = "UPDATE user SET role = 2 WHERE username = '".$_SESSION["username"]."' " ;
    mysqli_query($koneksi,$query2);

    header("Location: home.php");
}

echo " HOME UKM";
echo "<br>";
echo "UKM anda : <br>";
$query3 = "SELECT namaUKM from UKM WHERE pemilik = '".$_SESSION["username"]."'";
$hsl = mysqli_query($koneksi,$query3);
while($rcrd = mysqli_fetch_assoc($hsl)){
    echo $rcrd["namaUKM"];
    echo " <a href='homeukm.php?ukm=".$rcrd["namaUKM"]."'>Manipulasi UKM</a>";
    echo "<br>";
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HOME UKM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #form1{
        display:none;
    }
    </style>
</head>
<body>
    
<br>
    <button id="formButton">Tambah UKM </button>
    <form id="form1" method="post">
        <br>Nama UKM : <br>
        <input type="text" name = "namaUKM"> <br>
        <br>Deskripsi UKM : <br>
        <input type="text" name="deskUKM"><br>
        <button name="submit" type="submit"> submit </button>
    </form>
</body>
<script src="jquery.js"></script>
<script>
$("#formButton").click(function(){
        $("#form1").toggle();
    });
</script>
</html>
