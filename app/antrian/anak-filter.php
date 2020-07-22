<?php
include "views/header.php";
include "controller/anak-controller.php";

if(isset($_POST['submit'])){
  session_start();
  $anak_id_dokter          = $_POST['anak_id_dokter'];
  $anak_id_sesi            = $_POST['anak_id_sesi'];
  $anak_booking_tanggal    = date('Y-m-d');

  $data = mysqli_query($koneksi,"
    SELECT id_dokter, id_sesi, booking_tanggal
    FROM booking
    WHERE id_dokter='$anak_id_dokter'
    AND id_sesi='$anak_id_sesi'
    AND booking_tanggal='$anak_booking_tanggal'");
  $cek = mysqli_num_rows($data);

  if($cek > 0){ 

    $_SESSION['anak_id_dokter']        = $anak_id_dokter;
    $_SESSION['anak_id_sesi']          = $anak_id_sesi;
    $_SESSION['anak_booking_tanggal']  = $anak_booking_tanggal;

    if($max>0){
      mysqli_query($koneksi,"DELETE FROM ant_anak WHERE id_ant_anak!=0");
      mysqli_query($koneksi,"UPDATE ant_anak SET status='1' WHERE id_ant_anak=0");
      mysqli_query($koneksi,"
        UPDATE dokter
        SET aktif = 0, ket = 0
        WHERE id_unit = 1
        AND ket = 1");
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 1
        WHERE id_dokter='$anak_id_dokter'");
    }if($ket>0){
      mysqli_query($koneksi,"
        UPDATE dokter
        SET aktif = 0, ket = 0
        WHERE id_unit = 1
        AND ket = 1");
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 1
        WHERE id_dokter='$anak_id_dokter'");
      mysqli_query($koneksi,"
        UPDATE ant_anak 
        SET id_sesi = $anak_id_sesi, id_dokter = $anak_id_dokter
        WHERE id_ant_anak=0");
      header("location:anak-dashboard");
    }else{
      mysqli_query($koneksi,"
        UPDATE dokter 
        SET aktif = 1, ket = 1
        WHERE id_dokter='$anak_id_dokter'");
      mysqli_query($koneksi,"
        UPDATE ant_anak 
        SET id_sesi = $anak_id_sesi, id_dokter = $anak_id_dokter
        WHERE id_ant_anak=0");
      header("location:anak-dashboard");
    }
  }else{
    echo "<script>alert('Tidak Ada Jadwal!!');
    document.location='anak-filter'</script>";
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
    <p class="tulisan_login"><b>POLI ANAK</b></p>
    <form method="post" action="" role="form">
      <label>Dokter</label>
      <select class="form_login" type="text" name="anak_id_dokter">
        <p style="color:red;"><?php echo ($error['dokter']) ? $error['dokter'] : ''; ?></p>
        <option disabled selected>Pilih</option>
        <?php 
        date_default_timezone_set("Asia/Jakarta");
        $booking_tanggal      = date('Y-m-d');
        $data = mysqli_query($koneksi,
          "SELECT *, dokter.nama_dokter
          FROM booking, dokter
          WHERE booking.id_dokter=dokter.id_dokter
          AND dokter.id_unit=1
          AND booking.booking_tanggal='$booking_tanggal'
          GROUP BY booking.id_dokter;");
        while($d = mysqli_fetch_array($data)){
          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
        }
        ?>
      </select>
      <label>Sesi</label>
      <select class="form_login" type="text" name="anak_id_sesi">
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