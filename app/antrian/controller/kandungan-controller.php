<?php
include 'controller/kandungan-session.php';
include '../../config/connect.php';

date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang    =   date('Y-m-d');

$a = mysqli_query($koneksi,
	"SELECT COUNT(id_dokter) AS ket
	FROM dokter
	WHERE id_unit = 1
	AND aktif = 1
	AND ket = 1;");
while($b = mysqli_fetch_array($a)){
	$ket = $b['ket'];
}

$b = mysqli_query($koneksi,
	"SELECT MAX(id_ant_kandungan) AS max
	FROM ant_kandungan;");
while($c = mysqli_fetch_array($b)){
	$max = $c['max'];
}

$d = mysqli_query($koneksi,
	"SELECT COUNT(id_booking) AS total, dokter.nama_dokter
	FROM booking, dokter
	WHERE booking.id_dokter = dokter.id_dokter
	AND booking.booking_tanggal = '$kandungan_booking_tanggal'
	AND booking.id_sesi = '$kandungan_id_sesi'
	AND booking.id_dokter='$kandungan_id_dokter';");
while($e = mysqli_fetch_array($d)){
	$nama_dokter = $e['nama_dokter'];
	$total = $e['total'];
}

$f = mysqli_query($koneksi,
	"SELECT id_ant_kandungan
	FROM ant_kandungan
	WHERE status=1;");
while($g = mysqli_fetch_array($f)){
	$kandungan_ant = $g['id_ant_kandungan'];
}

$h = mysqli_query($koneksi,
	"SELECT MAX(id_ant_kandungan) AS max
	FROM ant_kandungan;");
while($i = mysqli_fetch_array($h)){
	$max = $i['max'];
}

$j = mysqli_query($koneksi,
	"SELECT nama_dokter
	FROM dokter
	WHERE id_unit = 2
	AND aktif = 1
	AND ket = 2;");
while($k = mysqli_fetch_array($j)){
	$kandungan_nama_dokter = $k['nama_dokter'];
}

$l = mysqli_query($koneksi,
	"SELECT id_ant_kandungan
	FROM ant_kandungan
	WHERE status=1;");
while($m = mysqli_fetch_array($l)){
	$tcounter 	= $m['id_ant_kandungan'];
	$panjang	= strlen($tcounter);
	$antrian 	= $tcounter;
	for($i=0;$i<$panjang;$i++){
		$id_ant_kandungan = $m['id_ant_kandungan']+1;
	}
}

$n = mysqli_query($koneksi,
	"SELECT COUNT(id_dokter) AS ket
	FROM dokter
	WHERE id_unit = 2
	AND aktif = 1
	AND ket = 2;");
while($o = mysqli_fetch_array($n)){
	$ket = $o['ket'];
}

$p = mysqli_query($koneksi,
	"SELECT id_sesi, id_dokter
	FROM ant_kandungan
	WHERE id_ant_kandungan = 0;");
while($q = mysqli_fetch_array($p)){
	$total_kandungan_id_sesi   = $q['id_sesi'];
	$total_kandungan_id_dokter = $q['id_dokter'];
}

$r = mysqli_query($koneksi,
	"SELECT COUNT(id_booking) AS total_kandungan_antrian
	FROM booking
	WHERE id_dokter = '$total_kandungan_id_dokter'
	AND id_sesi = '$total_kandungan_id_sesi'
	AND booking_tanggal = '$tanggalsekarang' ;");
while($s = mysqli_fetch_array($r)){
	$total_kandungan_antrian   = $s['total_kandungan_antrian'];
}

?>
