<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Hasil <small>Pencarian</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laporan-per-dokter.php"><i class="fa fa-search"></i> Cari</a></li>
        <li class="active"><i class="fa fa-list"></i> List</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nomor RM</center></th>
              <th><center>Nama</center></th>
              <th><center>Petugas</center></th>
              <th><center>Jadwal</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $nama = $_POST['nama'];
            $data = mysqli_query($koneksi,
              "SELECT mr_petugas.nama_petugas, tumbang.id_tumbang,
              tumbang.id_catatan_medik, tumbang.nama,
              tumbang.jadwal
              FROM tumbang, mr_petugas
              WHERE tumbang.id_petugas = mr_petugas.id_petugas
              AND tumbang.nama LIKE '%' '$nama' '%'
              ORDER BY tumbang.jadwal DESC;");
            while($d = mysqli_fetch_array($data)){
              $jadwal = $d['jadwal'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['nama_petugas']; ?></center></td>
                <td><center><?php echo date("d/m/Y", strtotime($jadwal)); ?></center></td>
                <td>
                  <div align="center">
                    <a href="tumbang-detail.php?id_tumbang=<?php echo $d['id_tumbang']; ?>"
                      <button type="button" class="btn btn-warning">Detail</a><br><br>
                      </div>
                    </td>
                    </tr><?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /#wrapper -->
      <?php include "views/footer.php"; ?>