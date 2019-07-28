<?php
include_once "database.php";

$database = new Database();
$db = $database->getConnection();


		$q = "SELECT * FROM program WHERE kategori_program='Seminar'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numSeminar =  $stmt->rowCount();

		$q = "SELECT * FROM program WHERE kategori_program='Bincang Bisnis'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numBincang =  $stmt->rowCount();

		$q = "SELECT * FROM program WHERE kategori_program='Pelatihan'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numPelatihan =  $stmt->rowCount();	

		$q = "SELECT * FROM program WHERE kategori_program='Pendanaan'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numPendanaan =  $stmt->rowCount();	


		$q = "SELECT * FROM program WHERE kategori_program='Coaching dan Mentoring'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numCoach =  $stmt->rowCount();	

		$q = "SELECT * FROM program WHERE kategori_program='Kompetisi'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numKompetisi =  $stmt->rowCount();	

		$q = "SELECT * FROM program WHERE kategori_program='Akses Teknologi'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numAkses =  $stmt->rowCount();	

		$q = "SELECT * FROM program WHERE kategori_program='Pameran'";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numPameran =  $stmt->rowCount();	


		$d = array();

		$kategori= array("Seminar","Pelatihan","Bincang Bisnis","Pelatihan","Pendanaan","Coaching dan Mentoring", "Kompetisi", "Akses Teknologi","Pameran");
		$num =array($numSeminar,$numPelatihan,$numBincang,$numPelatihan,$numPendanaan,$numCoach,$numKompetisi,$numAkses,$numPameran);
		
		for ($i=0; $i < 9; $i++) { 
			array_push($d,array("label"=>$kategori[$i],
			 "value"=>$num[$i])); //label nama index
		}

		
		
		$c = array(
			"caption"=>"Total Program",
					"subCaption"=>"Berdasarkan Kategori",		
					"theme"=>"fint"
			);

		$gab =array("chart"=>$c, "data"=>$d);
		$j=json_encode($gab);
		echo $j;

?>