<?php


include_once "database.php";
include_once "konsultan.php";

$database=new Database();
$db = $database->getConnection();
$konsultan=new konsultan($db);

if(isset($_POST['id'])){
	$konsultan->id_konsultan=$_POST['id'];
    unlink("images/".$_POST['id_foto']);
	 $konsultan->delete();

}

?>