<?php 
include "cek_status_login.php";

session_destroy();
header("Location: index.php");