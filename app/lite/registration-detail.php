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
                <div class="col-md-12">
                  <div class="progress mb-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">100%</div>
                  </div>
                  <hr>
                </div><br>
                <?php 
                include 'controller/connection.php';
                $id_booking = $_GET['registration'];

                $data = mysqli_query($koneksi,
                  "SELECT *, dokter.nama_dokter, sesi.nama_sesi
                  FROM booking, dokter, sesi
                  WHERE booking.id_dokter=dokter.id_dokter
                  AND booking.id_sesi=sesi.id_sesi
                  AND booking.id_booking=$id_booking");
                include "date-format.php";
                while($d = mysqli_fetch_array($data)){
                  $id_booking       = $d['id_booking'];
                  $id_catatan_medik = $d['id_catatan_medik'];
                  $nama             = $d['nama'];
                  $id_dokter        = $d['id_dokter'];
                  $nama_dokter      = $d['nama_dokter'];
                  $booking_tanggal  = $d['booking_tanggal'];
                  $id_sesi          = $d['id_sesi'];
                  $nama_sesi        = $d['nama_sesi'];
                  $tanggal          = $d['tanggal'];
                  $jam              = $d['jam'];
                  $keterangan       = $d['keterangan'];
                }
                $hbt = date('w', strtotime($booking_tanggal));
                $c = mysqli_query($koneksi,
                  "SELECT jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt' AND id_sesi='$id_sesi';");
                while($d = mysqli_fetch_array($c)){
                  $jadwal_jam = $d['jam'];
                }
                ?>
                <p class="redtext">**Silahkan screenshot dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
                <table class="table">
                  <tbody>
                    <tr>
                      <td><h5 class="bluetext"><b>Kode</h5></td>
                        <td><h5 class="bluetext"><b><?php echo $id_booking; ?></h5></td>
                        </tr>
                        <tr>
                          <td>No.RM</td>
                          <td><?php echo $id_catatan_medik; ?></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                          <td>Dokter</td>
                          <td><?php echo $nama_dokter; ?></td>
                        </tr>
                        <tr>
                          <td>Jadwal</td>
                          <td><?php echo format_indo($booking_tanggal); ?></td>
                        </tr>
                        <tr>
                          <td>Jam Sesi</td>
                          <td><?php echo $jadwal_jam.' ('.$nama_sesi.')'; ?></td>
                        </tr>
                        <tr>
                          <td>Reservasi</td>
                          <td><?php echo format_indo($tanggal); ?> / <?php echo $jam; ?></td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td><?php echo $keterangan; ?></td>
                        </tr>
                      </tbody>
                    </table>
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