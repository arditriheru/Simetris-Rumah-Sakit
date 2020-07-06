<?php include "views/header.php"; ?>
<?php  $id_booking = $_GET['id_booking']; ?>
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
        <li><a href="booking-detail?id_booking=<?php echo $id_booking?>"><i class="fa fa-eye"></i> Detail</a></li>
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
  $data = mysqli_query($koneksi,
    "SELECT *, dokter.nama_dokter, sesi.nama_sesi
    FROM booking, dokter, sesi
    WHERE booking.id_dokter=dokter.id_dokter
    AND booking.id_sesi=sesi.id_sesi
    AND booking.id_booking=$id_booking;");
  while($d = mysqli_fetch_array($data)){
    $booking_tanggal = $d['booking_tanggal'];
    function format_jadwal($booking_tanggal)
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
      $split = explode('-', $booking_tanggal);
      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    ?>
    <?php
    if(isset($_POST['submit'])){
      $id_booking = $_GET['id_booking'];
      $id_catatan_medik = $_POST['id_catatan_medik'];
      $nama             = $_POST['nama'];
      $alamat           = $_POST['alamat'];
      $kontak           = $_POST['kontak'];
      $id_dokter        = $_POST['id_dokter'];
      $booking_tanggal  = $_POST['booking_tanggal'];
      $id_sesi          = $_POST['id_sesi'];
      $keterangan       = $_POST['keterangan'];

      $edit=mysqli_query($koneksi,"UPDATE booking SET nama='$nama',alamat='$alamat',kontak='$kontak',
        keterangan='$keterangan'
        WHERE id_booking='$id_booking'");
      if($edit){
        echo "<script>alert('Berhasil Mengubah!!!');
        document.location='booking-detail?id_booking=$id_booking'</script>";
      }else{
        echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='booking-edit?id_booking=$id_booking'</script>";
      }
    }
    ?>
    <div class="row">
      <div class="col-lg-6">
        <form method="post" action="" role="form">
          <div class="form-group">
            <label>Nomor RM</label>
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
            <label>Dokter</label>
            <input class="form-control" type="text" name="id_dokter"
            value="<?php echo $d['nama_dokter']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Jadwal</label>
            <input class="form-control" type="text" name="booking_tanggal"
            value="<?php echo format_jadwal($booking_tanggal); ?>" readonly>
          </div>
          <div class="form-group">
            <label>Sesi</label>
            <input class="form-control" type="text" name="id_sesi"
            value="<?php echo $d['nama_sesi']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input class="form-control" type="text" name="keterangan"
            value="<?php echo $d['keterangan']; ?>"></input>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
          <button type="reset" class="btn btn-warning">Reset</button>  
          </form><?php } ?>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>