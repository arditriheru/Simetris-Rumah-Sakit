<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Demografi Kabupaten ".date('d/m/Y').".xls");
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
     <h2 align="center">Demografi Kabupaten</h2>
     <h3 align="center">Periode : <?php echo $awal ?> - <?php echo $akhir ?></h3>
     <tr>
      <th><center>Kode</th>
        <th><center>Nama Kabupaten</th>
          <th><center>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <!---------- Batas ----------->
          <?php 
          $data = mysqli_query($koneksi,"
           SELECT COUNT(*) AS a
           FROM mr_pasien
           WHERE id_kabupaten = 3471
           AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
             <td><center><?php echo "3471" ?></td>
              <td><center><?php echo "Kota Yogyakarta" ?></td>
                <td><center><?php echo $d['a']; ?></td>
                </tr>
              <?php } ?>
              <!---------- Batas ----------->
              <?php 
              $data = mysqli_query($koneksi,"
               SELECT COUNT(*) AS b
               FROM mr_pasien
               WHERE id_kabupaten = 344
               AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                 <td><center><?php echo "344" ?></td>
                  <td><center><?php echo "Sleman" ?></td>
                    <td><center><?php echo $d['b']; ?></td>
                    </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                  $data = mysqli_query($koneksi,"
                   SELECT COUNT(*) AS c
                   FROM mr_pasien
                   WHERE id_kabupaten = 342
                   AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                     <td><center><?php echo "342" ?></td>
                      <td><center><?php echo "Bantul" ?></td>
                        <td><center><?php echo $d['c']; ?></td>
                        </tr>
                      <?php } ?>
                      <!---------- Batas ----------->
                      <?php 
                      $data = mysqli_query($koneksi,"
                       SELECT COUNT(*) AS d
                       FROM mr_pasien
                       WHERE id_kabupaten = 341
                       AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                         <td><center><?php echo "341" ?></td>
                          <td><center><?php echo "Kulon Progo" ?></td>
                            <td><center><?php echo $d['d']; ?></td>
                            </tr>
                          <?php } ?>
                          <!---------- Batas ----------->
                          <?php 
                          $data = mysqli_query($koneksi,"
                           SELECT COUNT(*) AS e
                           FROM mr_pasien
                           WHERE id_kabupaten = 343
                           AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                          while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                             <td><center><?php echo "343" ?></td>
                              <td><center><?php echo "Gunung Kidul" ?></td>
                                <td><center><?php echo $d['e']; ?></td>
                                </tr>
                              <?php } ?>
                              <!---------- Batas ----------->
                              <?php 
                              $data = mysqli_query($koneksi,"
                               SELECT COUNT(*) AS o
                               FROM mr_pasien
                               WHERE id_propinsi = 34
                               AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                  <td><center><?php echo "*" ?></td>
                                    <td><center><?php echo "TOTAL" ?></td>
                                      <td><center><?php echo $d['o']; ?></td>
                                      </tr>
                                    <?php } ?>    
                                  </tbody>
                                </table>
                              </body>
                              </html>