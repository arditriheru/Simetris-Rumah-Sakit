<?php include "../session-start.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kepegawaian | RSKIA Rachmi</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <nav>
    <div id="wrapper">
      <?php include "menu.php"; ?>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Tabel <small>Pegawai</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Pegawai</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Profesi</th>
                    <th>Gender</th>
                    <th>Pendidikan</th>
                    <th>Kepegawaian</th>
                    <th>Status</th>
                    <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from pegawai ORDER BY nama ASC ;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nip']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['profesi']; ?></td>
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                    <td><?php echo $d['pendidikan']; ?></td>
                    <td><?php echo $d['status_kepegawaian']; ?></td>
                    <td><?php echo $d['status_bekerja']; ?></td>
                    <td>
                      <div align="center">
                        <a href="pegawai_detail.php?nip=<?php echo $d['nip']; ?>"
                        <button type="button" class="btn btn-warning">DETAIL</a>
                          <a href="pegawai_hapus.php?nip=<?php echo $d['nip']; ?>"
                        <button type="button" class="btn btn-danger">HAPUS</a>
                      </div>
                    </td>
                  </tr>
                  <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?>
      <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>