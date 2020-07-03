<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Demografi Agama ".date('d/m/Y').".xls");
?>
<?php
include '../../config/connect.php';
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
?>
<!DOCTYPE html>
<html>
<body>
	<table border="1" class="table table-bordered table-hover table-striped tablesorter">
    <thead>
     <h2 align="center">Rekap Data</h2>
     <h2 align="center">Demografi Agama</h2>
     <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
     <tr>
      <th><div align="center">ID</div></th>
      <th><div align="center">Nama Pendidikan</div></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $data = mysqli_query($koneksi,"
      SELECT mr_agama.nama_agama, COUNT(*) 'hasil'
      FROM mr_pasien, mr_agama
      WHERE mr_pasien.id_agama = mr_agama.id_agama
      AND tanggal BETWEEN '$awal' AND '$akhir'
      GROUP BY mr_agama.id_agama
      ORDER BY hasil DESC;");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><div align="center"><?php echo $d['nama_agama']; ?></div></td>
        <td><div align="center"><?php echo $d['hasil']; ?></div></td>
      </tr>
      <?php 
    }
    ?>
  </tbody>
</table>
</body>
</html>