<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
              <div class="card-body">
                <div class="form-group text-center">
                  <img src="images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
                </div>
                <hr>
                <?php
                $id_dokter        = $_POST['id_dokter'];
                $booking_tanggal  = $_POST['booking_tanggal'];
                $id_sesi          = $_POST['id_sesi'];
                include 'controller/connection.php';
                $a = mysqli_query($koneksi,
                  "SELECT COUNT(booking.id_booking) AS total, dokter.nama_dokter, sesi.nama_sesi
                  FROM booking, dokter, sesi
                  WHERE booking.id_dokter = dokter.id_dokter
                  AND booking.id_sesi = sesi.id_sesi
                  AND booking.booking_tanggal = '$booking_tanggal'
                  AND booking.id_sesi = '$id_sesi'
                  AND booking.id_dokter='$id_dokter';");
                while($b = mysqli_fetch_array($a)){
                  ?>
                  <div align="center">
                    <h3>Poliklinik <?php echo $b['nama_sesi'];?></h3><br>
                    <p><b>Tanggal <?php echo format_indo($booking_tanggal);?></b></p>
                    <b class="bluetext"><?php echo $b['nama_dokter'];?></b><br>
                    <h1><?php echo $b['total'];?> Pasien</h1><br>
                    <p>**Jumlah pasien terdaftar bersifat sementara dapat berubah setiap saat kecuali telah memenuhi kuota masing-masing dokter, booking jadwal poli dapat Anda lakukan maksimal H-30</p>
                    </div><?php } ?>
                  </div>
                </div>
              </div>
            </div><!-- .card -->
          </div><!--/.col-->
        </div><!--/.row-->
      </div>
    </div>
    <nav class="nav-bottom">
      <a href="help" class="nav-bottom__link">
        <i class="material-icons nav-bottom__icon">help_outline</i>
        <span class="nav-bottom__text">Help</span>
      </a>
      <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav-bottom__text">Home</span>
      </a>
      <a href="registration" class="nav-bottom__link">
        <i class="material-icons nav-bottom__icon">arrow_back</i>
        <span class="nav-bottom__text">Back</span>
      </a>
    </nav>
    <?php include "views/footer.php"; ?> 