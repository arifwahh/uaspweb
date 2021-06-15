<center><h2>EDIT PELANGGAN</h2></center>
<br>
<form method="post" action="<?= BASEURL; ?>/admin/updatepelanggan">
          <?php
	include 'koneksi.php';
	$id = $data['id'];
	$data = mysqli_query($koneksi,"select * from pelanggan where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
			<table>
				<tr>			
					<td>NIK :</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nik" value="<?php echo $d['nik']; ?>">
					</td>
				</tr>
				<tr>
					<td>Nama Pelanggan :</td>
					<td><input type="text" width="300px" height="300px" name="nama" value="<?php echo $d['nama_pelanggan']; ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat" width="300px" height="300px" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
                <tr>
					<td>Jumlah KK</td>
					<td><input type="number" name="jumlahkk" value="<?php echo $d['jumlah_kk']; ?>"></td>
				</tr>
                <tr>
					<td>Jumlah Jiwa</td>
					<td><input type="number" name="jumlahjiwa" value="<?php echo $d['jumlah_jiwa']; ?>"></td>
				</tr>
                <tr> <td>
                <p>Jenis Tarif / Golongan :<br></td><td><select name="idtarif" id="idtarif" class="form-control" onchange='changeTarif(this.value)' required> 
    
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
  <br><p></td>
  <tr  >
  <div class="form-group">
      <td><label>Bulanan</label></td>
      <td><input class="bulanan" type="text"  name="bulanan" id="bulanan" readonly />      
  </div></td></tr>
  <tr><div class="form-group">
      <td><label>Jenis Tarif</label></td>
      <td><input class="jenis" type="text"  name="jenis" id="jenis" readonly /> </td>    
  </div></tr>
  <tr><div class="form-group">
      <td><label>Biaya Pemasangan</label></td>
      <td><input class="biayapemasangan" type="text"  name="biayapemasangan" id="biayapemasangan"  readonly /> </td>     
  </div> </tr>
  <tr>
  <div class="form-group">
        <td></td>
      <td><input class="golongan" type="text"  name="golongan" id="golongan" readonly hidden /></td>      
  </div></tr>
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
     <script type="text/javascript">
<?php echo $jsArray; ?>   
function changeTarif(idtarif){
    document.getElementById('bulanan').value = prdName[idtarif].bulanan;
    document.getElementById('biayapemasangan').value = prdName[idtarif].biaya;
     document.getElementById('jenis').value = prdName[idtarif].jenis;
     document.getElementById('golongan').value = prdName[idtarif].golongan;

};
</script>