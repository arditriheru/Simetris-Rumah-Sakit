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
    <?php $id_jadwal = $_GET['id_jadwal']; ?>
    <div align="right" class="col-lg-6">
      <a href="jadwal-hapus?id_jadwal=<?php echo $id_jadwal; ?>"
        onclick="javascript: return confirm('Anda yakin hapus?')">
        <button type="button" class="btn btn-danger">Hapus</button>
      </a>
    </div>
  </div><!-- /.row -->
  <?php 
  $data = mysqli_query($koneksi,
    "SELECT *, dokter.nama_dokter
    FROM jadwal, dokter
    WHERE jadwal.id_dokter=dokter.id_dokter
    AND jadwal.id_jadwal='$id_jadwal';");
  while($d = mysqli_fetch_array($data)){
    ?>
    <?php
    if(isset($_POST['submit'])){
      $senin      = $_POST['senin'];
      $selasa     = $_POST['selasa'];
      $rabu       = $_POST['rabu'];
      $kamis      = $_POST['kamis'];
      $jumat      = $_POST['jumat'];
      $sabtu      = $_POST['sabtu'];
      $minggu     = $_POST['minggu'];

      $edit=mysqli_query($koneksi,"UPDATE jadwal SET sen='$senin',sel='$selasa',rab='$rabu',
        kam='$kamis',jum='$jumat',sab='$sabtu',min='$minggu' WHERE id_jadwal='$id_jadwal'");
      if($edit){
        echo "<script>alert('Berhasil Mengubah!!!');
        document.location='jadwal-dokter'</script>";
      }else{
        echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='jadwal-edit?id_jadwal=$id_jadwal'</script>";
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
            <label>Senin</label>
            <input class="form-control" type="text" name="senin"
            value="<?php echo $d['sen']; ?>">
          </div>
          <div class="form-group">
            <label>Selasa</label>
            <input class="form-control" type="text" name="selasa"
            value="<?php echo $d['sel']; ?>">
          </div>
          <div class="form-group">
            <label>Rabu</label>
            <input class="form-control" type="text" name="rabu"
            value="<?php echo $d['rab']; ?>">
          </div>
          <div class="form-group">
            <label>Kamis</label>
            <input class="form-control" type="text" name="kamis"
            value="<?php echo $d['kam']; ?>">
          </div>
          <div class="form-group">
            <label>Jumat</label>
            <input class="form-control" type="text" name="jumat"
            value="<?php echo $d['jum']; ?>">
          </div>
          <div class="form-group">
            <label>Sabtu</label>
            <input class="form-control" type="text" name="sabtu"
            value="<?php echo $d['sab']; ?>">
          </div>
          <div class="form-group">
            <label>Minggu</label>
            <input class="form-control" type="text" name="minggu"
            value="<?php echo $d['min']; ?>">
          </div>
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
        </form>
      </div>
    </div><!-- /.row -->
  <?php } ?>
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>