<?php error_reporting(0); ?>
<?php include "views/header.php"; ?>
<body>
	<script>
		window.print();
	</script>
	<?php
	$id_suket = $_GET['id'];
	include '../../config/connect.php';
	$data = mysqli_query($koneksi,
		"SELECT *, mr_suket.tanggal, mr_pasien.nama, mr_pasien.tgl_lahir, mr_sex.nama_sex, mr_pasien.alamat, dokter.nama_dokter, dokter.nama_dokter,
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
		AND mr_suket.id_suket='$id_suket';");
	while($d = mysqli_fetch_array($data)){
		$tgl_lahir 			= $d['tgl_lahir'];
		$tanggal   			= $d['tanggal'];
		$sub_nama 			= substr($d['nama'],0, -2);
		$sub_nama_dokter 	= substr($d['nama_dokter'],0, -5);

		function getRomawi($bln){
			switch($bln){

				case '1': 
				return "I";
				break;
				case '2':
				return "II";
				break;
				case '3':
				return "III";
				break;
				case '4':
				return "IV";
				break;
				case '5':
				return "V";
				break;
				case '6':
				return "VI";
				break;
				case '7':
				return "VII";
				break;
				case '8':
				return "VIII";
				break;
				case '9':
				return "IX";
				break;
				case '10':
				return "X";
				break;
				case '11':
				return "XI";
				break;
				case '12':
				return "XII";
				break;
			}
		}
		$bulan	= date('n', strtotime($tanggal));
		$romawi = getRomawi($bulan);

		function format_hari(){
			$hari = date ("D", strtotime($d['tgl_lahir']));

			switch($hari){
				case 'Sun':
				$format_hari = "Minggu";
				break;
				case 'Mon':			
				$format_hari = "Senin";
				break;
				case 'Tue':
				$format_hari = "Selasa";
				break;
				case 'Wed':
				$format_hari = "Rabu";
				break;
				case 'Thu':
				$format_hari = "Kamis";
				break;
				case 'Fri':
				$format_hari = "Jumat";
				break;
				case 'Sat':
				$format_hari = "Sabtu";
				break;
				default:
				$format_hari = "Tidak di ketahui";		
				break;
			}
			return $format_hari;
		}


		function format_tgllahir($tgl_lahir)
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

		function format_tanggal($tanggal)
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
			$split = explode('-', $tanggal);
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
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
										<h5>Nomor : <?php echo $d['kode_abjad'].".".$d['id_suket']."/RM-".$d['nama_jenis']."/Rachmi/".$romawi."/".date("Y", strtotime($tanggal));?></strong></h5>
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
											<td><strong><?php echo format_hari().", ".format_tgllahir($tgl_lahir); ?></strong></td>
										</tr>
										<tr>
											<td><b>Nama Ayah</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['ayah']; ?></strong></td>
										</tr>
										<tr>
											<td><b>Nama Ibu</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['ibu']; ?></strong></td>
										</tr>
										<tr>
											<td><b>Jenis Kelamin</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['nama_sex']; ?></strong></td>
										</tr>
										<tr>
											<td><b>BB | PB | LK</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['bb']." gr | ".$d['pb']." cm | ".$d['lk']." cm"; ?></strong></td>
										</tr>
										<tr>
											<td><b>Lahir Pukul</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['jam_lahir']." WIB"; ?></strong></td>
										</tr>
										<tr>
											<td><b>Anak ke-</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['anak_ke']." (".$d['ejaan'].")"; ?></strong></td>
										</tr>
										<tr>
											<td><b>Alamat</b></td>
											<td><b>:</b></td>
											<td><strong><?php echo $d['alamat']; ?></strong></td>
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
													<strong><center>Yogyakarta, <?php echo format_tanggal($tanggal); ?><br>Dokter,<br><br><br><br><br><?php echo "dr. ".$sub_nama_dokter;?></center></strong>
												</td>
											</tr>
										</body>
										</table><?php } ?>
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