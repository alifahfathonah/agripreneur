<?php

require_once __DIR__ . '/vendor/autoload.php';

include "cek_status_login.php";
require "koneksi.php";

$query = "SELECT * FROM artikel";
$hsl = mysqli_query($koneksi,$query);


$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1> Laporan Daftar Artikel </h1>
    <table border="1" cellpadding = "10" cellspacing= "0"> 
        <tr>
            <th>Nomor</th>
            <th>Kategori Artikel</th>
            <th>Judul Artikel</th>
            <th>Penerbit / Pemilik</th>
        </tr>';
    $i =1;
    while($rcrd = mysqli_fetch_assoc($hsl)){
        if($rcrd["user_staff"] == NULL){
            $pemilik = $rcrd["user_ukm"];
        }else{
            $pemilik = $rcrd["user_staff"];
        }
      $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $rcrd["kategori_artikel"] .'</td>
                <td>'. $rcrd["judul_artikel"] .'</td>
                <td>'. $pemilik.'</td>
                </tr>' ;  
    }

$html.= '</table>

<br>
<br><br><br>
<p style="text-align: right;">Pembuat Laporan,</p>
<br>
<br>
<p style="text-align: right; margin-right:15px;">'.$_SESSION["username"].'</p>
<br>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('laporan_daftar_artikel.pdf',\Mpdf\Output\Destination::INLINE);
?>

