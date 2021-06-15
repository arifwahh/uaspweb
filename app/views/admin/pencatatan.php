
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
    <script type="text/javascript">
function math() {
	var a = parseInt(document.getElementById("meterawal").value);
	var b = parseInt(document.getElementById("meterakhir").value);
	var d = parseInt(document.getElementById("bulanan").value);
    var c = parseInt (b-a);
    $(".meterpemakaian").val(c);
	var e = parseInt(document.getElementById("meterpemakaian").value);
	var g = parseInt(document.getElementById("administrasi").value);
	var h = parseInt(document.getElementById("pemeliharaan").value);
    var f = parseInt (d*e)+g+h;
    $(".hargaair").val(f);



function jancuk() {
	var c = parseInt(document.getElementById("meterpemakaian").value);
	var d = parseInt(document.getElementById("bulanan").value);
    var e = parseInt (c*d);
    $(".hargaair").val(e);
}
}
</script>

                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">LAMAN PENCATATAN TRANSAKSI</a>	
	                                    </li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div
                        <div class="span9" id="content">
                    
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">PENCATATAN METER PELANGGAN</div>
                            </div>
										
     <style>
form {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
</style> 

       <form name="formtambahtransaksipelanggan" method="post" action="<?= BASEURL; ?>/admin/addpencatatan"> 
<p>Tanggal Pembayaran : <br><?php 
$tanggal = mktime(date('m'), date("d"), date('Y'));
echo " <b> " . date("d-m-Y", $tanggal ) . "</b>";
date_default_timezone_set("Asia/Jakarta");?> 
<a color="#000000">||</a>
 <a class="jam-digital">
     <a id="jam"></a>:
     <a id="menit"></a>:
     <a id="detik"></a> 
<script>
window.setTimeout("waktu()", 1000);
 function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
     </script></a></br></p>
           <p>ID : <br><input type="text" name="idpembayaran" id="idpembayaran" readonly value="<?= autonumber("pencatatan", "id", "", "") ?>"/></br></p> 

<p>No.Nota : <br><input type="text" name="nonota" id="nonota" readonly value="<?= autonumber("pencatatan", "no_nota", "", "") ?>" /></br></p> 

<div>   
    
    <p>ID Pelanggan:<br><select name="idpelanggan" id="idpelanggan" class="form-control" onchange='fungsiUbah(this.value)'  required>
    
  <option value="">--ID PELANGGAN--</option>
 <?php 
 $result = mysqli_query($koneksi, "SELECT * FROM pelanggan");  
 $fungsi = "var nama = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {   
 echo '<option name="idpelanggan"  value="' . $row['id'] . '">' . $row['id'] . '</option>';
 $fungsi .= "nama['" . $row['id'] . "'] = {nama:'" . addslashes($row['nama_pelanggan']) . "',alamat:'".addslashes($row['alamat'])."',idtarif:'".addslashes($row['id_tarif'])."',idpelanggan:'".addslashes($row['id'])."'};\n";
 
  }
  
  ?>
</select>
    </br></p>
    <div class="form-group">
    <label>Nama Pelanggan</label>
    <input class="nama" type="text"  name="nama" id="nama" readonly />      
</div>

<div class="form-group">
    <label>Alamat</label>
    <input class="form-control" type="text" name="alamat" id="alamat" readonly/>      
    </div> </div>
<div>
<p>Id Tarif (Klik untuk melihat tarif) :<br><select name="idtarif" id="idtarif" class="form-control" onmousemove='changeTarif(this.value)' required>
 <?php  
 $result = mysqli_query($koneksi, "select * from tarif");  
 $jsArray = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="idtarif"  value="' . $row['id'] . '" hidden>' . $row['id'] . '</option>'; 
 $jsArray .= "prdName['" . $row['id'] . "'] = {bulanan:'" . addslashes($row['bulanan']) . "',jenis:'".addslashes($row['jenis_tarif'])."',golongan:'".addslashes($row['golongan'])."',pemeliharaan:'".addslashes($row['pemeliharaan'])."',administrasi:'".addslashes($row['administrasi'])."'};\n";
  }
  ?>
</select>
<br><p>      
<p>
    <div class="form-group">
    <label>Bulanan</label>
    <input class="bulanan" type="text"  name="bulanan" id="bulanan" onkeyup="math();" readonly />      
</div>

<div class="form-group">
    <label>Golongan</label>
    <input class="form-control" type="text" name="golongan" id="golongan" readonly/>      
    </div> </div>
    <p>Id PELANGGAN (Klik untuk melihat Meter Penggunaan) :<br><select name="meter" id="meter" class="form-control" onmousemove='changeMeter(this.value)' required>
 <?php  
 $result = mysqli_query($koneksi, "select * from pencatatan");  
 $jsa = "var meter = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="idmeter"  value="' . $row['id_pelanggan'] . '" hidden>' . $row['id_pelanggan'] . '</option>'; 
 $jsa .= "meter['" . $row['id_pelanggan'] . "'] = {meterakhir:'" . addslashes($row['meter_akhir']) . "'};\n";
  }
  ?>
</select>
<div>
    <p>Meter Awal: <br><input class="meterawal" type="number" name="meterawal" id="meterawal" onkeyup="math();" readonly/></br></p>
	<p>Meter Akhir: <br><input class="meterakhir" type="number" name="meterakhir" id="meterakhir" onkeyup="math();" value=3/></br></p> 
	<p>Meter Pemakaian: <br><input class="meterpemakaian" type="number" name="meterpemakaian" id="meterpemakaian"  readonly/></br></p>
<div class="form-group">
    <label>Biaya Pemeliharaan</label>
    <input class="tarif1" type="text"  name="pemeliharaan" id="pemeliharaan" readonly />      
</div>  
<div class="form-group">
    <label>Biaya Administrasi</label>
    <input class="administrasi" type="text"  name="administrasi" id="administrasi" readonly />      
</div>  
    <p>Harga Air: <br><input class="hargaair" type="number" name="hargaair" id="hargaair" readonly/></br></p>
 

    <p>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Reset</button>
</p>

</form>
</div>
 </div>   
 
                   
       
        <script src="select2-master/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#idpelanggan").select2({
                    placeholder: "Please Select"
                });

            });
        </script>
        <script type="text/javascript">
<?php echo $jsArray; ?>   
function changeTarif(idtarif){
    document.getElementById('bulanan').value = prdName[idtarif].bulanan;
    document.getElementById('golongan').value = prdName[idtarif].golongan;
     document.getElementById('pemeliharaan').value = prdName[idtarif].pemeliharaan;
     document.getElementById('administrasi').value = prdName[idtarif].administrasi;

};
<?php echo $jsa; ?>   
function changeMeter(idpelanggan){
    document.getElementById('meterawal').value = meter[idpelanggan].meterakhir;
    
};
<?php echo $fungsi; ?>
function fungsiUbah(idpelanggan){
document.getElementById('nama').value = nama[idpelanggan].nama;
document.getElementById('alamat').value = nama[idpelanggan].alamat;
document.getElementById('idtarif').value = nama[idpelanggan].idtarif;
document.getElementById('meter').value = nama[idpelanggan].idpelanggan;


};
</script>
    </body>
</html>