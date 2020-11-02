<?php 
session_start();
if(!isset($_SESSION['id'])) {
  header('location:registration');
}
include "views/header.php";
?>
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
                </div><br>
                <?php 
                include 'controller/connection.php';
                $id_booking = $_GET['id'];
                $antrian    = $_GET['no'];
                $data = mysqli_query($koneksi,
                  "SELECT booking.id_catatan_medik, booking.nama, booking.booking_tanggal, booking.tanggal, booking.jam, booking.id_dokter, booking.id_sesi, booking.keterangan, dokter.nama_dokter, sesi.nama_sesi
                  FROM booking, dokter, sesi
                  WHERE booking.id_dokter=dokter.id_dokter
                  AND booking.id_sesi=sesi.id_sesi
                  AND booking.id_booking='$id_booking'");
                include "date-format.php";
                while($d = mysqli_fetch_array($data)){
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
                  $hbt = date('w', strtotime($d['booking_tanggal']));
                }
                $c = mysqli_query($koneksi,
                  "SELECT jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt' AND id_sesi='$id_sesi';");
                while($d = mysqli_fetch_array($c)){
                  $jadwal_jam = $d['jam'];
                }
                ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                  <h4 class="alert-heading">Informasi</h4><hr>
                  <p class="blacktext">Silahkan screenshot dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <table class="table">
                  <tbody>
                    <tr>
                      <td><h5 class="bluetext"><b>Antrian</h5></td>
                        <td>:</td>
                        <td><h5 class="bluetext"><b><?php echo $antrian; ?></h5></td>
                        </tr>
                        <tr>
                          <td>Nomor RM</td>
                          <td>:</td>
                          <td><?php echo $id_catatan_medik; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Pasien</td>
                          <td>:</td>
                          <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Dokter</td>
                          <td>:</td>
                          <td><?php echo "dr. ".$nama_dokter; ?></td>
                        </tr>
                        <tr>
                          <td>Jadwal Poliklinik</td>
                          <td>:</td>
                          <td><?php echo format_indo($booking_tanggal); ?></td>
                        </tr>
                        <tr>
                          <td>Jam Sesi</td>
                          <td>:</td>
                          <td><?php echo $jadwal_jam." WIB". ' ('.$nama_sesi.')'; ?></td>
                        </tr>
                        <tr>
                          <td>Reservasi</td>
                          <td>:</td>
                          <td><?php echo format_indo($tanggal); ?> / <?php echo $jam; ?></td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td>:</td>
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
      <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link">
        <i class="material-icons nav-bottom__icon">arrow_back</i>
        <span class="nav-bottom__text">Back</span>
      </a>
    </nav>
    <?php include "views/footer.php"; ?> 