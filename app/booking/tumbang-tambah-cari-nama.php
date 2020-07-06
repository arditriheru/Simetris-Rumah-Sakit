<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Daftar <small>Tumbuh Kembang</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah"><i class="fa fa-plus"></i> Tambah</a></li>
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
              <th><center>#</center></th>
              <th><center>No. RM</center></th>
              <th><center>Nama Pasien</center></th>
              <th><center>T.T.L</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $nama = $_POST['nama'];
            $data = mysqli_query($koneksi,"SELECT * FROM mr_pasien WHERE nama LIKE '%' '$nama' '%';");
            while($d = mysqli_fetch_array($data)){
              $tgl_lahir = $d['tgl_lahir'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['tempat']; ?>, <?php echo date("d F Y", strtotime($tgl_lahir)); ?></center></td>
                <td>
                  <div align="center">
                    <a href="tumbang-tambah-cari-nama-eksekusi?id_register=<?php echo $d['id_register']; ?>"
                      <button type="button" class="btn btn-success">Daftar</a><br><br>
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