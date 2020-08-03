<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SIMETRIS | Inventaris</title>
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
							<!-- JavaScript -->
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery-1.10.2.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/sweetalert.min.js"></script>
							<!-- Page Specific Plugins -->
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/chartjs/Chart.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/morris/chart-data-morris.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/jquery.tablesorter.js"></script>
							<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/tables.js"></script>
						</body>
						</html>