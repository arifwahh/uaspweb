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
	                                        <a href="index.php">LAMAN PENGURUS</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Data Pengurus</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <form name="formtambahpengurus" method="post" action="<?= BASEURL; ?>/admin/addkaryawan"> 
    <p>ID Pengurus : <br><input type="text" name="idpengurus" id="idpengurus" readonly value="<?= autonumber("pengurus", "id_pengurus", "", "") ?>"/></br></p> 
	<p>No Induk Pengurus : <br><input type="number" name="nip" id="nip" /></br></p> 
    <p>Nama Pengurus : <br><input type="text" name="nama" id="nama" /></br></p>
    <p>Jenis Kelamin : <br><select name="jeniskelamin" id="jeniskelamin">
                        <option value="Laki Laki">Laki Laki </option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                        </br></p>
    <p>Jabatan : <br><input type="text" name="jabatan" id="jabatan"/> </br></p>
        <p><label class="control-label">Alamat</label> <br> <textarea class="input-xlarge textarea" name="alamat" placeholder="Alamat..." style="width: 300px; height: 200px"></textarea>
                                         
                                          </br>
                                          </p>
                                       
                                       


    <p>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
     </p>
</form>
    
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA PENGURUS</div>
                            </div>

                            
                            	 <table class="table"  width="100%" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                                
                                                <th>NIP</th>
                                                <th>Nama Pengurus</th>
												<th>Jenis Kelamin</th>
												<th>Jabatan</th>
												<th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 
		include 'koneksi.php';
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from pengurus");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
													<td><?php echo $data['nip']; ?></td>
													<td><?php echo $data['nama_pengurus']; ?></td>
													<td><?php echo $data['jenis_kelamin']; ?></td>
													<td><?php echo $data['jabatan']; ?></td>
													<td><?php echo $data['alamat']; ?></td>
                                                    <td><a href="<?= BASEURL; ?>/admin/editkaryawan/<?=$data['id_pengurus'];?>" class="btn">
                                                    <i class="icon-edit"></i> Edit</a>  <a href="<?= BASEURL; ?>/admin/hapuskaryawan/<?=$data['id_pengurus'];?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-trash"></i>Hapus</a></td>
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