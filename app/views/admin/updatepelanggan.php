<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jumlahkk = $_POST['jumlahkk'];
$jumlahjiwa = $_POST['jumlahjiwa'];
$idtarif = $_POST['idtarif'];
$golongan = $_POST['golongan'];
$biaya = $_POST['biayapemasangan']; 
// update data ke database
mysqli_query($koneksi,"update pelanggan set nik='$nik', nama_pelanggan='$nama', alamat='$alamat', jumlah_kk='$jumlahkk', jumlah_jiwa='$jumlahjiwa', id_tarif='$idtarif', golongan='$golongan', biaya='$biaya' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahpelanggan/sukses');
 
?>