<?php 
include '../../config/connect.php';
$id_suket = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM mr_suket WHERE id_suket='$id_suket'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard.php'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dashboard.php'</script>";
}
?>