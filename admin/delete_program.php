<?php


include_once "database.php";
include_once "program.php";

$database=new Database();
$db = $database->getConnection();
$program=new program($db);

if(isset($_POST['id'])){
	$program->id_program=$_POST['id'];
    unlink("images/".$_POST['id_foto']);
	 $program->delete();

}

?>