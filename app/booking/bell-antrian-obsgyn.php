<?php
include '../../config/connect.php';
$a = mysqli_query($koneksi,
	"SELECT *, dokter.nama_dokter
	FROM antrian
	INNER JOIN dokter
	ON antrian.id_dokter = dokter.id_dokter
	WHERE antrian.id_unit = 2;");
while($b = mysqli_fetch_array($a)){
	$a_id_dokter		= $b['id_dokter'];
	$a_id_unit 			= $b['id_unit'];
	$a_id_sesi 			= $b['id_sesi'];
	$a_nama_dokter 		= $b['nama_dokter'];
	$a_booking_tanggal 	= date('Y-m-d');
}

if(!isset($a_id_dokter)){
	$a_tcounter 	= '0';
	$a_ncounter 	= '0';
	$a_total 		= '0';
	$a_nama_dokter 	= 'Tutup';
}else{
	$c = mysqli_query($koneksi,
		"SELECT id_booking AS id_booking
		FROM booking 
		WHERE booking_tanggal = '$a_booking_tanggal'
		AND id_dokter = '$a_id_dokter'
		AND id_sesi = '$a_id_sesi'
		AND aktif = 1;");
	while($d = mysqli_fetch_array($c)){
		$a_id_booking 	= $d['id_booking'];
	}

	if(!isset($a_id_booking)){
		$a_tcounter = '0';
		$a_ncounter = '1';

		$e = mysqli_query($koneksi,
			"SELECT COUNT(id_booking) AS total
			FROM booking 
			WHERE booking_tanggal = '$a_booking_tanggal'
			AND id_dokter = '$a_id_dokter'
			AND id_sesi = '$a_id_sesi';");
		while($f = mysqli_fetch_array($e)){
			$a_total 	= $f['total'];
		}
	}else{
		$e = mysqli_query($koneksi,
			"SELECT COUNT(id_booking) AS total
			FROM booking 
			WHERE booking_tanggal = '$a_booking_tanggal'
			AND id_dokter = '$a_id_dokter'
			AND id_sesi = '$a_id_sesi';");
		while($f = mysqli_fetch_array($e)){
			$a_total 	= $f['total'];
		}

		$g = mysqli_query($koneksi,
			"SELECT FIND_IN_SET( id_booking, (    
			SELECT GROUP_CONCAT( id_booking
			ORDER BY id_booking ASC ) 
			FROM booking 
			WHERE booking_tanggal = '$a_booking_tanggal'
			AND id_dokter = '$a_id_dokter'
			AND id_sesi = '$a_id_sesi')
			) AS noant
			FROM booking
			WHERE id_booking = '$a_id_booking';");
		while($h = mysqli_fetch_array($g)){
			$a_tcounter   = $h['noant'];
			$a_ncounter   = $h['noant']+1;
		}
	}
}
?>
<script type="text/javascript">
	var antrianobgsyn = setInterval(
		function(){
			$('#antrianobgsyn').load('bell-antrian-obsgyn.php').fadeIn("slow");
		},2000);
	</script>
	<div id="antrianobgsyn">
		<font class="antrian">A<?php echo $a_tcounter; ?></font><br>
		<font class="greentext" size="5">Panggilan selanjutnya A<?php echo $a_ncounter?></font>
		<br>
		<font class="greentext" size="6"><strong>Total <?php echo $a_total ?> Pasien</strong></font>
		<br>
		<font class="blacktext" size="5"><?php echo $a_nama_dokter?></font><br><br>
	</div>