   <?php
           //the page where this paging is used
         
            // calculate for the query LIMIT clause
            $stmt=$konsultan->readAll($from_record_num, $records_per_page);
            $num=$stmt->rowCount();
        

            // display the products if there are any
            if($num>0){
             
                echo "<table class='table table-hover table-responsive table-bordered'>";
                    echo "<tr>";
                        echo "<th style='width:200px;'>nama</th>";
                        echo "<th style='width:200px;'>isi</th>";
                        echo "<th style='width:130px;'>Harga</th>";
                        echo "<th style='width:130px;'>Kategori</th>";
                        echo "<th style='width:100px;'>Foto</th>";
                        echo "<th style='width:130px;'  >Action</th>";
                    echo "</tr>";
             
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             
                        extract($row);
             
                        echo "<tr id='{$id_konsultan}'>";
                            echo "<td data-target='nama'>{$nama_konsultan}</td>";
                            echo "<td ><p class='text'>".htmlspecialchars(strip_tags($isi_konsultan))."</p></td>";
                            echo "<td data-target='isi' style='display: none;'>{$isi_konsultan} </td>";
                            echo "<td  data-target='hargarupiah'>".rupiah($harga_konsultan)."</td>";
                            echo "<td data-target='harga' style='display: none;'>".$harga_konsultan."</td>";
                            echo "<td data-target='kategori' value='{$kategori_konsultan}'>{$kategori_konsultan}</td>";
                            echo "<td data-target='foto' value='{$foto}'><img src='images/{$foto}' style='width:100px; height:100px;'></td>";
                            echo "<td data-target='id_foto' style='display: none;'>".$foto."</td>";
                                // read one, edit and delete button will be here
                    echo "<td '><a  data-role='read' data-id='{$id_konsultan}' class='btn btn-primary left-margin ml-1 mb-1'>";
                        echo "<span class='fa fa-list'></span> Read";
                    echo "</a>";
                     
                    // edit product button
                    echo "<a  href='#' data-role='update' data-id='{$id_konsultan}'
                     class='btn btn-info left-margin ml-1 mb-1'>";
                        echo "<span class='fa fa-edit'></span> Edit";
                    echo "</a>";
                        
                    // delete product button
                    echo "<a delete-id='{$id_konsultan}' class='btn btn-danger delete-object ml-1 mb-1'>";
                        echo "<i class='fa fa-remove'></i> Delete";
                    echo "</a></td>";
             
                        echo "</tr>";
             
                    }
             
                echo "</table>";
             
                // paging buttons will be here
            }
             
            // tell the user there are no products
            else{
                echo "<div class='alert alert-info'>No items found.</div>";
            }    
              include_once 'paging.php';
        ?>

