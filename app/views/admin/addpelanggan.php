<?php
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['idpelanggan'];
$nik = $_POST['nik'];
$nama = $_POST['namapelanggan'];
$alamat = $_POST['alamatpelanggan'];
$jumlahkk = $_POST['jumlahkk'];
$jumlahjiwa = $_POST['jumlahjiwa'];
$tanggalpasang = $_POST['tanggalpasang'];
$idtarif = $_POST['idtarif'];
$golongan = $_POST['golongan'];
$biaya = $_POST['biayapemasangan'];

// menginput data ke database
$query=mysqli_query($koneksi,"insert into pelanggan values('$id','$nik','$nama','$alamat','$jumlahkk','$jumlahjiwa','$tanggalpasang','$idtarif','$golongan','$biaya')");

if ($query){
    mysqli_query($koneksi,"insert into pencatatan values('','','','$id','$nama','$alamat','BARU','$idtarif','0','0','0','0','BARU')");
    header('location:'.BASEURL.'/admin/tambahpelanggan/sukses');
}
else{
    header('location:'.BASEURL.'/admin/tambahpelanggan/gagal');
}
// mengalihkan halaman kembali ke index.php
 
?>