<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$total= $_POST['total'];
$nominalawal = $_POST['nominalawal'];
$tahunsusut = $_POST['tahunsusut'];
$susutperbulan = $_POST['susutperbulan'];
 
// update data ke database
mysqli_query($koneksi,"update inventaris set kode_inventaris='$kode', nama_inventaris='$nama', tanggalserahterima='$tanggal', jumlah='$jumlah', total='$total', nominal_awal='$nominalawal', tahun_susut='$tahunsusut', susut_perbulan='$susutperbulan' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/tambahinventaris/sukses');
 
?>