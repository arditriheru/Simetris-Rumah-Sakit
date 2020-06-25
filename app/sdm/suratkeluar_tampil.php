<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Surat Keluar</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
     <h1>Surat Internal (A)</h1>
     <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <!--<th>No</th>-->
            <th>Nomor Surat</th>
            <th>Tanggal</th>
            <th>Perihal</th>
            <th>Tujuan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include '../koneksi.php';
          $no = 1;
          $data = mysqli_query($koneksi,"select * from surat_internal ORDER BY no DESC ;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <!--<td><?php echo $no++; ?></td>-->
              <!--<td><?php echo $d['no']; ?></td>-->
              <td><?php echo $d['nomor_surat']; ?></td>
              <td><?php echo $d['tanggal']; ?></td>
              <td><?php echo $d['perihal']; ?></td>
              <td><?php echo $d['tujuan']; ?></td>
              <td>
                <div align="center">
                  <a href="pegawai_detail.php?nip=<?php echo $d['nip']; ?>"
                    <button type="button" class="btn btn-warning">DETAIL</a><br><br>
                      <a href="suratkeluarinternal_hapus.php?no=<?php echo $d['no']; ?>"
                        <button type="button" class="btn btn-danger">HAPUS</a>
                        </div>
                      </td>
                      </tr><?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-6">
                <h1>Surat Eksternal (B)</h1>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <!--<th>No</th>-->
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Tujuan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      include '../koneksi.php';
                      $no = 1;
                      $data = mysqli_query($koneksi,"select * from surat_eksternal ORDER BY nomor_surat DESC");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <!--<td><?php echo $no++; ?></td>-->
                          <!--<td><?php echo $d['no']; ?></td>-->
                          <td><?php echo $d['nomor_surat']; ?></td>
                          <td><?php echo $d['tanggal']; ?></td>
                          <td><?php echo $d['perihal']; ?></td>
                          <td><?php echo $d['tujuan']; ?></td>
                          <td>
                            <div align="center">
                              <a href="pegawai_detail.php?nip=<?php echo $d['nip']; ?>"
                                <button type="button" class="btn btn-warning">DETAIL</a><br><br>
                                  <a href="suratkeluareksternal_hapus.php?no=<?php echo $d['no']; ?>"
                                    <button type="button" class="btn btn-danger">HAPUS</a>
                                    </div>
                                  </td>
                                  </tr><?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div><!-- /.row -->
                        <?php include 'views/footer.php';?>