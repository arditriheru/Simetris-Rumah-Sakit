<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <?php 
          include 'controller/connection.php';
          $id_catatan_medik = $_POST['id_catatan_medik'];
          $booking_tanggal = $_POST['booking_tanggal'];
          
          $pesan=array();
          if(isset($_POST['print'])){
            include 'controller/connection.php';
            $a = mysqli_query($koneksi,
              "SELECT COUNT(*) AS cek
              FROM booking
              WHERE id_catatan_medik='$id_catatan_medik'
              AND booking_tanggal='$booking_tanggal';");
            while($b = mysqli_fetch_array($a)){
              $cek = $b['cek'];
            }if($cek==0){
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Tidak Ditemukan',
                  text: 'Belum Pernah Mendaftar!',
                  type: 'error'
                  }, function() {
                    window.location = 'registration';
                    });
                    }, 10);
                    </script>";
                  }else{
                    $data = mysqli_query($koneksi,
                      "SELECT *, dokter.nama_dokter, sesi.nama_sesi
                      FROM booking, dokter, sesi
                      WHERE booking.id_dokter=dokter.id_dokter
                      AND booking.id_sesi=sesi.id_sesi
                      AND booking.id_catatan_medik=$id_catatan_medik
                      AND booking.booking_tanggal='$booking_tanggal'
                      ORDER BY id_booking ASC");
                    include "date-format.php";
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <div class="card-body">
                        <p class="redtext">**Silahkan screenshot dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
                        <table class="table">
                          <tbody>
                            <tr>
                              <td><h5 class="bluetext"><b>Kode</h5></td>
                                <td><h5 class="bluetext"><b><?php echo $d['id_booking']; ?></h5></td>
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
                              </tbody>
                              </table> <?php }}} ?>
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