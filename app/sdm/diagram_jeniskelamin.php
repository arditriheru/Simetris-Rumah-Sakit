<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
  </head>
  <body>
<?php include '../koneksi.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart2"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Laki-laki", "Perempuan"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_laki = mysqli_query($koneksi,"select * from psdi_petugas where sex='1'");
          echo mysqli_num_rows($jumlah_laki);
          ?>, 
          <?php 
          $jumlah_perempuan = mysqli_query($koneksi,"select * from psdi_petugas where sex='2'");
          echo mysqli_num_rows($jumlah_perempuan);
          ?>
          ],
          backgroundColor: [
          '#ec9b3b',
          '#e8647c'
          ],
          borderColor: [
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
  </body>
</html>
