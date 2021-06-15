                <?php
    include 'koneksi.php';
    function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
    $host = "localhost";
    $usr = "root";
    $pwd = "";
    $dbname = "pamasmas";
    $koneksi = mysqli_connect($host, $usr, $pwd, $dbname);
    if(mysqli_connect_error()){
        echo 'database gagal dikoneksikan!'.mysqli_connect_error();
    }

    $auto = mysqli_query($koneksi, "select $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
    $jumlah_record = mysqli_num_rows($auto);
    if($jumlah_record == 0)
    $nomor = 1;
   
    else{
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan)))+1;
    }
    if($lebar>0)
        $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
    else
        $angka=$awalan.$nomor;
    return $angka;
}
?>
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">LAMAN TRANSAKSI HUTANG</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Cari Pelanggan</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <p><form name="formhutangpelanggan" class="form" method="POST" action=""> 
           
       <div class="form-group"> &nbspCari Data Pelanggan Berdasarkan : 
                        <p><select class="" id="kriteria" name="kriteria" data-placeholder="Pilih Kriteria">
                            <option value="id_pelanggan"> Id Pelanggan</option>
                            <option value="nama_pelanggan">Nama Pelanggan</option>
                           </select>
                    
                         <input type='text' class='textbox' id='nilai' name="nilai" placeholder="Ketik Disini"/>
                                </div>  <button type="submit" name="cari" id="cari" class="btn btn-primary">CARI</button>
</p>
</form>
<a style="margin-bottom:10px" href="cetakbukuhutang.php" class="btn btn-default pull-right"> Cetak Buku Hutang Pelanggan</a>
 
 <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA TARIF</div>
                            </div>

                            
                            	 <table class="table"  width="100%" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                                
                                                <th>No Nota</th>
												<th>Nama Pelanggan</th>
												<th>Alamat Pelanggan</th>
												<th>Bulan</th>
												<th>Meter Awal</th>
												<th>Meter Akhir</th>
												<th>Meter Pemakaian</th>
												<th>ID Tarif</th>
												<th>Total Bayar</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
        if(isset($_POST['cari'])){
        $kriteria = $_POST['kriteria'];
        $nilai = $_POST['nilai'];
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from pencatatan WHERE $kriteria LIKE '%$nilai%' and keterangan='BELUM LUNAS'");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
                                                <form action="cetaktagihan.php" method="POST"> 
                                                    <td><?php echo $data['no_nota']; ?></td>
													<td><?php echo $data['nama_pelanggan']; ?></td>
													<td><?php echo $data['alamat_pelanggan']; ?></td>
													<td><?php echo $data['bulan']; ?></td>
													<td><?php echo $data['meter_awal']; ?></td>
													<td><?php echo $data['meter_akhir']; ?></td>
													<td><?php echo $data['meter_pemakaian']; ?></td>
													<td><?php echo $data['id_tarif']; ?></td>
													<td><?php echo $data['total_bayar']; ?></td>
													<td><?php echo $data['keterangan']; ?></td>
                                                    <td><a href="<?= BASEURL; ?>/admin/cetaktagihan/<?=$data['id_pelanggan'];?>" onclick="return confirm('Lanjutkan untuk Mencetak Surat Tagihan?')" class="btn btn-primary">
                                                    <i class="icon-edit"></i> Cetak Surat Tagihan</a> </td>
                                                    </tr>
                                                
											<?php	
											}
                                        }
											?>
                                        </tbody>
                                    </table>
                                    <div align="center">
									</div>
                            </div>
                            
                        </div>
                        <!-- /block -->
                    </div>

                </div>
            </div>
