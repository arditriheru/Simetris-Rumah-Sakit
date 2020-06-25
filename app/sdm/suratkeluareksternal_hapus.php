<?php 
include '../koneksi.php';
$no = $_GET['no'];
mysqli_query($koneksi,"delete from surat_eksternal where no='$no'");
header("location:suratkeluar_tampil.php");
?>