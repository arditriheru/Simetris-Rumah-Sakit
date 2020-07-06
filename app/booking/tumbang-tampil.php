        <div class="col-lg-8">
          <form method="post" action="laporan-tumbang-hari-ini-export" role="form">
            <button type="submit" class="btn btn-success"><i class='fa fa-download'></i></button>
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
                  "SELECT *, tumbang_petugas.nama_petugas
                  FROM tumbang, tumbang_petugas
                  WHERE tumbang.id_petugas=tumbang_petugas.id_petugas
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
            <tbody>
              <?php 
              $no = 1;
              $data = mysqli_query($koneksi,
                "SELECT *, tumbang_petugas.nama_petugas, sesi.nama_sesi,
                IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                FROM tumbang, tumbang_petugas, sesi
                WHERE tumbang.id_petugas=tumbang_petugas.id_petugas
                AND tumbang.id_sesi=sesi.id_sesi
                AND tumbang.jadwal='$tanggalsekarang'
                ORDER BY tumbang.nama ASC;");
              while($d = mysqli_fetch_array($data)){
                $id_tumbang = $d['id_tumbang'];
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
                  echo "<a class='whitetext' href='tumbang-belum-datang-proses?id_tumbang=$id_tumbang'><button type='button' class='btn btn-success'><i class='fa fa-check'></i></button></a>";
                }else{
                  echo "<a class='whitetext' href='tumbang-datang-proses?id_tumbang=$id_tumbang'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button></a>";
                }
                ?>
              </center></td>
              <td>
                <div align="center">
                  <a href="tumbang-detail?id_tumbang=<?php echo $d['id_tumbang']; ?>"
                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                  </div>
                </td>
                </tr><?php } ?>
              </tbody>
            </table>