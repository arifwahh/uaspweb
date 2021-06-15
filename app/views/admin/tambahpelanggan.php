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
	                                        <a href="index.php">LAMAN PELANGGAN</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                        <?php 
	            if(isset($sukses['pesann'])){
		            if($sukses['pesann']=="sukses"){
                    echo '<div class="alert alert-success">' ;
                    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                    echo '<h4>Success Menambah Pelanggan</h4>';
                    echo '</div>';
		}
	}
	?>
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Data Pelanggan</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <form name="formtambahpelanggan" method="post" action="<?= BASEURL; ?>/admin/addpelanggan"> 
           <p>ID PELANGGAN : <br><input type="text" name="idpelanggan" id="idpelanggan" readonly value="<?= autonumber("pelanggan", "id", "0", "") ?>"/></br></p> 
    <p>
	<p>NIK : <br><input type="number" name="nik" id="nik"/></br></p> 
    <p>Nama Pelanggan : <br><input type="text" name="namapelanggan" id="namapelanggan"/></br></p>
    <p>Jumlah KK : <br><input type="number" name="jumlahkk" id="jumlahkk"/> </br></p>
    <p> Jumlah Jiwa: <br><input type="text"  name="jumlahjiwa" id="jumlahjiwa"/> </br></p>
    <p>
    <div class="control-group">
                                          <label class="control-label">Alamat Pelanggan</label>
                                          <div class="controls">
                                           <textarea class="input-xlarge textarea" name="alamatpelanggan" placeholder="Alamat..." style="width: 300px; height: 200px"></textarea>
                                          </div>
                                        </div>
            </p>
	<p>Tanggal Pasang: <br><input type="date" name="tanggalpasang" id="tanggalpasang"/> </br></p>
<script type="text/javascript">
function math() {
	var a = parseInt(document.getElementById("meterawal").value);
	var b = parseInt(document.getElementById("tambah").value);
    var c = parseInt (a + b);
    $(".meterakhir").val(c);
}
</script>
<p>Jenis Tarif / Golongan :<br><select name="idtarif" id="idtarif" class="form-control" onchange='changeTarif(this.value)' required>
    
  <option value="">Jenis Tarif</option>
 <?php 
 $query=mysqli_query($koneksi, "select * from tarif order by id asc"); 
 $result = mysqli_query($koneksi, "select * from tarif");  
 $jsArray = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="idtarif"  value="' . $row['id'] . '">' . $row['golongan'] . '</option>'; 
 $jsArray .= "prdName['" . $row['id'] . "'] = {bulanan:'" . addslashes($row['bulanan']) . "',jenis:'".addslashes($row['jenis_tarif'])."',golongan:'".addslashes($row['golongan'])."',biaya:'".addslashes($row['biaya_pemasangan'])."'};\n";
  }
  ?>
</select>
<br><p>
<div class="form-group">
    <input class="golongan" type="text"  name="golongan" id="golongan" readonly hidden />      
</div>
<div class="form-group">
    <label>Bulanan</label>
    <input class="bulanan" type="text"  name="bulanan" id="bulanan" readonly />      
</div>
<div class="form-group">
    <label>Jenis Tarif</label>
    <input class="jenis" type="text"  name="jenis" id="jenis" readonly />      
</div>
<div class="form-group">
    <label>Biaya Pemasangan</label>
    <input class="biayapemasangan" type="text"  name="biayapemasangan" id="biayapemasangan"  readonly />      
</div>  
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
     </p>
</form>
 <br>

 <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DATA PELANGGAN</div>
                            </div>

                            
                            	 <table class="table"  width="100%" cellpadding=2 cellspacing=3 height="100%" align=center>
                                        <thead>
                                            <tr>
                                                
                                                <th>NIK</th>
												<th>Nama Pelanggan</th>
												<th>Alamat Pelanggan</th>
												<th>Jumlah KK</th>
												<th>Jumlah Jiwa</th>
												<th>Tanggal Pasang</th>
												<th>ID Tarif</th>
												<th>Golongan</th>
												<th>Biaya Pemasangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											<?php 
		include 'koneksi.php';
		$no = 1;
		$dat = mysqli_query($koneksi,"select * from pelanggan order by tanggal_pasang desc");
		while($data = mysqli_fetch_array($dat)) {
											?>
												<tr>
													<td><?php echo $data['nik']; ?></td>
													<td><?php echo $data['nama_pelanggan']; ?></td>
													<td><?php echo $data['alamat']; ?></td>
													<td><?php echo $data['jumlah_kk']; ?></td>
													<td><?php echo $data['jumlah_jiwa']; ?></td>
													<td><?php echo $data['tanggal_pasang']; ?></td>
													<td><?php echo $data['id_tarif']; ?></td>
													<td><?php echo $data['golongan']; ?></td>
													<td><?php echo $data['biaya']; ?></td>
															
                                                    <td><a href="<?= BASEURL; ?>/admin/editpelanggan/<?=$data['id'];?>" class="btn">
                                                    <i class="icon-edit"></i> Edit</a> 
                                                    <a href="<?= BASEURL; ?>/admin/cetakkartupelanggan/<?=$data['id'];?>" class="btn">
                                                    <i class="icon-edit"></i> Cetak Kartu</a> <a href="<?= BASEURL; ?>/admin/hapuspelanggan/<?=$data['id'];?>" class="btn" onclick="return confirm('Anda Yakin ?')")><i class="icon-trash"></i>Hapus</a></td>
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
            <script type="text/javascript">
<?php echo $jsArray; ?>   
function changeTarif(idtarif){
    document.getElementById('bulanan').value = prdName[idtarif].bulanan;
    document.getElementById('biayapemasangan').value = prdName[idtarif].biaya;
     document.getElementById('jenis').value = prdName[idtarif].jenis;
     document.getElementById('golongan').value = prdName[idtarif].golongan;

};
</script>