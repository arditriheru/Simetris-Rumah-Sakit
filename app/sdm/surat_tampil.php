<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Surat Keluar</small></h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
     <h1>Tampil Surat Internal</h1>
     <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal</th>
            <th>Perihal</th>
            <th>Tujuan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include 'koneksi.php';
          $no = 1;
          $data = mysqli_query($koneksi,"select * from surat_internal ORDER BY no DESC ;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <!--<td><?php echo $no++; ?></td>-->
              <td><?php echo $d['no']; ?></td>
              <td><?php echo $d['nomor_surat']; ?></td>
              <td><?php echo $d['tanggal']; ?></td>
              <td><?php echo $d['perihal']; ?></td>
              <td><?php echo $d['tujuan']; ?></td>
              </tr><?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-6">
        <h1>Tampil Surat Eksternal</h1>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Perihal</th>
                <th>Tujuan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              include 'koneksi.php';
              $no = 1;
              $data = mysqli_query($koneksi,"select * from surat_eksternal ORDER BY no DESC");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <!--<td><?php echo $no++; ?></td>-->
                  <td><?php echo $d['no']; ?></td>
                  <td><?php echo $d['nomor_surat']; ?></td>
                  <td><?php echo $d['tanggal']; ?></td>
                  <td><?php echo $d['perihal']; ?></td>
                  <td><?php echo $d['tujuan']; ?></td>
                  </tr><?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
        <?php include 'views/footer.php';?>