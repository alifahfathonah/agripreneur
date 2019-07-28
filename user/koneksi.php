<?php
 //konfigurasi koneksi
 $server        = "localhost";
 $user_name     = "root";
 $password      = "";
 $database_name = "project";
 
 $koneksi = mysqli_connect($server,
      $user_name,$password,$database_name);

?>