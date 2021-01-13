<?php 
include '../../config/connect.php';
$id_aktif 	= $_GET['id'];
$id_dokter 	= $_GET['id_dokter'];
$id_sesi 	= $_GET['id_sesi'];
$jadwal 	= $_GET['jadwal'];
mysqli_query($koneksi,"UPDATE booking SET aktif='0' WHERE aktif='1' AND booking_tanggal = '$jadwal' AND id_sesi = '$id_sesi' AND id_dokter='$id_dokter'");
mysqli_query($koneksi,"UPDATE booking SET aktif='1' WHERE id_booking=$id_aktif");
header("location:bell-antrian-tampil.php?id=$id_aktif");
 ?>