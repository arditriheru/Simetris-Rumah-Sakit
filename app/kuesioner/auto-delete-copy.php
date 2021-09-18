<?php
include '../../config/connect.php';
$lama = 60;
$query = "DELETE FROM kuesioner
WHERE DATEDIFF(CURDATE(), tanggal) > $lama";
$hasil = mysqli_query($koneksi,$query);
?>