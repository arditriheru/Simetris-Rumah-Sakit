<?php 
include '../../config/connect.php';
$id_tumbang = $_GET['id_tumbang'];
mysqli_query($koneksi,"UPDATE tumbang SET status = '0' WHERE id_tumbang='$id_tumbang'");
header("location:tumbang-detail?id_tumbang=$id_tumbang");
?>