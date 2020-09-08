<?php include "views/header.php"; ?>
<nav>
	<div id="wrapper">
		<?php include "menu.php"; ?>
	</div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Bell<small> Antrian</small></h1>
			<ol class="breadcrumb">
				<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="booking-filter"><i class="fa fa-search"></i> Cari</a></li>
				<li class="active"><i class="fa fa-bell-o"></i> Antrian</li>
			</ol>  
			<?php include "../../system/welcome.php"?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<?php
			if(isset($_POST['submitfilterbell'])){
				$_SESSION['id_dokter']  = $_POST['id_dokter'];
				$_SESSION['id_sesi']  	= $_POST['id_sesi'];
				$_SESSION['jadwal']    	= $_POST['jadwal'];

				echo "<script>
				setTimeout(function() {
					swal({
						title: 'Sukses',
						text: 'Bell Antrian',
						type: 'success'
						}, function() {
							window.location = 'bell-antrian-tampil';
							});
							}, 10);
							</script>";
						}
						?>
						<form method="post" action="" role="form">
							<div class="form-group">
								<label>Nama Dokter</label>
								<select class="form-control" type="text" name="id_dokter" onchange="unSet()" required="">
									<option value="">Pilih</option>
									<?php 
									$data = mysqli_query($koneksi,"SELECT * FROM dokter WHERE status=1;");
									while($d = mysqli_fetch_array($data)){
										echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Jadwal</label>
								<input class="form-control" type="date" name="jadwal" required="">
							</div>
							<div class="form-group">
								<label>Sesi</label>
								<select class="form-control" type="text" name="id_sesi" required="">
									<option value="">Pilih</option>
									<?php 
									$data = mysqli_query($koneksi,"SELECT * FROM sesi;");
									while($d = mysqli_fetch_array($data)){
										echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
									}
									?>
								</select>
							</div>
							<button type="submit" name="submitfilterbell" class="btn btn-success">Tampilkan</button>
						</form>
					</div>
				</div><!-- /.row -->
			</div><!-- /#wrapper -->
			<?php include "views/footer.php"; ?>