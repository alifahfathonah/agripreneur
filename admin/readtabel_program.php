   <?php
           //the page where this paging is used
         
            // calculate for the query LIMIT clause
            $stmt=$program->readAll($from_record_num, $records_per_page);
            $num=$stmt->rowCount();
        

            // display the products if there are any
            if($num>0){
             
                echo "<table class='table table-hover table-responsive table-bordered'>";
                    echo "<tr>";
                        echo "<th style='width:200px;'>Judul</th>";
                        echo "<th style='width:200px;'>isi</th>";
                        echo "<th style='width:130px;'>Harga</th>";
                        echo "<th style='width:130px;'>Waktu</th>";
                        echo "<th style='width:130px;'>Kategori</th>";
                        echo "<th style='width:100px;'>Foto</th>";
                        echo "<th style='width:130px;'  >Action</th>";
                    echo "</tr>";
             
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             
                        extract($row);
             
                        echo "<tr id='{$id_program}'>";
                            echo "<td data-target='judul'>{$judul_program}</td>";
                            echo "<td data-target='isii'><p class='text'>".htmlspecialchars(strip_tags($isi_program))."</p></td>";
                            echo "<td data-target='isi' style='display: none;'>{$isi_program} </td>";
                            echo "<td  data-target='hargarupiah'>".rupiah($harga_program)."</td>";
                            echo "<td data-target='harga' style='display: none;'>".$harga_program."</td>";
                            echo "<td data-target='waktu'>{$waktu_penyelanggaraan}</td>";
                            echo "<td data-target='kategori' value='{$kategori_program}'>{$kategori_program}</td>";
                            echo "<td data-target='foto'><img src='images/{$foto}' style='width:100px; height:100px;'></td>";
                            echo "<td data-target='id_foto' style='display: none;'>".$foto."</td>";
                                // read one, edit and delete button will be here
                    echo "<td '><a  data-role='read' data-id='{$id_program}' class='btn btn-primary left-margin ml-1 mb-1'>";
                        echo "<span class='fa fa-list'></span> Read";
                    echo "</a>";
                     
                    // edit product button
                    echo "<a  href='#' data-role='update' data-id='{$id_program}'
                     class='btn btn-info left-margin ml-1 mb-1'>";
                        echo "<span class='fa fa-edit'></span> Edit";
                    echo "</a>";
                        
                    // delete product button
                    echo "<a delete-id='{$id_program}' class='btn btn-danger delete-object ml-1 mb-1'>";
                        echo "<i class='fa fa-remove'></i> Delete";
                    echo "</a></td>";
             
                        echo "</tr>";
             
                    }
             
                echo "</table>";
             
                // paging buttons will be here
            }
             
            // tell the user there are no products
            else{
                echo "<div class='alert alert-info'>No products found.</div>";
            }    
              include_once 'paging.php';
        ?>

