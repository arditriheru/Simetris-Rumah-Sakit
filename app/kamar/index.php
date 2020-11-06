<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS | Info Kamar</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
  <style>
    .bluetext {
      color: #0779e4;
    }
    .whitetext {
      color: #ffffff;
    }
    .blacktext {
      color: #000000;
    }
    .redtext {
      color: #FF0000;
    }
    .greentext {
      color: #0c9463;
    }
  </style>
</head>
<body>
  <?php include '../../config/connect.php'; ?>
  <nav>
  </nav>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>Informasi <small>Kamar</small></h1>
        <ol class="breadcrumb">
          <li><a href="https://www.rskiarachmi.co.id">
            <i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">
              <i class="fa fa-edit"></i> Informasi Kamar</li>
            </ol>  
            <?php include "../../system/welcome.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table">
                <div class="col-lg-6">
                  <div style="background-color: #ffffff; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                  Kosong</div>
                </div>
                <div class="col-lg-6">
                  <div style="background-color: #fa7f72; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                  Terpakai</div>
                </div>
                <thead>
                  <tr>
                    <th scope="col"><center>Kelas</center></th>
                    <th scope="col"><center>Kamar</center></th>
                    <th scope="col"><center>Bed</center></th>
                  </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                  $no = 1;
                  $data = mysqli_query($koneksi,
                   "SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.ket_antri,
                   IF(mr_tt.no_bed='1', 'A', 'B') AS bed
                   FROM mr_tt, mr_unit
                   WHERE mr_tt.id_unit = mr_unit.id_unit
                   AND mr_tt.id_unit
                   IN ('6','29','24','26','7','28','27','31','30','25')
                   ORDER BY mr_unit.nama_unit ASC;");
                  while($d = mysqli_fetch_array($data)){
                    $ket_antri = $d['ket_antri'];
                    ?>
                    <?php
                    if($ket_antri=='3'){ ?>
                      <tr>
                      <?php }else{ ?>
                        <tr style="background-color: #fa7f72;">
                        <?php } ?>
                        <td><center><?php echo $d['kelas'];?></center></td>
                        <td><center><?php echo $d['nama_unit']; ?></center></td>
                        <td><center><?php echo $d['bed']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div><br>
              <?php include"../../system/copyright.php"?>
              <!-- /.row -->
              <br><br>
            </div><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
          <!-- JavaScript -->
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery-1.10.2.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/sweetalert.min.js"></script>
          <!-- Page Specific Plugins -->
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/chartjs/Chart.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/morris/chart-data-morris.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/jquery.tablesorter.js"></script>
          <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/tables.js"></script>
        </body>
        </html>
