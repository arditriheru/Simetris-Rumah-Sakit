<?php 
include '../../config/connect.php';
$id_anc = $_GET['id_anc'];
mysqli_query($koneksi,"UPDATE anc SET status = '1' WHERE id_anc='$id_anc'");
header("location:dashboard");
?>