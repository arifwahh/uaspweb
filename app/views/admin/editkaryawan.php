                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">UPDATE INFORMASI PENGURUS</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    </div>
                    
		<form method="post" action="<?= BASEURL; ?>/admin/updatekaryawan">
          <?php
	include 'koneksi.php';
	$id = $data['id'];
	$data = mysqli_query($koneksi,"select * from pengurus where id_pengurus='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>Nama Pengurus :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id_pengurus']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama_pengurus']; ?>">
					</td>
				</tr>
                <tr>			
					<td>Jabatan :</td>
					<td>
						<input type="text" name="jabatan" value="<?php echo $d['jabatan']; ?>">
					</td>
				</tr>
				<tr>
					<td>Alamat :</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				
				<tr>
					<td><div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
        </div> </td>
					
				</tr>		
			</table>
		</form>
		<?php 
                                       }
	?>