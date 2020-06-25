<?php 
include '../koneksi.php';
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$unit 		= $_POST['unit'];
mysqli_query($koneksi,"insert into admin values('','$username','$password','$unit')");
header("location:user_tampil.php");
?>