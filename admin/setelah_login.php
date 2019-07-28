<?php  

include "cek_status_login.php";
include "koneksi.php";

/*if ($_SESSION["status"] == "UKM") {
	echo "ini login UKM";
}
else
	echo "ini login user";
*/

if ($_SESSION['status'] == 2) {

	$namapemilik = $_SESSION["nama"];
	echo "Selamat datan Mitra UKM ".$namapemilik." ";

	
 $q = "SELECT * FROM ukm WHERE pemilik = '$namapemilik'";	


 

 $hsl = mysqli_query($koneksi,$q);
 $rcrd = mysqli_fetch_assoc($hsl);
 $_SESSION["namaUKM"] = $rcrd["namaUKM"];

echo "<br>Nama UKM anda = ".$rcrd["namaUKM"]."";
 echo "<br>";
 echo "Deskripsi : ";
 echo $rcrd["deskripsi"];
 echo "<br> Pemilik : ";
 echo $rcrd["pemilik"];
//INI QUERY UNTUK LIST PRODUK
 $qProd = "SELECT DISTINCT nama_produk,deskripsi_produk FROM produk as p INNER JOIN 
 gambar as g ON p.id_produk=g.id_produk where pemilik_produk = '".$rcrd["namaUKM"]."'";

 $eksQuer = mysqli_query($koneksi,$qProd);
 //-----------------------------
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style type="text/css">
	img{
		width: 100px;
		height: 100px;
	}


</style>
<body>


<table border="1" cell>
	<tr>
		<th>Nomor</th>
		<th>Nama Produk</th>
		<th>Deskripsi Produk</th>
		<th>Foto</th>
		<th>Action</th>
	</tr>
  <?php
  	$nomor = 1;
  		while ($arrayHsl = mysqli_fetch_assoc($eksQuer)) {
  			echo "<tr>";
  				echo"<td>$nomor</td>";
  				$nomor++;
  			echo "<td>".$arrayHsl["nama_produk"]."</td>";
  			echo "<td>".$arrayHsl["deskripsi_produk"]."</td>";
		
				$query="SELECT * FROM produk WHERE
				 nama_produk='".$arrayHsl["nama_produk"]."' AND pemilik_produk = '".
					 $_SESSION["namaUKM"]."' ";
					$hasil=mysqli_query($koneksi,$query);
					$value=mysqli_fetch_assoc($hasil);
					$id_produk=$value["id_produk"];

				$sqlgambar="SELECT DISTINCT image FROM gambar WHERE id_produk='".$id_produk."' ";
				$hsl=mysqli_query($koneksi,$sqlgambar);
				echo "<td>";
			    	while ($row=mysqli_fetch_assoc($hsl)) {
			    		echo "<img src='images/".$row["image"]."'></img>";
			  			
			    	}
				echo "</td>";
  				/*
  				foreach ($arrayHsl as $key => $value) {
  					echo "<td>";
  					if ($key!=)
  					echo "$value";
  					echo "</td>";
  				}*/
  			echo "<td>";

  			?>
  			<a href="">Update</a> | <br>

  			<a href="delete_produk.php?id=<?php echo $id_produk; ?>
  			" onclick="return confirm('Apakah Anda yakin?')"> Delete</a>
  			<?php
  			echo "</td>";
  			echo "</tr>";
  		}
   ?>
</table>
<a href="insert_produk.php">Tambah Produk Anda</a>
<form action="pemilikberita.php">
	<button> Halaman berita yang anda Input </button>


</form>
<?php	

}
else{
	echo "ini halaman User";
	echo "<br>";
	
	?>
	<br>
	<form action="daftar_ukm.php">
		<input type="submit" value="Daftar Menjadi UKM">	
	</form>
	
	<?php
	}
?>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>

