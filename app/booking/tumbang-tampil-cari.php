<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <?php
    $carirm   = $_POST['carirm'];
    $carinama = $_POST['carinama'];
    ?>
    <div class="col-lg-12">
      <h1>Hasil Pencarian <small>"
        <?php
        if(!$carirm){
          echo $carinama;
        }else{
          echo $carirm;
        }
        ?>
      "</small></h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-search"></i> Pencarian</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <div class="row">
                <div align="right" class="col-lg-4">
                  <form method="post" action="tumbang-tampil-cari" role="form">
                    <div class="form-group input-group">
                      <?php
                      if(!$carirm){ ?>
                        <input type="text" class="form-control" name="carirm" placeholder=" Pencarian No.RM Pasien..">
                      <?php }else{ ?>
                        <input type="text" class="form-control" name="carirm" value="<?php echo $carirm ?>">
                      <?php }
                      ?>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                      </span>
                    </div>
                  </div>
                  <div align="right" class="col-lg-4">
                    <div class="form-group input-group">
                      <?php
                      if(!$carinama){ ?>
                        <input type="text" class="form-control" name="carinama" placeholder=" Pencarian Nama Pasien..">
                      <?php }else{ ?>
                        <input type="text" class="form-control" name="carinama" value="<?php echo $carinama ?>">
                      <?php }
                      ?>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <!-- <th><center>#</center></th> -->
                    <th><center>No. RM</center></th>
                    <th><center>Nama Pasien</center></th>
                    <th><center>Kontak</center></th>
                    <th><center>Petugas</center></th>
                    <th><center>Sesi</center></th>
                    <th><center>Keterangan</center></th>
                    <th colspan='3'><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  if(!$carirm){
                    $data = mysqli_query($koneksi,
                      "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                      IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                      FROM tumbang, mr_petugas, sesi
                      WHERE tumbang.id_petugas=mr_petugas.id_petugas
                      AND tumbang.id_sesi=sesi.id_sesi
                      AND tumbang.jadwal='$tanggalsekarang'
                      AND nama LIKE '%' '$carinama' '%'
                      ORDER BY tumbang.id_sesi, mr_petugas.id_petugas, tumbang.nama ASC;");
                  }else{
                    $data = mysqli_query($koneksi,
                      "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                      IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                      FROM tumbang, mr_petugas, sesi
                      WHERE tumbang.id_petugas=mr_petugas.id_petugas
                      AND tumbang.id_sesi=sesi.id_sesi
                      AND tumbang.jadwal='$tanggalsekarang'
                      AND id_catatan_medik = '$carirm'
                      ORDER BY tumbang.id_sesi, mr_petugas.id_petugas, tumbang.nama ASC;");
                  }
                  while($d = mysqli_fetch_array($data)){
                    $id_tumbang = $d['id_tumbang'];
                    $status     = $d['status'];
                    ?>
                    <tr>
                      <!-- <td><center><?php echo $no++; ?></center></td> -->
                      <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                      <td><center><?php echo $d['nama']; ?></center></td>
                      <td><center><?php echo $d['kontak']; ?></center></td>
                      <td><center><?php echo $d['nama_petugas']; ?></center></td>
                      <td><center><?php echo $d['nama_sesi']; ?></center></td>
                      <td><center><?php echo $d['keterangan']; ?></center></td>
                      <td><center><?php
                      if($status=='Datang'){
                        echo "<a class='whitetext' href='tumbang-belum-datang-proses?id_tumbang=$id_tumbang'><button type='button' class='btn btn-success'><i class='fa fa-check'></i></button></a>";
                      }else{
                        echo "<a class='whitetext' href='tumbang-datang-proses?id_tumbang=$id_tumbang'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                      }
                      ?>
                    </center></td>
                    <td>
                      <div align="center">
                        <a href="tumbang-edit?id_tumbang=<?php echo $id_tumbang; ?>"
                          <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                        </div>
                      </td>
                      <td>
                        <div align="center">
                          <a href="tumbang-detail?id_tumbang=<?php echo $d['id_tumbang']; ?>"
                            <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
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
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?>