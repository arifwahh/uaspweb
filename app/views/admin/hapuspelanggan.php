<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode = $data['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pelanggan where id='$kode'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahpelanggan/sukses');
 
?>