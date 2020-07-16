<?php 
include '../../config/connect.php';
$id_anc = $_GET['id_anc'];
$hapus=mysqli_query($koneksi,"DELETE FROM anc WHERE id_anc='$id_anc'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='anc-detail?id_anc=$id_anc'</script>";
}
?>