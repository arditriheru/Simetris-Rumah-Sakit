<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Jadwal <small>Dokter</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calendar"></i> Jadwal</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <form method="post" action="" role="form">
        <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
        <div class="btn-group">
          <?php
          $id_dokter = $_GET['id_dokter'];
          $a = mysqli_query($koneksi,
            "SELECT  nama_dokter
            FROM dokter
            WHERE id_dokter = '$id_dokter';");
          while($b = mysqli_fetch_array($a)){ 
            ?>
            <button type="button" class="btn btn-primary"><?php echo $b['nama_dokter']; ?></button>
          <?php } ?>
          <button type="button" class="btn btn-warning">Pilih Dokter</button>
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" onclick="myFunction()">
            <?php 
            $c = mysqli_query($koneksi,
              "SELECT id_dokter, nama_dokter
              FROM dokter
              GROUP BY id_dokter;");
            while($d = mysqli_fetch_array($c)){
              echo "<li><a href='jadwal-dokter?id_dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
            }
            ?>
          </ul>
        </div><!-- /btn-group -->
      </form>
    </div>
  </div><br>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-xs-12">
         <?php 
         $no = 1;
         date_default_timezone_set("Asia/Jakarta");
         $tanggalHariIni=date('Y-m-d');
         $a = mysqli_query($koneksi,
          "SELECT nama_dokter, dokter.nama_dokter
          FROM dokter_jadwal, dokter
          WHERE dokter_jadwal.id_dokter = dokter.id_dokter
          AND dokter_jadwal.id_dokter = $id_dokter
          GROUP BY dokter_jadwal.id_dokter ASC;");
         while($b = mysqli_fetch_array($a)){}
          ?>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th scope="col"><center>Hari</center></th>
                <th scope="col"><center>Pukul</center></th>
                <th scope="col"><center>Sesi</center></th>
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
                  AND dokter_jadwal.hari=2;");
                while($dt = mysqli_fetch_array($hari)){
                  ?>
                  <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Senin</a></center></td>
                  <td><center>
                    <?php echo $dt['jam']; ?>
                  </center></td>
                  <td><center>
                    <?php echo $dt['nama_sesi']; } ?>
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
                    <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Selasa</a></center></td>
                    <td><center>
                      <?php echo $dt['jam']; ?>
                    </center></td>
                    <td><center>
                      <?php echo $dt['nama_sesi']; } ?>
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
                      <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Rabu</a></center></td>
                      <td><center>
                        <?php echo $dt['jam']; ?>
                      </center></td>
                      <td><center>
                        <?php echo $dt['nama_sesi']; } ?>
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
                        <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Kamis</a></center></td>
                        <td><center>
                          <?php echo $dt['jam']; ?>
                        </center></td>
                        <td><center>
                          <?php echo $dt['nama_sesi']; } ?>
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
                          <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Jumat</a></center></td>
                          <td><center>
                            <?php echo $dt['jam']; ?>
                          </center></td>
                          <td><center>
                            <?php echo $dt['nama_sesi']; } ?>
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
                            <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Sabtu</a></center></td>
                            <td><center>
                              <?php echo $dt['jam']; ?>
                            </center></td>
                            <td><center>
                              <?php echo $dt['nama_sesi']; } ?>
                            </center></td>
                          </tr>
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
                              <td><center><a href="jadwal-edit?id_jadwal=<?php echo $dt['id_jadwal'];?>">Minggu</a></center></td>
                              <td><center>
                                <?php echo $dt['jam']; ?>
                              </center></td>
                              <td><center>
                                <?php echo $dt['nama_sesi']; } ?>
                              </center></td>
                            </tr>
                          </tbody>
                        </table>
                        <a href="jadwal-tambah?id_dokter=<?php echo $id_dokter; ?>"><button type="button" class="btn btn-success">Tambah</button></a>
                      </div>
                    </div>
                  </div>
                </div><!-- /#wrapper -->
                <?php include "views/footer.php"; ?> 