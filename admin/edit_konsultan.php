<?php
include_once "database.php";
include_once "konsultan.php";

$database=new Database();
$db = $database->getConnection();

$konsultan=new konsultan($db);

if(isset($_POST['id'])){

 		 $ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];       
                $target="images/".$new_img;

           if (file_exists("images/".$_POST['id_foto'])) {
            	# code...
           	unlink("images/".$_POST['id_foto']);
           	move_uploaded_file($_FILES['file']['tmp_name'], $target);
           		 $konsultan->foto=$new_img;
            } 
                  

	$konsultan->nama=$_POST['nama'];
	$konsultan->isi=$_POST['isi'];
	$konsultan->harga=$_POST['harga'];
	$konsultan->kategori=$_POST['kategori'];
	$konsultan->id_konsultan=$_POST['id'];
	$konsultan->update();
}

?>