<?php
include "kandungan-session.php";
include '../../../config/connect.php';
$kandunganreseta = mysqli_query($koneksi,"
	UPDATE dokter 
	SET aktif=0, ket=0
	WHERE id_dokter='$kandungan_id_dokter'");
if($kandunganreseta){
	$deleteantkandungan = mysqli_query($koneksi,"DELETE FROM ant_kandungan WHERE id_ant_kandungan!=0");
	$updateantkandungan = mysqli_query($koneksi,"UPDATE ant_kandungan SET status='1' WHERE id_ant_kandungan=0");
	if($updateantkandungan){
		session_start();
		unset($_SESSION['kandungan_id_dokter']);
		header("location:../../../dashboard");
	}
}else{
	header("location:kandungan-reset-a");
}
?>