<?php 
session_start();
if(!isset($_SESSION['suket_username'])) {
	header('location:login.php');
}else{ 
	$username 		= $_SESSION['suket_username'];
	$nama_login 	= $_SESSION['suket_nama_login'];
	$status 		= $_SESSION['suket_status'];
}
?>