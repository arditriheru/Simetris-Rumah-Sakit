<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="../js/chartjs/Chart.js"></script>
</head>
<body>
  <?php include '../../config/connect.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart1"></canvas>
    </div>
    <script>
      var ctx = document.getElementById("myChart1").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Baik", "Rusak"],
          datasets: [{
            label: '',
            data: [
            <?php 
            $baru = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE kondisi='1'");
            echo mysqli_num_rows($baru);
            ?>, 
            <?php 
            $bekas = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE kondisi='0'");
            echo mysqli_num_rows($bekas);
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
