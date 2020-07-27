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
          <form method="post" action="anc-tampil-cari" role="form">
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
                <th><center>Kontak</center></th>
                <th><center>Petugas</center></th>
                <th><center>Sesi</center></th>
                <th><center>Keterangan</center></th>
                <th colspan='2'><center>Action</center></th>
              </tr>
            </thead>
            <?php if($status=='Admin'){ ?>
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
                   <td><center><?php echo $d['kontak']; ?></center></td>
                   <td><center><?php echo $d['nama_petugas']; ?></center></td>
                   <td><center><?php echo $d['nama_sesi']; ?></center></td>
                   <td><center><?php echo $d['keterangan']; ?></center></td>
                   <td><center><?php
                   if($status=='Datang'){
                    echo "<a class='whitetext' href='anc-belum-datang-proses?id_anc=$id_anc'><button type='button' class='btn btn-success'><i class='fa fa-check'></i></button></a>";
                  }else{
                    echo "<a class='whitetext' href='anc-datang-proses?id_anc=$id_anc'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                  }
                  ?>
                </center></td>
                <td>
                  <div align="center">
                    <a href="anc-detail?id_anc=<?php echo $d['id_anc']; ?>"
                      <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                    </div>
                  </td>
                  </tr><?php } ?>
                </tbody>
              <?php }else{ ?>
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
                     <td><center><?php echo $d['kontak']; ?></center></td>
                     <td><center><?php echo $d['nama_petugas']; ?></center></td>
                     <td><center><?php echo $d['nama_sesi']; ?></center></td>
                     <td><center><?php echo $d['keterangan']; ?></center></td>
                     <td>
                      <div align="center">
                        <a href="anc-detail?id_anc=<?php echo $d['id_anc']; ?>"
                          <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                        </div>
                      </td>
                      </tr><?php } ?>
                    </tbody>
                  <?php } ?>

                </table>