<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/chartjs/Chart.js"></script>
</head>
<body>
  <?php include '../../config/connect.php'; ?>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart2"></canvas>
    </div>
    <script>
      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Baru", "Bekas"],
          datasets: [{
            label: '',
            data: [
            <?php 
            $baru = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE status='1'");
            echo mysqli_num_rows($baru);
            ?>, 
            <?php 
            $bekas = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE status='0'");
            echo mysqli_num_rows($bekas);
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
