<?php
include '../../config/connect.php';
$lama = 7;
$query = "DELETE FROM booking
          WHERE DATEDIFF(CURDATE(), booking_tanggal) > $lama";
$hasil = mysqli_query($koneksi,$query);
?>