<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
  </head>
  <body>
<?php include '../koneksi.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart4"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["S3", "S2", "S1", "D4", "D3", "D2", "D1", "SLTA", "SLTP"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_s3 = mysqli_query($koneksi,"select * from pegawai where pendidikan='S3'");
          echo mysqli_num_rows($jumlah_s3);
          ?>, 
          <?php 
          $jumlah_s2 = mysqli_query($koneksi,"select * from pegawai where pendidikan='S2'");
          echo mysqli_num_rows($jumlah_s2);
          ?>,
          <?php 
          $jumlah_s1 = mysqli_query($koneksi,"select * from pegawai where pendidikan='S1'");
          echo mysqli_num_rows($jumlah_s1);
          ?>,
          <?php 
          $jumlah_d4 = mysqli_query($koneksi,"select * from pegawai where pendidikan='D4'");
          echo mysqli_num_rows($jumlah_d4);
          ?>,
          <?php 
          $jumlah_d3 = mysqli_query($koneksi,"select * from pegawai where pendidikan='D3'");
          echo mysqli_num_rows($jumlah_d3);
          ?>, 
          <?php 
          $jumlah_d2 = mysqli_query($koneksi,"select * from pegawai where pendidikan='D2'");
          echo mysqli_num_rows($jumlah_d2);
          ?>,
          <?php 
          $jumlah_d1 = mysqli_query($koneksi,"select * from pegawai where pendidikan='D1'");
          echo mysqli_num_rows($jumlah_d1);
          ?>,
          <?php 
          $jumlah_slta = mysqli_query($koneksi,"select * from pegawai where pendidikan='SLTA'");
          echo mysqli_num_rows($jumlah_slta);
          ?>,
          <?php 
          $jumlah_sltp = mysqli_query($koneksi,"select * from pegawai where pendidikan='SLTP'");
          echo mysqli_num_rows($jumlah_sltp);
          ?>
          ],
          backgroundColor: [
          '#4baea0',
          '#e5d429',
          '#64b2cd',
          '#ec9b3b',
          '#e8647c',
          '#ce2e6c',
          '#505bda',
          '#ffaac3',
          '#1089ff'
          ],
          borderColor: [
          '#4baea0',
          '#e5d429',
          '#64b2cd',
          '#ec9b3b',
          '#e8647c',
          '#ce2e6c',
          '#505bda',
          '#ffaac3',
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
