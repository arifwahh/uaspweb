<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];

// update data ke database
mysqli_query($koneksi,"update pengurus set nama_pengurus='$nama',jabatan='$jabatan', alamat='$alamat' where id_pengurus='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahkaryawan/sukses');
 
?>