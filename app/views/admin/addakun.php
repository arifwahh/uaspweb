<?php
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $POST['idakun'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['pass'];
$level = $_POST['level'];

// menginput data ke database
mysqli_query($koneksi,"insert into user values('$id','$nama','$username','$password','$level')");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahakun/sukses');
 
?>