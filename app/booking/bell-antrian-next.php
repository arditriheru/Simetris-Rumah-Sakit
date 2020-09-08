<?php
include "session-start.php";
include '../../config/connect.php';
$id_booking = $_GET['id'];
mysqli_query($koneksi,"UPDATE booking SET aktif='0' WHERE aktif='1' AND booking_tanggal = '$jadwal' AND id_sesi = '$id_sesi' AND id_dokter='$id_dokter'");
mysqli_query($koneksi,"UPDATE booking SET aktif='1' WHERE id_booking=$id_booking");
// echo $id_booking;
header("location:bell-antrian-tampil");
?>