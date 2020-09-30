<?php include "views/header.php"; ?>
<?php
$id_dokter = $_GET['id_dokter'];
$a=mysqli_query($koneksi,
  "SELECT nama_dokter
  FROM dokter
  WHERE id_dokter = '$id_dokter';");
while($b = mysqli_fetch_array($a)){
 $nama_dokter = $b['nama_dokter'];
}
?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Jadwal <small><?php include 'tanggal-sekarang.php';?></small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> Dokter <?php echo $nama_dokter ?> </li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div class="btn-group">
          <button type="button" class="btn btn-warning">Filter</button>
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li disabled selected><a href="dashboard">All</a></li>
            <?php 
            $data = mysqli_query($koneksi,
              "SELECT *, dokter.nama_dokter
              FROM booking, dokter
              WHERE booking.id_dokter=dokter.id_dokter
              AND booking.booking_tanggal='$tanggalsekarang'
              GROUP BY booking.id_dokter;");
            while($d = mysqli_fetch_array($data)){
              echo "<li><a href='booking-tab.php?id_dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
            }
            ?>
          </ul>
        </div><br><br><!-- /btn-group -->
        <div class="row">
          <div class="col-lg-12">
            <ul class="nav nav-tabs" style="margin-bottom: null;">
              <li class="active"><a href="#0" data-toggle="tab">All</a></li>
              <li><a href="#1" data-toggle="tab">Pagi</a></li>
              <li><a href="#2" data-toggle="tab">Siang</a></li>
              <li><a href="#3" data-toggle="tab">Sore</a></li>
              <li><a href="#4" data-toggle="tab">Malam</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
             <?php if($status=='Admin'){ ?>
              <div class="tab-pane fade active in" id="0">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <div align="right">
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT COUNT(*) AS total
                          FROM booking
                          WHERE booking.id_dokter='$id_dokter'
                          AND booking.booking_tanggal='$tanggalsekarang';");
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
                              <!-- <th><center>Kontak</center></th> -->
                              <th><center>Dokter</center></th>
                              <th><center>Sesi</center></th>
                              <th><center>Keterangan</center></th>
                              <th colspan='3'><center>Action</center></th>
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
                              AND booking.id_dokter='$id_dokter'
                              ORDER BY booking.id_sesi, booking.id_booking ASC;");
                            while($d = mysqli_fetch_array($data)){
                             $id_booking = $d['id_booking'];
                             $status     = $d['status'];
                             $sub_kontak = substr($d['kontak'],1);
                             ?>
                             <tr>
                              <td><center><?php echo $no++; ?></center></td>
                              <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                              <td><center><?php echo $d['nama']; ?></center></td>
                              <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                              <td><center><?php echo $d['nama_dokter']; ?></center></td>
                              <td><center><?php echo $d['nama_sesi']; ?></center></td>
                              <td><center><?php echo $d['keterangan']; ?></center></td>
                              <td><center><?php
                              if($status=='Datang'){
                                echo "<form method='post' action='booking-belum-datang-proses-tab.php' role='form'>
                                <input type='text' name='id_booking'
                                value='$id_booking;' hidden>
                                <input type='text' name='id_dokter'
                                value='$id_dokter' hidden>
                                <button type='submit' class='btn btn-primary'><i class='fa fa-check'></i></button>
                                </form>";
                              }else{
                                echo "<form method='post' action='booking-datang-proses-tab.php' role='form'>
                                <input type='text' name='id_booking'
                                value='$id_booking;' hidden>
                                <input type='text' name='id_dokter'
                                value='$id_dokter' hidden>
                                <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                                </form>";
                              }
                              ?>
                            </center></td>
                            <!-- <td>
                              <div align="center">
                                <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
                                  <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                </div>
                              </td> -->
                              <td>
                                <div align="center">
                                  <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                  </div>
                                </td>
                                <td>
                                  <div align="center">
                                    <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                                      <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                                    </div>
                                  </td>
                                  </tr><?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="1">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="table-responsive">
                              <div align="right" class="col-lg-12">
                                <?php 
                                $data = mysqli_query($koneksi,
                                  "SELECT COUNT(*) AS total
                                  FROM booking
                                  WHERE booking.id_dokter='$id_dokter'
                                  AND booking.id_sesi='1'
                                  AND booking.booking_tanggal='$tanggalsekarang';");
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
                                      <!-- <th><center>Kontak</center></th> -->
                                      <th><center>Dokter</center></th>
                                      <th><center>Sesi</center></th>
                                      <th><center>Keterangan</center></th>
                                      <th colspan='3'><center>Action</center></th>
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
                                      AND booking.id_dokter='$id_dokter'
                                      AND booking.id_sesi='1'
                                      ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                    while($d = mysqli_fetch_array($data)){
                                      $id_booking = $d['id_booking'];
                                      $status     = $d['status'];
                                      $sub_kontak = substr($d['kontak'],1);
                                      ?>
                                      <tr>
                                        <td><center><?php echo $no++; ?></center></td>
                                        <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                        <td><center><?php echo $d['nama']; ?></center></td>
                                        <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                        <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                        <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                        <td><center><?php echo $d['keterangan']; ?></center></td>
                                        <td><center><?php
                                        if($status=='Datang'){
                                          echo "<form method='post' action='booking-belum-datang-proses-tab.php' role='form'>
                                          <input type='text' name='id_booking'
                                          value='$id_booking;' hidden>
                                          <input type='text' name='id_dokter'
                                          value='$id_dokter' hidden>
                                          <button type='submit' class='btn btn-primary'><i class='fa fa-check'></i></button>
                                          </form>";
                                        }else{
                                          echo "<form method='post' action='booking-datang-proses-tab.php' role='form'>
                                          <input type='text' name='id_booking'
                                          value='$id_booking;' hidden>
                                          <input type='text' name='id_dokter'
                                          value='$id_dokter' hidden>
                                          <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                                          </form>";
                                        }
                                        ?>
                                      </center></td>
                                    <!-- <td>
                                      <div align="center">
                                        <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
                                          <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                        </div>
                                      </td> -->
                                      <td>
                                        <div align="center">
                                          <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                            <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                          </div>
                                        </td>
                                        <td>
                                          <div align="center">
                                            <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                                              <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                                            </div>
                                          </td>
                                          </tr><?php } ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="2">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="table-responsive">
                                     <div align="right" class="col-lg-12">
                                      <?php 
                                      $data = mysqli_query($koneksi,
                                        "SELECT COUNT(*) AS total
                                        FROM booking
                                        WHERE booking.id_dokter='$id_dokter'
                                        AND booking.id_sesi='2'
                                        AND booking.booking_tanggal='$tanggalsekarang';");
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
                                            <!-- <th><center>Kontak</center></th> -->
                                            <th><center>Dokter</center></th>
                                            <th><center>Sesi</center></th>
                                            <th><center>Keterangan</center></th>
                                            <th colspan='3'><center>Action</center></th>
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
                                            AND booking.id_dokter='$id_dokter'
                                            AND booking.id_sesi='2'
                                            ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                          while($d = mysqli_fetch_array($data)){
                                            $id_booking = $d['id_booking'];
                                            $status     = $d['status'];
                                            $sub_kontak = substr($d['kontak'],1);
                                            ?>
                                            <tr>
                                              <td><center><?php echo $no++; ?></center></td>
                                              <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                              <td><center><?php echo $d['nama']; ?></center></td>
                                              <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                              <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                              <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                              <td><center><?php echo $d['keterangan']; ?></center></td>
                                              <td><center><?php
                                              if($status=='Datang'){
                                                echo "<form method='post' action='booking-belum-datang-proses-tab.php' role='form'>
                                                <input type='text' name='id_booking'
                                                value='$id_booking;' hidden>
                                                <input type='text' name='id_dokter'
                                                value='$id_dokter' hidden>
                                                <button type='submit' class='btn btn-primary'><i class='fa fa-check'></i></button>
                                                </form>";
                                              }else{
                                                echo "<form method='post' action='booking-datang-proses-tab.php' role='form'>
                                                <input type='text' name='id_booking'
                                                value='$id_booking;' hidden>
                                                <input type='text' name='id_dokter'
                                                value='$id_dokter' hidden>
                                                <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                                                </form>";
                                              }
                                              ?>
                                            </center></td>
                                          <!-- <td>
                                            <div align="center">
                                              <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
                                                <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                              </div>
                                            </td> -->
                                            <td>
                                              <div align="center">
                                                <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                  <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                </div>
                                              </td>
                                              <td>
                                                <div align="center">
                                                  <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                                                    <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                                                  </div>
                                                </td>
                                                </tr><?php } ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="tab-pane fade" id="3">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="table-responsive">
                                           <div align="right" class="col-lg-12">
                                            <?php 
                                            $data = mysqli_query($koneksi,
                                              "SELECT COUNT(*) AS total
                                              FROM booking
                                              WHERE booking.id_dokter='$id_dokter'
                                              AND booking.id_sesi='3'
                                              AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                  <!-- <th><center>Kontak</center></th> -->
                                                  <th><center>Dokter</center></th>
                                                  <th><center>Sesi</center></th>
                                                  <th><center>Keterangan</center></th>
                                                  <th colspan='3'><center>Action</center></th>
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
                                                  AND booking.id_dokter='$id_dokter'
                                                  AND booking.id_sesi='3'
                                                  ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                while($d = mysqli_fetch_array($data)){
                                                  $id_booking = $d['id_booking'];
                                                  $status     = $d['status'];
                                                  $sub_kontak = substr($d['kontak'],1);
                                                  ?>
                                                  <tr>
                                                    <td><center><?php echo $no++; ?></center></td>
                                                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                    <td><center><?php echo $d['nama']; ?></center></td>
                                                    <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                                    <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                    <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                    <td><center><?php echo $d['keterangan']; ?></center></td>
                                                    <td><center><?php
                                                    if($status=='Datang'){
                                                      echo "<form method='post' action='booking-belum-datang-proses-tab.php' role='form'>
                                                      <input type='text' name='id_booking'
                                                      value='$id_booking;' hidden>
                                                      <input type='text' name='id_dokter'
                                                      value='$id_dokter' hidden>
                                                      <button type='submit' class='btn btn-primary'><i class='fa fa-check'></i></button>
                                                      </form>";
                                                    }else{
                                                      echo "<form method='post' action='booking-datang-proses-tab.php' role='form'>
                                                      <input type='text' name='id_booking'
                                                      value='$id_booking;' hidden>
                                                      <input type='text' name='id_dokter'
                                                      value='$id_dokter' hidden>
                                                      <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                                                      </form>";
                                                    }
                                                    ?>
                                                  </center></td>
                                                <!-- <td>
                                                  <div align="center">
                                                    <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
                                                      <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                                    </div>
                                                  </td> -->
                                                  <td>
                                                    <div align="center">
                                                      <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                        <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div align="center">
                                                        <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                                                          <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                                                        </div>
                                                      </td>
                                                      </tr><?php } ?>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="tab-pane fade" id="4">
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <div class="table-responsive">
                                                 <div align="right" class="col-lg-12">
                                                  <?php 
                                                  $data = mysqli_query($koneksi,
                                                    "SELECT COUNT(*) AS total
                                                    FROM booking
                                                    WHERE booking.id_dokter='$id_dokter'
                                                    AND booking.id_sesi='4'
                                                    AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                        <!-- <th><center>Kontak</center></th> -->
                                                        <th><center>Dokter</center></th>
                                                        <th><center>Sesi</center></th>
                                                        <th><center>Keterangan</center></th>
                                                        <th colspan='3'><center>Action</center></th>
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
                                                        AND booking.id_dokter='$id_dokter'
                                                        AND booking.id_sesi='4'
                                                        ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                      while($d = mysqli_fetch_array($data)){
                                                        $id_booking = $d['id_booking'];
                                                        $status     = $d['status'];
                                                        $sub_kontak = substr($d['kontak'],1);
                                                        ?>
                                                        <tr>
                                                          <td><center><?php echo $no++; ?></center></td>
                                                          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                          <td><center><?php echo $d['nama']; ?></td></center>
                                                          <!-- <td><center><?php echo $d['kontak']; ?></td></center> -->
                                                          <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                          <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                          <td><center><?php echo $d['keterangan']; ?></center></td>
                                                          <td><center><?php
                                                          if($status=='Datang'){
                                                            echo "<form method='post' action='booking-belum-datang-proses-tab.php' role='form'>
                                                            <input type='text' name='id_booking'
                                                            value='$id_booking;' hidden>
                                                            <input type='text' name='id_dokter'
                                                            value='$id_dokter' hidden>
                                                            <button type='submit' class='btn btn-primary'><i class='fa fa-check'></i></button>
                                                            </form>";
                                                          }else{
                                                            echo "<form method='post' action='booking-datang-proses-tab.php' role='form'>
                                                            <input type='text' name='id_booking'
                                                            value='$id_booking;' hidden>
                                                            <input type='text' name='id_dokter'
                                                            value='$id_dokter' hidden>
                                                            <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                                                            </form>";
                                                          }
                                                          ?>
                                                        </center></td>
                                                      <!-- <td>
                                                        <div align="center">
                                                          <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
                                                            <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                                          </div>
                                                        </td> -->
                                                        <td>
                                                          <div align="center">
                                                            <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                              <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div align="center">
                                                              <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                                                                <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                                                              </div>
                                                            </td>
                                                            </tr><?php } ?>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              <?php }else{ ?>
                                                <div class="tab-pane fade active in" id="0">
                                                  <div class="row">
                                                    <div class="col-lg-12">
                                                      <div class="table-responsive">
                                                        <div align="right">
                                                          <?php 
                                                          $data = mysqli_query($koneksi,
                                                            "SELECT COUNT(*) AS total
                                                            FROM booking
                                                            WHERE booking.id_dokter='$id_dokter'
                                                            AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                                <!-- <th><center>Kontak</center></th> -->
                                                                <th><center>Dokter</center></th>
                                                                <th><center>Sesi</center></th>
                                                                <th><center>Keterangan</center></th>
                                                                <th colspan='3'><center>Action</center></th>
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
                                                                AND booking.id_dokter='$id_dokter'
                                                                ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                              while($d = mysqli_fetch_array($data)){
                                                               $id_booking = $d['id_booking'];
                                                               $status     = $d['status'];
                                                               $sub_kontak = substr($d['kontak'],1);
                                                               ?>
                                                               <tr>
                                                                <td><center><?php echo $no++; ?></center></td>
                                                                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                                <td><center><?php echo $d['nama']; ?></center></td>
                                                                <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                                                <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                                <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                                <td><center><?php echo $d['keterangan']; ?></center></td>
                                                                <td>
                                                                  <div align="center">
                                                                    <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                                      <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div align="center">
                                                                      <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button>
                                                                    </div>
                                                                  </td>
                                                                  </tr><?php } ?>
                                                                </tbody>
                                                              </table>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="tab-pane fade" id="1">
                                                        <div class="row">
                                                          <div class="col-lg-12">
                                                            <div class="table-responsive">
                                                              <div align="right" class="col-lg-12">
                                                                <?php 
                                                                $data = mysqli_query($koneksi,
                                                                  "SELECT COUNT(*) AS total
                                                                  FROM booking
                                                                  WHERE booking.id_dokter='$id_dokter'
                                                                  AND booking.id_sesi='1'
                                                                  AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                                      <!-- <th><center>Kontak</center></th> -->
                                                                      <th><center>Dokter</center></th>
                                                                      <th><center>Sesi</center></th>
                                                                      <th><center>Keterangan</center></th>
                                                                      <th colspan='3'><center>Action</center></th>
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
                                                                      AND booking.id_dokter='$id_dokter'
                                                                      AND booking.id_sesi='1'
                                                                      ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                                    while($d = mysqli_fetch_array($data)){
                                                                      $id_booking = $d['id_booking'];
                                                                      $status     = $d['status'];
                                                                      $sub_kontak = substr($d['kontak'],1);
                                                                      ?>
                                                                      <tr>
                                                                        <td><center><?php echo $no++; ?></center></td>
                                                                        <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                                        <td><center><?php echo $d['nama']; ?></center></td>
                                                                        <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                                                        <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                                        <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                                        <td><center><?php echo $d['keterangan']; ?></center></td>
                                                                        <td>
                                                                          <div align="center">
                                                                            <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                                              <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                                            </div>
                                                                          </td>
                                                                          <td>
                                                                            <div align="center">
                                                                              <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button>
                                                                            </div>
                                                                          </td>
                                                                          </tr><?php } ?>
                                                                        </tbody>
                                                                      </table>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="tab-pane fade" id="2">
                                                                <div class="row">
                                                                  <div class="col-lg-12">
                                                                    <div class="table-responsive">
                                                                     <div align="right" class="col-lg-12">
                                                                      <?php 
                                                                      $data = mysqli_query($koneksi,
                                                                        "SELECT COUNT(*) AS total
                                                                        FROM booking
                                                                        WHERE booking.id_dokter='$id_dokter'
                                                                        AND booking.id_sesi='2'
                                                                        AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                                            <!-- <th><center>Kontak</center></th> -->
                                                                            <th><center>Dokter</center></th>
                                                                            <th><center>Sesi</center></th>
                                                                            <th><center>Keterangan</center></th>
                                                                            <th colspan='3'><center>Action</center></th>
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
                                                                            AND booking.id_dokter='$id_dokter'
                                                                            AND booking.id_sesi='2'
                                                                            ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                                          while($d = mysqli_fetch_array($data)){
                                                                            $id_booking = $d['id_booking'];
                                                                            $status     = $d['status'];
                                                                            $sub_kontak = substr($d['kontak'],1);
                                                                            ?>
                                                                            <tr>
                                                                              <td><center><?php echo $no++; ?></center></td>
                                                                              <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                                              <td><center><?php echo $d['nama']; ?></center></td>
                                                                              <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                                                              <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                                              <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                                              <td><center><?php echo $d['keterangan']; ?></center></td>
                                                                              <td>
                                                                                <div align="center">
                                                                                  <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                                                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                                                  </div>
                                                                                </td>
                                                                                <td>
                                                                                  <div align="center">
                                                                                    <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button>
                                                                                  </div>
                                                                                </td>
                                                                                </tr><?php } ?>
                                                                              </tbody>
                                                                            </table>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="3">
                                                                      <div class="row">
                                                                        <div class="col-lg-12">
                                                                          <div class="table-responsive">
                                                                           <div align="right" class="col-lg-12">
                                                                            <?php 
                                                                            $data = mysqli_query($koneksi,
                                                                              "SELECT COUNT(*) AS total
                                                                              FROM booking
                                                                              WHERE booking.id_dokter='$id_dokter'
                                                                              AND booking.id_sesi='3'
                                                                              AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                                                  <!-- <th><center>Kontak</center></th> -->
                                                                                  <th><center>Dokter</center></th>
                                                                                  <th><center>Sesi</center></th>
                                                                                  <th><center>Keterangan</center></th>
                                                                                  <th colspan='3'><center>Action</center></th>
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
                                                                                  AND booking.id_dokter='$id_dokter'
                                                                                  AND booking.id_sesi='3'
                                                                                  ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                                                while($d = mysqli_fetch_array($data)){
                                                                                  $id_booking = $d['id_booking'];
                                                                                  $status     = $d['status'];
                                                                                  $sub_kontak = substr($d['kontak'],1);
                                                                                  ?>
                                                                                  <tr>
                                                                                    <td><center><?php echo $no++; ?></center></td>
                                                                                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                                                    <td><center><?php echo $d['nama']; ?></center></td>
                                                                                    <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                                                                    <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                                                    <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                                                    <td><center><?php echo $d['keterangan']; ?></center></td>
                                                                                    <td>
                                                                                      <div align="center">
                                                                                        <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                                                          <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                                                        </div>
                                                                                      </td>
                                                                                      <td>
                                                                                        <div align="center">
                                                                                          <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button>
                                                                                        </div>
                                                                                      </td>
                                                                                      </tr><?php } ?>
                                                                                    </tbody>
                                                                                  </table>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                          <div class="tab-pane fade" id="4">
                                                                            <div class="row">
                                                                              <div class="col-lg-12">
                                                                                <div class="table-responsive">
                                                                                 <div align="right" class="col-lg-12">
                                                                                  <?php 
                                                                                  $data = mysqli_query($koneksi,
                                                                                    "SELECT COUNT(*) AS total
                                                                                    FROM booking
                                                                                    WHERE booking.id_dokter='$id_dokter'
                                                                                    AND booking.id_sesi='4'
                                                                                    AND booking.booking_tanggal='$tanggalsekarang';");
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
                                                                                        <!-- <th><center>Kontak</center></th> -->
                                                                                        <th><center>Dokter</center></th>
                                                                                        <th><center>Sesi</center></th>
                                                                                        <th><center>Keterangan</center></th>
                                                                                        <th colspan='3'><center>Action</center></th>
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
                                                                                        AND booking.id_dokter='$id_dokter'
                                                                                        AND booking.id_sesi='4'
                                                                                        ORDER BY booking.id_sesi, booking.id_booking ASC;");
                                                                                      while($d = mysqli_fetch_array($data)){
                                                                                        $id_booking = $d['id_booking'];
                                                                                        $status     = $d['status'];
                                                                                        $sub_kontak = substr($d['kontak'],1);
                                                                                        ?>
                                                                                        <tr>
                                                                                          <td><center><?php echo $no++; ?></center></td>
                                                                                          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                                                                          <td><center><?php echo $d['nama']; ?></td></center>
                                                                                          <!-- <td><center><?php echo $d['kontak']; ?></td></center> -->
                                                                                          <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                                                                          <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                                                                          <td><center><?php echo $d['keterangan']; ?></center></td>
                                                                                          <td>
                                                                                            <div align="center">
                                                                                              <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                                                                                <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                                                                                              </div>
                                                                                            </td>
                                                                                            <td>
                                                                                              <div align="center">
                                                                                                <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button>
                                                                                              </div>
                                                                                            </td>
                                                                                            </tr><?php } ?>
                                                                                          </tbody>
                                                                                        </table>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              <?php } ?>
                                                                            </div><!-- /.row -->
                                                                          </div>
                                                                        </div>
                                                                      </div><!-- /.row -->
                                                                    </div><!-- /#page-wrapper -->
                                                                  </div><!-- /#wrapper -->
                                                                  <?php include "views/footer.php"; ?>