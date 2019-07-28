<?php
include_once "database.php";
include_once "program.php";

$database=new Database();
$db = $database->getConnection();

$program=new program($db);

if(isset($_POST['id'])){

 		 $ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];       
                $target="images/".$new_img;

           if (file_exists("images/".$_POST['id_foto'])) {
            	# code...
           	unlink("images/".$_POST['id_foto']);
           	move_uploaded_file($_FILES['file']['tmp_name'], $target);
           		 $program->foto=$new_img;
            } 
                  

	$program->judul=$_POST['judul'];
	$program->isi=$_POST['isi'];
	$program->harga=$_POST['harga'];
	$program->waktu=$_POST['waktu'];
	$program->kategori=$_POST['kategori'];
	$program->id_program=$_POST['id'];
	$program->update();
}

?>