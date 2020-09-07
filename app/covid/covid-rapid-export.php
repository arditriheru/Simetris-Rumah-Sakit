<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pasien-rapidtest ".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
  <?php
  include '../../config/connect.php';
  $awal   = $_POST['awal'];
  $akhir  = $_POST['akhir'];
  ?>
  <table border="1" class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <h2 align="center">Rekap Data</h2>
      <h2 align="center">Pasien Rapid Test</h2>
      <h3 align="center">Periode : <?php echo $awal." - ".$akhir;?> </h3>
      <tr>
        <th><div align="center">No</div></th>
        <th><div align="center">Tanggal</div></th>
        <th><div align="center">No.RM</div></th>
        <th><div align="center">Nama Pasien</div></th>
        <th><div align="center">IgM</div></th>
        <th><div align="center">IgG</div></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $data = mysqli_query($koneksi,"
        SELECT *, rapidtest.tanggal AS tgl, mr_pasien.nama,
        IF (rapidtest.igm='1', 'Reaktif', 'Non Reaktif') AS igm,
        IF (rapidtest.igg='1', 'Reaktif', 'Non Reaktif') AS igg
        FROM rapidtest, mr_pasien
        WHERE rapidtest.id_catatan_medik = mr_pasien.id_catatan_medik
        AND rapidtest.tanggal BETWEEN '$awal' AND '$akhir'
        ORDER BY rapidtest.tanggal ASC;");
      while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><div align="center"><?php echo $no++; ?></div></td>
          <td><div align="center"><?php echo $d['tgl']; ?></div></td>
          <td><div align="center"><?php echo $d['id_catatan_medik']; ?></div></td>
          <td><div align="center"><?php echo $d['nama']; ?></div></td>
          <td><div align="center"><?php echo $d['igm']; ?></div></td>
          <td><div align="center"><?php echo $d['igg']; ?></div></td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>
</body>
</html>