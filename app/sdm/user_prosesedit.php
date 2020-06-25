<?php 
include '../koneksi.php';
$id_admin 	= $_GET['id_admin'];
$unit		= $_POST['unit'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
mysqli_query($koneksi,"update admin set username='$username', password='$password', unit='$unit' where id_admin='$id_admin'");
header("location:user_tampil.php");
?>