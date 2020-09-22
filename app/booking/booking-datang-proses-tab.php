<?php 
include '../../config/connect.php';
$id_booking	= $_POST['id_booking'];
$id_dokter	= $_POST['id_dokter'];
mysqli_query($koneksi,"update booking set status = '1' where id_booking='$id_booking'");
header("location:booking-tab.php?id_dokter=$id_dokter");
?>