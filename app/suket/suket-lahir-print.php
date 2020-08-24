<?php error_reporting(0); ?>
<?php include "views/header.php"; ?>
<body>
	<script>
		window.print();
	</script>
	<?php
	$id_suket = $_GET['id'];
	$data = mysqli_query($koneksi,
		"SELECT *, mr_pasien.nama, mr_pasien.tgl_lahir, mr_suket.alamat AS suket_alamat, mr_suket.tanggal AS tgl_regis, mr_sex.nama_sex, dokter.nama_dokter,
		IF(mr_suket.kode_jenis='1', 'SKL', 'Surat Keterangan') AS nama_jenis,
		CASE
		WHEN mr_suket.anak_ke='1' THEN 'Satu'
		WHEN mr_suket.anak_ke='2' THEN 'Dua'
		WHEN mr_suket.anak_ke='3' THEN 'Tiga'
		WHEN mr_suket.anak_ke='4' THEN 'Empat'
		WHEN mr_suket.anak_ke='5' THEN 'Lima'
		WHEN mr_suket.anak_ke='6' THEN 'Enam'
		WHEN mr_suket.anak_ke='7' THEN 'Tujuh'
		WHEN mr_suket.anak_ke='8' THEN 'Delapan'
		WHEN mr_suket.anak_ke='9' THEN 'Sembilan'
		WHEN mr_suket.anak_ke='10' THEN 'Sepuluh'
		END AS ejaan
		FROM mr_suket, mr_pasien, mr_sex, dokter
		WHERE mr_suket.id_catatan_medik=mr_pasien.id_catatan_medik
		AND mr_pasien.sex=mr_sex.id_sex
		AND mr_suket.id_dokter=dokter.id_dokter
		AND mr_suket.id_suket='$id_suket'");
	while($d = mysqli_fetch_array($data)){
		$id_suket 			= $d['id_suket'];
		$kode_abjad 		= $d['kode_abjad'];
		$nama_jenis 		= $d['nama_jenis'];
		$nama 				= $d['nama'];
		$tgl_lahir 			= $d['tgl_lahir'];
		$ayah 				= $d['ayah'];
		$ibu 				= $d['ibu'];
		$nama_sex 			= $d['nama_sex'];
		$bb 				= $d['bb'];
		$pb 				= $d['pb'];
		$lk 				= $d['lk'];
		$jam_lahir 			= $d['jam_lahir'];
		$anak_ke 			= $d['anak_ke'];
		$ejaan 				= $d['ejaan'];
		$suket_alamat 		= $d['suket_alamat'];
		$tgl_regis 			= $d['tgl_regis'];
		$sub_nama 			= substr($d['nama'],0, -2);
		$sub_nama_dokter 	= substr($d['nama_dokter'],0, -5);

		$formatRomawi = array(
			'1' 	=> 'I',
			'2' 	=> 'II',
			'3' 	=> 'III',
			'4' 	=> 'IV',
			'5' 	=> 'V',
			'6' 	=> 'VI',
			'7' 	=> 'VII',
			'8' 	=> 'VIII',
			'9' 	=> 'IX',
			'10' 	=> 'X',
			'11' 	=> 'XI',
			'12' 	=> 'XII'
		);
		$getRomawi="$tgl_regis";
		$romawi = date('n', strtotime($getRomawi));
		
		$formatHariLahir = array(
			'Sun' 	=> 'Minggu',
			'Mon' 	=> 'Senin',
			'Tue' 	=> 'Selasa',
			'Wed' 	=> 'Rabu',
			'Thu' 	=> 'Kamis',
			'Fri' 	=> 'Jumat',
			'Sat' 	=> 'Sabtu'
		);
		$getTglLahir="$tgl_lahir";
		$hariLahir = date('D', strtotime($getTglLahir));

		function formatHariLahir($tgl_lahir)
		{
			$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$split = explode('-', $tgl_lahir);
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		}

		function formatTglRegis($tgl_regis)
		{
			$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$split = explode('-', $tgl_regis);
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		}
	}
	?>
	<div id="page-wrapper">
		<div class="col-lg-12">
			<div class="row">
				<div class="container">
					<div class="container">
						<div class="noprint">
							<a href="dashboard"><button type="button" class="btn btn-success">Dashboard</button></a>
						</div>
						<br><br><br>
						<center>
							<div class="row">
								<h3><strong><u>SURAT KETERANGAN LAHIR</u></h3>
									<h5>Nomor : <?php echo $kode_abjad.".".$id_suket."/RM-".$nama_jenis."/Rachmi/".$formatRomawi[$romawi]."/".date("Y", strtotime($tgl_regis));?></strong></h5>
								</div>
							</center><br><br>
							<strong>Yang bertanda tangan dibawah ini menerangkan bahwa telah lahir dengan selamat :</strong><br><br><br>
							<table class="table">
								<tbody>
									<tr>
										<td><b>Nama Anak</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $sub_nama; ?></strong></td>
									</tr>
									<tr>
										<td><b>Hari, Tanggal Lahir</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $formatHariLahir[$hariLahir].", ".formatHariLahir($tgl_lahir); ?></strong></td>
									</tr>
									<tr>
										<td><b>Nama Ayah</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $ayah; ?></strong></td>
									</tr>
									<tr>
										<td><b>Nama Ibu</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $ibu; ?></strong></td>
									</tr>
									<tr>
										<td><b>Jenis Kelamin</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $nama_sex; ?></strong></td>
									</tr>
									<tr>
										<td><b>BB | PB | LK</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $bb." gr | ".$pb." cm | ".$lk." cm"; ?></strong></td>
									</tr>
									<tr>
										<td><b>Lahir Pukul</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $jam_lahir." WIB"; ?></strong></td>
									</tr>
									<tr>
										<td><b>Anak ke-</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $anak_ke." (".$ejaan.")"; ?></strong></td>
									</tr>
									<tr>
										<td><b>Alamat</b></td>
										<td><b>:</b></td>
										<td><strong><?php echo $suket_alamat; ?></strong></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><div align="right">
											<small>Printed : <?php include "../../system/date-time.php";?> / <?php echo $jamsekarang;?></small>
										</div></td>
									</tr>
								</tbody>
							</table>
							<strong>Surat keterangan lahir ini dibuat atas dasar yang sebenarnya. Diharapkan untuk digunakan sebagaimana mestinya.</strong>
							<br><br>
							<div align="right">
								<table>
									<body>
										<tr>
											<td>
												<strong><center>Yogyakarta, <?php echo formatTglRegis($tgl_regis); ?><br>Dokter,<br><br><br><br><br><?php echo "dr. ".$sub_nama_dokter;?></center></strong>
											</td>
										</tr>
									</body>
								</table>
							</div>
									<!-- <div class="footer">
										<small><?php echo $actual_link; ?></small>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</html>