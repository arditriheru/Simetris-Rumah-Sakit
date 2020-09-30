<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php
      $awal = $_POST['awal'];
      $akhir = $_POST['akhir'];
      ?>
      <h1>Pembelian Obat <small>Rawat Inap</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> <?php echo $awal." - ".$akhir;?></li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <form method="post" action="pembelian-obat-ranap-export.php" role="form">
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
              <th><div align="center">Tanggal Faktur</div></th>
              <th><div align="center">Suplier</div></th>
              <th><div align="center">Faktur</div></th>
              <th><div align="center">Tanggal Tempo</div></th>
              <th><div align="center">Nama</div></th>
              <th><div align="center">Harga Beli</div></th>
              <th><div align="center">HPP</div></th>
              <th><div align="center">QTY</div></th>
              <!-- <th><div align="center">Diskon</div></th>
                <th><div align="center">PPN</div></th> -->
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
                  <td><div align="center"><?php echo date("d-m-Y", strtotime($tanggal_faktur)); ?></div></td>
                  <td><div align="center"><?php echo $d['nama_suplier']; ?></div></td>
                  <td><div align="center"><?php echo $d['faktur']; ?></div></td>
                  <td><div align="center"><?php echo date("d-m-Y", strtotime($tanggal_tempo)); ?></div></td>
                  <td><div align="center"><?php echo $d['nama']; ?></div></td>
                  <td><div align="center"><?php echo number_format($d['harga_beli']); ?></div></td>
                  <td><div align="center"><?php echo number_format($d['hpp']); ?></div></td>
                  <td><div align="center"><?php echo $d['qty']; ?></div></td>
                  <td><div align="center"><?php echo number_format($d['sub_total']); ?></div></td>
                  <td><div align="center"><?php echo number_format($d['grand_total']); ?></div></td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.row -->
    <?php include 'views/footer.php';?>