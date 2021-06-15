<!DOCTYPE html>
<html>
<head>
	<title>PAMSIMAS APP</title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL;?>/res.css">
</head>
<body>
	<style> 
	.responsive img {
    max-width:100%;
    /*width:100%;*/
    height: auto;
} </style>

	<center><span class="responsive"><img src="<?= BASEURL;?>/img/logo.png"></span><center>

	<?php 
	if(isset($data['pesan'])){
		if($data['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="<?= BASEURL; ?>/home/ceklogin" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input class="form_password" type="password" name="password"  placeholder="Password .." required="required">
            <input type="checkbox" class="form-checkbox"><label>Show password</label>
			
            <p><input type="submit" class="tombol_login" value="LOGIN"></p>
 
			<br/>
			<br/>
			<center>
				<h3>Melayani Dengan Sepenuh Hati</h3>
			</center>
		</form>
		
	</div>
 
 
</body>
    <script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form_password').attr('type','text');
			}else{
				$('.form_password').attr('type','password');
			}
		});
	});
</script>
</html>