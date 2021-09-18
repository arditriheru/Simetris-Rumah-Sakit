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
        <form method="post" action="kuesioner-lap-periode-export" role="form">
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input class="form-control" type="text" name="awal" value="<?php echo $awal; ?>" readonly="">
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input class="form-control" type="text" name="akhir" value="<?php echo $akhir; ?>" readonly="">
          </div>
          <div class="form-group">
            <label>Respon Skor</label>
            <select class="form-control" type="text" name="skor" required="">
              <option value="">Pilih</option>
              <option value="0">Semua</option>
              <option value="1">Sangat Puas</option>
              <option value="2">Cukup Puas</option>
              <option value="3">Tidak Puas</option>
              <option value="4">Sangat Ingin</option>
              <option value="5">Cukup Ingin</option>
              <option value="6">Tidak Ingin</option>
            </select>
          </div>
          <input class="form-control" type="hidden" name="awal" value="<?php echo $awal;?>">
          <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir;?>">
          <button type="submit" name="submitlapperiode" class="btn btn-success">Excel</button>
        </form>
      </div>
    </div>
    <center>
      <h2>Diagram Pie Rekap Kepuasan Pasien<br>
        <small>Periode <?php echo $awal." - ".$akhir ?></small></h2>
      </center><br>
      <div class="col-lg-12">
        <h4><b>Keterangan : </b>
          <?php 
          $data = mysqli_query($koneksi,
            "SELECT COUNT(*) AS total,
            CASE
            WHEN kuesioner.skor='1' THEN 'Sangat Puas'
            WHEN kuesioner.skor='2' THEN 'Cukup Puas'
            WHEN kuesioner.skor='3' THEN 'Tidak Puas'
            WHEN kuesioner.skor='4' THEN 'Sangat Ingin'
            WHEN kuesioner.skor='5' THEN 'Cukup Ingin'
            WHEN kuesioner.skor='6' THEN 'Tidak Ingin'
            END AS nama_skor FROM kuesioner WHERE tanggal BETWEEN '$awal' AND '$akhir' GROUP BY skor;");
          while($d = mysqli_fetch_array($data)){
            echo $d['nama_skor']." = ".$d['total'].", ";
          }
          ?>
          <div class="row">
            <div style="width: 100%;margin: 0px auto;">
              <canvas id="myChart1"></canvas>
            </div>
            <script>
              var ctx = document.getElementById("myChart1").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                  labels: ["Sangat Puas", "Cukup Puas", "Tidak Puas", "Sangat Ingin", "Cukup Ingin", "Tidak Ingin"],
                  datasets: [{
                    label: '',
                    data: [
                    <?php 
                    $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='1' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($baru);
                    ?>,
                    <?php 
                    $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='2' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($baru);
                    ?>,
                    <?php 
                    $bekas = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='3' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($bekas);
                    ?>,
                    <?php 
                    $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='4' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($baru);
                    ?>,
                    <?php 
                    $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='5' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($baru);
                    ?>,
                    <?php 
                    $bekas = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='6' AND tanggal BETWEEN '$awal' AND '$akhir'");
                    echo mysqli_num_rows($bekas);
                    ?>
                    ],
                    backgroundColor: [
                    '#158467',
                    '#07689f',
                    '#ec0101',
                    '#d3de32',
                    '#00bcd4',
                    '#ff427f'
                    ],
                    borderColor: [
                    '#158467',
                    '#07689f',
                    '#ec0101',
                    '#d3de32',
                    '#00bcd4',
                    '#ff427f'
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
          </div><br><br>
      <!-- <div class="row">
        <div style="width: 100%;margin: 0px auto;">
          <canvas id="myChart2"></canvas>
        </div>
        <script>
          var ctx = document.getElementById("myChart2").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ["Sangat Ingin", "Cukup Ingin", "Tidak ingin"],
              datasets: [{
                label: '',
                data: [
                <?php 
                $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='4' AND tanggal BETWEEN '$awal' AND '$akhir'");
                echo mysqli_num_rows($baru);
                ?>,
                <?php 
                $baru = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='5' AND tanggal BETWEEN '$awal' AND '$akhir'");
                echo mysqli_num_rows($baru);
                ?>,
                <?php 
                $bekas = mysqli_query($koneksi,"SELECT * FROM kuesioner WHERE skor='6' AND tanggal BETWEEN '$awal' AND '$akhir'");
                echo mysqli_num_rows($bekas);
                ?>
                ],
                backgroundColor: [
                '#158467',
                '#07689f',
                '#ec0101'
                ],
                borderColor: [
                '#158467',
                '#07689f',
                '#ec0101'
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
      </div> -->
    <?php } ?>
  </div>
</div><!-- /#page-wrapper -->
<?php include "views/footer.php"; ?>