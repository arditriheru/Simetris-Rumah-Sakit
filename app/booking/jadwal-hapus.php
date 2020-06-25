<?php
include '../../config/connect.php';
$id_jadwal = $_GET['id_jadwal'];
$hapus=mysqli_query($koneksi,"DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='jadwal-dokter'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='jadwal-edit?id_jadwal=$id_jadwal'</script>";
}
?>