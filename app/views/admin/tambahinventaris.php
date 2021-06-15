                <!--/span-->
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
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">LAMAN INVENTARIS</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Data Inventaris</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <form name="formtambahinventaris" method="post" action="<?= BASEURL; ?>/admin/addinventaris"> 
           <p>ID Inventaris : <br><input type="text" name="idinventaris" id="idinventaris" readonly value="<?= autonumber("inventaris", "id", "", "") ?>"/></br></p> 

	<p>Kode Inventaris : <br><input type="number" name="kodeinventaris" id="kodeinventaris"/></br></p> 
    <p>Nama Inventaris : <br><input type="text" name="namainventaris" id="namainventaris"/></br></p>
    <p>Tanggal Serah Terima : <br><input type="date" name="tanggalserahterima" id="tanggalserahterima"/> </br></p>
    <p> Jumlah : <br><input type="Number"  name="jumlah" id="jumlah"/> </br></p>
    <p> Total : <br><input type="Number"  name="total" id="total"/> </br></p>
    <p> Nominal Awal : <br><input type="Number"  name="nominalawal" id="nominalawal"/> </br></p>
    <p> Tahun Susut : <br><input type="Number"  name="tahunsusut" id="tahunsusut"/> </br></p>
    <p> Susut per Bulan : <br><input type="Number"  name="susutperbulan" id="susutperbulan"/> </br></p>
    <p>
    <p>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
     </p>
</form>
    
 <a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
 <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA INVENTARIS</div>
                            </div>

                            
                            	 <table class="table"  width="100%" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                                
                                                <th>Kode Inventaris</th>
												<th>Nama Inventaris</th>
												<th>Tanggal Serah Terima</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Nominal Awal</th>
												<th>Tahun Susut</th>
												<th>Susut per Bulan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from inventaris order by id desc");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
													<td><?php echo $data['kode_inventaris']; ?></td>
													<td><?php echo $data['nama_inventaris']; ?></td>
													<td><?php echo $data['tanggalserahterima']; ?></td>
													<td><?php echo $data['jumlah']; ?></td>
													<td><?php echo $data['total']; ?></td>
													<td><?php echo $data['nominal_awal']; ?></td>
													<td><?php echo $data['tahun_susut']; ?></td>
                                                    <td><?php echo $data['susut_perbulan']; ?></td>
															
                                                    <td><a href="<?= BASEURL; ?>/admin/editinventaris/<?=$data['id'];?>" class="btn">
                                                    <i class="icon-edit"></i> Edit</a>  <a href="<?= BASEURL; ?>/admin/hapusinventaris/<?=$data['id'];?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-trash"></i>Hapus</a></td>
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
