<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$level = $_POST['level'];

// update data ke database
mysqli_query($koneksi,"update user set nama_pengguna='$nama', username='$username', password='$pass', level='$level' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahakun/sukses');
 
?>