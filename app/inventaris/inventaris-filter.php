<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Daftar <small> Inventaris</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-search"></i> Cari</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <form method="post" action="inventaris-filter-tampil.php" role="form">
          <div class="col-lg-6">
           <div class="form-group">
            <label>Nama Ruangan</label>
            <select class="form-control" type="text" name="kode_ruangan">
              <option disabled selected>Pilih</option>
              <?php 
              $data = mysqli_query($koneksi,
                "SELECT * FROM inventaris_ruangan ORDER BY nama_ruangan ASC;");
              while($d = mysqli_fetch_array($data)){
                echo "<option value='".$d['kode_ruangan']."'>"."(".$d['kode_ruangan'].")"." - ".$d['nama_ruangan']."</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <form method="post" action="inventaris-detail.php" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nomor Inventaris</label>
            <input class="form-control" type="text" name="nomor_inventaris" placeholder="Masukkan..">
          </div><button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- /.row --><br><br>
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <form method="post" action="kondisi-filter-tampil.php" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Kondisi</label>
            <select class="form-control" type="text" name="kondisi">
              <option disabled selected>Pilih</option>
              <option value="1">Baik</option>
              <option value="0">Rusak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
      <form method="post" action="status-filter-tampil.php" role="form">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" type="text" name="status">
              <option disabled selected>Pilih</option>
              <option value="1">Baru</option>
              <option value="0">Bekas</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>