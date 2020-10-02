<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Registrasi <small><?php include '../../../system/date-time.php';?></small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Hari Ini</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row --><div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div align="right" class="col-lg-12">
          <?php
          $data = mysqli_query($koneksi,
            "SELECT COUNT(id_hpl_register) AS total
            FROM hpl_register
            WHERE tanggal='$tanggalsekarang';");
          while($d = mysqli_fetch_array($data)){
            $total = $d['total'];
            ?>
            <h1><small>Total <?php echo $total; } ?> Pasien</small></h1>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>#</center></th>
                <th><center>No. RM</center></th>
                <th><center>Nama Pasien</center></th>
                <th><center>Kontak</center></th>
                <th><center>Dokter</center></th>
                <th><center>Prakiraan HPL</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = $total;
              $data = mysqli_query($koneksi,
                "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, mr_pasien.nama, mr_pasien.telp, mr_pasien.alamat, dokter.nama_dokter
                FROM hpl_register
                INNER JOIN mr_pasien ON hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
                INNER JOIN dokter ON hpl_register.id_dokter=dokter.id_dokter
                WHERE hpl_register.tanggal='$tanggalsekarang'
                ORDER BY hpl_register.id_hpl_register DESC;");
              while($d = mysqli_fetch_array($data)){
                $tgl_hpl    = $d['tgl_hpl'];
                $sub_kontak = substr($d['telp'],1);
                ?>
                <tr>
                  <td><center><?php echo $no--; ?></center></td>
                  <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                  <td><center><?php echo $d['nama']; ?></center></td>
                  <td><center><?php echo $d['telp']; ?></center></td>
                  <td><center><?php echo $d['nama_dokter']; ?></center></td>
                  <td><center><?php echo date('d F Y', strtotime($tgl_hpl)); ?></center></td>
                  <td>
                    <div align="center">
                      <a href="hpl-detail.php?id=<?php echo $d['id_hpl_register']; ?>"
                        <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                      </div>
                    </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div><!-- col-lg-12 -->
        </div><!-- row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>