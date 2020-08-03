<?php 
session_start();
if(!isset($_SESSION['admin_username'])) {
	header('location:../login');
}else{ 
	$username = $_SESSION['admin_username'];
	$nama_login = $_SESSION['admin_nama_login']; 
}
?>