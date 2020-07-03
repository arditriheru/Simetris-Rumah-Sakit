<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Demografi Kecamatan ".date('d/m/Y').".xls");
?>
<!DOCTYPE html>
<html>
<body>
  <?php 
  include '../../config/connect.php';
  $awal = $_POST['awal'];
  $akhir = $_POST['akhir'];
  ?>
  <table class="table table-bordered table-hover table-striped tablesorter">
   <thead>
    <h2 align="center">Rekap Data</h2>
    <h2 align="center">Demografi Kecamatan</h2>
    <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
    <tr>
      <th><center>No</th>
        <th><center>Nama Kecamatan</th>
          <th><center>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <!---------- Batas ----------->
          <?php 
          $no = 1;
          $data = mysqli_query($koneksi,"
           SELECT mr_kecamatan_bps.nama_kecamatan,
           COUNT(*) AS hasil
           FROM mr_pasien, mr_kecamatan_bps
           WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
           AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
           AND mr_pasien.id_kabupaten = 3471
           GROUP BY mr_pasien.id_kecamatan
           ORDER BY hasil DESC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
             <td><center><?php echo $no++; ?></td>
              <td><center><?php echo $d['nama_kecamatan']; ?></td>
                <td><center><?php echo $d['hasil']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table><br><br>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</th>
                  <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!---------- Batas ----------->
                    <?php 
                    $no = 1;
                    $awal = $_POST['awal'];
                    $akhir = $_POST['akhir'];
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
                      COUNT(*) AS hasil
                      FROM mr_pasien, mr_kecamatan_bps
                      WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
                      AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
                      AND mr_pasien.id_kabupaten = 344
                      GROUP BY mr_pasien.id_kecamatan
                      ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                       <td><center><?php echo $no++; ?></td>
                        <td><center><?php echo $d['nama_kecamatan']; ?></td>
                          <td><center><?php echo $d['hasil']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table><br><br>
                    <table class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <tr>
                          <th><center>No</th>
                            <th><center>Nama Kecamatan</th>
                              <th><center>Jumlah</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!---------- Batas ----------->
                              <?php 
                              $no = 1;
                              $awal = $_POST['awal'];
                              $akhir = $_POST['akhir'];
                              $data = mysqli_query($koneksi,"
                               SELECT mr_kecamatan_bps.nama_kecamatan,
                               COUNT(*) AS hasil
                               FROM mr_pasien, mr_kecamatan_bps
                               WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
                               AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
                               AND mr_pasien.id_kabupaten = 342
                               GROUP BY mr_pasien.id_kecamatan
                               ORDER BY hasil DESC;");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                 <td><center><?php echo $no++; ?></td>
                                  <td><center><?php echo $d['nama_kecamatan']; ?></td>
                                    <td><center><?php echo $d['hasil']; ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table><br><br>
                              <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th><center>No</th>
                                      <th><center>Nama Kecamatan</th>
                                        <th><center>Jumlah</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <!---------- Batas ----------->
                                        <?php 
                                        $no = 1;
                                        $awal = $_POST['awal'];
                                        $akhir = $_POST['akhir'];
                                        $data = mysqli_query($koneksi,"
                                         SELECT mr_kecamatan_bps.nama_kecamatan,
                                         COUNT(*) AS hasil
                                         FROM mr_pasien, mr_kecamatan_bps
                                         WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
                                         AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
                                         AND mr_pasien.id_kabupaten = 341
                                         GROUP BY mr_pasien.id_kecamatan
                                         ORDER BY hasil DESC;");
                                        while($d = mysqli_fetch_array($data)){
                                          ?>
                                          <tr>
                                           <td><center><?php echo $no++; ?></td>
                                            <td><center><?php echo $d['nama_kecamatan']; ?></td>
                                              <td><center><?php echo $d['hasil']; ?></td>
                                              </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table><br><br>
                                        <table class="table table-bordered table-hover table-striped tablesorter">
                                          <thead>
                                            <tr>
                                              <th><center>No</th>
                                                <th><center>Nama Kecamatan</th>
                                                  <th><center>Jumlah</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <!---------- Batas ----------->
                                                  <?php 
                                                  $no = 1;
                                                  $awal = $_POST['awal'];
                                                  $akhir = $_POST['akhir'];
                                                  $data = mysqli_query($koneksi,"
                                                   SELECT mr_kecamatan_bps.nama_kecamatan,
                                                   COUNT(*) AS hasil
                                                   FROM mr_pasien, mr_kecamatan_bps
                                                   WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
                                                   AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
                                                   AND mr_pasien.id_kabupaten = 343
                                                   GROUP BY mr_pasien.id_kecamatan
                                                   ORDER BY hasil DESC;");
                                                  while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                     <td><center><?php echo $no++; ?></td>
                                                      <td><center><?php echo $d['nama_kecamatan']; ?></td>
                                                        <td><center><?php echo $d['hasil']; ?></td>
                                                        </tr>
                                                      <?php } ?>
                                                    </tbody>
                                                  </table>
                                                </body>
                                                </html>