<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Stok <small>Jenis Obat</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Stok Obat</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="obat-jenis-export" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <input class="form-control" type="hidden" name="generik" value="<?php echo $generik?>">
          </div>
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
            <th><div align="center">No</div></th>
            <th><div align="center">Kode</div></th>
            <th><div align="center">Jenis Obat</div></th>
            <th><div align="center">Nama Satuan</div></th>
            <th><div align="center">Jumlah</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $generik = $_POST['generik'];
          $awal = $_POST['awal'];
          $akhir = $_POST['akhir'];
          $no=1;
          $data = mysqli_query($koneksi,"
            SELECT far_generik.nama_generik, far_stok.satuan, far_satuan.nama,
            SUM(isi) AS hasil
            FROM far_generik, far_stok, far_satuan
            WHERE far_satuan.id_satuan=far_stok.satuan
            AND far_generik.id_far_generik=far_stok.generik
            AND tanggal BETWEEN '$awal' AND '$akhir'
            AND generik = '$generik'
            GROUP BY far_satuan.id_satuan
            ORDER BY hasil DESC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><div align="center"><?php echo $no++; ?></div></td>
              <td><div align="center"><?php echo $d['satuan']; ?></div></td>
              <td><div align="center"><?php echo $d['nama_generik']; ?></div></td>
              <td><div align="center"><?php echo $d['nama']; ?></div></td>
              <td><div align="center"><?php echo $d['hasil']; ?></div></td>
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