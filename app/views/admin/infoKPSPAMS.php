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
	                                        <a>INFORMASI KPSPAMS</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'success') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Menambah Barang</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Update Barang</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Success Delete Barang</h4>';
							echo '</div>';
						}
						
                  	?>
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA KPMSPAMS</div>
                            </div>

                            
                            	 <table border="5px"  width="150px" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                    
                                                <th>Nama KPSMSPAMS</th>
												<th>Alamat</th>
												<th>No HP</th>
												<th>No SK Pendirian</th>
												<th>Tanggal SK</th>
												<th>AD/ART</th>
												<th>NO SK Tarif</th>
												<th>Ketua</th>
												<th>Bendahara</th>
                                                <th>Jumlah Penduduk</th>
                                                <th>Jumlah KK</th>
                                                <th>Penduduk Laki Laki (Jiwa)</th>
                                                <th>Penduduk Perempuan (Jiwa)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from bpmspams");
		while($data = mysqli_fetch_assoc($dat)) {
											?>
												<tr>
													<td><?php echo $data['nama_bpmspams']; ?></td>
													<td><?php echo $data['alamat_bpmspams']; ?></td>
													<td><?php echo $data['nohp_bpmspams']; ?></td>
													<td><?php echo $data['noskpendirian_bpmspams'];?></td>
													<td><?php echo $data['tanggalsk_bpmspams']; ?></td>
													<td><?php echo $data['adart_bpmspams']; ?></td>
													<td><?php echo $data['nosktarif_bpmspams']; ?></td>
													<td><?php echo $data['ketua_bpmspams']; ?></td>
													<td><?php echo $data['bendahara_bpmspams']; ?></td>
													<td><?php echo $data['penduduk']; ?></td>
                                                    <td><?php echo $data['penduduk_kk']; ?></td>
                                                    <td><?php echo $data['lakilaki_jiwa']; ?></td>
                                                    <td><?php echo $data['perempuan_jiwa'];?></td>   
                                                    <td><a href="editbpmspams.php?id=<?php echo $data['id']; ?>" class="btn">
                                                    <i class="icon-edit"></i> Edit</a>  <a href="hapusbpmspams.php?id=<?php echo $data['id']; ?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-trash"></i>Hapus</a></td>
												</tr>
                                            <?php	
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
