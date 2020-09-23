<?php
include "anak-session.php";
include '../../../config/connect.php';
$anakreseta = mysqli_query($koneksi,"
	UPDATE dokter 
	SET aktif=0, ket=0
	WHERE id_dokter='$anak_id_dokter'");
if($anakreseta){
	$deleteantanak = mysqli_query($koneksi,"DELETE FROM ant_anak WHERE id_ant_anak!=0");
	$updateantanak = mysqli_query($koneksi,"UPDATE ant_anak SET status='1' WHERE id_ant_anak=0");
	if($updateantanak){
		session_start();
		unset($_SESSION['anak_id_dokter']);
		header("location:../../../dashboard.php");
	}
}else{
	header("location:anak-reset-a.php");
}
?>