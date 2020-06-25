<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit <small>Jadwal</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calendar"></i> Jadwal</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <?php
  if(isset($_POST['submit'])){
    $id_dokter  = $_POST['id_dokter'];
    $senin      = $_POST['senin'];
    $selasa     = $_POST['selasa'];
    $rabu       = $_POST['rabu'];
    $kamis      = $_POST['kamis'];
    $jumat      = $_POST['jumat'];
    $sabtu      = $_POST['sabtu'];
    $minggu     = $_POST['minggu'];
    $sp         = $_GET['sp'];

    $tambah=mysqli_query($koneksi,"INSERT INTO jadwal (id_jadwal, id_dokter, sen, sel, rab, kam, jum, sab, min, sp)
      VALUES('','$id_dokter','$senin','$selasa','$rabu','$kamis','$jumat','$sabtu','$minggu','$sp')");
    if($tambah){
      echo "<script>alert('Berhasil Menambah Jadwal!!!');
      document.location='jadwal-dokter'</script>";
    }else{
      echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='jadwal-tambah</script>";
    }
  }
  ?>
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Nama Dokter</label>
          <select class="form-control" type="text" name="id_dokter" required="">
            <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
            <option disabled selected>Pilih</option>
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
          <label>Senin</label>
          <input class="form-control" type="text" name="senin">
        </div>
        <div class="form-group">
          <label>Selasa</label>
          <input class="form-control" type="text" name="selasa">
        </div>
        <div class="form-group">
          <label>Rabu</label>
          <input class="form-control" type="text" name="rabu">
        </div>
        <div class="form-group">
          <label>Kamis</label>
          <input class="form-control" type="text" name="kamis">
        </div>
        <div class="form-group">
          <label>Jumat</label>
          <input class="form-control" type="text" name="jumat">
        </div>
        <div class="form-group">
          <label>Sabtu</label>
          <input class="form-control" type="text" name="sabtu">
        </div>
        <div class="form-group">
          <label>Minggu</label>
          <input class="form-control" type="text" name="minggu">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-warning">Reset</button>  
      </form>
    </div>
  </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>