<?php 
session_start();
if(!isset($_SESSION['covid_username'])) {
	header('location:login.php');
}else{ 
	$username 		= $_SESSION['covid_username'];
	$nama_login 	= $_SESSION['covid_nama_login'];
	$status 		= $_SESSION['covid_status'];
}
?>