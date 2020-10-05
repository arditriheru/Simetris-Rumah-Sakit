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
    <div class="col-lg-2">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Pencarian</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href='inventaris-filter.php?id=4'>No. Inventaris</a></li>
          <li><a href='inventaris-filter.php?id=1'>Nama Ruangan</a></li>
          <li><a href='inventaris-filter.php?id=2'>Kondisi Barang</a></li>
          <li><a href='inventaris-filter.php?id=3'>Status Barang</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
    <div class="col-lg-10">
      <?php
      $id = $_GET['id'];
      if($id==1){ ?>
        <form method="post" action="" role="form">
         <div class="form-group">
          <label>Nama Ruangan</label>
          <select class="form-control" type="text" name="kode_ruangan" required="">
            <option value="">Pilih</option>
            <option value="0">-- Semua --</option>
            <?php 
            $data = mysqli_query($koneksi,
              "SELECT * FROM inventaris_ruangan ORDER BY nama_ruangan ASC;");
            while($d = mysqli_fetch_array($data)){
              echo "<option value='".$d['kode_ruangan']."'>"."(".$d['kode_ruangan'].")"." - ".$d['nama_ruangan']."</option>";
            }
            ?>
          </select>
        </div>
        <button name="submitruangan" type="submit" class="btn btn-success">Cari</button>
      </form>
    <?php }if($id==2){ ?>
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Kondisi Barang</label>
          <select class="form-control" type="text" name="kondisi" required="">
            <option value="">Pilih</option>
            <option value="1">Baik</option>
            <option value="0">Rusak</option>
          </select>
        </div>
        <button name="submitkondisi" type="submit" class="btn btn-success">Cari</button>
      </form>
    <?php }if($id==3){ ?>
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Status Barang</label>
          <select class="form-control" type="text" name="status" required="">
            <option value="">Pilih</option>
            <option value="1">Baru</option>
            <option value="0">Bekas</option>
          </select>
        </div>
        <button name="submitstatus" type="submit" class="btn btn-success">Cari</button>
      </form>
    <?php }if($id==4){ ?>
      <form method="post" action="inventaris-detail.php" role="form">
        <div class="form-group">
          <label>Nomor Inventaris</label>
          <input class="form-control" type="text" name="nomor_inventaris" placeholder="Masukkan.." required="">
        </div><button name="submitnoinven" type="submit" class="btn btn-success">Cari</button>
      </form>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <!-- Tabel Ruangan -->
    <?php 
    if(isset($_POST['submitruangan'])){
      $kode_ruangan = $_POST['kode_ruangan'];
      $a = mysqli_query($koneksi,
        "SELECT COUNT(*) AS total
        FROM inventaris
        WHERE kode_ruangan = '$kode_ruangan';");
      while($b = mysqli_fetch_array($a)){
        $total = $b['total'];
        ?>
        <div class="table-responsive">
          <div class="col-lg-8">
            <form method="post" action="export-inventaris.php" role="form">
              <div class="form-group">
                <input class="form-control" type="hidden" name="kode_ruangan" value="<?php echo $kode_ruangan?>">
              </div>
              <button type="submit" class="btn btn-primary">EXPORT</button><br><br>
            </form>
          </div>
          <div align="right" class="col-lg-4">
            <h1>Jumlah <small> <?php echo $total;}?> Barang</small></h1>
          </div>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nomor Inventaris</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Jenis</center></th>
                <th><center>Ruangan</center></th>
                <th><center>Pengadaan</center></th>
                <th><center>Kondisi</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              date_default_timezone_set("Asia/Jakarta");
              $tanggalHariIni=date('Y-m-d');
              $data = mysqli_query($koneksi,
                "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
                IF (inventaris.kondisi='1', 'Baik', 'Rusak') AS kondisi
                FROM inventaris, inventaris_jenis, inventaris_ruangan
                WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                AND inventaris.kode_ruangan = '$kode_ruangan'
                ORDER BY inventaris.kode_registrasi ASC;");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><center><?php echo $d['nomor_inventaris']; ?></center></td>
                  <td><center><?php echo $d['nama_barang']; ?></center></td>
                  <td><center><?php echo $d['nama_jenis']; ?></center></td>
                  <td><center><?php echo $d['nama_ruangan']; ?></center></td>
                  <td><center><?php 
                  if($d['tanggal_pengadaan']=='0000-00-00'){
                    echo "-";
                  }else{
                    echo date("d/m/Y",strtotime($d['tanggal_pengadaan']));
                  } ?></center></td>
                  <td><center><?php echo $d['kondisi']; ?></center></td>
                  <td>
                    <div align="center">
                      <a href="inventaris-detail.php?id=<?php echo $d['kode_registrasi']; ?>"
                        <button type="button" class="btn btn-warning">Detail</a><br><br>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div><?php } } ?>
              </div><!-- /.row -->
            </div><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>