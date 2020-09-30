<?php 
session_start();
if(!isset($_SESSION['username'])) {
	header('location:login.php');
}else{ 
	$username = $_SESSION['username'];
	$nama_login = $_SESSION['nama_login']; 
}
?>