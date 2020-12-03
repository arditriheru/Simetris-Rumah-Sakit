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
                  <hr></div>
                  <small>**Silahkan klik refresh setiap beberapa saat untuk mengupdate panggilan nomor antrian</small>
                  <hr>
                  <div align="center" class="card-title">
                    <button name="next" type="submit" 
                    class="btn btn-primary" onClick="window.location.reload()"><i class="fa fa-refresh"></i> Refresh</button><br>
                  </div>
                  <small><b>Poli Obsgyn</b></small>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"><center><small>Dokter</small></center></th>
                        <th scope="col"><center><small>Dipanggil</small></center></th>
                        <th scope="col"><center><small>Berikutnya</small></center></th>
                        <th scope="col"><center><small>Total</small></center></th>
                      </tr>
                    </thead>
                    <?php
                    include '../../config/connect.php';
                    $a = mysqli_query($koneksi,
                      "SELECT *, dokter.nama_dokter
                      FROM antrian
                      INNER JOIN dokter
                      ON antrian.id_dokter = dokter.id_dokter
                      WHERE antrian.id_unit = 2;");
                    while($b = mysqli_fetch_array($a)){
                      $a_id_dokter        = $b['id_dokter'];
                      $a_id_unit          = $b['id_unit'];
                      $a_id_sesi          = $b['id_sesi'];
                      $a_nama_dokter      = $b['nama_dokter'];
                      $a_booking_tanggal  = date('Y-m-d');
                    }

                    if(!isset($a_id_dokter)){
                      $a_tcounter     = '0';
                      $a_ncounter     = '0';
                      $a_total        = '0';
                      $a_nama_dokter  = 'Tutup';
                    }else{
                      $c = mysqli_query($koneksi,
                        "SELECT id_booking AS id_booking
                        FROM booking 
                        WHERE booking_tanggal = '$a_booking_tanggal'
                        AND id_dokter = '$a_id_dokter'
                        AND id_sesi = '$a_id_sesi'
                        AND aktif = 1;");
                      while($d = mysqli_fetch_array($c)){
                        $a_id_booking   = $d['id_booking'];
                      }

                      if(!isset($a_id_booking)){
                        $a_tcounter = '0';
                        $a_ncounter = '1';

                        $e = mysqli_query($koneksi,
                          "SELECT COUNT(id_booking) AS total
                          FROM booking 
                          WHERE booking_tanggal = '$a_booking_tanggal'
                          AND id_dokter = '$a_id_dokter'
                          AND id_sesi = '$a_id_sesi';");
                        while($f = mysqli_fetch_array($e)){
                          $a_total    = $f['total'];
                        }
                      }else{
                        $e = mysqli_query($koneksi,
                          "SELECT COUNT(id_booking) AS total
                          FROM booking 
                          WHERE booking_tanggal = '$a_booking_tanggal'
                          AND id_dokter = '$a_id_dokter'
                          AND id_sesi = '$a_id_sesi';");
                        while($f = mysqli_fetch_array($e)){
                          $a_total    = $f['total'];
                        }

                        $g = mysqli_query($koneksi,
                          "SELECT FIND_IN_SET( id_booking, (    
                          SELECT GROUP_CONCAT( id_booking
                          ORDER BY id_booking ASC ) 
                          FROM booking 
                          WHERE booking_tanggal = '$a_booking_tanggal'
                          AND id_dokter = '$a_id_dokter'
                          AND id_sesi = '$a_id_sesi')
                          ) AS noant
                          FROM booking
                          WHERE id_booking = '$a_id_booking';");
                        while($h = mysqli_fetch_array($g)){
                          $a_tcounter   = $h['noant'];
                          $a_ncounter   = $h['noant']+1;
                        }
                      }
                    }
                    ?>
                    <tbody>
                      <tr>
                        <td align="left"><small><?php echo $a_nama_dokter ?></small></td>
                        <td align="center"><small>A<?php echo $a_tcounter; ?></small></td>
                        <td align="center"><small>A<?php echo $a_ncounter; ?></small></td>
                        <td align="center"><small><?php echo $a_total; ?></small></td>
                      </tr>
                    </tbody>
                  </table><br>
                  <hr>
                  <small><b>Poli Anak</b></small>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"><center><small>Dokter</small></center></th>
                        <th scope="col"><center><small>Dipanggil</small></center></th>
                        <th scope="col"><center><small>Berikutnya</small></center></th>
                        <th scope="col"><center><small>Total</small></center></th>
                      </tr>
                    </thead>
                    <?php 
                    $a = mysqli_query($koneksi,
                      "SELECT *, dokter.nama_dokter
                      FROM antrian
                      INNER JOIN dokter
                      ON antrian.id_dokter = dokter.id_dokter
                      WHERE antrian.id_unit = 1;");
                    while($b = mysqli_fetch_array($a)){
                      $b_id_dokter        = $b['id_dokter'];
                      $b_id_unit          = $b['id_unit'];
                      $b_id_sesi          = $b['id_sesi'];
                      $b_nama_dokter      = $b['nama_dokter'];
                      $b_booking_tanggal  = date('Y-m-d');
                    }

                    if(!isset($b_id_dokter)){
                      $b_tcounter     = '0';
                      $b_ncounter     = '0';
                      $b_total        = '0';
                      $b_nama_dokter  = 'Tutup';
                    }else{
                      $c = mysqli_query($koneksi,
                        "SELECT id_booking AS id_booking
                        FROM booking 
                        WHERE booking_tanggal = '$b_booking_tanggal'
                        AND id_dokter = '$b_id_dokter'
                        AND id_sesi = '$b_id_sesi'
                        AND aktif = 1;");
                      while($d = mysqli_fetch_array($c)){
                        $b_id_booking   = $d['id_booking'];
                      }

                      if(!isset($b_id_booking)){
                        $b_tcounter = '0';
                        $b_ncounter = '1';

                        $e = mysqli_query($koneksi,
                          "SELECT COUNT(id_booking) AS total
                          FROM booking 
                          WHERE booking_tanggal = '$b_booking_tanggal'
                          AND id_dokter = '$b_id_dokter'
                          AND id_sesi = '$b_id_sesi';");
                        while($f = mysqli_fetch_array($e)){
                          $b_total    = $f['total'];
                        }
                      }else{
                        $e = mysqli_query($koneksi,
                          "SELECT COUNT(id_booking) AS total
                          FROM booking 
                          WHERE booking_tanggal = '$b_booking_tanggal'
                          AND id_dokter = '$b_id_dokter'
                          AND id_sesi = '$b_id_sesi';");
                        while($f = mysqli_fetch_array($e)){
                          $b_total    = $f['total'];
                        }

                        $g = mysqli_query($koneksi,
                          "SELECT FIND_IN_SET( id_booking, (    
                          SELECT GROUP_CONCAT( id_booking
                          ORDER BY id_booking ASC ) 
                          FROM booking 
                          WHERE booking_tanggal = '$b_booking_tanggal'
                          AND id_dokter = '$b_id_dokter'
                          AND id_sesi = '$b_id_sesi')
                          ) AS noant
                          FROM booking
                          WHERE id_booking = '$b_id_booking';");
                        while($h = mysqli_fetch_array($g)){
                          $b_tcounter   = $h['noant'];
                          $b_ncounter   = $h['noant']+1;
                        }
                      }
                    }
                    ?>
                    <tbody>
                      <tr>
                       <td align="left"><small><?php echo $b_nama_dokter ?></small></td>
                       <td align="center"><small>B<?php echo $b_tcounter; ?></small></td>
                       <td align="center"><small>B<?php echo $b_ncounter; ?></small></td>
                       <td align="center"><small><?php echo $b_total; ?></small></td>
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
  <a href="javascript: history.back()" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
  </a>
</nav>
<?php include "views/footer.php"; ?> 