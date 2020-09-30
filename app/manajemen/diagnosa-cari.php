<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Demografi Pendidikan</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Pendidikan</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="diagnosa-tampil.php" role="form">
         <div class="col-lg-6">
          <div class="form-group">
            <label>Dokter</label>
            <select class="form-control" type="text" name="id_dokter" required="">
              <option disabled selected>Pilih</option>
              <?php 
              $data = mysqli_query($koneksi,
                "SELECT id_dokter, nama_dokter FROM mr_dokter;");
              while($d = mysqli_fetch_array($data)){
                echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
              }
              ?>
            </select>
          </div>
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