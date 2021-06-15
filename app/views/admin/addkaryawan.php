<?php
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $POST['idpengurus'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into pengurus values('$id','$nip','$nama','$jeniskelamin','$jabatan','$alamat')");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahkaryawan/sukses');
 
?>