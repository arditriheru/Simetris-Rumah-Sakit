<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Demografi Pendidikan</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Pendidikan</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="pendidikan-export" role="form">
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
          $awal = $_POST['awal'];
          $akhir = $_POST['akhir'];
          $data = mysqli_query($koneksi,"
            SELECT mr_pendidikan.nama , COUNT(*) 'hasil'
            FROM mr_pasien, mr_pendidikan
            WHERE mr_pasien.id_pendidikan = mr_pendidikan.id_pendidikan
            AND tanggal BETWEEN '$awal' AND '$akhir'
            GROUP BY mr_pendidikan.id_pendidikan
            ORDER BY hasil DESC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
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