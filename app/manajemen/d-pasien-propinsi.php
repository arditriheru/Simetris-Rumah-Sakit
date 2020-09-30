<?php include 'views/header.php';?>
<?php
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
$data = mysqli_query($koneksi,"
 SELECT COUNT(*) AS a
 FROM mr_pasien
 WHERE mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
while($d = mysqli_fetch_array($data)){
  ?>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>Rekap <small>Demografi Propinsi | Total 
          <?php echo $d['a']; }?> Pasien</small></h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i> Propinsi</li>
          </ol>  
          <?php include "../../system/welcome.php"?>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
          	<form method="post" action="propinsi-export.php" role="form">
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
                  <th><center>Kode</center></th>
                  <th><center>Nama Provinsi</center></th>
                  <th><center>Jumlah</center></th>
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
                    <td><center><?php echo $d['id_propinsi']; ?></center></td>
                    <td><center><?php echo $d['nama_propinsi']; ?></center></td>
                    <td><center><?php echo $d['hasil']; ?></center></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    <!--<div class="col-lg-6">
  <div class="col-lg-12">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart1"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Yogyakarta", "Jawa Tengah"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_laki = mysqli_query($koneksi,"select * from mr_pasien where id_propinsi=34");
          echo mysqli_num_rows($jumlah_laki);
          ?>, 
          <?php 
          $jumlah_perempuan = mysqli_query($koneksi,"select * from mr_pasien where id_propinsi=33");
          echo mysqli_num_rows($jumlah_perempuan);
          ?>
          ],
          backgroundColor: [
          '#ec9b3b',
          '#505bda'
          ],
          borderColor: [
          '#ec9b3b',
          '#505bda'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
</div>-->
<?php include 'views/footer.php';?>
