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
  $id_dokter  = $_GET['id_dokter'];
  $data = mysqli_query($koneksi,
    "SELECT nama_dokter, id_unit
    FROM dokter
    WHERE id_dokter = '$id_dokter';");
  while($d = mysqli_fetch_array($data)){
    $nama_dokter = $d['nama_dokter'];
    $id_unit     = $d['id_unit'];
  }
  if(isset($_POST['submit'])){
    $hari     = $_POST['hari'];
    $jam      = $_POST['jam'];
    $id_sesi  = $_POST['id_sesi'];
    $kuota    = $_POST['kuota'];
    $ims      = $_POST['ims'];

    $tambah=mysqli_query($koneksi,"INSERT INTO dokter_jadwal(id_jadwal, id_dokter, id_sesi, hari, jam, kuota, ims)
      VALUES('','$id_dokter','$id_sesi','$hari','$jam','$kuota','$ims')");
    if($tambah){
      echo "<script>alert('Berhasil Menambah Jadwal!!!');
      document.location='jadwal-dokter?id_dokter=$id_dokter'</script>";
    }else{
      echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='jadwal-dokter?id_dokter=$id_dokter'</script>";
    }
  }
  ?>
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Nama Dokter</label>
          <input class="form-control" type="text" name="id_dokter"
          value="<?php echo $nama_dokter; ?>" readonly>
        </div>
        <div class="form-group">
          <label>Hari</label>
          <select class="form-control" type="text" name="hari" required="">
            <option value=''>Pilih</option>
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
          <input class="form-control" type="text" name="jam" placeholder="Masukkan.." required="">
        </div>
        <div class="form-group">
          <label>Kuota</label>
          <input class="form-control" type="text" name="kuota" placeholder="Masukkan.." required="">
        </div>
        <?php
        if($id_unit==1){ ?>
          <div class="form-group">
            <label>Imunisasi</label>
            <select class="form-control" type="text" name="ims" required="">
              <option value='0' selected>Tidak</option>
              <option value='1'>Ya</option>
            </select>
          </div>
        <?php } ?>
        <div class="form-group">
          <label>Sesi</label>
          <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
          <select class="form-control" type="text" name="id_sesi" required="">
            <option value=''>Pilih</option>
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