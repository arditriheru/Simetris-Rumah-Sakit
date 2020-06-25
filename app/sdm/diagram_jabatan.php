<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
  </head>
  <body>
<?php include '../koneksi.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart3"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Direktur", "KA Bagian", "KA Instalasi", "KA Ruang", "Manajemen", "Staf"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_s3 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='1'");
          echo mysqli_num_rows($jumlah_s3);
          ?>, 
          <?php 
          $jumlah_s2 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='2'");
          echo mysqli_num_rows($jumlah_s2);
          ?>,
          <?php 
          $jumlah_s1 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='3'");
          echo mysqli_num_rows($jumlah_s1);
          ?>,
          <?php 
          $jumlah_d4 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='4'");
          echo mysqli_num_rows($jumlah_d4);
          ?>,
          <?php 
          $jumlah_d3 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='5'");
          echo mysqli_num_rows($jumlah_d3);
          ?>, 
          <?php 
          $jumlah_d2 = mysqli_query($koneksi,"select * from psdi_petugas where id_jabatan='6'");
          echo mysqli_num_rows($jumlah_d2);
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
