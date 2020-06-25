<?php 
include '../koneksi.php';
$no = $_GET['no'];
mysqli_query($koneksi,"delete from surat_internal where no='$no'");
header("location:suratkeluar_tampil.php");
?>