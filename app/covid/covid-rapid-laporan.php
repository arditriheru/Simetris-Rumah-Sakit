<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <!-- <h1>Data Tampil <small><?php //echo format_min($min).' - '.format_mak($mak);?></small></h1> -->
      <h1>Dashboard <small><?php include "../../system/date-time.php";?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <?php if(!isset($_POST['submitlapperiode'])){ ?>
      <div class="col-lg-6">
        <form method="post" action="" role="form">
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input class="form-control" type="date" name="awal" required="">
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input class="form-control" type="date" name="akhir" required="">
          </div>
          <button type="submit" name="submitlapperiode" class="btn btn-success">Tampilkan</button>
        </form>
      </div>
    <?php } ?>
    <?php
    if(isset($_POST['submitlapperiode'])){
      $awal       = $_POST['awal'];
      $akhir      = $_POST['akhir'];
      ?>
      <div class="col-lg-6">
        <form method="post" action="" role="form">
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input class="form-control" type="date" name="awal" value="<?php echo $awal; ?>" required="">
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input class="form-control" type="date" name="akhir" value="<?php echo $akhir; ?>" required="">
          </div>
          <button type="submit" name="submitlapperiode" class="btn btn-success">Tampilkan</button>
        </form>
        <form method="post" action="covid-rapid-export" role="form">
          <div class="form-group">
            <input class="form-control" type="hidden" name="awal" value="<?php echo $awal?>">
          </div>
          <div class="form-group">
            <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir?>">
          </div>
          <button type="submit" class="btn btn-primary"><i class='fa fa-download'></i> Excel</button>
        </form>
      </div>
    </div><br>
    <div class="table-responsive">
      <?php
      $data = mysqli_query($koneksi,
        "SELECT COUNT(id_kuesioner) AS total
        FROM kuesioner
        WHERE tanggal='$tanggalsekarang';");
      while($d = mysqli_fetch_array($data)){
        $total = $d['total'];
      }
      ?>
      <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Tanggal</div></th>
            <th><div align="center">No.RM</div></th>
            <th><div align="center">Nama Pasien</div></th>
            <th><div align="center">Unit</div></th>
            <th><div align="center">IgM</div></th>
            <th><div align="center">IgG</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../../config/connect.php';
          $no=1;
          $data = mysqli_query($koneksi,"
            SELECT *, rapidtest.tanggal AS tgl, mr_pasien.nama, mr_unit.nama_unit,
            IF (rapidtest.igm='1', 'Reaktif', 'Non Reaktif') AS igm,
            IF (rapidtest.igg='1', 'Reaktif', 'Non Reaktif') AS igg
            FROM rapidtest, mr_pasien, mr_unit
            WHERE rapidtest.id_catatan_medik = mr_pasien.id_catatan_medik
            AND rapidtest.id_unit = mr_unit.id_unit
            AND rapidtest.tanggal BETWEEN '$awal' AND '$akhir'
            ORDER BY rapidtest.tanggal ASC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><div align="center"><?php echo $no++; ?></div></td>
              <td><div align="center"><?php echo $d['tgl']; ?></div></td>
              <td><div align="center"><?php echo $d['id_catatan_medik']; ?></div></td>
              <td><div align="center"><?php echo $d['nama']; ?></div></td>
              <td><div align="center"><?php echo $d['nama_unit']; ?></div></td>
              <td><div align="center"><?php echo $d['igm']; ?></div></td>
              <td><div align="center"><?php echo $d['igg']; ?></div></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- /.row --><br><br>
<?php } ?>
</div><!-- /#page-wrapper -->
<?php include "views/footer.php"; ?>