<?php 
include '../koneksi.php';
$nomor_surat = $_POST['nomor_surat'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$tujuan = $_POST['tujuan'];
$asal = $_POST['asal'];
mysqli_query($koneksi,"insert into surat_masuk values('','$nomor_surat','$tanggal','$perihal','$tujuan',
	'$asal')");
header("location:suratmasuk_tambah.php");
?>