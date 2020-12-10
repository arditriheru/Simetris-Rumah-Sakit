<?php 
session_start();
if(!isset($_SESSION['booking_username'])) {
	header('location:login.php');
}else{ 
	$username 		= $_SESSION['booking_username'];
	$nama_login 	= $_SESSION['booking_nama_login'];
	$status 		= $_SESSION['booking_status'];

	$id_dokter 		= $_SESSION['id_dokter'];
	$id_sesi 		= $_SESSION['id_sesi'];
	$jadwal 		= $_SESSION['jadwal'];
	$konter 		= $_SESSION['konter'];
}
?>