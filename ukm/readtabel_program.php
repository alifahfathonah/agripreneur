   <?php
           //the page where this paging is used
         
            // calculate for the query LIMIT clause
            $stmt=$program->readAll($from_record_num, $records_per_page);
            $num=$stmt->rowCount();
        

            // display the products if there are any
            if($num>0){
             
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             
                        extract($row);
                    ?>
                    <div class="card" >
                      <img class="infoProduk" src="../admin/images/<?= $foto?>" alt="Avatar" style="width:100%;" data-toggle="modal" data-target="#formModalProduk" data-id="<?= $rcrdSelectProduk["id_produk"] ?>" data-nama="<?= $_GET["data"] ?>">
                      <div class="container-card p5 m5">
                        <h6><b><?= $judul_program?></b></h6> 
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                                if ($harga_program==0)
                                    echo "<p><i class='far fa-money-bill-alt mr-5' style='color:#57b846; margin-right:5px;'></i>Gratis</p>
                            ";
                                else
                                     echo "<p><i class='far fa-money-bill-alt mr-5' style='color:#57b846; margin-right:5px;'></i>".$harga_program."</p>
                            ";
                            ?>
                            </div>
                        </div>
                      </div>
                        <div class="absolom">
                            <a href="full_program.php?idprogram=<?= $id_program?>"data-role='read' data-id='{$id_program}' class='btn btn-hijau' style="padding:3px;">
                            <label style="font-size:14px;">Baca Lengkap</label> </a>
                        </div>
                    </div>

                    <?php
             
                // paging buttons will be here
            }
             
        }
            // tell the user there are no products
            else{
                echo "<div class='alert alert-info'>No products found.</div>";
            }    
        ?>

