<?php 
include '../../../config/connect.php';
$id_hpl_register = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM hpl_register WHERE id_hpl_register='$id_hpl_register'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard.php'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dashboard.php'</script>";
}
?>