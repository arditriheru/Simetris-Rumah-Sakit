<?php 
session_start();
$username 		= $_SESSION['sdm_username'];
$nama_login 	= $_SESSION['sdm_nama_login'];
$status 		= $_SESSION['sdm_status'];

// if(!isset($_SESSION['sdm_username'])) {
// 	header('location:login.php');
// }else{ 
// 	$username 		= $_SESSION['sdm_username'];
// 	$nama_login 	= $_SESSION['sdm_nama_login'];
// 	$status 		= $_SESSION['sdm_status'];
// }
?>