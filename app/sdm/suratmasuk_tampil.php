<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Surat Masuk</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Surat Masuk</li>
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
              <th>Nomor Surat</th>
              <th>Tanggal</th>
              <th>Perihal</th>
              <th>Ditujukan</th>
              <th>Asal Surat</th>
              <th>Dokumen</th>
              <th>Action</th>
              <!--<th colspan="2">Proses</th>-->
            </tr>
          </thead>
          <tbody>
            <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from surat_masuk ORDER BY no DESC ;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <!--<td><?php echo $no++; ?></td>-->
                <td><?php echo $d['no']; ?></td>
                <td><?php echo $d['nomor_surat']; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td><?php echo $d['perihal']; ?></td>
                <td><?php echo $d['tujuan']; ?></td>
                <td><?php echo $d['asal']; ?></td>
                <td><?php echo $d['asal']; ?></td>
                <td>
                  <a href="suratmasuk_edit.php?no=<?php echo $d['no']; ?>"
                    <button type="button" class="btn btn-warning">EDIT</a>
                      <a href="suratmasuk_hapus.php?no=<?php echo $d['no']; ?>"
                        <button type="button" class="btn btn-danger">HAPUS</a>
                        </td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
              <?php include 'views/footer.php';?>