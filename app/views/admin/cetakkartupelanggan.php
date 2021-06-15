
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
                                    <div class="alert alert-success">
							        <button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>Pelanggan Berhasil Terdaftar !</h4>
                            </div>
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a>Cetak Kartu Identitas dan Kartu Meter Pelanggan</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    </div>
                    
		<form method="post" action="printkwitansi.php">
          <?php
	include 'koneksi.php';
    $id = $data['id'];
	$data = mysqli_query($koneksi,"select * from pelanggan where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>Nama :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama_pelanggan']; ?>" readonly>
					</td>
				</tr>
                <tr>			
					<td>Bulan :</td>
					<td>
						<input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Golongan :</td>
					<td><input type="text" name="golongan" value="<?php echo $d['golongan']; ?>" readonly></td>
				</tr>
                <td>
                                          
                <a href="<?= BASEURL; ?>/admin/printkartumeter/<?= $id ;?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-print"></i>Cetak Kartu Meter</a></td>


        </div> </td>
					
				</tr>		
			</table>
		</form>
		<?php 
                                       }
	?>
                   
