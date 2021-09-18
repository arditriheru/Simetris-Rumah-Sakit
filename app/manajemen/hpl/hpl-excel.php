<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-prakiraan-hpl".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
  <?php
  include '../../../config/connect.php';
  $bln  = $_POST['bln'];
  $thn  = $_POST['thn'];
  ?>
  <table border="1" class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <h2 align="center">Rekap Data</h2>
      <h2 align="center">Prakiraan HPL Pasien</h2>
      <h3 align="center">Bulan <?php echo date('F', strtotime($thn.'-'.$bln))." ". $thn;?> </h3>
      <tr>
        <th><center>#</center></th>
        <th><center>No. RM</center></th>
        <th><center>Nama Pasien</center></th>
        <th><center>Kontak</center></th>
        <th><center>Dokter</center></th>
        <th><center>Prakiraan HPL</center></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $data = mysqli_query($koneksi,"
        SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, mr_pasien.nama, mr_pasien.telp, mr_pasien.alamat, dokter.nama_dokter
        FROM hpl_register
        INNER JOIN mr_pasien ON hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
        INNER JOIN dokter ON hpl_register.id_dokter=dokter.id_dokter
        WHERE MONTH(hpl_register.tgl_hpl)='$bln'
        AND YEAR(hpl_register.tgl_hpl)='$thn'
        ORDER BY hpl_register.tgl_hpl ASC;");
      while($d = mysqli_fetch_array($data)){
        $tgl_hpl = $d['tgl_hpl'];
        ?>
        <tr>
          <td><center><?php echo $no++; ?></center></td>
          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
          <td><center><?php echo $d['nama']; ?></center></td>
          <td><center><?php echo $d['telp']; ?></center></td>
          <td><center><?php echo $d['nama_dokter']; ?></center></td>
          <td><center><?php echo date('d F Y', strtotime($tgl_hpl)); ?></center>
            </tr><?php } ?>
          </tbody>
        </table>
      </body>
      </html>