<?php include "views/header.php"; ?>
<?php   ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Form <small>Edit</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-pencil"></i> Edit</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php 
      $id_dokter = $_GET['id'];
      $data = mysqli_query($koneksi,
        "SELECT *,
        IF (status='1', 'Aktif','Non Aktif') AS nama_status,
        CASE
        WHEN id_unit='1' THEN 'Dokter Anak'
        WHEN id_unit='2' THEN 'Dokter Kandungan'
        WHEN id_unit='3' THEN 'Dokter Bedah'
        END AS nama_unit
        FROM dokter WHERE id_dokter='$id_dokter';");
      while($d = mysqli_fetch_array($data)){
        $id_dokter    = $d['id_dokter'];
        $nama_dokter  = $d['nama_dokter'];
        $id_unit      = $d['id_unit'];
        $nama_unit    = $d['nama_unit'];
        $status       = $d['status'];
        $nama_status  = $d['nama_status'];
      }
      ?>
      <?php
      if(isset($_POST['submit'])){
        $nama_dokter  = $_POST['nama_dokter'];
        $id_unit      = $_POST['id_unit'];
        $status       = $_POST['status'];
        $simpan=mysqli_query($koneksi,"UPDATE dokter 
         SET nama_dokter='$nama_dokter',id_unit='$id_unit',status='$status'
         WHERE id_dokter='$id_dokter'");
        if($simpan){
          echo "<script>alert('Berhasil Diperbarui!!!');document.location='dokter-tambah'</script>";
        }else{
          echo "<script>alert('Gagal Memperbarui!!!');document.location='dokter-tambah'</script>";
        }
      }
      ?>
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Nama Dokter</label>
          <input class="form-control" type="text" name="nama_dokter"
          value="<?php echo $nama_dokter; ?>" required="">
          <p style="color:blue">Tuliskan nama dokter sesuai di SIMRS!!!
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <select class="form-control" type="text" name="id_unit" required="">
              <option value='<?php echo $id_unit; ?>' selected><?php echo $nama_unit; ?></option>
              <option value='1'>Dokter Anak</option>
              <option value='2'>Dokter Kandungan</option>
              <option value='3'>Dokter Bedah</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status Dokter</label>
            <select class="form-control" type="text" name="status" required="">
              <option value='<?php echo $status; ?>' selected><?php echo $nama_status; ?></option>
              <option value='1'>Aktif</option>
              <option value='0'>Nonaktif</option>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
        </form>
      </div>
    </div><!-- /.row -->
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?> 