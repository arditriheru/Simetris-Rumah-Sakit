<?php 
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$tanggal=date('Y-m-d');
$pilihan = $_GET['id'];
// update data ke database
mysqli_query($koneksi,"INSERT INTO kuesioner (id_kuesioner, pilihan, tanggal)VALUES('','$pilihan','$tanggal')");
// mengalihkan halaman kembali ke index.php
header("location:index");
?>