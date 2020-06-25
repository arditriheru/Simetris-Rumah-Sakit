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
            <h1>Form <small>Tambah Pegawai</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Form Pegawai</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <form method="post" action="pegawai_prosestambah.php" role="form">
              <div class="form-group">
                <label>NIK</label>
                <input class="form-control" type="text" name="nip" placeholder="Nomor Induk Kependudukan">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama" placeholder="Anang Hadi">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" type="text" name="alamat" placeholder="Masukkan..">
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" placeholder="Masukkan..">
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_lahir">
              </div>
              <div class="form-group">
                <label>Agama</label>
                <select class="form-control" type="text" name="agama">
                  <option>Islam</option>
                  <option>Kristen</option>
                  <option>Katolik</option>
                  <option>Hindu</option>
                  <option>Budha</option>
                  <option>Khong Hu Chu</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" type="text" name="jabatan">
                  <option>Direktur</option>
                  <option>Dokter Spesialis</option>
                  <option>Dokter Umum</option>
                  <option>Tenaga Medis</option>
                  <option>Pegawai Non Medis</option>
                </select>
              </div>
              <div class="form-group">
                <label>Profesi</label>
                <select class="form-control" type="text" name="profesi">
                  <option>Dokter Umum</option>
                  <option>Dokter Umum Fungsional</option>
                  <option>Dokter Spesialis Obstetri Ginekologi</option>
                  <option>Dokter Spesialis Anak</option>
                  <option>Dokter Spesialis Bedah</option>
                  <option>Perawat Ahli Madya</option>
                  <option>Perawat Ners</option>
                  <option>Bidan Ahli Madya</option>
                  <option>Bidan Profesi</option>
                  <option>Farmasi Apoteker</option>
                  <option>Farmasi Asisten Apoteker</option>
                  <option>Farmasi Ahli Madya</option>
                  <option>Gizi Ahli Madya</option>
                  <option>Gizi Profesi</option>
                  <option>Okupasi Ahli Madya</option>
                  <option>Keterapian Fisik Profesi</option>
                  <option>Rekam Medis</option>
                  <option>Staf Analis</option>
                  <option>Staf Laboratorium</option>
                  <option>Sanitarian</option>
                  <option>Pramusaji</option>
                  <option>Staf Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" type="text" name="jenis_kelamin">
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Pendidikan</label>
                <select class="form-control" type="text" name="pendidikan">
                  <option>S3</option>
                  <option>S2</option>
                  <option>S1</option>
                  <option>D4</option>
                  <option>D3</option>
                  <option>D2</option>
                  <option>D1</option>
                  <option>SLTA</option>
                  <option>SLTP</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nomor STR</label>
                <input class="form-control" type="text" name="no_str" placeholder="Masukkan..">
              </div>
              <div class="form-group">
                <label>Tanggal Berlaku STR</label>
                <input class="form-control" type="date" name="tanggal_str">
              </div>
              <div class="form-group">
                <label>Nomor SIP</label>
                <input class="form-control" type="text" name="no_sip" placeholder="Masukkan..">
              </div>
              <div class="form-group">
                <label>Tanggal Berlaku SIP</label>
                <input class="form-control" type="date" name="tanggal_sip">
              </div>
              <div class="form-group">
                <label>Status Kepegawaian</label>
                <select class="form-control" type="text" name="status_kepegawaian">
                  <option>Tetap</option>
                  <option>Kontrak</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status Bekerja</label>
                <select class="form-control" type="text" name="status_bekerja">
                  <option>Aktif</option>
                  <option>Resign</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Tambah</button>
              <button type="reset" class="btn btn-warning">Reset</button>  
            </form>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>