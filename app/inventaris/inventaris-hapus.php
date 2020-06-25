<?php 
include '../../config/connect.php';
$kode_registrasi = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM inventaris WHERE kode_registrasi='$kode_registrasi'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dashboard'</script>";
}
?>