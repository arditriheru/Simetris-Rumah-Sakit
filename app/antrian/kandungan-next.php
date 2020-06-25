<?php
include "controller/kandungan-controller.php";
if($id_ant_kandungan>$max){
	echo "<script>alert('Antrian Terakhir!!');document.location='kandungan-dashboard'</script>";
}else{
	mysqli_query($koneksi,"
		UPDATE ant_kandungan SET status='2'
		WHERE status='1'");
	mysqli_query($koneksi,"
		UPDATE ant_kandungan SET status='1'
		WHERE id_ant_kandungan=$id_ant_kandungan");
	header("location:kandungan-dashboard");
}
?>