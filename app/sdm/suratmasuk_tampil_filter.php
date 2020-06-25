<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Surat Masuk</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Surat Masuk</li>
      </ol>
      <?php include "notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="suratmasuk_tampil.php" role="form">
        <div class="form-group">
          <label>Dari Tanggal</label>
          <input class="form-control" type="date" name="tanggal_awal">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Sampai Tanggal</label>
          <input class="form-control" type="date" name="tanggal_akhir">
        </div>
      </div>
    </div><!-- /.row -->
    <div class="row">
      <div align="center" class="col-lg-12">
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-warning">Reset</button>
      </div>
    </div><!-- /.row -->
  </form>
  <?php include 'views/footer.php';?>