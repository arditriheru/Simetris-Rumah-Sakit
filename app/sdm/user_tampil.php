<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Tampil User</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> User</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
              <!--<th colspan="2">Proses</th>-->
            </tr>
          </thead>
          <tbody>
            <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from admin ORDER BY username ASC ;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td>
                  <a href="user_formedit.php?id_admin=<?php echo $d['id_admin']; ?>"
                    <button type="button" class="btn btn-warning">EDIT</a>
                      <a href="user_hapus.php?id_admin=<?php echo $d['id_admin']; ?>"
                        <button type="button" class="btn btn-danger">HAPUS</a>
                        </td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
              <?php include 'views/footer.php';?>