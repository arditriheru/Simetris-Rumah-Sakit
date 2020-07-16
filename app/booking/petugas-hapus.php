<?php 
include '../../config/connect.php';
$id_petugas = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM mr_petugas WHERE id_petugas='$id_petugas'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dokter-tambah'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dokter-tambah'</script>";
}
?>