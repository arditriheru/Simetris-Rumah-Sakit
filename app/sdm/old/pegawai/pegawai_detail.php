<?php include "../session-start.php";?>
<?php 
  include '../koneksi.php';
  $nip = $_GET['nip'];
  $no = 1;
  $data = mysqli_query($koneksi,"select * from pegawai where nip='$nip';");
  while($d = mysqli_fetch_array($data)){
?>
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
              <li><a href="pegawai_tampil.php"><i class="fa fa-user"></i> Pegawai</a></li>
              <li class="active"><i class="fa fa-edit"></i> Detail</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <div clas="row">
              <a href="pegawai_prosesedittetap.php?nip=<?php echo $nip; ?>"
              <button type="button" class="btn btn-success">Tetap</button>
              </a>
              <a href="pegawai_proseseditnontetap.php?nip=<?php echo $nip; ?>"
              <button type="button" class="btn btn-warning">Kontrak</button>
              </a>
              <a href="pegawai_proseseditaktif.php?nip=<?php echo $nip; ?>"
              <button type="button" class="btn btn-primary">Aktifkan</button>
              </a>
              <a href="pegawai_proseseditnonaktif.php?nip=<?php echo $nip; ?>"
              <button type="button" class="btn btn-danger">Non Aktifkan</button>
              </a>
            </div><br>
            <table class="table table-bordered table-hover table-striped tablesorter">
              <tbody>
              <tr>
                  <td>NIK</td>
                  <td><?php echo $d['nip']; ?></td>
              </tr>
              <tr>
                  <td>Nama</td>
                  <td><?php echo $d['nama']; ?></td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td><?php echo $d['alamat']; ?></td>
              </tr>
              <tr>
                  <td>Tempat Lahir</td>
                  <td><?php echo $d['tempat_lahir']; ?></td>
              </tr>
              <tr>
                  <td>Tanggal Lahir</td>
                  <td><?php echo $d['tanggal_lahir']; ?></td>
              </tr>
              <tr>
                  <td>Agama</td>
                  <td><?php echo $d['agama']; ?></td>
              </tr>
              <tr>
                  <td>Jabatan</td>
                  <td><?php echo $d['jabatan']; ?></td>
              </tr>
              <tr>
                  <td>Profesi</td>
                  <td><?php echo $d['profesi']; ?></td>
              </tr>
              <tr>
                  <td>Gender</td>
                  <td><?php echo $d['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <td>Pendidikan</td>
                  <td><?php echo $d['pendidikan']; ?></td>
              </tr>
              <tr>
                  <td>Nomor STR</td>
                  <td><?php echo $d['no_str']; ?></td>
              </tr>
              <tr>
                  <td>Berlaku STR</td>
                  <td><?php echo $d['tanggal_str']; ?></td>
              </tr>
              <tr>
                  <td>Nomor SIP</td>
                  <td><?php echo $d['no_sip']; ?></td>
              </tr>
              <tr>
                  <td>Berlaku SIP</td>
                  <td><?php echo $d['tanggal_sip']; ?></td>
              </tr>
              <tr>
                  <td>Kepegawaian</td>
                  <td><?php echo $d['status_kepegawaian']; ?></td>
              </tr>
              <tr>
                  <td>Status</td>
                  <td><?php echo $d['status_bekerja']; ?></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
            </table>
                </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>