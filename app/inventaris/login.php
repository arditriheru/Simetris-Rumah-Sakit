<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../vendors/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
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
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == 'psrs.rskiarachmi@gmail.com' && $password == 'wachidhasyim47'){
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