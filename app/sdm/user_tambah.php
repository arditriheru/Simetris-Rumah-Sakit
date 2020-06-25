<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Form <small>Tambah User</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form User</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="user_prosestambah.php" role="form">
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" type="text" name="unit">
            <option>SDM</option>
            <option>Manajemen</option>
          </select>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="text" name="username" placeholder="Masukkan...">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" placeholder="Masukkan...">
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-warning">Reset</button>  
      </div>
    </form>
  </div>
  <?php include 'views/footer.php';?>