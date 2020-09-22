<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <ul class="nav nav-pills" style="margin-bottom: 15px;">
        <li class="active"><a href="#1" data-toggle="tab">Poliklinik</a></li>
        <li><a href="#2" data-toggle="tab">Tumbuh Kembang</a></li>
        <li><a href="#3" data-toggle="tab">Antenatal Care</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
       <?php if($status=='Admin'){ ?>
        <div class="tab-pane fade active in" id="1">
          <div class="row">
            <div class="col-lg-12">
             <div class="row">
              <div class="col-lg-12">
                <form method="post" action="laporan-booking-hari-ini-export.php" role="form">
                  <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
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
                        echo "<li><a href='booking-tab.php?id_dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
                      }
                      ?>
                    </ul>
                  </div><!-- /btn-group -->
                </form>
              </div>
            </div>
            <div class="row">
              <form method="post" action="booking-tampil-cari.php" role="form">
                <div class="col-lg-4"><br>
                  <div class="form-group input-group">
                    <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                    </span>
                  </div>
                </div>
                <div class="col-lg-4"><br>
                  <div class="form-group input-group">
                    <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                    </span>
                  </div>
                </div>
              </form>
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
              </div>
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <!-- <th><center>#</center></th> -->
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
                    ORDER BY booking.id_sesi, dokter.id_dokter, booking.nama ASC;");
                  while($d = mysqli_fetch_array($data)){
                    $id_booking = $d['id_booking'];
                    $status     = $d['status'];
                    $sub_kontak = substr($d['kontak'],1);
                    ?>
                    <tr>
                      <!-- <td><center><?php echo $no++; ?></center></td> -->
                      <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                      <td><center><?php echo $d['nama']; ?></center></td>
                      <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                      <td><center><?php echo $d['nama_dokter']; ?></center></td>
                      <td><center><?php echo $d['nama_sesi']; ?></center></td>
                      <td><center><?php echo $d['keterangan']; ?></center></td>
                      <td><center><?php
                      if($status=='Datang'){
                        echo "<a class='whitetext' href='booking-belum-datang-proses.php?id_booking=$id_booking'><button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button></a>";
                      }else{
                        echo "<a class='whitetext' href='booking-datang-proses.php?id_booking=$id_booking'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
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
                          </tr>
                          <?php 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade in" id="2">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                     <div class="row">
                      <div class="col-lg-12">
                        <form method="post" action="laporan-tumbang-hari-ini-export.php" role="form">
                          <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
                          <div class="btn-group">
                            <button type="button" class="btn btn-warning">Filter</button>
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li disabled selected><a>All</a></li>
                              <?php
                              include '../../config/connect.php';
                              $data = mysqli_query($koneksi,
                                "SELECT *, mr_petugas.nama_petugas
                                FROM tumbang, mr_petugas
                                WHERE tumbang.id_petugas=mr_petugas.id_petugas
                                AND tumbang.jadwal='$tanggalsekarang'
                                GROUP BY tumbang.id_petugas;");
                              while($d = mysqli_fetch_array($data)){
                                echo "<li><a href='tumbang-tab?id_petugas=".$d['id_petugas']."'>".$d['nama_petugas']."</a></li>";
                              }
                              ?>
                            </ul>
                          </div><!-- /btn-group -->
                        </form>
                      </div>
                    </div>
                    <div class="row">
                      <form method="post" action="tumbang-tampil-cari.php" role="form">
                        <div class="col-lg-4"><br>
                          <div class="form-group input-group">
                            <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-4"><br>
                          <div class="form-group input-group">
                            <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                            </span>
                          </div>
                        </div>
                      </form>
                      <div align="right" class="col-lg-4">
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT COUNT(id_tumbang) AS total
                          FROM tumbang
                          WHERE tumbang.jadwal='$tanggalsekarang';");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                        </div>
                      </div>
                      <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                          <tr>
                            <th><center>#</center></th>
                            <th><center>No. RM</center></th>
                            <th><center>Nama Pasien</center></th>
                            <!-- <th><center>Kontak</center></th> -->
                            <th><center>Petugas</center></th>
                            <th><center>Sesi</center></th>
                            <th><center>Keterangan</center></th>
                            <th colspan='3'><center>Action</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1;
                          $data = mysqli_query($koneksi,
                            "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                            IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                            FROM tumbang, mr_petugas, sesi
                            WHERE tumbang.id_petugas=mr_petugas.id_petugas
                            AND tumbang.id_sesi=sesi.id_sesi
                            AND tumbang.jadwal='$tanggalsekarang'
                            ORDER BY tumbang.id_sesi, tumbang.id_petugas, tumbang.nama ASC;");
                          while($d = mysqli_fetch_array($data)){
                            $id_tumbang = $d['id_tumbang'];
                            $status     = $d['status'];
                            $sub_kontak = substr($d['kontak'],1);
                            ?>
                            <tr>
                             <td><center><?php echo $no++; ?></center></td>
                             <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                             <td><center><?php echo $d['nama']; ?></center></td>
                             <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                             <td><center><?php echo $d['nama_petugas']; ?></center></td>
                             <td><center><?php echo $d['nama_sesi']; ?></center></td>
                             <td><center><?php echo $d['keterangan']; ?></center></td>
                             <td><center><?php
                             if($status=='Datang'){
                              echo "<a class='whitetext' href='tumbang-belum-datang-proses.php?id_tumbang=$id_tumbang'><button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button></a>";
                            }else{
                              echo "<a class='whitetext' href='tumbang-datang-proses.php?id_tumbang=$id_tumbang'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                            }
                            ?>
                          </center></td>
                          <!-- <td>
                            <div align="center">
                              <a href="tumbang-edit?id_tumbang=<?php echo $d['id_tumbang']; ?>"
                                <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                              </div>
                            </td> -->
                            <td>
                              <div align="center">
                                <a href="tumbang-detail.php?id_tumbang=<?php echo $d['id_tumbang']; ?>"
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
                    <div class="tab-pane fade in" id="3">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive">
                           <div class="row">
                            <div class="col-lg-12">
                              <form method="post" action="laporan-anc-hari-ini-export.php" role="form">
                                <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
                                <div class="btn-group">
                                  <button type="button" class="btn btn-warning">Filter</button>
                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li disabled selected><a>All</a></li>
                                    <?php
                                    include '../../config/connect.php';
                                    $data = mysqli_query($koneksi,
                                      "SELECT *, mr_petugas.nama_petugas
                                      FROM anc, mr_petugas
                                      WHERE anc.id_petugas=mr_petugas.id_petugas
                                      AND anc.jadwal='$tanggalsekarang'
                                      GROUP BY anc.id_petugas;");
                                    while($d = mysqli_fetch_array($data)){
                                      echo "<li><a href='anc-tab?id_petugas=".$d['id_petugas']."'>".$d['nama_petugas']."</a></li>";
                                    }
                                    ?>
                                  </ul>
                                </div><!-- /btn-group -->
                              </form>
                            </div>
                          </div>
                          <div class="row">
                            <form method="post" action="anc-tampil-cari.php" role="form">
                              <div class="col-lg-4"><br>
                                <div class="form-group input-group">
                                  <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                  </span>
                                </div>
                              </div>
                              <div class="col-lg-4"><br>
                                <div class="form-group input-group">
                                  <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                  </span>
                                </div>
                              </div>
                            </form>
                            <div align="right" class="col-lg-4">
                              <?php 
                              $data = mysqli_query($koneksi,
                                "SELECT COUNT(id_anc) AS total
                                FROM anc
                                WHERE anc.jadwal='$tanggalsekarang';");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                              </div>
                            </div>
                            <table class="table table-bordered table-hover table-striped tablesorter">
                              <thead>
                                <tr>
                                  <th><center>#</center></th>
                                  <th><center>No. RM</center></th>
                                  <th><center>Nama Pasien</center></th>
                                  <!-- <th><center>Kontak</center></th> -->
                                  <th><center>Petugas</center></th>
                                  <th><center>Sesi</center></th>
                                  <th><center>Keterangan</center></th>
                                  <th colspan='3'><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                $data = mysqli_query($koneksi,
                                  "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                  IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                  FROM anc, mr_petugas, sesi
                                  WHERE anc.id_petugas=mr_petugas.id_petugas
                                  AND anc.id_sesi=sesi.id_sesi
                                  AND anc.jadwal='$tanggalsekarang'
                                  ORDER BY anc.id_sesi, anc.id_petugas, anc.nama ASC;");
                                while($d = mysqli_fetch_array($data)){
                                  $id_anc = $d['id_anc'];
                                  $status     = $d['status'];
                                  $sub_kontak = substr($d['kontak'],1);
                                  ?>
                                  <tr>
                                   <td><center><?php echo $no++; ?></center></td>
                                   <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                   <td><center><?php echo $d['nama']; ?></center></td>
                                   <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                   <td><center><?php echo $d['nama_petugas']; ?></center></td>
                                   <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                   <td><center><?php echo $d['keterangan']; ?></center></td>
                                   <td><center><?php
                                   if($status=='Datang'){
                                    echo "<a class='whitetext' href='anc-belum-datang-proses.php?id_anc=$id_anc'><button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button></a>";
                                  }else{
                                    echo "<a class='whitetext' href='anc-datang-proses.php?id_anc=$id_anc'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                                  }
                                  ?>
                                </center></td>
                                <!-- <td>
                                  <div align="center">
                                    <a href="anc-edit?id_anc=<?php echo $d['id_anc']; ?>"
                                      <button type="button" class="btn btn-primary"><i class='fa fa-pencil'></i></button></a>
                                    </div>
                                  </td> -->
                                  <td>
                                    <div align="center">
                                      <a href="anc-detail.php?id_anc=<?php echo $d['id_anc']; ?>"
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
                          <div class="tab-pane fade active in" id="1">
                            <div class="row">
                              <div class="col-lg-12">
                               <div class="row">
                                <div class="col-lg-12">
                                  <form method="post" action="laporan-booking-hari-ini-export.php" role="form">
                                    <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
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
                                          echo "<li><a href='booking-tab.php?id_dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
                                        }
                                        ?>
                                      </ul>
                                    </div><!-- /btn-group -->
                                  </form>
                                </div>
                              </div>
                              <div class="row">
                                <form method="post" action="booking-tampil-cari.php" role="form">
                                  <div class="col-lg-4"><br>
                                    <div class="form-group input-group">
                                      <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                                      <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4"><br>
                                    <div class="form-group input-group">
                                      <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                                      <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                      </span>
                                    </div>
                                  </div>
                                </form>
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
                                </div>
                                <table class="table table-bordered table-hover table-striped tablesorter">
                                  <thead>
                                    <tr>
                                      <!-- <th><center>#</center></th> -->
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
                                      ORDER BY booking.id_sesi, dokter.id_dokter, booking.nama ASC;");
                                    while($d = mysqli_fetch_array($data)){
                                      $id_booking = $d['id_booking'];
                                      $status     = $d['status'];
                                      ?>
                                      <tr>
                                        <!-- <td><center><?php echo $no++; ?></center></td> -->
                                        <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                        <td><center><?php echo $d['nama']; ?></center></td>
                                        <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                        <td><center><?php echo $d['nama_dokter']; ?></center></td>
                                        <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                        <td><center><?php echo $d['keterangan']; ?></center></td>
                                        <td><center><?php
                                        if($status=='Datang'){
                                          echo "<button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button>";
                                        }else{
                                          echo "<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
                                        }
                                        ?>
                                      </center></td>
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
                                      </tr>
                                      <?php 
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade in" id="2">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="table-responsive">
                                 <div class="row">
                                  <div class="col-lg-12">
                                    <form method="post" action="laporan-tumbang-hari-ini-export.php" role="form">
                                      <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Filter</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li disabled selected><a>All</a></li>
                                          <?php
                                          include '../../config/connect.php';
                                          $data = mysqli_query($koneksi,
                                            "SELECT *, mr_petugas.nama_petugas
                                            FROM tumbang, mr_petugas
                                            WHERE tumbang.id_petugas=mr_petugas.id_petugas
                                            AND tumbang.jadwal='$tanggalsekarang'
                                            GROUP BY tumbang.id_petugas;");
                                          while($d = mysqli_fetch_array($data)){
                                            echo "<li><a href='tumbang-tab?id_petugas=".$d['id_petugas']."'>".$d['nama_petugas']."</a></li>";
                                          }
                                          ?>
                                        </ul>
                                      </div><!-- /btn-group -->
                                    </form>
                                  </div>
                                </div>
                                <div class="row">
                                  <form method="post" action="tumbang-tampil-cari.php" role="form">
                                    <div class="col-lg-4"><br>
                                      <div class="form-group input-group">
                                        <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-lg-4"><br>
                                      <div class="form-group input-group">
                                        <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                        </span>
                                      </div>
                                    </div>
                                  </form>
                                  <div align="right" class="col-lg-4">
                                    <?php 
                                    $data = mysqli_query($koneksi,
                                      "SELECT COUNT(id_tumbang) AS total
                                      FROM tumbang
                                      WHERE tumbang.jadwal='$tanggalsekarang';");
                                    while($d = mysqli_fetch_array($data)){
                                      ?>
                                      <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                    </div>
                                  </div>
                                  <table class="table table-bordered table-hover table-striped tablesorter">
                                    <thead>
                                      <tr>
                                        <th><center>#</center></th>
                                        <th><center>No. RM</center></th>
                                        <th><center>Nama Pasien</center></th>
                                        <!-- <th><center>Kontak</center></th> -->
                                        <th><center>Petugas</center></th>
                                        <th><center>Sesi</center></th>
                                        <th><center>Keterangan</center></th>
                                        <th colspan='3'><center>Action</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $no = 1;
                                      $data = mysqli_query($koneksi,
                                        "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                        IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                                        FROM tumbang, mr_petugas, sesi
                                        WHERE tumbang.id_petugas=mr_petugas.id_petugas
                                        AND tumbang.id_sesi=sesi.id_sesi
                                        AND tumbang.jadwal='$tanggalsekarang'
                                        ORDER BY tumbang.id_sesi, tumbang.id_petugas, tumbang.nama ASC;");
                                      while($d = mysqli_fetch_array($data)){
                                        $id_tumbang = $d['id_tumbang'];
                                        $status     = $d['status'];
                                        ?>
                                        <tr>
                                         <td><center><?php echo $no++; ?></center></td>
                                         <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                         <td><center><?php echo $d['nama']; ?></center></td>
                                         <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                         <td><center><?php echo $d['nama_petugas']; ?></center></td>
                                         <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                         <td><center><?php echo $d['keterangan']; ?></center></td>
                                         <td><center><?php
                                         if($status=='Datang'){
                                          echo "<button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button>";
                                        }else{
                                          echo "<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
                                        }
                                        ?>
                                      </center></td>
                                      <td>
                                        <div align="center">
                                          <a href="tumbang-detail.php?id_tumbang=<?php echo $d['id_tumbang']; ?>"
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
                            <div class="tab-pane fade in" id="3">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="table-responsive">
                                   <div class="row">
                                    <div class="col-lg-12">
                                      <form method="post" action="laporan-anc-hari-ini-export" role="form">
                                        <!-- <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button> -->
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-warning">Filter</button>
                                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li disabled selected><a>All</a></li>
                                            <?php
                                            include '../../config/connect.php';
                                            $data = mysqli_query($koneksi,
                                              "SELECT *, mr_petugas.nama_petugas
                                              FROM anc, mr_petugas
                                              WHERE anc.id_petugas=mr_petugas.id_petugas
                                              AND anc.jadwal='$tanggalsekarang'
                                              GROUP BY anc.id_petugas;");
                                            while($d = mysqli_fetch_array($data)){
                                              echo "<li><a href='anc-tab?id_petugas=".$d['id_petugas']."'>".$d['nama_petugas']."</a></li>";
                                            }
                                            ?>
                                          </ul>
                                        </div><!-- /btn-group -->
                                      </form>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <form method="post" action="anc-tampil-cari.php" role="form">
                                      <div class="col-lg-4"><br>
                                        <div class="form-group input-group">
                                          <input type="text" class="form-control" name="carirm" placeholder="Pencarian No.RM Pasien..">
                                          <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                          </span>
                                        </div>
                                      </div>
                                      <div class="col-lg-4"><br>
                                        <div class="form-group input-group">
                                          <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pasien..">
                                          <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                          </span>
                                        </div>
                                      </div>
                                    </form>
                                    <div align="right" class="col-lg-4">
                                      <?php 
                                      $data = mysqli_query($koneksi,
                                        "SELECT COUNT(id_anc) AS total
                                        FROM anc
                                        WHERE anc.jadwal='$tanggalsekarang';");
                                      while($d = mysqli_fetch_array($data)){
                                        ?>
                                        <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                      </div>
                                    </div>
                                    <table class="table table-bordered table-hover table-striped tablesorter">
                                      <thead>
                                        <tr>
                                          <th><center>#</center></th>
                                          <th><center>No. RM</center></th>
                                          <th><center>Nama Pasien</center></th>
                                          <!-- <th><center>Kontak</center></th> -->
                                          <th><center>Petugas</center></th>
                                          <th><center>Sesi</center></th>
                                          <th><center>Keterangan</center></th>
                                          <th colspan='3'><center>Action</center></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                        $no = 1;
                                        $data = mysqli_query($koneksi,
                                          "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                          IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                          FROM anc, mr_petugas, sesi
                                          WHERE anc.id_petugas=mr_petugas.id_petugas
                                          AND anc.id_sesi=sesi.id_sesi
                                          AND anc.jadwal='$tanggalsekarang'
                                          ORDER BY anc.id_sesi, anc.id_petugas, anc.nama ASC;");
                                        while($d = mysqli_fetch_array($data)){
                                          $id_anc = $d['id_anc'];
                                          $status     = $d['status'];
                                          ?>
                                          <tr>
                                           <td><center><?php echo $no++; ?></center></td>
                                           <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                           <td><center><?php echo $d['nama']; ?></center></td>
                                           <!-- <td><center><?php echo $d['kontak']; ?></center></td> -->
                                           <td><center><?php echo $d['nama_petugas']; ?></center></td>
                                           <td><center><?php echo $d['nama_sesi']; ?></center></td>
                                           <td><center><?php echo $d['keterangan']; ?></center></td>
                                           <td><center><?php
                                           if($status=='Datang'){
                                            echo "<button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button>";
                                          }else{
                                            echo "<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
                                          }
                                          ?>
                                        </center></td>
                                        <td>
                                          <div align="center">
                                            <a href="anc-detail.php?id_anc=<?php echo $d['id_anc']; ?>"
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
                          </div>
                        </div>
</div><!-- /.row -->