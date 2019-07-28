<?php
include_once "database.php";

$database = new Database();
$db = $database->getConnection();


		$q = "SELECT * FROM konsultan WHERE kategori_konsultan='Branding/Pemasaran'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numBranding =  $stmt->rowCount();

		$q = "SELECT * FROM konsultan WHERE kategori_konsultan='Keuangan dan Pajak'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numKeuangan =  $stmt->rowCount();

		$q = "SELECT * FROM konsultan WHERE kategori_konsultan='Legalitas dan Perizinan'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numPerizinan =  $stmt->rowCount();	

		$q = "SELECT * FROM konsultan WHERE kategori_konsultan='Rencana Bisnis'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numBisnis =  $stmt->rowCount();	



		$d = array();

		$kategori= array("Branding/Pemasaran","Keuangan dan Pajak","Legalitas dan Perizinan","Rencana Bisnis");
		$num =array($numBranding,$numKeuangan,$numPerizinan,$numBisnis);
		
		for ($i=0; $i < 4; $i++) { 
			array_push($d,array("label"=>$kategori[$i],
			 "value"=>$num[$i])); //label nama index
		}

		
		
		$c = array(
			"caption"=>"Total konsultan",
					"subCaption"=>"Berdasarkan Kategori",		
					"theme"=>"fint"
			);

		$gab =array("chart"=>$c, "data"=>$d);
		$j=json_encode($gab);
		echo $j;

?>