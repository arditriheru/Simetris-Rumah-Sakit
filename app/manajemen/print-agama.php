<?php include "../session-start.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Manajemen | RSKIA Rachmi</title>
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
  <nav>
    <div id="wrapper">
    </div><!-- /.navbar-collapse -->
  </nav>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
       <div align="center">
         <img class="img-responsive" src="../images/kop.png" width="80%" alt="Kop RSKIA Rachmi"><br>
         <h3>Rekap Demografi Agama<br>RSKIA Rachmi<br>Tanggal : </h3>
       </div>
     </div>
   </div><!-- /.row -->
   <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <div clas="row">
       </div><br>
       <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th><div align="center">ID</div></th>
            <th><div align="center">Nama Pendidikan</div></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $awal = $_POST['awal'];
          $akhir = $_POST['akhir'];
          $data = mysqli_query($koneksi,"
            SELECT mr_agama.nama_agama, COUNT(*) 'hasil'
            FROM mr_pasien, mr_agama
            WHERE mr_pasien.id_agama = mr_agama.id_agama
            AND tanggal BETWEEN '$awal' AND '$akhir'
            GROUP BY mr_agama.id_agama
            ORDER BY hasil DESC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><div align="center"><?php echo $d['nama_agama']; ?></div></td>
              <td><div align="center"><?php echo $d['hasil']; ?></div></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- /.row -->
</div><br><br><?php include "../copyright.php";?><br><br>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- JavaScript -->
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>