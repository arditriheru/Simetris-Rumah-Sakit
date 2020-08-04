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
                  <b class="bluetext"><b>Tips Pendaftaran Online</b></b><br><br>
                  <ol>
                   <li>Sebaiknya melihat jadwal dokter terlebih dahulu sebelum melakukan pendaftaran online dikarenakan jadwal dokter dapat berubah sewaktu-waktu.</li>
                   <li>Pastikan jadwal dokter dan sesi yang dipilih sesuai dengan jadwal yang tersedia, kesalahan dalam memilih jadwal dan sesi dapat menyebabkan data pasien tidak muncul dalam sistem.</li>
                 </ol><hr>
               </div><br>
               <?php 
               include 'controller/connection.php';
               $id_catatan_medik   = $_POST['id_catatan_medik'];
               $tgl_lahir          = $_POST['tgl_lahir'];
               $a = mysqli_query($koneksi,
                "SELECT COUNT(*) AS cekdata FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik' AND tgl_lahir='$tgl_lahir';");
               while($b = mysqli_fetch_array($a)){
                 $cekdata = $b['cekdata'];
               }
               if($cekdata > 0){
                $c = mysqli_query($koneksi,
                  "SELECT * FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik' AND tgl_lahir='$tgl_lahir';");
                while($d = mysqli_fetch_array($c)){
                  $id_catatan_medik = $d['id_catatan_medik'];
                  $nama             = $d['nama'];
                  $alamat           = $d['alamat'];
                  $telp             = $d['telp'];
                }
              }else{
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Gagal',
                    text: 'Nomor RM / Tanggal Lahir Salah!',
                    type: 'error'
                    }, function() {
                      window.location = 'registration';
                      });
                      }, 10);
                      </script>";
                    }
                    ?>
                    <form action="registration-add-process" method="post" class="">
                      <div class="form-group">
                        <label class="control-label mb-1">Nomor Rekam Medik</label>
                        <input class="form-control" type="text" name="id_catatan_medik"
                        value="<?php echo $id_catatan_medik; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-1">Nama Pasein</label>
                        <input class="form-control" type="text" name="nama"
                        value="<?php echo $nama; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-1">Alamat</label>
                        <input class="form-control" type="text" name="alamat"
                        value="<?php echo $alamat; ?>" required="">
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-1">Kontak</label>
                        <input class="form-control" type="text" name="kontak"
                        value="<?php echo $telp; ?>" required="">
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-1">Dokter</label>
                        <select class="form-control" type="text" name="id_dokter"
                        value="<?php echo $d['id_dokter']; ?>" required="">
                        <option disabled selected>Pilih</option>
                        <?php 
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM dokter;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label mb-1">Jadwal</label>
                      <input class="form-control" type="date" name="booking_tanggal"
                      value="<?php echo $d['booking_tanggal']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label mb-1">Sesi</label><br>
                      <small class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</small><br><br>
                      <select class="form-control" type="text" name="id_sesi"
                      value="<?php echo $d['id_sesi']; ?>" required="">
                      <option disabled selected>Pilih</option>
                      <?php 
                      include '../koneksi.php';
                      $data = mysqli_query($koneksi,
                        "SELECT * FROM sesi;");
                      while($d = mysqli_fetch_array($data)){
                        echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                      }
                      ?>
                    </select>
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