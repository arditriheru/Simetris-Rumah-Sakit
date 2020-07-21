<?php 
session_start();
if(!isset($_SESSION['operator_username'])) {
	header('location:login');
}else{ 
	$username = $_SESSION['operator_username'];
	$nama_login = $_SESSION['operator_nama_login']; 
}
?>