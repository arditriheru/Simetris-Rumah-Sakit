<?php
include '../../config/connect.php';
$lama = 7;
$query = "DELETE FROM anc
WHERE DATEDIFF(CURDATE(), jadwal) > $lama";
$hasil = mysqli_query($koneksi,$query);
?>