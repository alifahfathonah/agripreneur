<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
</head>
<body>
<?php
		include 'koneksi.php';

		$output='';

		if (isset($_POST["excel"])) {
			$sql = "SELECT * FROM ".$_POST['table']."";
			$hsl=mysqli_query($koneksi,$sql);

				$output.="<table class='table ' border='1'>
							<tr><thead>";
			while ($property = mysqli_fetch_field($hsl)){
				$output.="<th>".$property->name."</th>";
			}
			$output.="</tr></thead><tbody>";

			$jmlIndex=mysqli_num_fields($hsl);

			while ($row = mysqli_fetch_assoc($hsl)) {
				$output.='<tr>';
				$row=array_values($row);
				for ($i=0;$i<$jmlIndex;$i++) {
					$output.='<td>'.$row[$i].'</td>'; 
				}
				$output.='</tr>';
			}
			$output.='</tbody></table>';
		
		header("Content-Type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=".$_POST['table'].".xls");

		echo $output;
		}
?>
</body>
</html>
