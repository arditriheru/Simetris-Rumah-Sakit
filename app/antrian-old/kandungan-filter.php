<?php
include "views/header.php";
include "controller/kandungan-controller.php";

if(isset($_POST['submit'])){
  session_start();
  $kandungan_id_dokter          = $_POST['kandungan_id_dokter'];
  $kandungan_id_sesi            = $_POST['kandungan_id_sesi'];
  $kandungan_booking_tanggal    = date('Y-m-d');

  $data = mysqli_query($koneksi,"
    SELECT id_dokter, id_sesi, booking_tanggal
    FROM booking
    WHERE id_dokter='$kandungan_id_dokter'
    AND id_sesi='$kandungan_id_sesi'
    AND booking_tanggal='$kandungan_booking_tanggal'");
  $cek = mysqli_num_rows($data);

  if($cek > 0){

    $_SESSION['kandungan_id_dokter']        = $kandungan_id_dokter;
    $_SESSION['kandungan_id_sesi']          = $kandungan_id_sesi;
    $_SESSION['kandungan_booking_tanggal']  = $kandungan_booking_tanggal;

    if($max>0){
      mysqli_query($koneksi,"DELETE FROM ant_kandungan WHERE id_ant_kandungan!=0");
      mysqli_query($koneksi,"UPDATE ant_kandungan SET status='1' WHERE id_ant_kandungan=0");
      mysqli_query($koneksi,"
        UPDATE dokter
        SET aktif = 0, ket = 0
        WHERE id_unit = 2
        AND ket = 2");
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 2
        WHERE id_dokter='$kandungan_id_dokter'");
    }if($ket>0){
      mysqli_query($koneksi,"
        UPDATE dokter
        SET aktif = 0, ket = 0
        WHERE id_unit = 2
        AND ket = 2");
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 2
        WHERE id_dokter='$kandungan_id_dokter'");
      mysqli_query($koneksi,"
        UPDATE ant_kandungan 
        SET id_sesi = $kandungan_id_sesi, id_dokter = $kandungan_id_dokter
        WHERE id_ant_kandungan=0");
      header("location:kandungan-dashboard.php");
    }else{
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 2
        WHERE id_dokter='$kandungan_id_dokter'");
      mysqli_query($koneksi,"
        UPDATE ant_kandungan 
        SET id_sesi = $kandungan_id_sesi, id_dokter = $kandungan_id_dokter
        WHERE id_ant_kandungan=0");
      header("location:kandungan-dashboard.php");
    }
  }else{
    echo "<script>alert('Tidak Ada jadwal!!');
    document.location='kandungan-filter.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../../vendors/css/style.css">
</head>
<body>
  <div class="kotak_login">
    <p class="tulisan_login"><b>Poli Kandungan</b></p>
    <form method="post" action="" role="form">
      <label>Dokter</label>
      <select class="form_login" type="text" name="kandungan_id_dokter">
        <p style="color:red;"><?php echo ($error['dokter']) ? $error['dokter'] : ''; ?></p>
        <option disabled selected>Pilih</option>
        <?php 
        date_default_timezone_set("Asia/Jakarta");
        $booking_tanggal      = date('Y-m-d');
        $data = mysqli_query($koneksi,
          "SELECT *, dokter.nama_dokter
          FROM booking, dokter
          WHERE booking.id_dokter=dokter.id_dokter
          AND dokter.id_unit=2
          AND booking.booking_tanggal='$booking_tanggal'
          GROUP BY booking.id_dokter;");
        while($d = mysqli_fetch_array($data)){
          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
        }
        ?>
      </select>
      <label>Sesi</label>
      <select class="form_login" type="text" name="kandungan_id_sesi">
        <p style="color:red;"><?php echo ($error['sesi']) ? $error['sesi'] : ''; ?></p>
        <option disabled selected>Pilih</option>
        <?php 
        $data = mysqli_query($koneksi,
          "SELECT * FROM sesi;");
        while($d = mysqli_fetch_array($data)){
          echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
        }
        ?>
      </select>
      <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
    </form>     
  </div>
</body>
</html><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
<?php include "views/footer.php"; ?>