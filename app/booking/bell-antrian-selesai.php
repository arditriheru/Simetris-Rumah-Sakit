<?php 
include '../../config/connect.php';
$id_dokter 	= $_GET['dokter'];
$id_sesi 	= $_GET['sesi'];
$hapus=mysqli_query($koneksi,"DELETE FROM antrian WHERE id_dokter='$id_dokter' AND id_sesi='$id_sesi'");
if($hapus){
	echo "<script>document.location='dashboard.php'</script>";
}else{
	echo "<script>alert('Gagal Keluar!!!');document.location='booking-cek.php'</script>";
}
?>