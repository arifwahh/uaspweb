                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">UPDATE INFORMASI INVENTARIS</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    </div>
                    
		<form method="post" action="<?= BASEURL; ?>/admin/updateinventaris">
          <?php
	include 'koneksi.php';
	$id = $data['id'];
	$data = mysqli_query($koneksi,"select * from inventaris where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>Kode Inventaris :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="number" name="kode" value="<?php echo $d['kode_inventaris']; ?>">
					</td>
				</tr>
				<tr>
					<td>Nama Inventaris :</td>
					<td><input type="text" width="300px" height="300px" name="nama" value="<?php echo $d['nama_inventaris']; ?>"></td>
				</tr>
				<tr>
					<td>Tanggal Serah Terima</td>
					<td><input type="date" name="tanggal" width="300px" height="300px" value="<?php echo $d['tanggalserahterima']; ?>"></td>
				</tr>
                <tr>
					<td>Jumlah </td>
					<td><input type="number" name="jumlah" value="<?php echo $d['jumlah']; ?>"></td>
				</tr>
                <tr>
					<td>Total</td>
					<td><input type="number" name="total" value="<?php echo $d['total']; ?>"></td>
				</tr>
                <tr>
					<td>Nominal Awla</td>
					<td><input type="number" name="nominalawal" value="<?php echo $d['nominal_awal']; ?>"></td>
				</tr>
                <tr>
					<td>Tahun Susut</td>
					<td><input type="number" name="tahunsusut" value="<?php echo $d['tahun_susut']; ?>"></td>
				</tr>
                <tr>
					<td>Susut Perbulan</td>
					<td><input type="number" name="susutperbulan" value="<?php echo $d['susut_perbulan']; ?>"></td>
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
                   
           