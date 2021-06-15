<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $data['id'];
$tanggalbayar=date("Y-m-d h:i:sa"); 
 
// menghapus data dari database
mysqli_query($koneksi,"update pencatatan set tanggal_byrpelanggan='$tanggalbayar', keterangan='LUNAS' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/pembayaran/sukses');
 
?>