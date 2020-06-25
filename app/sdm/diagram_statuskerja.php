<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
  </head>
  <body>
<?php include '../koneksi.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart1"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Full Time", "Part Time"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $tetap = mysqli_query($koneksi,"select * from psdi_petugas where status='2'");
          echo mysqli_num_rows($tetap);
          ?>, 
          <?php 
          $kontrak = mysqli_query($koneksi,"select * from psdi_petugas where status='1'");
          echo mysqli_num_rows($kontrak);
          ?>
          ],
          backgroundColor: [
          '#4baea0',
          '#1089ff'
          ],
          borderColor: [
          '#4baea0',
          '#1089ff'
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
  </body>
</html>
