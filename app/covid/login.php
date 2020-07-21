<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../vendors/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
</head>
<body>
	<?php
	if (isset($_POST['login'])){
		session_start();
		include '../../config/connect.php';
		$nama_user = $_POST['nama_user'];
		$password = md5($_POST['password']);

		$a = mysqli_query($koneksi,"SELECT *
			FROM psdi_petugas, psdi_riw_aplikasi
			WHERE psdi_petugas.id_petugas=psdi_riw_aplikasi.id_petugas
			AND nama_user='$nama_user'
			AND password='$password'");
		while($b = mysqli_fetch_array($a)){
			$id_petugas 	= $b['id_petugas'];
			$id_aplikasi 	= $b['id_aplikasi'];
			$nama_login		= $b['nama'];
		}
		
		$cek = mysqli_num_rows($a);
		if($cek > 0){
			$_SESSION['username'] = $nama_user;
			$_SESSION['nama_login'] = $nama_login;
			$_SESSION['status'] = "login";
			echo "<script>
			setTimeout(function() {
				swal({
					title: 'Sukses',
					text: 'Selamat Datang $nama_login',
					type: 'success'
					}, function() {
						window.location = 'dashboard';
						});
						}, 10);
						</script>";
					}else{
						echo "<script>
						setTimeout(function() {
							swal({
								title: 'Gagal',
								text: 'Password / Username Salah',
								type: 'error'
								}, function() {
									window.location = 'login';
									});
									}, 10);
									</script>";
								}
							}
							?>
							<div class="kotak_login">
								<p class="tulisan_login">Silahkan login</p>
								<form method="post">
									<label>Username</label>
									<input type="text" name="nama_user" class="form_login" placeholder="Masukkan ..">
									<label>Password</label>
									<input type="password" name="password" class="form_login" placeholder="Masukkan ..">
									<input type="submit" class="tombol_login" name="login" value="LOGIN">
									<br><br>			
								</form>
								<a href="../">Kembali</a>
							</div>
							<script src="../../vendors/js/sweetalert.min.js"></script>
						</body>
						</html>