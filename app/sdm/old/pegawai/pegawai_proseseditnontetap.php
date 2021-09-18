<?php 
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form
$nip = $_GET['nip'];
// update data ke database
mysqli_query($koneksi,"update pegawai set status_kepegawaian = 'Kontrak' where nip='$nip'");
// mengalihkan halaman kembali ke index.php
//header("location:pegawai_detail.php?nip=$nip");
header("location:pegawai_detail.php?nip=$nip");
?>