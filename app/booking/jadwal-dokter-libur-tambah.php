<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Jadwal <small>Libur</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calendar"></i> Jadwal</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <?php
  if(isset($_POST['submit'])){
    $id_dokter   = $_POST['id_dokter'];
    $tanggal     = $_POST['tanggal'];
    $id_sesi     = $_POST['id_sesi'];

    $tambah=mysqli_query($koneksi,"INSERT INTO dokter_jadwal_libur(id_jadwal_libur, id_dokter, id_sesi, tanggal)
      VALUES('','$id_dokter','$id_sesi','$tanggal')");
    if($tambah){
      echo "<script>alert('Berhasil Menambah!!!');
      document.location='jadwal-dokter'</script>";
    }else{
      echo "<script>alert('Gagal! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='jadwal-dokter'</script>";
    }
  }
  ?>
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Dokter</label>
          <select class="form-control" type="text" name="id_dokter" required="">
            <option value="">Pilih</option>
            <?php 
            include '../koneksi.php';
            $data = mysqli_query($koneksi,
              "SELECT * FROM dokter WHERE status=1;");
            while($d = mysqli_fetch_array($data)){
              echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input class="form-control" type="date" name="tanggal" required="">
        </div>
        <div class="form-group">
          <label>Sesi</label>
          <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
          <select class="form-control" type="text" name="id_sesi" required="">
            <option value="">Pilih</option>
            <?php 
            include '../koneksi.php';
            $data = mysqli_query($koneksi,
              "SELECT * FROM sesi;");
            while($d = mysqli_fetch_array($data)){
              echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
            }
            ?>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-warning">Reset</button>  
      </form>
    </div>
  </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>