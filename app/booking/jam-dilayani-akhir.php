<?php 
include '../../config/connect.php';
$id_booking 	= $_GET['id_booking'];

date_default_timezone_set("Asia/Jakarta");
$jamsekarang	= date("H:i:s");

mysqli_query($koneksi,"UPDATE booking SET akhir = '$jamsekarang' WHERE id_booking='$id_booking'");
header("location:bell-antrian-tampil.php?id=$id_booking");
?>