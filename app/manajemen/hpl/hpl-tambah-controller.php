<?php
include '../../../config/connect.php';
$id_catatan_medik = $_GET['id_catatan_medik'];
$query = mysqli_query($koneksi, "SELECT nama, tgl_lahir FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik'");
$pasien = mysqli_fetch_array($query);
$data = array(
	'nama' 		 =>  $pasien['nama'],
	'tgl_lahir'  =>  $pasien['tgl_lahir']);
echo json_encode($data);
?>