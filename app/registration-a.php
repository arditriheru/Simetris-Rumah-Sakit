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
                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">20%</div>
                  </div>
                  <hr>
                </div><br>
                <?php 
                include 'controller/connection.php';
                $id_catatan_medik   = $_POST['id_catatan_medik'];
                $tgl_lahir          = $_POST['tgl_lahir'];
                $a = mysqli_query($koneksi,
                  "SELECT COUNT(*) AS cekdata FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik' AND tgl_lahir='$tgl_lahir';");
                while($b = mysqli_fetch_array($a)){
                 $cekdata = $b['cekdata'];
               }if($cekdata > 0){
                $c = mysqli_query($koneksi,
                  "SELECT nama FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik';");
                while($d = mysqli_fetch_array($c)){
                  $nama = $d['nama'];
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
                    <form action="registration-b" method="post" class="">
                      <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                        <input class="form-control" type="text" name="id_catatan_medik"
                        value="<?php echo $id_catatan_medik; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Nama</label>
                        <input class="form-control" type="text" name="nama"
                        value="<?php echo $nama; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Pilih Dokter</label>
                        <select class="form-control" type="text" name="id_dokter"
                        value="<?php echo $d['id_dokter']; ?>" required="">
                        <option value="">Pilih</option>
                        <?php 
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM dokter;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
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
    <a href="registration" class="nav-bottom__link">
      <i class="material-icons nav-bottom__icon">arrow_back</i>
      <span class="nav-bottom__text">Back</span>
    </a>
  </nav>
  <?php include "views/footer.php"; ?> 