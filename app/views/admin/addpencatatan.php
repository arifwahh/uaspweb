<?php
include 'koneksi.php';

$bulan = array(
    '01' => 'JANUARI',
    '02' => 'FEBRUARI',
    '03' => 'MARET',
    '04' => 'APRIL',
    '05' => 'MEI',
    '06' => 'JUNI',
    '07' => 'JULI',
    '08' => 'AGUSTUS',
    '09' => 'SEPTEMBER',
    '10' => 'OKTOBER',
    '11' => 'NOVEMBER',
    '12' => 'DESEMBER',
);
 
// menangkap data yang di kirim dari form
$id = $_POST['idpembayaran'];
$nonota = $_POST['nonota'];
$tanggalbayar=date("Y-m-d h:i:sa");
$idpelanggan = $_POST['idpelanggan'];
$namapelanggan = $_POST['nama'];
$alamat = $_POST['alamat'];
$bulanan=$bulan[date('m')];
$idtarif = $_POST['idtarif'];
$meterawal = $_POST['meterawal'];
$meterakhir = $_POST['meterakhir'];
$meterpemakaian = $_POST['meterpemakaian'];
$totalbayar = $_POST['hargaair'];
$keterangan = "BELUM LUNAS";


// menginput data ke database
mysqli_query($koneksi,"insert into pencatatan values('$id','$nonota','$tanggalbayar','$idpelanggan','$namapelanggan','$alamat','$bulanan','$idtarif','$meterawal','$meterakhir','$meterpemakaian','$totalbayar','$keterangan')");
 
// mengalihkan halaman kembali ke index.php
header('location:'.BASEURL.'/admin/pencatatan/sukses');
 
?>