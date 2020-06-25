<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Form <small>Edit Surat Masuk</small></h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form Surat Masuk</li>
      </ol>
      <?php include "notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="suratmasuk_prosestambah.php" role="form">
        <div class="form-group">
          <label>Nomor Surat</label>
          <input class="form-control" type="text" name="nomor_surat" placeholder="Masukkan..">
        </div>
        <div class="form-group">
          <label>Tanggal Surat</label>
          <input class="form-control" type="date" name="tanggal">
        </div>
        <div class="form-group">
          <label>Perihal</label>
          <input class="form-control" type="text" name="perihal" placeholder="Masukkan..">
        </div>
        <div class="form-group">
          <label>Tujuan Surat</label>
          <input class="form-control" type="text" name="tujuan" placeholder="Masukkan..">
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-warning">Reset</button>  
      </form>
    </div>
  </div><!-- /.row -->
  <<?php include 'views/footer.php';?>