<!DOCTYPE html>
<html lang="en">
<body>
  <?php 
  include '../config/connect.php';
  $id_buku = $_GET['id_buku'];
  $data = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id_buku';");
  while($d = mysqli_fetch_array($data)){
    $dokumen = $d['dokumen'];
  }
  ?>
  <embed width="100%" height="1000" src="../applications/ebook/upload/<?php echo $dokumen; ?>"
  </body>
  </html>