<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$golongan = $_POST['golongan'];
$tarif1 = $_POST['tarif1'];
$tarif2 = $_POST['tarif2'];
$tarif3 = $_POST['tarif3'];
$bulanan = $_POST['bulanan'];
$denda = $_POST['denda'];

// update data ke database
mysqli_query($koneksi,"update tarif set jenis_tarif='$jenis',golongan='$golongan', tarif1='$tarif1', pemeliharaan='$tarif2', administrasi='$tarif3' , bulanan='$bulanan', denda='$denda' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahtarif/sukses');
 
?>