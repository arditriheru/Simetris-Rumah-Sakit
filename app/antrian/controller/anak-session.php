<?php
session_start();
$anak_id_dokter        = $_SESSION['anak_id_dokter'];
$anak_id_sesi          = $_SESSION['anak_id_sesi'];
$anak_booking_tanggal  = $_SESSION['anak_booking_tanggal'];

include '../../config/connect.php';
$a = mysqli_query($koneksi,
	"SELECT COUNT(id_booking) AS total, dokter.nama_dokter
	FROM booking, dokter
	WHERE booking.id_dokter = dokter.id_dokter
	AND booking.booking_tanggal = '$anak_booking_tanggal'
	AND booking.id_sesi = '$anak_id_sesi'
	AND booking.id_dokter='$anak_id_dokter';");
while($b = mysqli_fetch_array($a)){
	$nama_dokter  = $b['nama_dokter'];
	$total        = $b['total'];
}
?>