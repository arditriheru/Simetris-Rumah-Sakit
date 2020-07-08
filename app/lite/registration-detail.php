<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
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
            ?>
            <div class="card-body">
              <p class="redtext">**Silahkan screenshot dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
              <table class="table">
                <tbody>
                  <tr>
                    <td><strong class="bluetext">Kode</td>
                      <td><strong class="bluetext"><?php echo $d['id_booking']; ?></td>
                      </tr>
                      <tr>
                        <td>Nomor RM</td>
                        <td><?php echo $d['id_catatan_medik']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><?php echo $d['nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Dokter</td>
                        <td><?php echo $d['nama_dokter']; ?></td>
                      </tr>
                      <tr>
                        <td>Jadwal</td>
                        <td><?php echo format_indo($d['booking_tanggal']); ?></td>
                      </tr>
                      <tr>
                        <td>Sesi</td>
                        <td><?php echo $d['nama_sesi']; ?></td>
                      </tr>
                      <tr>
                        <td>Reservasi</td>
                        <td><?php echo format_indo($d['tanggal']); ?> / <?php echo $d['jam']; ?></td>
                      </tr>
                      <tr>
                        <td>Keterangan</td>
                        <td><?php echo $d['keterangan']; ?></td>
                      </tr>
                    </tbody>
                    </table> <?php } ?>
                  </div>
                </div>
              </div>
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