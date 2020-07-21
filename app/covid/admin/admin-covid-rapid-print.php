<?php error_reporting(0); ?>
<?php include "admin-session-start.php"; ?>
<!DOCTYPE html>
<?php include "../views/header.php"; ?>
<body>
	<script>
		window.print();
	</script>
	<div class="col-lg-12">
		<img class="img-responsive" src="../../../images/Kop Surat Laboratorium.jpg" width="100%" alt="Kop Surat Laboratorium"><br>
		<div class="row">
			<div class="col-lg-12">
				<?php
				$id_rapidtest = $_POST['id_rapidtest'];
				include '../../../config/connect.php';
				$data = mysqli_query($koneksi,
					"SELECT *, mr_dokter.nama_dokter, mr_unit.nama_unit,
					IF(rapidtest.sex='1', 'Laki-laki', 'Perempuan') AS nama_sex,
					CASE
					WHEN rapidtest.igm='0' THEN 'Non Reaktif'
					WHEN rapidtest.igm='1' THEN 'Reaktif'
					WHEN rapidtest.igm='3' THEN 'On Process'
					END AS nama_igm,
					CASE
					WHEN rapidtest.igg='0' THEN 'Non Reaktif'
					WHEN rapidtest.igg='1' THEN 'Reaktif'
					WHEN rapidtest.igg='3' THEN 'On Process'
					END AS nama_igg,
					IF(rapidtest.nilai_rujukan='1', 'Reaktif', 'Non Reaktif') AS nama_nilai_rujukan
					FROM rapidtest, mr_dokter, mr_unit
					WHERE rapidtest.id_dokter=mr_dokter.id_dokter
					AND rapidtest.id_unit=mr_unit.id_unit
					AND rapidtest.id_rapidtest='$id_rapidtest';");
				while($d = mysqli_fetch_array($data)){
					$tgl_periksa  = $d['tgl_periksa'];
					$tanggal      = $d['tanggal'];
					$lahir        = new DateTime($d['tgl_lahir']);
					$today        = new DateTime();
					$umur         = $today->diff($lahir);

					function format_tgl_periksa($tgl_periksa)
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
						$split = explode('-', $tgl_periksa);
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
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td><b>No.RM</b></td>
								<td><?php echo $d['id_catatan_medik']; ?></td>
								<td><b>Dokter</b></td>
								<td><?php echo $d['nama_dokter']; ?></td>
							</tr>
							<tr>
								<td><b>Nama</b></td>
								<td><?php echo $d['nama']; ?></td>
								<td><b>Asal</b></td>
								<td><?php echo $d['nama_unit']; ?></td>
							</tr>
							<tr>
								<td><b>Umur</b></td>
								<td><?php echo $umur->y; echo " Tahun, "; echo $umur->m; echo " Bulan, dan "; echo $umur->d; echo " Hari"; ?></td>
								<td><b>Tgl Periksa</b></td>
								<td><?php echo format_tgl_periksa($d['tgl_periksa']); ?></td>
							</tr>
							<tr>
								<td><b>Gender</b></td>
								<td><?php echo $d['nama_sex']; ?></td>
								<td><b>Jam Periksa</b></td>
								<td><?php echo $d['jam_periksa']; ?></td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td><?php echo $d['alamat']; ?></td>
								<td><b>Sampel</b></td>
								<td><?php echo $d['sampel']; ?></td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover table-striped tablesorter">
						<thead>
							<tr>
								<th><center>Pemeriksaan</center></th>
								<th><center>Hasil</center></th>
								<th><center>Nilai Rujukan</center></th>
								<th><center>Metode</center></th>
							</tr>
							<tr><td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d['pemeriksaan']; ?></td></tr>
						</thead>
						<tbody>
							<tr>
								<td><center>(IgM)</center></td>
								<td><center><?php echo $d['nama_igm']; ?></center></td>
								<td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
								<td><center><?php echo $d['metode']; ?></center></td>
							</tr>
							<tr>
								<td><center>(IgG)</center></td>
								<td><center><?php echo $d['nama_igg']; ?></center></td>
								<td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
								<td><center><?php echo $d['metode']; ?></center></td>
							</tr>
						</tbody>
					</table>
					<div align="right">
						<p>Printed : <?php include "../../../system/date-time.php";?> / <?php echo $jamsekarang;?></p>
					</div>
					<table>
						<tbody>
							<tr>
								<td><left><p>
									<strong>Catatan :</strong><br>
									1. Pemeriksaan Rapid ke 1<br>
									2. Hasil Non reaktif tidak menyingkirkan kemungkinan infeksi SARS CoV-2<br>
									3. Hasil Non Reaktif dapat terjadi pada kondisi :<br>
									&nbsp; &nbsp; - Sesorang belum / tidak terinfeksi<br>
									&nbsp; &nbsp; - Window Period (Terinfeksi namun antibody belum terbentuk)<br>
									&nbsp; &nbsp; - Immunocompromised<br>
									4. Saran :<br>
									&nbsp; &nbsp; - Ulangi pemeriksaan rapid test antibody 7-10 hari kemudian<br>
									&nbsp; &nbsp; - Pertahankan perilaku hidup bersih dan physical distancing<br><br><br>
								</p></letf></td>
							</tr>
							<tr>
								<td><center><strong>Petugas,</strong><br><br><br><br><br><br>
									<?php echo $d['pemeriksa']; ?></center></td>
									<td><center><strong>Yogyakarta, <?php echo format_tanggal($d['tanggal']); ?></strong><br><br><br><br><br><br>
									dr. Indah Ajeng Ebtasari, M.Sc.,Sp.PK.</center></td>
								</tr>
							</tbody>
						</table>
						</div><?php } ?>
					</div>
				</div>
			</body>
			</html>