<?php
include('koneksi.php');
require_once('../public/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id = $data['id'];
$kps = mysqli_query($koneksi,"SELECT * FROM bpmspams");
$pengurus = mysqli_query($koneksi,"SELECT * FROM pengurus where jabatan='Ketua Umum'");
$plg = mysqli_query($koneksi,"SELECT * FROM pelanggan where id=$id");
$no = 1;
while($d = mysqli_fetch_array($kps))
{
$html = '<center><h1>KP SPAMS '.$d['nama_bpmspams'].'</h1> <h3>'.$d['alamat_bpmspams'].'</h3><h4>Kartu Meter Pelanggan</h4></br></center>'; 
}
$no = 1;
while($data = mysqli_fetch_array($plg))
    {
 $html .= "
 <p>ID Pelanggan : ".$data['id']."<br>Nama : ".$data['nama_pelanggan']." <br> Alamat : ".$data['alamat']." <br> Golongan : ".$data['golongan']."</p> 
";   

    }
    $html .= '<table border="1" width="100%">
    <tr>
    <th>No</th>
    <th>Bulan</th>
    <th>Meter Awal</th>
    <th>Meter Akhir</th>
    <th>Meter Pemakaian</th>
    <th>Paraf</th>
    </tr>
    <tr>
    <td> 1 </td>
    <td> Januari </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td>2 </td>
    <td> Februari </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 3</td>
    <td> Maret </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td>4 </td>
    <td> April </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td>5 </td>
    <td> Mei </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 6</td>
    <td> Juni </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 7</td>
    <td> Juli </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 8</td>
    <td> Agustus </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 9</td>
    <td> September </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td>10 </td>
    <td> Oktober </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 11</td>
    <td> November </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <tr>
    <td> 12</td>
    <td> Desember </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    </tr>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    ';
  
    while($peng = mysqli_fetch_array($pengurus))
    {
$html .= " 
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
$dompdf->setPaper('legal', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Kartu Meter Pelanggan.pdf');
?>