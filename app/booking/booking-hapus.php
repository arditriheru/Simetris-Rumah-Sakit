<?php 
include '../../config/connect.php';
$id_booking = $_GET['id_booking'];
$hapus=mysqli_query($koneksi,"delete from booking where id_booking='$id_booking'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='booking-cek'</script>";
}
?>