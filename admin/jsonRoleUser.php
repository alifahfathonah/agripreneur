<?php
include_once "database.php";

$database = new Database();
$db = $database->getConnection();


		$q = "SELECT * FROM user WHERE role=2";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numUkm =  $stmt->rowCount();

		$q = "SELECT * FROM user WHERE role=1";
		$stmt= $db->prepare($q);
		$stmt->execute(); 
		$numUser =  $stmt->rowCount();

		$d = array();

		$role= array("Bukan UKM","UKM");
		$num =array($numUser,$numUkm);
		
		for ($i=0; $i < 2; $i++) { 
			array_push($d,array("label"=>$role[$i],
			 "value"=>$num[$i])); //label nama index
		}

		
		
		$c = array(
			"caption"=>"Informasi User",
					"subCaption"=>"UKM dan bukan UKM",		
					"theme"=>"fint"
			);

		$gab =array("chart"=>$c, "data"=>$d);
		$j=json_encode($gab);
		echo $j;

?>