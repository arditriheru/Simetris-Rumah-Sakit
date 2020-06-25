<?php 
	include 'koneksi.php';
	$data = mysqli_query($koneksi,"SELECT COUNT(profesi) AS jumlah FROM pegawai where profesi='IT'");
	echo $data;
?>