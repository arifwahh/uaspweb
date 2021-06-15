<?php
include('koneksi.php');
require_once("../public/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id=$data['id'];
$query = mysqli_query($koneksi,"SELECT * FROM pencatatan WHERE id_pelanggan=$id and keterangan='BELUM LUNAS'");
$kps = mysqli_query($koneksi,"SELECT * FROM bpmspams");
$pengurus = mysqli_query($koneksi,"SELECT * FROM pengurus where jabatan='Ketua Umum'");
$plg = mysqli_query($koneksi,"SELECT * FROM pelanggan where id=$id");
$tarif = mysqli_query($koneksi,"SELECT * FROM pencatatan a JOIN tarif b on a.id_tarif=b.id where a.id_pelanggan=$id");
$no = 1;
while($d = mysqli_fetch_array($kps))
{
$html = '<center><h1>KP SPAMS '.$d['nama_bpmspams'].'</h1> <h3>'.$d['alamat_bpmspams'].'</h3><h4>Surat Tagihan Pembayaran Air</h4></br></center>'; 
}
$no = 1;
while($data = mysqli_fetch_array($plg))
    {
 $html .= "
 <p>Yth : Sdr/i ".$data['nama_pelanggan']." <br> Ditempat</p> 
 <p align='justify'>Assalamualaikum wr.wb <br> Dengan Hormat, Kami beritahukan bahwa Sdr/i ".$data['nama_pelanggan']." dengan ID Pelanggan ".$data['id']." telat pembayaran air dengan rincian sebagai berikut :
 ";   
 while($trf = mysqli_fetch_array($tarif))
 {
while($row = mysqli_fetch_array($query))
{
$html.=" 
<table border=1>
<tr>    
    <th>No Nota</th>
    <th>Bulan</th>
   <th>Meter Awal</th>
     <th> Meter Akhir </th>
     <th>Meter Pemakaian</th>
     <th>Jenis Tarif</th>
     <th>Harga Air</th>
     <th> Jasa Pemeliharaan </th>
     <th>Biaya Administrasi</th>
    <th>Total Bayar</th>
</tr>
   <tr>
   <td>".$row['no_nota']."</td>
   <td>".$row['bulan']."</td>
   <td>".$row['meter_awal']."</td>
   <td>".$row['meter_akhir']."</td>
   <td>".$row['meter_pemakaian']."</td>
   <td>".$data['golongan']."</td>
   <td>Rp. ".$trf['bulanan']."</td>
   <td>Rp. ".$trf['pemeliharaan']."</td>
   <td> Rp. ".$trf['administrasi']."</td>
   <td> Rp. ".$row['total_bayar']."</td>
   </tr>
   </table>
  ";
}
}
    }
    while($peng = mysqli_fetch_array($pengurus))
    {
$html .= " <p align='justify'> Untuk itu kami himbau kepada saudara untuk segera melunasi pembayaran air. Demikian informasi yang dapat kami sampaikan, Terima kasih. Wassalamualaikum wr.wb 
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        
        <p align='right'> Ketua Umum 
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        <p align='right'>".$peng['nama_pengurus']."
        <p align='right'> NIP. ".$peng['nip']."
        </html>";
    }
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('a4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tagihan pelanggan.pdf');
?>