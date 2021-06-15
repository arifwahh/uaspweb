
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
	                                        <a href="index.php">LAMAN TARIF</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Data Tarif</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <form name="formtambahtarif" method="post" action="<?= BASEURL; ?>/admin/addtarif"> 
           <p>ID Tarif : <br><input type="text" name="idtarif" id="idtarif" readonly value="<?= autonumber("tarif", "id", "", "") ?>"/></br></p> 

	<p>Jenis Tarif : <br><input type="text" name="jenistarif" id="jenistarif" /></br></p> 
    <p>Golongan : <br><input type="text" name="golongan" id="golongan" /></br></p>
    <p>Tarif 1 : <br><input type="number" name="tarif1" id="tarif1"/></br></p>
    <p>Biaya Pemeliharaan : <br><input type="number" name="tarif2" id="tarif2"/> </br></p>
    <p>Biaya Administrasi : <br><input type="number"  name="tarif3" id="tarif3"/> </br></p>
    <p>Bulanan : <br><input type="number"  name="bulanan" id="bulanan"/> </br></p>
    <p>Denda : <br><input type="number"  name="denda" id="denda"/> </br></p>
    <p>Biaya Pemasangan : <br><input type="number"  name="biaya" id="biaya"/> </br></p>


    <p>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
     </p>
</form>
    
 <a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
 <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA TARIF</div>
                            </div>

                            
                            	 <table class="table"  width="100%" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                                
                                                <th>Jenis Tarif</th>
                                                <th>Golongan</th>
												<th>Tarif 1</th>
												<th>Biaya Pemeliharaan</th>
												<th>Biaya Administrasi</th>
                                                <th>Bulanan</th>
                                                <th>Denda</th>
                                                <th>Biaya Pemasangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from tarif order by id desc");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
													<td><?php echo $data['jenis_tarif']; ?></td>
													<td><?php echo $data['golongan']; ?></td>
													<td><?php echo $data['tarif1']; ?></td>
													<td><?php echo $data['pemeliharaan']; ?></td>
													<td><?php echo $data['administrasi']; ?></td>
                                                    <td><?php echo $data['bulanan']; ?></td>
                                                    <td><?php echo $data['denda']; ?></td>
                                                    <td><?php echo $data['biaya_pemasangan']; ?></td>

										
                                                    <td><a href="<?= BASEURL; ?>/admin/edittarif/<?=$data['id'];?>" class="btn">
                                                    <i class="icon-edit"></i> Edit</a>  <a href="<?= BASEURL; ?>/admin/hapustarif/<?=$data['id'];?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-trash"></i>Hapus</a></td>
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