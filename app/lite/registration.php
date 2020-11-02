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
                <ul class="nav nav-pills nav-justified mb-3 mt-2" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Antrian</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Daftar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Cetak</a>
                  </li>
                </ul>
                <?php
                unset($_SESSION['id']);
                if(isset($_POST['ceklogin'])){
                  $id_catatan_medik = $_POST['id_catatan_medik'];
                  $tgl_lahir        = $_POST['tgl_lahir'];

                  $a = mysqli_query($koneksi,
                    "SELECT COUNT(id_catatan_medik) AS cekdata FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik' AND tgl_lahir='$tgl_lahir';");
                  while($b = mysqli_fetch_array($a)){
                   $cekdata = $b['cekdata'];
                 }
                 if($cekdata>0){
                  session_start();
                  $_SESSION['id'] = "$id_catatan_medik";
                  echo "<script>document.location='registration-form'</script>";
                }else{
                  echo "<script>alert('Usernama / Password Salah');document.location='javascript: history.back()'</script>";
                }
              }
              ?>
              <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="card-body card-block">
                    <form action="queue-check" method="post" role="form">
                      <div class="form-group">
                        <label>Nama Dokter</label>
                        <select class="form-control" type="text" name="id_dokter" required="">
                          <option value="">Pilih</option>
                          <?php 
                          include 'controller/connection.php';
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM dokter WHERE status=1;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jadwal Poli</label>
                        <input class="form-control" type="date" name="booking_tanggal" required="" placeholder="Masukkan Jadwal Poli">
                      </div>
                      <div class="form-group">
                        <label>Sesi</label>
                        <select class="form-control" type="text" name="id_sesi" required="">
                          <option value="">Pilih</option>
                          <?php 
                          include 'controller/connection.php';
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM sesi ORDER BY id_sesi ASC;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div>
                        <button id="cekantrian" name="cek" type="submit" class="btn btn-lg btn-info btn-block">
                          <span id="search-schedule-amount">Lihat Antrian</span>
                          <span id="search-schedule-sending" style="display:none;">Sending…</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="col-md-12">
                    <b class="bluetext">Ketentuan Umum Pendaftaran Online</b><br><br>
                    <ol>
                      <li>Pendaftaran Online sementara ini hanya berlaku bagi Pasien yang telah memiliki Nomor Rekam Medis RSKIA Rachmi yang akan berobat Rawat Jalan.</li>
                      <li>Bagi pasien baru yang belum pernah mendaftar di RSKIA Rachmi harap datang langsung ke bagian pendaftaran dengan membawa 1 lembar FC KTP.</li>
                      <li>Pendaftaran Online dapat dilakukan untuk kontrol Poli dengan Jadwal H-30 s.d hari H saat jadwal kontrol dilakukan dengan memasukkan : Nomor RM , Tanggal Lahir, Pilihan Hari Kontrol dan Dokter untuk poli reguler. Dokter yang ditunjuk adalah dokter DPJP (Dokter Penanggung Jawab Pelayanan).</li>
                      <li>Pasien hanya dapat mendaftar sekali pada Dokter, Jadwal dan Sesi yang sama.</li>
                      <li>Jadwal Dokter dapat berubah sewaktu waktu.</li>
                      <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat di (screenshot) dan ditunjukkan pada saat Jadwal Kontrol.</li>
                      <li>Apabila Anda ingin melihat detail Pendaftaran Online pada sub-menu Cetak Ulang di halaman ini.</li>
                      <li>Nomor Antrian Periksa dokter adalah sesuai dengan urutan ketika melakukan registrasi ulang.</li>
                      <li>Untuk kasus Gawat Darurat silakan datang ke UGD RSKIA Rachmi.</li>
                      <li>Bukti Pendaftaran Online dibawa di loket Pendaftaran RSKIA Rachmi.</li>
                      <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu.</li>
                    </ol>
                    <b class="bluetext">Ketentuan Khusus</b><br><br>
                    <ol>
                      <li>Pasien dari luar kota wajib membawa hasil Non-Reaktif Rapid Test.</li>
                      <li>Periksa Poli Anak pendamping 1 orang.</li>
                      <li>Periksa Poli Kandungan pendamping menunggu diluar.</li>
                      <li>Selama pandemi tidak melayani USG 4D sampai batas waktu yang belum ditentukan.</li>
                    </ol><hr>
                  </div><br>
                  <div class="card-body card-block">
                    <form action="" method="post" role="form">
                     <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                      <input name="id_catatan_medik" type="text" class="form-control" required="" placeholder="Masukkan Nomor RM Anda">
                    </div>
                    <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Tanggal Lahir</label>
                      <input name="tgl_lahir" type="date" class="form-control" required="" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div>
                      <button id="registration" name="ceklogin" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="search-schedule-amount">Login</span>
                        <span id="search-schedule-sending" style="display:none;">Sending…</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card-body card-block">
                  <form method="post" action="registration-print" role="form">
                    <div class="form-group">
                      <label>Nomor Rekam Medik</label>
                      <input class="form-control" type="text" name="id_catatan_medik" required="" placeholder="Masukkan Nomor RM Anda">
                    </div>
                    <div class="form-group">
                      <label>Nama Dokter</label>
                      <select class="form-control" type="text" name="id_dokter" required="">
                        <option value="">Pilih</option>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM dokter WHERE status=1;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jadwal Poli</label>
                      <input class="form-control" type="date" name="booking_tanggal">
                    </div>
                    <div class="form-group">
                      <label>Sesi Poli</label>
                      <p class="bluetext"><b>Pagi :</b> 07.00 - 10.59 | <b>Siang :</b> 11.00 - 14.59 | <b>Sore :</b> 15.00 - 17.59 | <b>Malam :</b> 18.00 - selesai</p>
                      <select class="form-control" type="text" name="id_sesi" required="">
                        <option value="">Pilih</option>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM sesi;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div>
                      <button id="cetak" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="search-schedule-amount">Cetak</span>
                        <span id="search-schedule-sending" style="display:none;">Sending…</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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