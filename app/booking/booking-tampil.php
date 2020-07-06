<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <ul class="nav nav-pills" style="margin-bottom: 15px;">
        <li class="active"><a href="#1" data-toggle="tab">Poliklinik</a></li>
        <li><a href="#2" data-toggle="tab">Tumbuh Kembang</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="1">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <div class="col-lg-8">
                  <form method="post" action="laporan-booking-hari-ini-export" role="form">
                    <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning">Filter</button>
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li disabled selected><a>All</a></li>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT *, dokter.nama_dokter
                          FROM booking, dokter
                          WHERE booking.id_dokter=dokter.id_dokter
                          AND booking.booking_tanggal='$tanggalsekarang'
                          GROUP BY booking.id_dokter;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<li><a href='booking-tab?id_dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
                        }
                        ?>
                      </ul>
                    </div><!-- /btn-group -->
                  </form>
                </div>
                <div align="right" class="col-lg-4">
                  <?php 
                  $data = mysqli_query($koneksi,
                    "SELECT COUNT(id_booking) AS total
                    FROM booking
                    WHERE booking.booking_tanggal='$tanggalsekarang';");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                  </div>
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th><center>#</center></th>
                        <th><center>No. RM</center></th>
                        <th><center>Nama Pasien</center></th>
                        <th><center>Kontak</center></th>
                        <th><center>Dokter</center></th>
                        <th><center>Sesi</center></th>
                        <th><center>Keterangan</center></th>
                        <th colspan='2'><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysqli_query($koneksi,
                        "SELECT *, dokter.nama_dokter, sesi.nama_sesi,
                        IF (booking.status='1', 'Datang', 'Belum Datang') AS status
                        FROM booking, dokter, sesi
                        WHERE booking.id_dokter=dokter.id_dokter
                        AND booking.id_sesi=sesi.id_sesi
                        AND booking.booking_tanggal='$tanggalsekarang'
                        ORDER BY booking.id_sesi, booking.nama ASC;");
                      while($d = mysqli_fetch_array($data)){
                        $id_booking = $d['id_booking'];
                        $status     = $d['status'];
                        ?>
                        <tr>
                          <td><center><?php echo $no++; ?></center></td>
                          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                          <td><center><?php echo $d['nama']; ?></center></td>
                          <td><center><?php echo $d['kontak']; ?></center></td>
                          <td><center><?php echo $d['nama_dokter']; ?></center></td>
                          <td><center><?php echo $d['nama_sesi']; ?></center></td>
                          <td><center><?php echo $d['keterangan']; ?></center></td>
                          <td><center><?php
                          if($status=='Datang'){
                            echo "<a class='whitetext' href='booking-belum-datang-proses?id_booking=$id_booking'><button type='button' class='btn btn-success'><i class='fa fa-check'></i></button></a>";
                          }else{
                            echo "<a class='whitetext' href='booking-datang-proses?id_booking=$id_booking'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                          }
                          ?>
                        </center></td>
                        <td>
                          <div align="center">
                            <a href="booking-detail?id_booking=<?php echo $d['id_booking']; ?>"
                              <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                            </div>
                          </td>
                        </tr>
                        <?php 
                      }
                      ?>
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
                  <?php include "tumbang-tampil.php";?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div><!-- /.row -->