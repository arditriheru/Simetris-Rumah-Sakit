<?php 
include '../../config/connect.php';
$id_booking = $_GET['id_booking'];
mysqli_query($koneksi,"update booking set status = '2' where id_booking='$id_booking'");
header("location:booking-detail?id_booking=$id_booking");
?>