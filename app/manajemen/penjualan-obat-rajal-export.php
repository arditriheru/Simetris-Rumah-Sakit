<?php
error_reporting(0);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=penjualan-obat-rajal-".date('d/m/Y').".xls");
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
     <h2 align="center">Penjualan Obat Rawat Jalan</h2>
     <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
     <tr>
      <th><div align="center">#</div></th>
      <th><div align="center">Kel</div></th>
      <th><div align="center">Satuan</div></th>
      <th><div align="center">Nama Obat</div></th>
      <th><div align="center">QTY</div></th>
      <th><div align="center">Harga Jual</div></th>
      <th><div align="center">Total</div></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data = mysqli_query($koneksi,"
      SELECT SUM(far_stok_elk.keluar) AS qty, far_stok.nama, far_kel.nama AS nama_kel, far_stok_elk.keluar, far_satuan.nama AS nama_satuan, far_stok.harga_jual
      FROM far_stok, far_stok_elk, far_kel, far_satuan, far_trn
      WHERE far_stok.no_urut = far_stok_elk.id_barang
      AND far_stok.kel = far_kel.id_far_kel
      AND far_stok.satuan = far_satuan.id_satuan
      AND far_trn.id_far_trn = far_stok_elk.id_trn
      AND far_stok_elk.tanggal BETWEEN '$awal' AND '$akhir'
      AND far_stok_elk.stok = 1
      GROUP BY far_stok_elk.id_barang
      ORDER BY far_stok.nama ASC;");
    while($d = mysqli_fetch_array($data)){
      $nama_kel     = $d['nama_kel'];
      $nama         = $d['nama'];
      $qty          = $d['qty'];
      $harga_jual   = $d['harga_jual'];
      $nama_satuan  = $d['nama_satuan'];
      $total        = $harga_jual * $qty;
      $grand        += $total;
      ?>
      <tr>
        <td><div align="center"><?php echo $no++; ?></div></td>
        <td><div align="center"><?php echo $nama_kel; ?></div></td>
        <td><div align="center"><?php echo $nama_satuan; ?></div></td>
        <td><div align="center"><?php echo $nama; ?></div></td>
        <td><div align="center"><?php echo number_format($qty); ?></div></td>
        <td><div align="center"><?php echo number_format($harga_jual); ?></div></td>
        <td><div align="center"><?php echo number_format($total); ?></div></td>
        </tr><?php } ?>
        <tr>
          <td colspan="6"><b><center>TOTAL</center></b></td>
          <td><b><center><?php echo number_format($grand); ?></center></b></td>
        </tr>
      </tbody>
    </table>
  </body>
  </html>