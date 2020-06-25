<?php 
include 'koneksi.php';
$nomor_surat = $_POST['nomor_surat'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$tujuan = $_POST['tujuan'];
mysqli_query($koneksi,"insert into surat_internal values('','$nomor_surat','$tanggal','$perihal','$tujuan')");
header("location:surat_tambah");
?>