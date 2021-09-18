<?php
include '../../config/connect.php';
// booking auto delete
$lama1 = 30;
$query1 = "DELETE FROM booking
WHERE DATEDIFF(CURDATE(), booking_tanggal) > $lama1";
$hasil1 = mysqli_query($koneksi,$query1);

// auto delete jadwal libur
$lama2 = 1;
$query2 = "DELETE FROM dokter_jadwal_libur
WHERE DATEDIFF(CURDATE(), tanggal) > $lama2";
$hasil2 = mysqli_query($koneksi,$query2);
?>