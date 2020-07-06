<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Antrian <small>Tumbuh Kembang</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-search"></i> Cari</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <div id="myTabContent" class="tab-content">
          <form method="post" action="tumbang-filter-tampil" role="form">
            <div class="form-group">
              <label>Nama Petugas</label>
              <select class="form-control" type="text" name="id_petugas">
                <option disabled selected>Pilih</option>
                <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM tumbang_petugas WHERE status=1;");
                while($d = mysqli_fetch_array($data)){
                  echo "<option value='".$d['id_petugas']."'>".$d['nama_petugas']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jadwal</label>
              <input class="form-control" type="date" name="jadwal">
            </div>
            <div class="form-group">
              <label>Sesi</label>
              <select class="form-control" type="text" name="id_sesi">
                <p style="color:red;"><?php echo ($error['sesi']) ? $error['sesi'] : ''; ?></p>
                <option disabled selected>Pilih</option>
                <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM sesi;");
                while($d = mysqli_fetch_array($data)){
                  echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>