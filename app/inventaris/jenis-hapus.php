<?php 
include '../../config/connect.php';
$kode_jenis = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM inventaris_jenis WHERE kode_jenis='$kode_jenis'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='jenis-tambah'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='jenis-tambah'</script>";
}
?>