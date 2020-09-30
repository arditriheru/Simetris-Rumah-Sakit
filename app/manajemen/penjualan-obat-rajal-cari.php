<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Penjualan Obat <small>Rawat Jalan</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Penjualan Obat</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="penjualan-obat-rajal-tampil.php" role="form">
         <div class="col-lg-6">
           <div class="form-group">
            <label>Dari Tanggal</label>
            <input class="form-control" type="date" name="awal">
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input class="form-control" type="date" name="akhir">
          </div>
          <button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- /.row -->
<?php include 'views/footer.php';?>