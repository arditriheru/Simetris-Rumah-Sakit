<?php 
  include 'koneksi.php';
  $nip = $_GET['nip'];
  $data = mysqli_query($koneksi,"delete from pegawai where nip='$nip';");
// mengalihkan halaman kembali ke index.php
header("location:pegawai_tampil.php");
?>