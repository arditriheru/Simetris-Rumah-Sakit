<?php 
include '../koneksi.php';
$id_admin = $_GET['id_admin'];
mysqli_query($koneksi,"delete from admin where id_admin='$id_admin'");
header("location:user_tampil");
?>