<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pembelian-obat-rajal-".date('d/m/Y').".xls");
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
     <h2 align="center">Pembelian Obat Rawat Inap</h2>
     <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
     <tr>
      <th><div align="center">#</div></th>
      <th><div align="center">Tanggal Faktur</div></th>
      <th><div align="center">Suplier</div></th>
      <th><div align="center">Faktur</div></th>
      <th><div align="center">Tanggal Tempo</div></th>
      <th><div align="center">Nama</div></th>
      <th><div align="center">Harga Beli</div></th>
      <th><div align="center">HPP</div></th>
      <th><div align="center">QTY</div></th>
      <th><div align="center">Diskon</div></th>
      <th><div align="center">PPN</div></th>
      <th><div align="center">Sub Total</div></th>
      <th><div align="center">Grand Total</div></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data = mysqli_query($koneksi,"
      SELECT far_lap_pembelian_obat.tanggal_faktur, far_lap_pembelian_obat.nama_suplier, far_lap_pembelian_obat.faktur, far_lap_pembelian_obat.tanggal_tempo, far_lap_pembelian_obat.nama, far_lap_pembelian_obat.harga_beli, far_lap_pembelian_obat.hpp, far_lap_pembelian_obat.qty, far_lap_pembelian_obat.disc, far_lap_pembelian_obat.ppn, far_lap_pembelian_obat.sub_total, far_lap_pembelian_obat.grand_total, far_nosp_inap.iol
      FROM far_lap_pembelian_obat, far_nosp_inap
      WHERE far_lap_pembelian_obat.faktur = far_nosp_inap.faktur
      AND far_nosp_inap.iol=2
      AND far_lap_pembelian_obat.tanggal_faktur BETWEEN '$awal' AND '$akhir';");
    while($d = mysqli_fetch_array($data)){
      $tanggal_faktur  = $d['tanggal_faktur'];
      $tanggal_tempo   = $d['tanggal_tempo'];
      ?>
      <tr>
        <td><div align="center"><?php echo $no++; ?></div></td>
        <td><div align="center"><?php echo $d['tanggal_faktur']; ?></div></td>
        <td><div align="center"><?php echo $d['nama_suplier']; ?></div></td>
        <td><div align="center"><?php echo $d['faktur']; ?></div></td>
        <td><div align="center"><?php echo $d['tanggal_tempo']; ?></div></td>
        <td><div align="center"><?php echo $d['nama']; ?></div></td>
        <td><div align="center"><?php echo $d['harga_beli']; ?></div></td>
        <td><div align="center"><?php echo $d['hpp']; ?></div></td>
        <td><div align="center"><?php echo $d['qty']; ?></div></td>
        <td><div align="center"><?php echo $d['disc']; ?></div></td>
        <td><div align="center"><?php echo $d['ppn']; ?></div></td>
        <td><div align="center"><?php echo $d['sub_total']; ?></div></td>
        <td><div align="center"><?php echo $d['grand_total']; ?></div></td>
      </tr>
      <?php 
    }
    ?>
  </tbody>
</table>
</body>
</html>