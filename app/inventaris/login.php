<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SIMETRIS | Booking</title>
	<!-- Bootstrap core CSS -->
	<link href="../../vendors/css/bootstrap.css" rel="stylesheet">
	<!-- Add custom CSS here -->
	<link href="../../vendors/css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
	<!-- Page Specific CSS -->
	<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
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
								<a href="../../dashboard"><i class="fa fa-arrow-left"></i> Back</a>
							</div>
							<?php include "../../system/copyright.php";?>
							<script src="../../vendors/js/sweetalert.min.js"></script>
							<!-- JavaScript -->
							<script src="../../vendors/js/jquery-1.10.2.js"></script>
							<script src="../../vendors/js/bootstrap.js"></script>
							<!-- Page Specific Plugins -->
							<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
							<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
							<script src="../../vendors/js/morris/chart-data-morris.js"></script>
							<script src="../../vendors/js/tablesorter/jquery.tablesorter.js"></script>
							<script src="../../vendors/js/tablesorter/tables.js"></script>
						</body>
						</html>