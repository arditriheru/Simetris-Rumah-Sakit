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
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">80%</div>
                  </div>
                  <hr>
                </div><br>
                <?php 
                include 'controller/connection.php';
                $id_catatan_medik   = $_POST['id_catatan_medik'];
                $id_dokter          = $_POST['id_dokter'];
                $booking_tanggal    = $_POST['booking_tanggal'];
                $id_sesi            = $_POST['id_sesi'];
                $a = mysqli_query($koneksi,
                  "SELECT nama_dokter FROM dokter WHERE id_dokter='$id_dokter';");
                while($b = mysqli_fetch_array($a)){
                  $nama_dokter = $b['nama_dokter'];
                }
                $c = mysqli_query($koneksi,
                  "SELECT nama, alamat, telp FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
                while($d = mysqli_fetch_array($c)){
                  $nama    = $d['nama'];
                  $alamat  = $d['alamat'];
                  $telp    = $d['telp'];
                }
                $e = mysqli_query($koneksi,
                  "SELECT jam FROM dokter_jadwal WHERE id_sesi='$id_sesi';");
                while($f = mysqli_fetch_array($e)){
                  $jam = $f['jam'];
                }
                ?>
                <form action="registration-add-process" method="post" class="">
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
                    <label for="cc-payment" class="control-label mb-1">Alamat</label>
                    <input class="form-control" type="text" name="alamat"
                    value="<?php echo $alamat; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Kontak</label>
                    <input class="form-control" type="text" name="kontak"
                    value="<?php echo $telp; ?>" required="">
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
                  <div class="form-group">
                    <label class="control-label mb-1">Sesi Jam</label>
                    <input class="form-control" type="text" name='id_sesi'
                    value="<?php echo $id_sesi; ?>" hidden>
                    <input class="form-control" type="text" 
                    value="<?php echo $jam; ?>" readonly>
                  </div><br>
                  <div>
                    <button id="add" name="add" type="submit" class="btn btn-lg btn-info btn-block">
                      <span id="search-schedule-amount">Daftar Sekarang</span>
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
  <a href="registration" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
  </a>
</nav>
<?php include "views/footer.php"; ?> 