<?php 
include '../koneksi.php';
$no = $_GET['no'];
mysqli_query($koneksi,"delete from surat_masuk where no='$no'");
header("location:suratmasuk_tampil.php");
?>