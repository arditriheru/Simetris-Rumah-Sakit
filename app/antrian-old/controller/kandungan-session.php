<?php
session_start();
$kandungan_id_dokter        = $_SESSION['kandungan_id_dokter'];
$kandungan_id_sesi          = $_SESSION['kandungan_id_sesi'];
$kandungan_booking_tanggal  = $_SESSION['kandungan_booking_tanggal'];

include '../../config/connect.php';
$a = mysqli_query($koneksi,
	"SELECT COUNT(id_booking) AS total, dokter.nama_dokter
	FROM booking, dokter
	WHERE booking.id_dokter = dokter.id_dokter
	AND booking.booking_tanggal = '$kandungan_booking_tanggal'
	AND booking.id_sesi = '$kandungan_id_sesi'
	AND booking.id_dokter='$kandungan_id_dokter';");
while($b = mysqli_fetch_array($a)){
	$nama_dokter  = $b['nama_dokter'];
	$total        = $b['total'];
}
?>