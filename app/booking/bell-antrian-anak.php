<?php
include '../../config/connect.php';
$a = mysqli_query($koneksi,
	"SELECT *, dokter.nama_dokter
	FROM antrian
	INNER JOIN dokter
	ON antrian.id_dokter = dokter.id_dokter
	WHERE antrian.id_unit = 1;");
while($b = mysqli_fetch_array($a)){
	$b_id_dokter		= $b['id_dokter'];
	$b_id_unit 			= $b['id_unit'];
	$b_id_sesi 			= $b['id_sesi'];
	$b_nama_dokter 		= $b['nama_dokter'];
	$b_booking_tanggal 	= date('Y-m-d');
}

if(!isset($b_id_dokter)){
	$b_tcounter 	= '0';
	$b_ncounter 	= '0';
	$b_total 		= '0';
	$b_nama_dokter 	= 'Tutup';
}else{
	$c = mysqli_query($koneksi,
		"SELECT id_booking AS id_booking
		FROM booking 
		WHERE booking_tanggal = '$b_booking_tanggal'
		AND id_dokter = '$b_id_dokter'
		AND id_sesi = '$b_id_sesi'
		AND aktif = 1;");
	while($d = mysqli_fetch_array($c)){
		$b_id_booking 	= $d['id_booking'];
	}

	if(!isset($b_id_booking)){
		$b_tcounter = '0';
		$b_ncounter = '1';

		$e = mysqli_query($koneksi,
			"SELECT COUNT(id_booking) AS total
			FROM booking 
			WHERE booking_tanggal = '$b_booking_tanggal'
			AND id_dokter = '$b_id_dokter'
			AND id_sesi = '$b_id_sesi';");
		while($f = mysqli_fetch_array($e)){
			$b_total 	= $f['total'];
		}
	}else{
		$e = mysqli_query($koneksi,
			"SELECT COUNT(id_booking) AS total
			FROM booking 
			WHERE booking_tanggal = '$b_booking_tanggal'
			AND id_dokter = '$b_id_dokter'
			AND id_sesi = '$b_id_sesi';");
		while($f = mysqli_fetch_array($e)){
			$b_total 	= $f['total'];
		}

		$g = mysqli_query($koneksi,
			"SELECT FIND_IN_SET( id_booking, (    
			SELECT GROUP_CONCAT( id_booking
			ORDER BY id_booking ASC ) 
			FROM booking 
			WHERE booking_tanggal = '$b_booking_tanggal'
			AND id_dokter = '$b_id_dokter'
			AND id_sesi = '$b_id_sesi')
			) AS noant
			FROM booking
			WHERE id_booking = '$b_id_booking';");
		while($h = mysqli_fetch_array($g)){
			$b_tcounter   = $h['noant'];
			$b_ncounter   = $h['noant']+1;
		}
	}
}
?>
<script type="text/javascript">
	var antriananak = setInterval(
		function(){
			$('#antriananak').load('bell-antrian-anak.php').fadeIn("slow");
		},2000);
	</script>
	<div id="antriananak">
		<font class="antrian">B<?php echo $b_tcounter; ?></font><br>
		<font class="greentext" size="5">Panggilan selanjutnya B<?php echo $b_ncounter?></font>
		<br>
		<font class="greentext" size="6"><strong>Total <?php echo $b_total ?> Pasien</strong></font>
		<br>
		<font class="blacktext" size="5"><?php echo $b_nama_dokter?></font><br><br>
	</div>