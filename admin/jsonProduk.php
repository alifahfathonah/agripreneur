<?php
include_once "database.php";

$database = new Database();
$db = $database->getConnection();


		$q = "SELECT * FROM produk WHERE kategori_produk='Makanan'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numMakanan =  $stmt->rowCount();

		$q = "SELECT * FROM produk WHERE kategori_produk='Minuman'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numMinuman =  $stmt->rowCount();

		$q = "SELECT * FROM produk WHERE kategori_produk='Camilan'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numCamilan =  $stmt->rowCount();	

		$q = "SELECT * FROM produk WHERE kategori_produk='Kriya'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numKriya =  $stmt->rowCount();	


		$q = "SELECT * FROM produk WHERE kategori_produk='Teknologi'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numTeknologi =  $stmt->rowCount();	

		$q = "SELECT * FROM produk WHERE kategori_produk='Bahan Mentah'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numBahan =  $stmt->rowCount();	


		$d = array();

		$kategori= array("Makanan","Minuman","Camilan","Kriya","Teknologi",
			"Bahan Mentah");
		$num =array($numMakanan,$numMinuman,$numCamilan,$numKriya,
			$numTeknologi,$numBahan);
		
		for ($i=0; $i < 6; $i++) { 
			array_push($d,array("label"=>$kategori[$i],
			 "value"=>$num[$i])); //label nama index
		}

		
		
		$c = array(
			"caption"=>"Total produk",
					"subCaption"=>"Berdasarkan Kategori",		
					"theme"=>"fint"
			);

		$gab =array("chart"=>$c, "data"=>$d);
		$j=json_encode($gab);
		echo $j;

?>