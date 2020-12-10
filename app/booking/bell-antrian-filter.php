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
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="fa fa-bell-o"></i> Antrian</li>
			</ol>  
			<?php include "../../system/welcome.php"?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<?php
			unset($_SESSION['id_dokter']);
			unset($_SESSION['id_sesi']);
			unset($_SESSION['jadwal']);
			unset($_SESSION['konter']);

			if(isset($_POST['submitfilterbell'])){
				$id_dokter 	= $_POST['id_dokter'];
				$id_sesi 	= $_POST['id_sesi'];
				$konter 	= $_POST['konter'];
				$tanggal    = $tanggalsekarang;
				$jam        = $jamsekarang;

				$a = mysqli_query($koneksi,
					"SELECT COUNT(id_booking) AS total
					FROM booking
					WHERE id_dokter='$id_dokter'
					AND id_sesi='$id_sesi'
					AND booking_tanggal='$tanggalsekarang';");
				while($b = mysqli_fetch_array($a)){
					$total = $b['total'];
				}

				$c = mysqli_query($koneksi,
					"SELECT id_unit FROM dokter WHERE id_dokter='$id_dokter';");
				while($d = mysqli_fetch_array($c)){
					$id_unit = $d['id_unit'];
				}

				if($total>0){
					mysqli_query($koneksi,
						"DELETE FROM antrian WHERE id_unit='$id_unit' AND konter='$konter';");
					mysqli_query($koneksi,
						"INSERT INTO antrian(id_antrian, id_dokter, id_unit, id_sesi, tanggal, jam, konter)
						VALUES('','$id_dokter','$id_unit','$id_sesi','$tanggal','$jam','$konter');");
					
					$_SESSION['id_dokter']  = $id_dokter;
					$_SESSION['id_sesi']  	= $id_sesi;
					$_SESSION['jadwal']    	= $tanggalsekarang;
					$_SESSION['konter']    	= $konter;
					
					echo "<script>
					setTimeout(function() {
						swal({
							title: 'Sukses',
							text: 'Bell Antrian',
							type: 'success'
							}, function() {
								window.location = 'bell-antrian-tampil.php';
								});
								}, 10);
								</script>";
							}else{
								echo "<script>
								setTimeout(function() {
									swal({
										title: 'Tidak Ada Jadwal',
										text: 'Coba Lagi',
										type: 'error'
										}, function() {
											window.location = 'javascript: history.back()';
											});
											}, 10);
											</script>";
										}
									}
									?>
									<form method="post" action="" role="form">
										<div class="form-group">
											<label>Nama Dokter</label>
											<select class="form-control" type="text" name="id_dokter" required="">
												<option value="">Pilih</option>
												<?php 
												$data = mysqli_query($koneksi,"SELECT *, dokter.nama_dokter
													FROM booking, dokter
													WHERE booking.id_dokter=dokter.id_dokter
													AND booking.booking_tanggal='$tanggalsekarang'
													GROUP BY booking.id_dokter;");
												while($d = mysqli_fetch_array($data)){
													echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
												}
												?>
											</select>
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
										<div class="form-group">
											<label>Konter</label>
											<select class="form-control" type="text" name="konter" required="">
												<option value="">Pilih</option>
												<option value="1">Poli Obsgyn Selatan</option>
												<option value="3">Poli Obsgyn Utara</option>
												<option value="2">Poli Anak</option>
											</select>
										</div>
										<button type="submit" name="submitfilterbell" class="btn btn-success">Tampilkan</button>
									</form>
								</div>
							</div><!-- /.row -->
						</div><!-- /#wrapper -->
						<?php include "views/footer.php"; ?>