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
                <?php
                $id_catatan_medik = $_GET['id'];
                $a = mysqli_query($koneksi,
                  "SELECT nama FROM mr_pasien WHERE id_catatan_medik='$id_catatan_medik';");
                while($b = mysqli_fetch_array($a)){
                  $nama = $b['nama'];
                }
                  // jika tombol submit ditekan
                if(isset($_POST['addsubmita'])){
                  $id_dokter        = $_POST['id_dokter'];
                  $booking_tanggal  = $_POST['booking_tanggal'];
                  $id_sesi          = $_POST['id_sesi'];
                  // jika sudah memilih dokter
                  if($id_dokter){
                    $c = mysqli_query($koneksi,
                      "SELECT nama_dokter FROM dokter WHERE id_dokter='$id_dokter';");
                    while($d = mysqli_fetch_array($c)){
                      $nama_dokter = $d['nama_dokter'];
                    }
                    // jika sudah memilih jadwal
                  }if($booking_tanggal){
                    $hbt = date('w', strtotime($booking_tanggal));
                    $e = mysqli_query($koneksi,
                      "SELECT COUNT(id_jadwal) AS cek_jadwal FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt';");
                    while($f = mysqli_fetch_array($e)){
                     $cek_jadwal  = $f['cek_jadwal'];
                   }
                   $g = mysqli_query($koneksi,
                     "SELECT dokter_jadwal.`ims`, dokter.`id_unit`
                     FROM dokter_jadwal, dokter
                     WHERE dokter_jadwal.`id_dokter`=dokter.`id_dokter`
                     AND dokter_jadwal.`id_dokter`='$id_dokter'
                     AND dokter_jadwal.`hari`='$hbt'
                     GROUP BY dokter.`id_unit`;");
                   while($h = mysqli_fetch_array($g)){
                     $ims         = $h['ims'];
                     $id_unit     = $h['id_unit'];
                   }
                   // cek apakah jadwal tersedia
                   if($cek_jadwal<=0){
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Jadwal Kosong',
                        text: 'Silahkan Re-Schedule',
                        type: 'error'
                        }, function() {
                          window.location = 'javascript: history.back()';
                          });
                          }, 10);
                          </script>";
                        }
                        // jika sudah memilih sesi jam
                      }if($id_sesi){
                        $i = mysqli_query($koneksi,
                          "SELECT jam, kuota FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND id_sesi='$id_sesi';");
                        while($j = mysqli_fetch_array($i)){
                          $jam = $j['jam'];
                          $kuota = $j['kuota'];
                        }
                        $k = mysqli_query($koneksi,
                          "SELECT nama, alamat, telp FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
                        while($l = mysqli_fetch_array($k)){
                          $alamat  = $l['alamat'];
                          $telp    = $l['telp'];
                        }
                        $m = mysqli_query($koneksi,
                          "SELECT COUNT(*) AS cek_libur FROM dokter_jadwal_libur WHERE id_dokter='$id_dokter' AND id_sesi='$id_sesi' AND tanggal='$booking_tanggal';");
                        while($n = mysqli_fetch_array($m)){
                          $cek_libur      = $n['cek_libur'];
                        }
                        $o = mysqli_query($koneksi,
                          "SELECT COUNT(id_booking) AS cek FROM booking WHERE booking_tanggal='$booking_tanggal' AND id_dokter='$id_dokter' AND id_sesi='$id_sesi';");
                        while($p = mysqli_fetch_array($o)){
                          $cek = $p['cek'];
                        }
                        // Cek jadwal libur
                        if($cek_libur>0){
                          echo "<script>
                          setTimeout(function() {
                            swal({
                              title: 'Dokter Cuti',
                              text: 'Silahkan Re-Schedule',
                              type: 'error'
                              }, function() {
                                window.location = 'javascript: history.back()';
                                });
                                }, 10);
                                </script>";
                                // cek apakah kuota masih tersedia
                              }if($cek>$kuota){
                                $notifpenuh = true;
                              }
                            }
                          }
                // jika belum memilihi dokter
                          if(!$id_dokter){
                            ?>
                            <div class="col-md-12">
                              <div class="progress mb-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">20%</div>
                              </div>
                              <hr>
                            </div>
                            <form action="" method="post" class="">
                              <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                                <input class="form-control" type="text" name="id_catatan_medik"
                                value="<?php echo $id_catatan_medik; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nama Pasien</label>
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
                                  "SELECT * FROM dokter WHERE status=1;");
                                while($d = mysqli_fetch_array($data)){
                                  echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                                }
                                ?>
                              </select>
                            </div><br>
                            <div>
                              <button id="add" name="addsubmita" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="search-schedule-amount">Lanjutkan</span>
                                <span id="search-schedule-sending" style="display:none;">Sending…</span>
                              </button>
                            </div>
                          </form>
                        <?php }
                        // jika belum memilih jadwal
                        if($id_dokter && !$booking_tanggal){ ?>
                          <div class="col-md-12">
                            <div class="progress mb-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">40%</div>
                            </div>
                            <hr>
                          </div>
                          <form action="" method="post" class="">
                            <div class="form-group">
                              <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
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
                              <label class="control-label mb-1">Jadwal Tersedia</label><br>
                              <?php 
                              $e = mysqli_query($koneksi,
                                "SELECT hari,
                                CASE
                                WHEN dokter_jadwal.hari='1' THEN 'Senin'
                                WHEN dokter_jadwal.hari='2' THEN 'Selasa'
                                WHEN dokter_jadwal.hari='3' THEN 'Rabu'
                                WHEN dokter_jadwal.hari='4' THEN 'Kamis'
                                WHEN dokter_jadwal.hari='5' THEN 'Jumat'
                                WHEN dokter_jadwal.hari='6' THEN 'Sabtu'
                                WHEN dokter_jadwal.hari='0' THEN 'Minggu'
                                END AS nama_hari
                                FROM dokter_jadwal WHERE id_dokter='$id_dokter'
                                GROUP BY hari;");
                              while($f = mysqli_fetch_array($e)){
                                $hari = $f['nama_hari'];
                                $hari_jadwal = array($hari);
                                for($x=0;$x<count($hari_jadwal);$x++){
                                 echo  "<span class='badge badge-success'>".$hari_jadwal[$x]." </span>  ";
                               }
                             }
                             ?>
                           </div>
                           <div class="form-group">
                            <label class="control-label mb-1">Untuk Tanggal</label>
                            <input class="form-control" type="date" name="booking_tanggal"
                            value="<?php echo $d['booking_tanggal']; ?>" required="">
                          </div><br>
                          <div>
                            <button id="add" name="addsubmita" type="submit" class="btn btn-lg btn-info btn-block">
                              <span id="search-schedule-amount">Lanjutkan</span>
                              <span id="search-schedule-sending" style="display:none;">Sending…</span>
                            </button>
                          </div>
                        </form>
                      <?php }
                      // jika belum memilih sesi jam
                      if($booking_tanggal && $booking_tanggal && !$id_sesi){ ?>
                        <div class="col-md-12">
                          <div class="progress mb-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">60%</div>
                          </div>
                          <hr>
                        </div>
                        <form action="" method="post" class="">
                          <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
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
                          // menampilkan notifikasi
                          if($id_dokter==5 && $hbt==3){ ?>
                            <div class="alert alert-danger" role="alert">
                              <h4 class="alert-heading">Peringatan</h4><hr>
                              <p class="blacktext">Jadwal khusus pelayanan imunisasi.</p>
                            </div>
                          <?php }elseif($id_unit==1 && $ims==1){ ?>
                            <div class="alert alert-success" role="alert">
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
                            <button id="add" name="addsubmita" type="submit" class="btn btn-lg btn-info btn-block">
                              <span id="search-schedule-amount">Lanjutkan</span>
                              <span id="search-schedule-sending" style="display:none;">Sending…</span>
                            </button>
                          </div>
                        </form>
                      <?php }
                      // tahap akhir menampilkan detail booking
                      if($booking_tanggal && $booking_tanggal && $id_sesi){ ?>
                        <div class="col-md-12">
                          <div class="progress mb-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">80%</div>
                          </div>
                          <hr>
                        </div>
                        <form action="registration-add-process" method="post" class="">
                          <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
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
                            <input class="form-control" type="text" name='booking_tanggal' value="<?php echo $booking_tanggal; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-1">Sesi Jam</label>
                            <input class="form-control" type="text" name='id_sesi'
                            value="<?php echo $id_sesi; ?>" hidden>
                            <input class="form-control" type="text" value="<?php echo $jam; ?>" readonly>
                          </div><br>
                          <div>
                            <?php
                            // menampilkan notifikasi jika kuota penuh
                            if(isset($notifpenuh)){ ?>
                              <button type="button" class="btn btn-lg btn-danger btn-block">Kuota Penuh</button>
                              <p align="center" class="blacktext">Silahkan Re-Schedule</p>
                            <?php }else{ ?>
                              <p>**Pastikan data sudah terisi dengan benar..</p>
                              <button id="add" name="daftarsubmit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="search-schedule-amount">Daftar Sekarang</span>
                                <span id="search-schedule-sending" style="display:none;">Sending…</span>
                              </button>
                            <?php } ?>
                          </div>
                        </form>
                      <?php } ?>
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