<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=manual-export ".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
	<table border="1" class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <h2 align="center">Rekap Data</h2>
      <h2 align="center">Kontak Pasien</h2>
      <h3 align="center">Periode : </h3>
      <tr>
        <th><div align="center">No</div></th>
        <th><div align="center">Poli</div></th>
        <th><div align="center">Tanggal</div></th>
        <th><div align="center">No.RM</div></th>
        <th><div align="center">Nama Pasien</div></th>
        <th><div align="center">Kontak</div></th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../../config/connect.php';
      $no=1;
      $data = mysqli_query($koneksi,"
        SELECT *, mr_rla.tanggal AS tgl, mr_rla.poli_inap AS nm_poli, mr_pasien.nama
        FROM mr_rla, mr_pasien
        WHERE mr_rla.id_catatan_medik = mr_pasien.id_catatan_medik
        AND mr_rla.tanggal BETWEEN '2020-03-01' AND '2020-08-31'
        AND mr_rla.poli_inap = '1'
        GROUP BY mr_rla.id_catatan_medik
        ORDER BY mr_rla.tanggal ASC;");
      while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><div align="center"><?php echo $no++; ?></div></td>
          <td><div align="center"><?php echo $d['nm_poli']; ?></div></td>
          <td><div align="center"><?php echo $d['tgl']; ?></div></td>
          <td><div align="center"><?php echo $d['id_catatan_medik']; ?></div></td>
          <td><div align="center"><?php echo $d['nama']; ?></div></td>
          <td><div align="center"><?php echo $d['telp']; ?></div></td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>
</body>
</html>