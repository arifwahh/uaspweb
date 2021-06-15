<?php
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $POST['idinventaris'];
$kode = $_POST['kodeinventaris'];
$nama = $_POST['namainventaris'];
$tanggal = $_POST['tanggalserahterima'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$nominalawal = $_POST['nominalawal'];
$tahunsusut = $_POST['tahunsusut'];
$susutbulan = $_POST['susutperbulan'];


// menginput data ke database
mysqli_query($koneksi,"insert into inventaris values('$id','$kode','$nama','$tanggal','$jumlah','$total','$nominalawal','$tahunsusut','$susutbulan')");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahinventaris/sukses');
 
?>