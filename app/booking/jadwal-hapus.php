<?php
include '../../config/connect.php';
$id_jadwal = $_GET['id_jadwal'];
$data = mysqli_query($koneksi,
	"SELECT id_dokter
	FROM dokter_jadwal
	WHERE id_jadwal = '$id_jadwal';");
while($d = mysqli_fetch_array($data)){
	$id_dokter = $d['id_dokter'];
}
$hapus=mysqli_query($koneksi,"DELETE FROM dokter_jadwal WHERE id_jadwal='$id_jadwal'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='jadwal-dokter?id_dokter=$id_dokter'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='jadwal-dokter?id_dokter=$id_dokter'</script>";
}
?>