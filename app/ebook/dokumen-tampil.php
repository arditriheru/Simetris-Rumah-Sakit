<?php 
include '../../config/connect.php';
$id_buku = $_GET['id_buku'];
$data = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id_buku';");
while($d = mysqli_fetch_array($data)){
  $dokumen = $d['dokumen'];
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <embed width="100%" height="1000" src="../../../ebook-file-upload/<?php echo $dokumen ?>"
  </body>
  </html>