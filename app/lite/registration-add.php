<?php include "views/header.php"; ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
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
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="col-md-12">
                <div class="jumbotron">
                  <h5 class="bluetext"><b>Tips Pendaftaran Online</b></h5><br>
                  <ol>
                   <li>Sebaiknya melihat jadwal dokter terlebih dahulu sebelum melakukan pendaftaran online dikarenakan jadwal dokter dapat berubah sewaktu-waktu.</li>
                   <li>Pastikan jadwal dokter dan sesi yang dipilih sesuai dengan jadwal yang tersedia, kesalahan dalam memilih jadwal dan sesi dapat menyebabkan data pasien tidak muncul dalam sistem.</li>
                 </ol>
               </div>
             </div>
           </div>
           <form action="registration-add-process" method="post" class="">
            <div class="form-group">
              <label class="control-label mb-1">No.Rekam Medik</label>
              <input class="form-control" type="text" name="id_catatan_medik"
              value="<?php echo $id_catatan_medik; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Nama</label>
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
            <label class="control-label mb-1">Untuk Tanggal</label>
            <input class="form-control" type="date" name="booking_tanggal"
            value="<?php echo $d['booking_tanggal']; ?>" required="">
          </div>
          <div class="form-group">
            <label class="control-label mb-1">Sesi</label>
            <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
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
        </div>
        <button type="submit" name="add" class="btn btn-primary">Daftar</button>
      </form>
    </div>
    <!-- /# column -->
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