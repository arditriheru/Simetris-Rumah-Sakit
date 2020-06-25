<?php
include 'controller/connection.php';
$a = mysqli_query($koneksi,
	"SELECT MAX(id_ant_kandungan) AS max
	FROM ant_kandungan;");
while($b = mysqli_fetch_array($a)){
	$kandungan_max = $b['max'];
}

$c = mysqli_query($koneksi,
	"SELECT *
	FROM ant_kandungan
	WHERE status=1;");
while($d = mysqli_fetch_array($c)){
	$kandungan_ant = $d['id_ant_kandungan'];
}

$e = mysqli_query($koneksi,
	"SELECT nama_dokter
	FROM dokter
	WHERE id_unit = 2
	AND aktif = 1
	AND ket = 2;");
while($f = mysqli_fetch_array($e)){
	$kandungan_nama_dokter = $f['nama_dokter'];
}
?>
