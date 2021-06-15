                               <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">UPDATE INFORMASI AKUN</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    </div>
                    
		<form method="post" action="<?= BASEURL; ?>/admin/updateakun">
          <?php
	include 'koneksi.php';
	$id = $data['id'];
	$data = mysqli_query($koneksi,"select * from user where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>Nama Pengguna :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama_pengguna']; ?>">
					</td>
				</tr>
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="password" class="pass" name="pass" value="<?php echo $d['password']; ?>"></td>
                    <td><input type="checkbox" class="form-checkbox"> Show password</td>
				</tr>
                <tr>
					<td>Level : </td>
					<td><select name="level" value="<?php echo $d['level']; ?>">
<option value="admin">Admin</option>
<option value="petugas">Petugas</option>
        <option value="loket">Loket</option> </select></td>
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
                   