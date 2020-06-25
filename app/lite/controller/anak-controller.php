<?php
include 'controller/connection.php';
$a = mysqli_query($koneksi,
	"SELECT MAX(id_ant_anak) AS max
	FROM ant_anak;");
while($b = mysqli_fetch_array($a)){
	$anak_max = $b['max'];
}

$c = mysqli_query($koneksi,
	"SELECT *
	FROM ant_anak
	WHERE status=1;");
while($d = mysqli_fetch_array($c)){
	$anak_ant = $d['id_ant_anak'];
}

$e = mysqli_query($koneksi,
	"SELECT nama_dokter
	FROM dokter
	WHERE id_unit = 1
	AND aktif = 1
	AND ket = 1;");
while($f = mysqli_fetch_array($e)){
	$anak_nama_dokter = $f['nama_dokter'];
}
?>
