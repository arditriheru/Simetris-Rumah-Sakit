<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Registrasi <small><?php include 'tanggal-sekarang.php';?></small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><i class="fa fa-check-square-o"></i> Hari Ini</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-12">
      <div class="table-responsive">
        <ul class="nav nav-pills" style="margin-bottom: 15px;">
          <li class="active"><a href="#1" data-toggle="tab">Poliklinik</a></li>
          <li><a href="#2" data-toggle="tab">Tumbuh Kembang</a></li>
          <li><a href="#3" data-toggle="tab">Antenatal Care</a></li>
          <li><a href="#4" data-toggle="tab">Daftar Mandiri</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="1">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <div align="right">
                    <?php 
                    $data = mysqli_query($koneksi,"SELECT COUNT(id_booking) AS total
                      FROM booking
                      WHERE booking.tanggal='$tanggalsekarang';");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                    </div>
                    <table class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <tr>
                          <th><center>No. RM</center></th>
                          <th><center>Nama Pasien</center></th>
                          <th><center>Kontak</center></th>
                          <th><center>Dokter</center></th>
                          <th><center>Jadwal</center></th>
                          <th><center>Sesi</center></th>
                          <th><center>Keterangan</center></th>
                          <th><center>Action</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        $data = mysqli_query($koneksi,"SELECT *, dokter.nama_dokter, sesi.nama_sesi
                          FROM booking, dokter, sesi
                          WHERE booking.id_dokter=dokter.id_dokter
                          AND booking.id_sesi=sesi.id_sesi
                          AND booking.tanggal = '$tanggalsekarang'
                          ORDER BY booking.id_booking DESC;");
                        while($d = mysqli_fetch_array($data)){
                          $booking_tanggal = $d['booking_tanggal'];
                          ?>
                          <tr>
                            <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                            <td><center><?php echo $d['nama']; ?></center></td>
                            <td><center><?php echo $d['kontak']; ?></center></td>
                            <td><center><?php echo $d['nama_dokter']; ?></center></td>
                            <td><center><?php echo date("d/m/Y", strtotime($booking_tanggal)); ?></center></td>
                            <td><center><?php echo $d['nama_sesi']; ?></center></td>
                            <td><center><?php echo $d['keterangan']; ?></center></td>
                            <td>
                              <div align="center">
                                <a href="booking-detail?id_booking=<?php echo $d['id_booking']; ?>"
                                  <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                </div>
                              </td>
                              </tr><?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade in" id="2">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <div align="right">
                            <?php 
                            $data = mysqli_query($koneksi,"SELECT COUNT(id_tumbang) AS total
                              FROM tumbang
                              WHERE tumbang.tanggal='$tanggalsekarang';");
                            while($d = mysqli_fetch_array($data)){
                              ?>
                              <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                            </div>
                            <table class="table table-bordered table-hover table-striped tablesorter">
                              <thead>
                                <tr>
                                  <th><center>No. RM</center></th>
                                  <th><center>Nama Pasien</center></th>
                                  <th><center>Kontak</center></th>
                                  <th><center>Petugas</center></th>
                                  <th><center>Jadwal</center></th>
                                  <th><center>Sesi</center></th>
                                  <th><center>Keterangan</center></th>
                                  <th><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                $data = mysqli_query($koneksi,"SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi FROM tumbang, mr_petugas, sesi
                                  WHERE tumbang.id_petugas=mr_petugas.id_petugas
                                  AND tumbang.id_sesi=sesi.id_sesi
                                  AND tumbang.tanggal = '$tanggalsekarang'
                                  ORDER BY tumbang.id_tumbang DESC;");
                                while($d = mysqli_fetch_array($data)){
                                  $jadwal = $d['jadwal'];
                                  ?>
                                  <tr>
                                    <td><center><?php echo $d['id_catatan_medik']; ?></center>
                                    </td>
                                    <td><center><?php echo $d['nama']; ?></center>
                                    </td>
                                    <td><center><?php echo $d['kontak']; ?></center>
                                    </td>
                                    <td><center><?php echo $d['nama_petugas']; ?></center>
                                    </td>
                                    <td><center><?php echo date("d/m/Y", strtotime($jadwal)); ?></center></td>
                                    <td><center><?php echo $d['nama_sesi']; ?></center>
                                    </td>
                                    <td><center><?php echo $d['keterangan']; ?></center>
                                    </td>
                                    <td>
                                      <div align="center"><a href="tumbang-detail?id_tumbang=<?php echo $d['id_tumbang']; ?>"<button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                      </div>
                                    </td>
                                    </tr><?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade in" id="3">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="table-responsive">
                                <div align="right">
                                  <?php 
                                  $data = mysqli_query($koneksi,"SELECT COUNT(id_anc) AS total
                                    FROM anc
                                    WHERE anc.tanggal='$tanggalsekarang';");
                                  while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                  </div>
                                  <table class="table table-bordered table-hover table-striped tablesorter">
                                    <thead>
                                      <tr>
                                        <th><center>No. RM</center></th>
                                        <th><center>Nama Pasien</center></th>
                                        <th><center>Kontak</center></th>
                                        <th><center>Petugas</center></th>
                                        <th><center>Jadwal</center></th>
                                        <th><center>Sesi</center></th>
                                        <th><center>Keterangan</center></th>
                                        <th><center>Action</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $no = 1;
                                      $data = mysqli_query($koneksi,"SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi FROM anc, mr_petugas, sesi
                                        WHERE anc.id_petugas=mr_petugas.id_petugas
                                        AND anc.id_sesi=sesi.id_sesi
                                        AND anc.tanggal = '$tanggalsekarang'
                                        ORDER BY anc.id_anc DESC;");
                                      while($d = mysqli_fetch_array($data)){
                                        $jadwal = $d['jadwal'];
                                        ?>
                                        <tr>
                                          <td><center><?php echo $d['id_catatan_medik']; ?></center>
                                          </td>
                                          <td><center><?php echo $d['nama']; ?></center>
                                          </td>
                                          <td><center><?php echo $d['kontak']; ?></center>
                                          </td>
                                          <td><center><?php echo $d['nama_petugas']; ?></center>
                                          </td>
                                          <td><center><?php echo date("d/m/Y", strtotime($jadwal)); ?></center></td>
                                          <td><center><?php echo $d['nama_sesi']; ?></center>
                                          </td>
                                          <td><center><?php echo $d['keterangan']; ?></center>
                                          </td>
                                          <td>
                                            <div align="center"><a href="anc-detail?id_anc=<?php echo $d['id_anc']; ?>"<button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                            </div>
                                          </td>
                                          </tr><?php } ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="tab-pane fade in" id="4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="table-responsive">
                                      <div align="right">
                                        <?php 
                                        $data = mysqli_query($koneksi,"SELECT COUNT(id_booking) AS total
                                          FROM booking
                                          WHERE booking.mandiri = '1'
                                          AND booking.tanggal = '$tanggalsekarang';");
                                        while($d = mysqli_fetch_array($data)){
                                          ?>
                                          <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                        </div>
                                        <table class="table table-bordered table-hover table-striped tablesorter">
                                          <thead>
                                            <tr>
                                              <th><center>No. RM</center></th>
                                              <th><center>Nama Pasien</center></th>
                                              <th><center>Kontak</center></th>
                                              <th><center>Dokter</center></th>
                                              <th><center>Jadwal</center></th>
                                              <th><center>Sesi</center></th>
                                              <th><center>Keterangan</center></th>
                                              <th colspan="2"><center>Action</center></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $no = 1;
                                            $data = mysqli_query($koneksi,"SELECT *, dokter.nama_dokter, sesi.nama_sesi,
                                              IF (booking.status='1', 'Datang', 'Belum Datang') AS status
                                              FROM booking, dokter, sesi
                                              WHERE booking.id_dokter=dokter.id_dokter
                                              AND booking.id_sesi=sesi.id_sesi
                                              AND booking.mandiri = '1'
                                              AND booking.tanggal = '$tanggalsekarang'
                                              ORDER BY booking.id_booking DESC;");
                                            while($d = mysqli_fetch_array($data)){
                                              $booking_tanggal = $d['booking_tanggal'];
                                              $status = $d['status'];
                                              ?>
                                              <tr>
                                                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                <td><center><?php echo $d['nama']; ?></center></td>
                                                <td><center><?php echo $d['kontak']; ?></center></td>
                                                <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                <td><center><?php echo date("d/m/Y", strtotime($booking_tanggal)); ?></center></td>
                                                <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                <td><center><?php echo $d['keterangan']; ?></center></td>
                                                <td><center><?php
                                                if($status=='Datang'){
                                                  echo "<button type='button' class='btn btn-success'><i class='fa fa-check'></i></button>";
                                                }else{
                                                  echo "<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
                                                }
                                                ?>
                                              </center></td>
                                              <td>
                                                <div align="center">
                                                  <a href="booking-detail?id_booking=<?php echo $d['id_booking']; ?>"
                                                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                  </div>
                                                </td>
                                                </tr><?php } ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div><!-- /#page-wrapper -->
                          </div><!-- /#wrapper -->
                          <?php include "views/footer.php"; ?>
