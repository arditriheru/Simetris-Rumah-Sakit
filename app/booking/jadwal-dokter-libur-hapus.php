<?php
include '../../config/connect.php';
$id_jadwal_libur = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM dokter_jadwal_libur WHERE id_jadwal_libur='$id_jadwal_libur'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='jadwal-dokter'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='jadwal-dokter'</script>";
}
?>