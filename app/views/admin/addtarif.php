<?php
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $POST['idtarif'];
$jenis = $_POST['jenistarif'];
$golongan = $_POST['golongan'];
$tarif1 = $_POST['tarif1'];
$tarif2 = $_POST['tarif2'];
$tarif3 = $_POST['tarif3'];
$bulanan = $_POST['bulanan'];
$denda = $_POST['denda'];
$biaya = $_POST['biaya'];


// menginput data ke database
mysqli_query($koneksi,"insert into tarif values('$id','$jenis','$golongan','$tarif1','$tarif2','$tarif3','$bulanan','$denda','$biaya')");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahtarif/sukses');
 
?>