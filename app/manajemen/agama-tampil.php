<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Demografi Agama</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Agama</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        ?>
        <form method="post" action="agama-export.php" role="form">
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
              <th><div align="center">ID</div></th>
              <th><div align="center">Nama Pendidikan</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = mysqli_query($koneksi,"
              SELECT mr_agama.nama_agama, COUNT(*) hasil
              FROM mr_pasien, mr_agama
              WHERE mr_pasien.id_agama = mr_agama.id_agama
              AND tanggal BETWEEN '2020-01-01' AND '2020-06-31'
              GROUP BY mr_agama.id_agama
              ORDER BY hasil DESC;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><div align="center"><?php echo $d['nama_agama']; ?></div></td>
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