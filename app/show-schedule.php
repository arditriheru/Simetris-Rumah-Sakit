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
                <?php 
                $id_dokter = $_POST['id_dokter'];
                include 'controller/connection.php';
                $no = 1;
                date_default_timezone_set("Asia/Jakarta");
                $tanggalHariIni=date('Y-m-d');
                $a = mysqli_query($koneksi,
                  "SELECT nama_dokter
                  FROM dokter
                  WHERE id_dokter = $id_dokter;");
                while($b = mysqli_fetch_array($a)){
                  ?>
                  <hr>
                  <div class="card-title">
                    <b class="bluetext"><center><?php echo $b['nama_dokter']; } ?></b>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"><center>Hari</center></th>
                            <th scope="col"><center>Pukul</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            $hari = mysqli_query($koneksi,
                              "SELECT *, sesi.nama_sesi
                              FROM dokter_jadwal, sesi
                              WHERE dokter_jadwal.id_dokter = $id_dokter
                              AND dokter_jadwal.id_sesi = sesi.id_sesi
                              AND dokter_jadwal.hari=1;");
                            while($dt = mysqli_fetch_array($hari)){
                              ?>
                              <td><center>Senin</center></td>
                              <td><center>
                                <?php echo $dt['jam']; } ?>
                              </center></td>
                            </tr>
                            <tr>
                              <?php
                              $hari = mysqli_query($koneksi,
                                "SELECT *, sesi.nama_sesi
                                FROM dokter_jadwal, sesi
                                WHERE dokter_jadwal.id_dokter = $id_dokter
                                AND dokter_jadwal.id_sesi = sesi.id_sesi
                                AND dokter_jadwal.hari=2;");
                              while($dt = mysqli_fetch_array($hari)){
                                ?>
                                <td><center>Selasa</center></td>
                                <td><center>
                                  <?php echo $dt['jam']; } ?>
                                </center></td>
                              </tr>
                              <tr>
                                <?php
                                $hari = mysqli_query($koneksi,
                                  "SELECT *, sesi.nama_sesi
                                  FROM dokter_jadwal, sesi
                                  WHERE dokter_jadwal.id_dokter = $id_dokter
                                  AND dokter_jadwal.id_sesi = sesi.id_sesi
                                  AND dokter_jadwal.hari=3;");
                                while($dt = mysqli_fetch_array($hari)){
                                  ?>
                                  <td><center>Rabu</center></td>
                                  <td><center>
                                    <?php echo $dt['jam']; } ?>
                                  </center></td>
                                </tr>
                                <tr>
                                  <?php
                                  $hari = mysqli_query($koneksi,
                                    "SELECT *, sesi.nama_sesi
                                    FROM dokter_jadwal, sesi
                                    WHERE dokter_jadwal.id_dokter = $id_dokter
                                    AND dokter_jadwal.id_sesi = sesi.id_sesi
                                    AND dokter_jadwal.hari=4;");
                                  while($dt = mysqli_fetch_array($hari)){
                                    ?>
                                    <td><center>Kamis</center></td>
                                    <td><center>
                                      <?php echo $dt['jam']; } ?>
                                    </center></td>
                                  </tr>
                                  <tr>
                                    <?php
                                    $hari = mysqli_query($koneksi,
                                      "SELECT *, sesi.nama_sesi
                                      FROM dokter_jadwal, sesi
                                      WHERE dokter_jadwal.id_dokter = $id_dokter
                                      AND dokter_jadwal.id_sesi = sesi.id_sesi
                                      AND dokter_jadwal.hari=5;");
                                    while($dt = mysqli_fetch_array($hari)){
                                      ?>
                                      <td><center>Jumat</center></td>
                                      <td><center>
                                        <?php echo $dt['jam']; } ?>
                                      </center></td>
                                    </tr>
                                    <tr>
                                      <?php
                                      $hari = mysqli_query($koneksi,
                                        "SELECT *, sesi.nama_sesi
                                        FROM dokter_jadwal, sesi
                                        WHERE dokter_jadwal.id_dokter = $id_dokter
                                        AND dokter_jadwal.id_sesi = sesi.id_sesi
                                        AND dokter_jadwal.hari=6;");
                                      while($dt = mysqli_fetch_array($hari)){
                                        ?>
                                        <td><center>Sabtu</center></td>
                                        <td><center>
                                          <?php echo $dt['jam']; } ?>
                                        </center></td>
                                      </tr>
                                      <tr>
                                        <?php
                                        $hari = mysqli_query($koneksi,
                                          "SELECT *, sesi.nama_sesi
                                          FROM dokter_jadwal, sesi
                                          WHERE dokter_jadwal.id_dokter = $id_dokter
                                          AND dokter_jadwal.id_sesi = sesi.id_sesi
                                          AND dokter_jadwal.hari=7;");
                                        while($dt = mysqli_fetch_array($hari)){
                                          ?>
                                          <td><center>Minggu</center></td>
                                          <td><center>
                                            <?php echo $dt['jam']; } ?>
                                          </center></td>
                                        </tr>
                                      </tbody>
                                    </table>
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

                      <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
                        <i class="material-icons nav__icon">dashboard</i>
                        <span class="nav-bottom__text">Home</span>

                        <a href="search-schedule" class="nav-bottom__link">
                          <i class="material-icons nav-bottom__icon">arrow_back</i>
                          <span class="nav-bottom__text">Back</span>

                        </nav>
                        <?php include "views/footer.php"; ?> 