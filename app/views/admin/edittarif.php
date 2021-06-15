
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">UPDATE INFORMASI TARIF</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    </div>
                    
		<form method="post" action="<?= BASEURL; ?>/admin/updatetarif">
          <?php
	include 'koneksi.php';
	$id = $data['id'];
	$data = mysqli_query($koneksi,"select * from tarif where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>Jenis Tarif :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="jenis" value="<?php echo $d['jenis_tarif']; ?>">
					</td>
				</tr>
                <tr>			
					<td>Golongan :</td>
					<td>
						<input type="text" name="golongan" value="<?php echo $d['golongan']; ?>">
					</td>
				</tr>
				<tr>
					<td>Tarif 1 :</td>
					<td><input type="number" name="tarif1" value="<?php echo $d['tarif1']; ?>"></td>
				</tr>
				<tr>
					<td>Biaya Pemeliharaan :</td>
					<td><input type="number" name="tarif2" value="<?php echo $d['pemeliharaan']; ?>"></td>
				</tr>
                <tr>
					<td>Biaya Administrasi : </td>
					<td><input type="number" name="tarif3" value="<?php echo $d['administrasi']; ?>"></td>
				</tr>
                 <tr>
					<td>Bulanan : </td>
					<td><input type="number" name="bulanan" value="<?php echo $d['bulanan']; ?>"></td>
				</tr>
                 <tr>
					<td>Denda : </td>
					<td><input type="number" name="denda" value="<?php echo $d['denda']; ?>"></td>
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
                