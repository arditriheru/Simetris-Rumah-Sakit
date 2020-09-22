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
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calendar"></i> Jadwal</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <?php $id_jadwal = $_GET['id_jadwal']; ?>
    <div align="right" class="col-lg-6">
      <a href="jadwal-hapus.php?id_jadwal=<?php echo $id_jadwal; ?>"
        onclick="javascript: return confirm('Anda yakin hapus?')">
        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
      </a>
    </div>
  </div><!-- /.row -->
  <?php 
  $data = mysqli_query($koneksi,
    "SELECT *, dokter_jadwal.kuota, dokter.nama_dokter, sesi.nama_sesi,
    CASE
    WHEN dokter_jadwal.hari='1' THEN 'Senin'
    WHEN dokter_jadwal.hari='2' THEN 'Selasa'
    WHEN dokter_jadwal.hari='3' THEN 'Rabu'
    WHEN dokter_jadwal.hari='4' THEN 'Kamis'
    WHEN dokter_jadwal.hari='5' THEN 'Jumat'
    WHEN dokter_jadwal.hari='6' THEN 'Sabtu'
    WHEN dokter_jadwal.hari='0' THEN 'Minggu'
    END AS nama_hari,
    IF (dokter_jadwal.ims='1', 'Ya','Tidak') AS nama_ims
    FROM dokter_jadwal, dokter, sesi
    WHERE dokter_jadwal.id_dokter=dokter.id_dokter
    AND dokter_jadwal.id_sesi=sesi.id_sesi
    AND dokter_jadwal.id_jadwal='$id_jadwal';");
  while($d = mysqli_fetch_array($data)){
    $id_dokter = $d['id_dokter'];
    ?>
    <?php
    if(isset($_POST['submit'])){
      $hari    = $_POST['hari'];
      $jam     = $_POST['jam'];
      $id_sesi = $_POST['id_sesi'];
      $kuota   = $_POST['kuota'];
      $ims     = $_POST['ims'];

      $edit=mysqli_query($koneksi,"UPDATE dokter_jadwal SET id_sesi='$id_sesi', hari='$hari', jam='$jam', kuota='$kuota', ims='$ims' WHERE id_jadwal='$id_jadwal'");
      if($edit){
        echo "<script>alert('Berhasil Mengubah!!!');
        document.location='jadwal-dokter.php?id_dokter=$id_dokter'</script>";
      }else{
        echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='jadwal-dokter.php?id_dokter=$id_dokter'</script>";
      }
    }
    ?>
    <div class="row">
      <div class="col-lg-6">
        <form method="post" action="" role="form">
          <div class="form-group">
            <label>Nama Dokter</label>
            <input class="form-control" type="text" name="nama_dokter"
            value="<?php echo $d['nama_dokter']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Hari</label>
            <select class="form-control" type="text" name="hari" required="">
              <p style="color:red;"><?php echo ($error['hari']) ? $error['hari'] : ''; ?></p>
              <option value='<?php echo $d['hari']; ?>' selected><?php echo $d['nama_hari']; ?></option>
              <option value='1'>Senin</option>
              <option value='2'>Selasa</option>
              <option value='3'>Rabu</option>
              <option value='4'>Kamis</option>
              <option value='5'>Jumat</option>
              <option value='6'>Sabtu</option>
              <option value='0'>Minggu</option>
            </select>
          </div>
          <div class="form-group">
            <label>Jam</label>
            <input class="form-control" type="text" name="jam"
            value="<?php echo $d['jam']; ?>">
          </div>
          <div class="form-group">
            <label>Kuota</label>
            <input class="form-control" type="text" name="kuota"
            value="<?php echo $d['kuota']; ?>">
          </div>
          <?php
          if($d['id_unit']==1){ ?>
            <div class="form-group">
              <label>Imunisasi</label>
              <select class="form-control" type="text" name="ims" required="">
                <option value='<?php echo $d['ims']; ?>' selected><?php echo $d['nama_ims']; ?></option>
                <option value='1'>Ya</option>
                <option value='0'>Yidak</option>
              </select>
            </div>
          <?php } ?>
          <div class="form-group">
            <label>Sesi</label>
            <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
            <select class="form-control" type="text" name="id_sesi" required="">
              <p style="color:red;"><?php echo ($error['id_sesi']) ? $error['id_sesi'] : ''; ?></p>
              <option value='<?php echo $d['id_sesi']; ?>' selected><?php echo $d['nama_sesi']; ?></option>
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
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
        </form>
      </div>
    </div><!-- /.row -->
  <?php } ?>
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>