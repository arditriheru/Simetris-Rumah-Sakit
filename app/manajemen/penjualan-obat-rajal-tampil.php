<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php
      $awal = $_POST['awal'];
      $akhir = $_POST['akhir'];
      ?>
      <h1>Penjualan Obat <small>Rawat Jalan</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> <?php echo $awal." - ".$akhir;?></li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <form method="post" action="penjualan-obat-rajal-export" role="form">
          <div class="col-lg-6">
            <div class="form-group">
              <input class="form-control" type="hidden" name="awal" value="<?php echo $awal?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir?>">
            </div>
            <button type="submit" class="btn btn-success">EXPORT</button><br><br>
          </div>
        </form>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
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
                <td><div align="center">Rp <?php echo number_format($harga_jual); ?></div></td>
                <td><div align="center">Rp <?php echo number_format($total, 0, ',', '.'); ?></div></td>
                </tr><?php } ?>
                <tr>
                  <td colspan="6"><b><center>TOTAL</center></b></td>
                  <td><b><center>Rp <?php echo number_format($grand, 0, ',', '.'); ?></center></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.row -->
      <?php include 'views/footer.php';?>