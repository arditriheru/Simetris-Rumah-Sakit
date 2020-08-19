<?php
include '../../config/connect.php';
$id_catatan_medik = $_GET['id_catatan_medik'];
$query = mysqli_query($koneksi, "SELECT * FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik'");
$pasien = mysqli_fetch_array($query);
$data = array(
	'nama'      	=>  $pasien['nama'],
	'nama_ayah'    	=>  $pasien['nama_ortu'],
	'nama_ibu'    	=>  $pasien['nama_ortu'],);
echo json_encode($data);
?>