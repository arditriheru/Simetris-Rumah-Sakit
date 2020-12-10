<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="views/bootstrap.css">
	<!-- Add custom CSS here -->
	<link rel="stylesheet" type="text/css" href="views/sb-admin.css">
	<link rel="stylesheet" type="text/css" href="views/font-awesome.min.css">
	<style>
		* {
			box-sizing: border-box;
		}

		.row {
			display: flex;
		}

		.antrian {
			font-size: 120px;
			color: #000000;
		}

		.marquee1 {
			font-size: 30px;
			color: #ffffff;
		}
	</style>
</head>
<body bgcolor="#248ea9">
	<div id="page-wrapper">
		<!-- <div class="row">
			<marquee direction="left" bgcolor="#248ea9" width="auto"><font class="marquee1">Selamat Datang di RSKIA Rachmi Yogyakarta</font></marquee>
		</div>
 -->
		<div class="row">
			<div id="page-wrapper">
				<div align="center" class="column panel-queue panel-primary-queue">
					<div class="panel-heading">
						<h1>Poli Obsgyn</h1>
					</div>
					<?php include "bell-antrian-obsgyn.php"; ?>
					<br><div class="panel-heading">
					</div>
				</div>
			</div>
			<div id="page-wrapper">
				<div align="center" class="column panel-queue panel-primary-queue">
					<div class="panel-heading">
						<h1>Poli Anak</h1>
					</div>
					<?php include "bell-antrian-anak.php"; ?>
					<br><div class="panel-heading">
					</div>
				</div>
			</div>
		</div>
		<p align="center">Tim Teknologi Informasi<br>RSKIA Rachmi</p>
	</div>
</body>
<!-- JavaScript -->
<script type="text/javascript" src="views/jquery-1.10.2.js"></script>
</html>
