<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/chartjs/Chart.js"></script>
</head>
<body>
  <div class="col-lg-6">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart2"></canvas>
    </div>
    <script>
      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Sangat Puas", "Cukup Puas", "Tidak Puas"],
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
  </div>
</body>
</html>
