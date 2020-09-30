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
                                if(isset($_POST['schedulesubmit'])){
                                    $id_dokter = $_POST['id_dokter'];
                                }
                                if(!$id_dokter){ ?>
                                    <div class="card-title">
                                        <h4 class="text-center">Jadwal Dokter</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <form action="" method="post" class="">
                                            <div class="row form-group">
                                                <select class="form-control" type="text" name="id_dokter" required="">
                                                    <option value="">Pilih Dokter</option>
                                                    <?php 
                                                    $data = mysqli_query($koneksi,
                                                      "SELECT * FROM dokter WHERE status=1;");
                                                    while($d = mysqli_fetch_array($data)){
                                                        echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div><br>
                                            <div>
                                                <button name="schedulesubmit" id="search-schedule" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="search-schedule-amount">Lihat Jadwal</span>
                                                    <span id="search-schedule-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                <?php }else{ 
                                   $a = mysqli_query($koneksi,
                                      "SELECT nama_dokter
                                      FROM dokter
                                      WHERE id_dokter = $id_dokter;");
                                   while($b = mysqli_fetch_array($a)){
                                    ?>
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
                                              "SELECT *, sesi.nama_sesi,
                                              IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                              FROM dokter_jadwal, sesi
                                              WHERE dokter_jadwal.id_dokter = $id_dokter
                                              AND dokter_jadwal.id_sesi = sesi.id_sesi
                                              AND dokter_jadwal.hari=1;");
                                            while($dt = mysqli_fetch_array($hari)){
                                              ?>
                                              <td><center>Senin</center></td>
                                              <td><center>
                                                <?php echo $dt['jam'].$dt['ims']; } ?>
                                            </center></td>
                                        </tr>
                                        <tr>
                                          <?php
                                          $hari = mysqli_query($koneksi,
                                            "SELECT *, sesi.nama_sesi,
                                            IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                            FROM dokter_jadwal, sesi
                                            WHERE dokter_jadwal.id_dokter = $id_dokter
                                            AND dokter_jadwal.id_sesi = sesi.id_sesi
                                            AND dokter_jadwal.hari=2;");
                                          while($dt = mysqli_fetch_array($hari)){
                                            ?>
                                            <td><center>Selasa</center></td>
                                            <td><center>
                                              <?php echo $dt['jam'].$dt['ims']; } ?>
                                          </center></td>
                                      </tr>
                                      <tr>
                                        <?php
                                        $hari = mysqli_query($koneksi,
                                          "SELECT *, sesi.nama_sesi,
                                          IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                          FROM dokter_jadwal, sesi
                                          WHERE dokter_jadwal.id_dokter = $id_dokter
                                          AND dokter_jadwal.id_sesi = sesi.id_sesi
                                          AND dokter_jadwal.hari=3;");
                                        while($dt = mysqli_fetch_array($hari)){
                                          ?>
                                          <td><center>Rabu</center></td>
                                          <td><center>
                                            <?php echo $dt['jam'].$dt['ims']; } ?>
                                        </center></td>
                                    </tr>
                                    <tr>
                                      <?php
                                      $hari = mysqli_query($koneksi,
                                        "SELECT *, sesi.nama_sesi,
                                        IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                        FROM dokter_jadwal, sesi
                                        WHERE dokter_jadwal.id_dokter = $id_dokter
                                        AND dokter_jadwal.id_sesi = sesi.id_sesi
                                        AND dokter_jadwal.hari=4;");
                                      while($dt = mysqli_fetch_array($hari)){
                                        ?>
                                        <td><center>Kamis</center></td>
                                        <td><center>
                                          <?php echo $dt['jam'].$dt['ims']; } ?>
                                      </center></td>
                                  </tr>
                                  <tr>
                                    <?php
                                    $hari = mysqli_query($koneksi,
                                      "SELECT *, sesi.nama_sesi,
                                      IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                      FROM dokter_jadwal, sesi
                                      WHERE dokter_jadwal.id_dokter = $id_dokter
                                      AND dokter_jadwal.id_sesi = sesi.id_sesi
                                      AND dokter_jadwal.hari=5;");
                                    while($dt = mysqli_fetch_array($hari)){
                                      ?>
                                      <td><center>Jumat</center></td>
                                      <td><center>
                                        <?php echo $dt['jam'].$dt['ims']; } ?>
                                    </center></td>
                                </tr>
                                <tr>
                                  <?php
                                  $hari = mysqli_query($koneksi,
                                    "SELECT *, sesi.nama_sesi,
                                    IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                    FROM dokter_jadwal, sesi
                                    WHERE dokter_jadwal.id_dokter = $id_dokter
                                    AND dokter_jadwal.id_sesi = sesi.id_sesi
                                    AND dokter_jadwal.hari=6;");
                                  while($dt = mysqli_fetch_array($hari)){
                                    ?>
                                    <td><center>Sabtu</center></td>
                                    <td><center>
                                      <?php echo $dt['jam'].$dt['ims']; } ?>
                                  </center></td>
                              </tr>
                              <tr>
                                <?php
                                $hari = mysqli_query($koneksi,
                                  "SELECT *, sesi.nama_sesi,
                                  IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
                                  FROM dokter_jadwal, sesi
                                  WHERE dokter_jadwal.id_dokter = $id_dokter
                                  AND dokter_jadwal.id_sesi = sesi.id_sesi
                                  AND dokter_jadwal.hari=0;");
                                while($dt = mysqli_fetch_array($hari)){
                                  ?>
                                  <td><center>Minggu</center></td>
                                  <td><center>
                                    <?php echo $dt['jam'].$dt['ims']; } ?>
                                </center></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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