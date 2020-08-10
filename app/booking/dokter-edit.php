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
        "SELECT nama_dokter, kuota FROM dokter WHERE id_dokter='$id_dokter';");
      while($d = mysqli_fetch_array($data)){
        $nama_dokter = $d['nama_dokter'];
        $kuota = $d['kuota'];
      }
      ?>
      <?php
      if(isset($_POST['submit'])){
       $error=array();
       if (empty($nama_dokter)){
        $error['nama_dokter']='Nama Dokter Harus Diisi!!!';
      }if(empty($error)){
        $simpan=mysqli_query($koneksi,"UPDATE dokter 
         SET nama_dokter='$nama_dokter',id_unit='$id_unit',status='$status'
         WHERE id_dokter='$id_dokter'");
        if($simpan){
          echo "<script>alert('Berhasil Diperbarui!!!');document.location='dokter-tambah'</script>";
        }else{
          echo "<script>alert('Gagal Memperbarui!!!');document.location='dokter-tambah'</script>";
        }    }
      }
      ?>
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Nama Dokter</label>
          <input class="form-control" type="text" name="nama_dokter"
          value="<?php echo $nama_dokter; ?>" required="">
          <p style="color:blue">Tuliskan nama dokter sesuai di SIMRS!!!
            <p style="color:red;"><?php echo ($error['nama_dokter']) ? $error['nama_dokter'] : ''; ?></p>
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <select class="form-control" type="text" name="id_unit">
              <p style="color:red;"><?php echo ($error['id_unit'])?$error['id_unit'] : ''; ?></p>
              <?php 
              include '../koneksi.php';
              $data = mysqli_query($koneksi,
                "SELECT id_unit, IF(id_unit='1', 'Dokter Anak', 'Dokter Kandungan') AS nama_unit
                FROM dokter WHERE id_dokter='$id_dokter';");
              while($d = mysqli_fetch_array($data)){
                echo "<option selected value='".$d['id_unit']."'>".$d['nama_unit']."</option>";
              }
              echo "<option value='1'>Dokter Anak</option>";
              echo "<option value='0'>Dokter Kandungan</option>";
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Status Dokter</label>
            <select class="form-control" type="text" name="status">
              <p style="color:red;"><?php echo ($error['status']) ? $error['status'] : ''; ?></p>
              <?php 
              include '../koneksi.php';
              $data = mysqli_query($koneksi,
                "SELECT status, IF(status='1', 'Aktif', 'Nonaktif') AS nama_status
                FROM dokter WHERE id_dokter='$id_dokter';");
              while($d = mysqli_fetch_array($data)){
                echo "<option selected value='".$d['status']."'>".$d['nama_status']."</option>";
              }
              echo "<option disabled></option>";
              echo "<option value='1'>Aktif</option>";
              echo "<option value='0'>Nonaktif</option>";
              ?>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
        </form>
      </div>
    </div><!-- /.row -->
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?> 