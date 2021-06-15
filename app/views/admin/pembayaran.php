
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
	                                        <a href="">LAMAN PEMBAYARAN</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                       
                    
                  
                        <!-- block -->
<div class="block"> 
<div class="navbar navbar-inner block-header"> 
<div class="muted pull-left">MASUKAN ID PELANGGAN</div>
</div> <br>
<form class="form" action="" method="POST">
                         <input type='text' class='textbox' id='id' name="id" placeholder="Ketik Disini"/>
                         <input class="btn btn-primary" type='submit' name='submit' id="submit" value='Cari'/>
                                </div>
                                

</form>
 <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA PELANGGAN</div>
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
        if(isset($_POST['submit'])){
        $nilai = $_POST['id'];
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from pencatatan WHERE id_pelanggan=$nilai and keterangan='BELUM LUNAS'");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
													<td><?php echo $data['no_nota']; ?></td>
													<td><?php echo $data['nama_pelanggan']; ?></td>
													<td><?php echo $data['alamat_pelanggan']; ?></td>
													<td><?php echo $data['bulan']; ?></td>
													<td><?php echo $data['meter_awal']; ?></td>
													<td><?php echo $data['meter_akhir']; ?></td>
													<td><?php echo $data['meter_pemakaian']; ?></td>
													<td><?php echo $data['id_tarif']; ?></td>
													<td><?php echo $data['total_bayar']; ?></td>
															
                                                    <td><a href="<?= BASEURL; ?>/admin/prosesbayar/<?=$data['id'];?>" onclick="return confirm('Lanjutkan untuk melakukan Pembayaran?')" class="btn">
                                                    <i class="icon-edit"></i> Proses Pembayaran</a> </td>
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
           <script type="text/javascript">
<?php echo $jsArray; ?>   
function changeTarif(idtarif){
    document.getElementById('bulanan').value = prdName[idtarif].bulanan;
    document.getElementById('biayapemasangan').value = prdName[idtarif].biaya;
     document.getElementById('jenis').value = prdName[idtarif].jenis;
     document.getElementById('golongan').value = prdName[idtarif].golongan;

};
</script>
    </body>
</html>