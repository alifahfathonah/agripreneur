<?php
include_once "cek_status_login.php";
include_once "program.php";
include_once "database.php";
include_once "rupiah.php";

$database = new Database();
$db = $database->getConnection();
 
$program = new program($db);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Page</title>
    
 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="css/tablink.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

     <style type="text/css">
     .rightt{
        position: relative;
      left: 75%;
     }
     .round{
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #57b846;
        margin: 5px;
     }
     .modal-content{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        border: none;
     }
      .modal-content h3,h4,h5{
        color: black;
     }
     .modal-header{
         background: #57b846;
     }
      .modal-header > h4,h5,h3{
         color: white;
     }
    .text{
        width: 200px;
     white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    </style>
</head>
<body>


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="images/Logo2.png" width="200" height="200">
            </div>

            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li>
                  <a href="dashboard.php"><i class='fas fa-chart-area'></i>Dashboard
                  </a>
                </li>
                <li>
                    <a href="adminpage.php">
                    <i class='fas fa-building'></i>
                    UKM</a>
                </li>
                <li >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="  fas fa-file-alt"></i>
                    Artikel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="halamanberita.php">Semua Artikel</a>
                        </li>
                        <li>
                            <a href="pemilikberita.php">Artikelku</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#">
                    <i class="  fas fa-dollar-sign"></i>
                    Program Pendanaan</a>
                </li>
                <li>
                    <a href="create_konsultan.php">
                <i class='fas fa-chalkboard-teacher'></i>
                    Konsultasi</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="#">Page</a>
                            </li>
                             <li class="nav-item dropdown ">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["username"]; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                              </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="tab">
              <button class="tablinks" onclick="openTab(event, 'Buat')">Buat</button>
              <button class="tablinks active" onclick="openTab(event, 'Lihat')">Lihat</button>
            </div>
<!-- AWAL SLIDE BUAT -->
        <div id="Buat" class="tabcontent" style="display: none;">

        <?php

        if(isset($_POST["submit"])){
            $program->judul=$_POST["judul"];
            $program->isi=$_POST["isi"];
            $program->harga=$_POST["harga"];
            $program->waktu=$_POST["waktu"];
            $program->kategori=$_POST["kategori"];

                $ext = explode('.', basename($_FILES['image']['name']));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
                $new_img= md5(uniqid()) . "." . $ext[count($ext) - 1];        
                $target="images/".$new_img;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
                    $program->foto=$new_img;

            if ($program->create()){
                echo "
        <script> 
          document.location.href = 'create_program.php';
        </script>
      ";
                echo "<div class='alert alert-success'>Berhasil dibuat</div>";

            }   
        }
        ?>

        <form enctype="multipart/form-data" method="post">
     
        <table class='table table-hover table-responsive table-bordered'>
     
            <tr>
                <td>Judul</td>
                <td style="width:100%;"><input type='text' name='judul' class='form-control' /></td>
            </tr>
     
            <tr>
                <td>isi</td>
                <td><textarea style="height: 200px; width:100%;" maxlength="10000" name='isi' class='form-control'></textarea></td>
            </tr>
     
            <tr>
                <td>Category</td>
                <td>
                <!-- categories from database will be here -->
                    <select class="form-control" name="kategori">
                        <option value="Pelatihan">Pelatihan</option>
                        <option value="Bincang Bisnis">Bincang Bisnis</option>
                        <option value="Pendanaan">Pendanaan</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Coaching dan Mentoring">Coaching dan Mentoring</option>
                        <option value="Kompetisi">Kompetisi</option>
                        <option value="Akses Teknologi">Akses Teknologi</option>
                        <option value="Pameran">Pameran</option>     
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" class="form-control" name="harga"/></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td><input type="datetime-local" class="form-control" name="waktu" /></td>
            </tr>
        
            <tr>
                <td>Foto</td>
                <td><input type="file" class="form-control" name="image"/></td> 
            </tr>

            <tr>
                <td></td>
                <td>
                    <button name="submit" type="submit" class="btn btn-primary">Create</button>
                </td>
            </tr>
     
        </table>
    </form>
</div>

<!-- AKHIR SLIDE BUAT -->

<!-- AWAL SLIDE LIHAT -->

<div class="tabcontent"  id="Lihat">
     <?php 
        echo "<form role='search' action='search.php'>";
        echo "<div class='input-group rightt col-md-3 pull-left mb-3 mr-3' class='form-control'>";
            $search_value=isset($search_term) ? "value='{$search_term}'" : "";
            echo "<input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required {$search_value} />";
            echo "<div class='input-group-btn'>";
                echo "<button class='btn btn-success ml-2' type='submit'><i class='fas fa-search'></i></button>";
            echo "</div>";
        echo "</div>";
    echo "</form>";
   // page given in URL parameter, default page is one
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            // set number of records per page
            $records_per_page = 5;

            $from_record_num = ($records_per_page * $page) - $records_per_page;
        $page_url = "create_program.php?";
         
        // count all products in the database to calculate total pages
        $total_rows = $program->countAll();
           
     include_once "readtabel_program.php" 

     ?>
     
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <form  id="edit_form" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    <textarea id="isi" class="form-control" name="isi" rows="5" cols="20"> </textarea> 
                 </div>
                 <div class="row">
                        <div class="col-md-3"> 
                             <div class="form-group">
                                <label>Harga</label>
                             <input type="number" id="harga" name="harga" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-5">      
                             <div class="form-group">
                                <label>Waktu Penyelenggaraan</label>
                                <input type="datetime-local" id="waktu" name="waktu" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-4"> 
                             <div class="form-group">
                                <label>Kategori</label>
                                 <select class="form-control" id="kategori" name="kategori">
                                    <option value="Pelatihan">Pelatihan</option>
                                    <option value="Bincang Bisnis">Bincang Bisnis</option>
                                    <option value="Pendanaan">Pendanaan</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Coaching dan Mentoring">Coaching dan Mentoring</option>
                                    <option value="Kompetisi">Kompetisi</option>
                                    <option value="Akses Teknologi">Akses Teknologi</option>
                                    <option value="Pameran">Pameran</option>     
                                </select>
                            </div>
                         </div>
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    <input type="file" name="file" class="form-control" id="file" enctype="multipart/form-data" />
                 </div>
              
                <input type="hidden" id="progId" name="id" class="form-control">  
                <input type="hidden" id="id_foto" name="id_foto" class="form-control">    
              </div>
              <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>

          </div>
    </div>

   


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="fotoread" class="rounded mx-auto d-block" style="width: 300px; height=: 200px; ">
        <br><br>
         <h4>Deksripsi</h4>
        <div class="row round">
            <div class="col-md-4">
            <i class="  fas fa-dollar-sign" style='color: #57b846;'></i>
                <a id="hargaread"></a>
            </div>
            <div class="col-md-4">
            <i class="  fas fa-calendar" style='color: #57b846;'></i>        
               <a id="wakturead"></a>
            </div>
             <div class="col-md-4">
             <i class='fas fa-book-open' style='color: #57b846;'></i>     
               <a id="kategoriread"></a>
            </div>
        </div> <br>
        <a id="isiread"></a>
        <br><br>
       
  
        </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        </div>


        </div>
    </div>

     <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script>
        $(document).ready(function(){

                $(document).on('click','a[data-role=read]',function(){
                var id =$(this).data('id');
                var judul=$('#'+id).children('td[data-target=judul]').text();
                var isi=$('#'+id).children('td[data-target=isi]').html();
                var hargarupiah=$('#'+id).children('td[data-target=hargarupiah]').text();
                var harga=$('#'+id).children('td[data-target=harga]').text();
                var waktu=$('#'+id).children('td[data-target=waktu]').text();
                var kategori=$('#'+id).children('td[data-target=kategori]').text();
                var id_foto=$('#'+id).children('td[data-target=id_foto]').text();
                
                $('#exampleModalLongTitle').text(judul);
                $('#isiread').html(isi);
                $('#fotoread').attr("src","images/"+id_foto);
                $('#wakturead').text(" "+waktu);
                $('#kategoriread').text("Kategori : "+kategori);
                if(harga=="0"){
                    $('#hargaread').text(" GRATIS");
                }
                else{
                    $('#hargaread').text(" "+hargarupiah);
                }

             
                $('#exampleModalLong').modal('toggle');
                 
            });

            $(document).on('click','a[data-role=update]',function(){
                var id =$(this).data('id');
                var judul=$('#'+id).children('td[data-target=judul]').text();
                var isi=$('#'+id).children('td[data-target=isi]').text();
                var harga=$('#'+id).children('td[data-target=harga]').text();
                var waktu=$('#'+id).children('td[data-target=waktu]').text();
                var kategori=$('#'+id).children('td[data-target=kategori]').text();
                var id_foto=$('#'+id).children('td[data-target=id_foto]').text();
           
                $('#id_foto').val(id_foto);
                $('#judul').val(judul);
                $('#isi').val(isi);
                $('#harga').val(harga);
               $('#waktu').val(waktu);
                $('#kategori').val(kategori);
                $('#progId').val(id);
                $('#myModal').modal('toggle');
                 
            });

        $('#save').click(function(e){
            e.preventDefault();  
        var data = new FormData();
        var id_foto = $('#id_foto').val();
        var id  = $('#progId').val();
         var judul =  $('#judul').val();
          var isi =  $('#isi').val();
          var harga =   $('#harga').val();
          var waktu =   $('#waktu').val();
          var kategori = $('#kategori').val();


          var name = document.getElementById("file").files[0].name;
            var ext = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
            {
             error_images += '<p>Invalid '+i+' File</p>';
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);
            var f = document.getElementById("file").files[0];
            var fsize = f.size||f.fileSize;
            if(fsize > 10000000)
            {
             error_images += '<p>' + i + ' File Size is very big</p>';
            }
            else
            {
             data.append('file', document.getElementById('file').files[0]);
            }

        data.append('id_foto',id_foto);
        data.append('id',id); 
        data.append('judul',judul);
        data.append('isi',isi);
        data.append('harga',harga);
        data.append('waktu',waktu);
        data.append('kategori',kategori);
          $.ajax({  
              url      : 'edit_program.php',
              method   : 'post',  
                data     : data,
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=judul]').text(judul);
                             $('#'+id).children('td[data-target=isii]').text(isi);
                             $('#'+id).children('td[data-target=hargarupiah]').text(harga);
                             $('#'+id).children('td[data-target=waktu]').text(waktu);
                             $('#'+id).children('td[data-target=kategori]').text(kategori);
                            $('#'+id).children('td[data-target=foto]').attr('src','images/'+id_foto);
                        
                             $('#myModal').modal('toggle'); 

                         },
        cache: false,
        contentType: false,
        processData: false

          });
       });
        
       
  

            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
              
        });

  
    </script>
    <script type="text/javascript">
          function openTab(evt, name) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(name).style.display = "block";
        evt.currentTarget.className += " active";
    }

    </script>
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
</body>

</html>