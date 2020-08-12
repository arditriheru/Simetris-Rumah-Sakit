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
                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">60%</div>
                  </div>
                  <hr>
                </div><br>
                <?php 
                include 'controller/connection.php';
                $id_catatan_medik   = $_POST['id_catatan_medik'];
                $id_dokter          = $_POST['id_dokter'];
                $booking_tanggal    = $_POST['booking_tanggal'];

                $hbt = date('w', strtotime($booking_tanggal));
                $a = mysqli_query($koneksi,
                  "SELECT COUNT(id_jadwal) AS cek_jadwal FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt';");
                while($b = mysqli_fetch_array($a)){
                 $cek_jadwal  = $b['cek_jadwal'];
               }
               if($cek_jadwal>0){
                $c = mysqli_query($koneksi,
                 "SELECT nama_dokter FROM dokter WHERE id_dokter='$id_dokter';");
                while($d = mysqli_fetch_array($c)){
                 $nama_dokter             = $d['nama_dokter'];
               }
               $e = mysqli_query($koneksi,
                 "SELECT nama FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik';");
               while($f = mysqli_fetch_array($e)){
                 $nama             = $f['nama'];
               }
             }else{
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Tidak Ada Jadwal',
                  text: 'Silahkan pilih hari lain',
                  type: 'error'
                  }, function() {
                    window.location = 'javascript: history.back()';
                    });
                    }, 10);
                    </script>";
                  }
                  ?>
                  <form action="registration-d" method="post" class="">
                    <div class="form-group">
                      <label class="control-label mb-1">Nomor Rekam Medik</label>
                      <input class="form-control" type="text" name="id_catatan_medik"
                      value="<?php echo $id_catatan_medik; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Nama Pasien</label>
                      <input class="form-control" type="text" name="nama"
                      value="<?php echo $nama; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label class="control-label mb-1">Nama Dokter</label>
                      <input class="form-control" type="text" name="id_dokter"
                      value="<?php echo $id_dokter; ?>" hidden>
                      <input class="form-control" type="text"
                      value="<?php echo $nama_dokter; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label class="control-label mb-1">Untuk Tanggal</label>
                      <input class="form-control" type="text" name='booking_tanggal'
                      value="<?php echo $booking_tanggal; ?>" readonly>
                    </div>
                    <?php
                    $hari = date('w', strtotime($booking_tanggal));
                    $g = mysqli_query($koneksi,
                     "SELECT dokter_jadwal.`ims`, dokter.`id_unit`
                     FROM dokter_jadwal, dokter
                     WHERE dokter_jadwal.`id_dokter`=dokter.`id_dokter`
                     AND dokter_jadwal.`id_dokter`='$id_dokter'
                     AND dokter_jadwal.`hari`='$hari'
                     GROUP BY dokter.`id_unit`;");
                    while($h = mysqli_fetch_array($g)){
                     $id_unit = $h['id_unit'];
                     $ims     = $h['ims'];
                   }
                   if($id_dokter==5 && $hari==3){ ?>
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading">Pemberitahuan</h4><hr>
                      <p class="blacktext">Jadwal pelayanan khusus imunisasi.</p>
                    </div>
                  <?php }elseif($id_unit==1 && $ims==1){ ?>
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading">Pemberitahuan</h4><hr>
                      <p class="blacktext">Pelayanan imunisasi dilaksanakan di sesi awal poli.</p>
                    </div>
                  <?php } ?>
                  <div class="form-group">
                    <label class="control-label mb-1">Jam Praktek</label>
                    <select class="form-control" type="text" name="id_sesi" required="">
                      <option value="">Pilih</option>
                      <?php
                      $namahari = date('l', strtotime($booking_tanggal));
                      $daftar_hari = array(
                        'Sunday'    => '7',
                        'Monday'    => '1',
                        'Tuesday'   => '2',
                        'Wednesday' => '3',
                        'Thursday'  => '4',
                        'Friday'    => '5',
                        'Saturday'  => '6'
                      );
                      $hari = $daftar_hari[$namahari];
                      $data = mysqli_query($koneksi,
                        "SELECT id_sesi, jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hari';");
                      while($d = mysqli_fetch_array($data)){
                        echo "<option value='".$d['id_sesi']."'>".$d['jam']."</option>";
                      }
                      ?>
                    </select>
                  </div><br>
                  <div>
                    <button id="add" name="add" type="submit" class="btn btn-lg btn-info btn-block">
                      <span id="search-schedule-amount">Lanjutkan</span>
                      <span id="search-schedule-sending" style="display:none;">Sending…</span>
                    </button>
                  </div>
                </form>
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
  <a href="javascript: history.back()" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
  </a>
</nav>
<?php include "views/footer.php"; ?> 