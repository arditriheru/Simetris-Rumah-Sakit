<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS - Daftar Tarif</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
  <style>
    .bluetext {
      color: #008cba;
    }
    .redtext {
      color: #e71414;
    }
    .navbar-rachmi{
      background-color:#e67e22;
      border-color:#d35400
    }
    .navbar-brand{
      color:#ffffff;
    }

  </style>
</head>
<body>
  <nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">SIMETRIS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="tarif-semua.php"><i class="fa fa-check-square-o"></i> Daftar Tarif</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $nama_login;?>&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li>
                  <a href="logout.php"><i class="fa fa-power-off">
                  </i> Log Out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php include '../../config/connect.php';?>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Daftar <small>Tarif</small></h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-check"></i> Tarif</li>
            </ol>
            <?php include "../../system/welcome.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4">
              <form method="post" action="" role="form">
                <div class="form-group">
                  <label>Tarif Tindakan</label>
                  <input class="form-control" type="text" name="cari" placeholder="Pencarian..">
                </div><button name="tindakansubmit" type="submit" class="btn btn-success">Tampilkan</button>
              </form>
            </div>
            <div class="col-lg-4">
              <form method="post" action="" role="form">
                <div class="form-group">
                  <label>Tarif Farmasi</label>
                  <input class="form-control" type="text" name="cari" placeholder="Pencarian..">
                </div><button name="farmasisubmit" type="submit" class="btn btn-success">Tampilkan</button>
              </form>
            </div>
            <div class="col-lg-4">
              <form method="post" action="" role="form">
                <div class="form-group">
                  <label>Tarif Laboratorium</label>
                  <input class="form-control" type="text" name="cari" placeholder="Pencarian..">
                </div><button name="laboratsubmit" type="submit" class="btn btn-success">Tampilkan</button>
              </form>
            </div>
          </div>
        </div><br><br>
        <div class="row">
          <div class="col-lg-6">
            <!-- pencarian tarif kasir -->
            <?php
            if(isset($_POST['tindakansubmit'])){
              $kasircari = $_POST['cari']; ?>

              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr style="background-color: #dddddd;">
                    <td colspan="4"><div align="center">Hasil Pencarian Tindakan</div></td>
                  </tr>
                  <tr>
                    <th><div align="center">#</div></th>
                    <th><div align="center">Kode</div></th>
                    <th><div align="center">Nama Tindakan</div></th>
                    <th><div align="center">Tarif</div></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT kode, nama, tarif FROM ksr_tarif WHERE nama LIKE '%' '$kasircari' '%' AND publish=1 ORDER BY nama ASC;");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><div align="center"><?php echo $no++; ?></div></td>
                      <td><div align="center"><?php echo $d['kode']; ?></div></td>
                      <td><div align="left"><?php echo $d['nama']; ?></div></td>
                      <td><div align="right"><?php echo number_format($d['tarif']); ?></div></td>
                      </tr><?php } ?>
                    </tbody>
                  </table>
                <?php } ?>
                <!-- pencarian tarif farmasi -->
                <?php
                if(isset($_POST['farmasisubmit'])){
                  $farmasicari = $_POST['cari']; ?>

                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr style="background-color: #dddddd;">
                        <td colspan="4"><div align="center">Hasil Pencarian Farmasi</div></td>
                      </tr>
                      <tr>
                        <th><div align="center">#</div></th>
                        <th><div align="center">Kode</div></th>
                        <th><div align="center">Nama Obat</div></th>
                        <th><div align="center">Tarif</div></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $data = mysqli_query($koneksi,"SELECT no_urut, nama, harga_jual FROM far_stok WHERE nama LIKE '%' '$farmasicari' '%' ORDER BY nama ASC;");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><div align="center"><?php echo $no++; ?></div></td>
                          <td><div align="center"><?php echo $d['no_urut']; ?></div></td>
                          <td><div align="left"><?php echo $d['nama']; ?></div></td>
                          <td><div align="right"><?php echo number_format($d['harga_jual']); ?></div></td>
                          </tr><?php } ?>
                        </tbody>
                      </table>
                    <?php } ?>
                    <!-- pencarian tarif laboratorium -->
                    <?php
                    if(isset($_POST['laboratsubmit'])){
                      $laboratcari = $_POST['cari']; ?>

                      <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                          <tr style="background-color: #dddddd;">
                            <td colspan="4"><div align="center">Hasil Pencarian Laboratorium</div></td>
                          </tr>
                          <tr>
                            <th><div align="center">#</div></th>
                            <th><div align="center">Kode</div></th>
                            <th><div align="center">Jenis Pemeriksaan</div></th>
                            <th><div align="center">Tarif</div></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          $data = mysqli_query($koneksi,"SELECT id_lab_tarif, nama, tarif FROM lab_tarif WHERE nama LIKE '%' '$laboratcari' '%' ORDER BY nama ASC;");
                          while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                              <td><div align="center"><?php echo $no++; ?></div></td>
                              <td><div align="center"><?php echo $d['id_lab_tarif']; ?></div></td>
                              <td><div align="left"><?php echo $d['nama']; ?></div></td>
                              <td><div align="right"><?php echo number_format($d['tarif']); ?></div></td>
                              </tr><?php } ?>
                            </tbody>
                          </table>
                        <?php } ?>
                      </div>
                    </div><!-- /.row -->
                    <br><br>
                    <?php include "../../system/copyright.php";?>
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