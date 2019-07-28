<?php

require_once __DIR__ . '/vendor/autoload.php';

include "cek_status_login.php";
require "koneksi.php";


echo $_SESSION["username"];
$query = "SELECT * FROM user INNER JOIN ukm ON user.username = ukm.pemilik WHERE namaUKM = '".$_GET["namaUKM"]."' ";
$hsl = mysqli_query($koneksi,$query);
$rcrd = mysqli_fetch_assoc($hsl);



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
    <h2 style="text-align:center;"> Pengajuan Penghapusan UKM </h2>
    <br><br>
    <p style="text-align:left;"><p  style="text-align:right;"> Bogor,___________________,_____ </p> Kepada Yth. <br>
    Kepala Staff Penanggung Jawab UKM <br>
    Bapak Christopher Julianus <br>
    Di Bogor<br></p>
    <br><br>
    <p style="text-align:justify;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Keputusan Perusahaan : 312 Tahun 2018 tentang petunjuk pelaksanaan penghapusan UKM yang melakukan pelanggaran dalam hal apapun. Dengan ini saya sebagai, <b>'.$_SESSION["username"].'</b> ingin mengajukan penghapusan terhadap UKM <b>'.$_GET["namaUKM"].'</b> dengan username / nama pemilik : <b>'.$rcrd["username"].'</b> dengan alasan sebagai berikut: <br>
    __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________.<br>
    Dengan alasan diatas, saya <b>'.$_SESSION["username"].'</b> meminta persetujuan dari Bapak, untuk melakukan penghapusan UKM tersebut untuk dihapus dari sistem.<br>
    Demikian surat ini saya sampaikan, atas perhatian Bapak kami ucapkan terimakasih.</p>   
    <br>
    <p style="text-align:center;">
    Pengaju<br><br><br><br><br><br><br>
    <b>'.$_SESSION["username"].'</b><br>
    NIP.12315912390541230
    </p>
    <hr>
    <p style="text-align:center;">
    Pemberi Ijin,<br><br><br><br><br><br><br>
    <b>Christopher Julianus P</b><br>
    NIP.00000000000000011
    </p>
    
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('laporan_daftar_artikel.pdf',\Mpdf\Output\Destination::INLINE);
?>

