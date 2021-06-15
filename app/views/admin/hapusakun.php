<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $data['id'];
 
// menghapus data dari database
mysqli_query($koneksi,"delete from user where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahakun/sukses');
 
?>