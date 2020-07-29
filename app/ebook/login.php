<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SIMETRIS | Ebook</title>
	<!-- Login page CSS -->
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/style.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
	<!-- Add custom CSS here -->
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
</head>
<body>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
		<form method="post" action="">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username ..">
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" name="login" class="tombol_login" value="LOGIN">
			<br/>
			<br/>
		</form>
		<a href="../">Kembali</a>
	</div>
	<?php
	if (isset($_POST['login'])){
		include '../../config/connect.php';
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
		$cek = mysqli_num_rows($data);
		if($cek > 0){
			$_SESSION['username'] = $username;
			echo "<script>
			setTimeout(function() {
				swal({
					title: 'Uyeah!!',
					text: 'Berhasil Login',
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
								title: 'Tetot!!',
								text: 'Username atau Password Salah!',
								type: 'error'
								}, function() {
									window.location = 'login';
									});
									}, 10);
									</script>";
								}
							}
							?>
							<script src="../../vendors/js/sweetalert.min.js"></script>
						</body>
						</html>