<?php
include "controller/anak-controller.php";
if($id_ant_anak>$max){
	echo "<script>alert('Antrian Terakhir!!');document.location='anak-dashboard'</script>";
}else{
	mysqli_query($koneksi,"
		UPDATE ant_anak SET status='2'
		WHERE status='1'");
	mysqli_query($koneksi,"
		UPDATE ant_anak SET status='1'
		WHERE id_ant_anak=$id_ant_anak");
	header("location:anak-dashboard");
}
?>