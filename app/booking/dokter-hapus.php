<?php 
include '../../config/connect.php';
$id_dokter = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM dokter WHERE id_dokter='$id_dokter'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dokter-tambah'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dokter-tambah'</script>";
}
?>