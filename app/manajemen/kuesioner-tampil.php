<?php 
include '../../config/connect.php';
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

function format1($awal)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $awal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
function format2($akhir)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $akhir);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
<?php include "views/header.php"?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Kuesioner</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bolt"></i> Kuesioner</li>
      </ol>  
      <?php include "../notifikasi1.php"?>
      <div class="col-lg-8">
        <div align="center">
          <h3>Periode :<br><h4><?php echo format1($awal)?> - 
            <?php echo format2($akhir)?></h4></h3>
          </div><br>
          <div style="width: 100%;margin: 0px auto;">
            <canvas id="myChart1"></canvas>
          </div>
          <script>
            var ctx = document.getElementById("myChart1").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: ["Sangat Puas","Puas","Cukup Puas","Tidak Puas" ],
                datasets: [{
                  label: '',
                  data: [
                  <?php 
                  $a = mysqli_query($koneksi,"SELECT * FROM kuesioner
                    WHERE pilihan='1'
                    AND tanggal BETWEEN '$awal' AND '$akhir'");
                  echo mysqli_num_rows($a);
                  ?>,
                  <?php 
                  $b = mysqli_query($koneksi,"SELECT * FROM kuesioner
                    WHERE pilihan='2'
                    AND tanggal BETWEEN '$awal' AND '$akhir'");
                  echo mysqli_num_rows($b);
                  ?>,
                  <?php 
                  $c = mysqli_query($koneksi,"SELECT * FROM kuesioner
                    WHERE pilihan='3'
                    AND tanggal BETWEEN '$awal' AND '$akhir'");
                  echo mysqli_num_rows($c);
                  ?>,
                  <?php 
                  $d = mysqli_query($koneksi,"SELECT * FROM kuesioner
                    WHERE pilihan='4'
                    AND tanggal BETWEEN '$awal' AND '$akhir'");
                  echo mysqli_num_rows($d);
                  ?>                      
                  ],
                  backgroundColor: [
                  '#1089ff',
                  '#4baea0',
                  '#ec9b3b',
                  '#e8647c'
                  ],
                  borderColor: [
                  '#1089ff',
                  '#4baea0',
                  '#ec9b3b',
                  '#e8647c'
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
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"?>
