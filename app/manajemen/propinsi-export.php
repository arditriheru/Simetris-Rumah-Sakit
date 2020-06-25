<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Demografi Propinsi ".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
  <?php 
  include '../../config/connect.php';
  $awal = $_POST['awal'];
  $akhir = $_POST['akhir'];
  ?>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
     <h2 align="center">Rekap Data</h2>
     <h2 align="center">Demografi Propinsi</h2>
     <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
     <tr>
      <th><center>Kode</th>
        <th><center>Nama Provinsi</th>
          <th><center>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <!---------- Batas ----------->
          <?php 
          $no = 1;
          $data = mysqli_query($koneksi,"
            SELECT mr_pasien.id_propinsi, mr_propinsi_bps.nama_propinsi,
            COUNT(*) AS 'hasil'
            FROM mr_pasien, mr_propinsi_bps
            WHERE mr_pasien.id_propinsi = mr_propinsi_bps.kode_propinsi
            AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir' 
            GROUP BY mr_pasien.id_propinsi
            ORDER BY hasil DESC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><center><?php echo $d['id_propinsi']; ?></td>
                <td><center><?php echo $d['nama_propinsi']; ?></td>
                  <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </body>
          </html>