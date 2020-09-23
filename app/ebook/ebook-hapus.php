<?php 
include '../../config/connect.php';
$id_buku = $_GET['id_buku'];
$hapus = mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku='$id_buku';");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='ebook-tampil.php'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='ebook-tampil.php'</script>";
}
?>