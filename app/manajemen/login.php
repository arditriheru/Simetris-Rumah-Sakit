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
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
		while($d = mysqli_fetch_array($data)){
			$nama = $d['nama'];
		}
		$cek = mysqli_num_rows($data);

		if($cek > 0){
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";
			echo "<script>
			setTimeout(function() {
				swal({
					title: 'Sukses',
					text: 'Selamat Datang $nama',
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
									<input type="text" name="username" class="form_login" placeholder="Masukkan ..">
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