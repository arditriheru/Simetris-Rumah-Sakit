<?php 
  include '../../config/connect.php';
  $id_buku = $_GET['id_buku'];
  $data = mysqli_query($koneksi,"delete from buku where id_buku='$id_buku';");
header("location:ebook-tampil");
?>