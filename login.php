<?php 
include "koneksi.php";
if(isset($_POST["submit"])){
        $queryCheck = "SELECT * FROM user 
                        WHERE
                            username = '".$_POST["username"]."' 
                        AND
                            password = '".$_POST["password"]."'";
        
        $hsl = mysqli_query($koneksi,$queryCheck);

        $queryCheck2 = "SELECT * FROM  staff
                        WHERE
                            uname ='".$_POST["username"]."' 
                        AND
                            password = '".$_POST["password"]."' ";
        $hsl2 = mysqli_query($koneksi,$queryCheck2);
        
        if($rcrd = mysqli_fetch_assoc($hsl) OR $rcrd2= mysqli_fetch_assoc($hsl2)){
            session_start();
            
            $_SESSION["role"]=$rcrd["role"];
            if($rcrd["role"] == 1){
                $_SESSION["username"] = $rcrd["username"];  
                header("location:ukm/index.php");
            }else if($rcrd["role"] == 2){
                $_SESSION["username"] = $rcrd["username"];  
                header("location:ukm/index.php");
            }else{
                $_SESSION["username"] = $rcrd2["uname"]; 
                header("location:admin/dashboard.php");
            }
        } 
   
        else{
        header("location:login.php?login=gagal");
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="logincss.css" />
    <script src="main.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row" >
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" >
        <div class="card card-signin my-5" style="border-radius:5px;">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <?php 
            if(isset($_GET["login"])){
              ?>
              <div class="alert alert-danger" role="alert">
                Username / Password Salah.
              </div>
              <?php
            }
            ?>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" >
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-success btn-block text-uppercase" name="submit" type="submit">Sign in</button>
              <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              
            </form>
            <br>
            <form action="user/daftar_akun.php"><button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"> Register</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    
</body>
</html>