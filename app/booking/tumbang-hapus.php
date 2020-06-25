<?php 
include '../../config/connect.php';
$id_tumbang = $_GET['id_tumbang'];
$hapus=mysqli_query($koneksi,"DELETE FROM tumbang WHERE id_tumbang='$id_tumbang'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='tumbang-detail?id_tumbang=$id_tumbang'</script>";
}
?>