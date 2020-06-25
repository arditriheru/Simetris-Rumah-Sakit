<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit <small>Registrasi</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="tumbang-detail?id_tumbang=<?php echo $id_tumbang?>"><i class="fa fa-eye"></i> Detail</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../../system/welcome.php"?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <font size='3'>Jika pasien melakukan perubahan jadwal, hapus jadwal sebelumnya dan tambahkan jadwal baru!</font>
      </div>
    </div>
  </div><!-- /.row -->
  <?php 
  $id_tumbang = $_GET['id_tumbang'];
  $data = mysqli_query($koneksi,
    "SELECT *, tumbang_petugas.nama_petugas, sesi.nama_sesi,
    IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
    FROM tumbang, tumbang_petugas, sesi
    WHERE tumbang.id_petugas=tumbang_petugas.id_petugas
    AND tumbang.id_sesi=sesi.id_sesi
    AND tumbang.id_tumbang=$id_tumbang;");
  while($d = mysqli_fetch_array($data)){
    $jadwal = $d['jadwal'];

    function format_jadwal($jadwal)
    {
      $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $split = explode('-', $jadwal);
      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    ?>
    <?php
    if(isset($_POST['submit'])){
      $id_tumbang       = $_GET['id_tumbang'];
      $id_catatan_medik = $_POST['id_catatan_medik'];
      $nama             = $_POST['nama'];
      $alamat           = $_POST['alamat'];
      $kontak           = $_POST['kontak'];
      $keterangan       = $_POST['keterangan'];

      $edit=mysqli_query($koneksi,"UPDATE tumbang SET nama='$nama',alamat='$alamat',kontak='$kontak',keterangan='$keterangan' WHERE id_tumbang='$id_tumbang'");
      if($edit){
        echo "<script>alert('Berhasil Mengubah!!!');
        document.location='tumbang-detail?id_tumbang=$id_tumbang'</script>";
      }else{
        echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='tumbang-edit?id_tumbang=$id_tumbang'</script>";
      }
    }
    ?>
    <div class="row">
      <div class="col-lg-6">
        <form method="post" action="" role="form">
          <div class="form-group">
            <label>Nomor Rekam Medik</label>
            <input class="form-control" type="text" name="id_catatan_medik"
            value="<?php echo $d['id_catatan_medik']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama Pasien</label>
            <input class="form-control" type="text" name="nama"
            value="<?php echo $d['nama']; ?>" required="">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" type="text" name="alamat"
            value="<?php echo $d['alamat']; ?>" required="">
          </div>
          <div class="form-group">
            <label>Kontak</label>
            <input class="form-control" type="text" name="kontak"
            value="<?php echo $d['kontak']; ?>" required="">
          </div>
          <div class="form-group">
            <label>Petugas</label>
            <input class="form-control" type="text" name="id_petugas"
            value="<?php echo $d['nama_petugas']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Jadwal</label>
            <input class="form-control" type="text" name="jadwal"
            value="<?php echo format_jadwal($jadwal); ?>" readonly>
          </div>
          <div class="form-group">
            <label>Sesi</label>
            <input class="form-control" type="text" name="nama_sesi"
            value="<?php echo $d['nama_sesi']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input class="form-control" type="text" name="keterangan"
            value="<?php echo $d['keterangan']; ?>"></input>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
        </form>
      </div>
    </div><!-- /.row -->
  <?php } ?>
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>