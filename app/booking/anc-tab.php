<?php include "views/header.php"; ?>
<?php
$id_petugas = $_GET['id_petugas'];
$a=mysqli_query($koneksi,
  "SELECT nama_petugas
  FROM mr_petugas
  WHERE id_petugas = '$id_petugas';");
while($b = mysqli_fetch_array($a)){
 $nama_petugas = $b['nama_petugas'];
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
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> Petugas <?php echo $nama_petugas ?> </li>
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
                          FROM anc
                          WHERE anc.id_petugas='$id_petugas'
                          AND anc.jadwal='$tanggalsekarang';");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                        </div>
                        <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th><center>No</center></th>
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
                              "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                              IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                              FROM anc, mr_petugas, sesi
                              WHERE anc.id_petugas=mr_petugas.id_petugas
                              AND anc.id_sesi=sesi.id_sesi
                              AND anc.id_petugas='$id_petugas'
                              AND anc.jadwal='$tanggalsekarang'
                              ORDER BY anc.nama ASC;");
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
                              FROM anc
                              WHERE anc.id_petugas='$id_petugas'
                              AND anc.id_sesi=1
                              AND anc.jadwal='$tanggalsekarang';");
                            while($d = mysqli_fetch_array($data)){
                              ?>
                              <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                            </div>
                            <table class="table table-bordered table-hover table-striped tablesorter">
                              <thead>
                                <tr>
                                  <th><center>No</center></th>
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
                                  "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                  IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                  FROM anc, mr_petugas, sesi
                                  WHERE anc.id_petugas=mr_petugas.id_petugas
                                  AND anc.id_sesi=sesi.id_sesi
                                  AND anc.id_sesi=1
                                  AND anc.id_petugas='$id_petugas'
                                  AND anc.jadwal='$tanggalsekarang'
                                  ORDER BY anc.nama ASC;");
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
                                FROM anc
                                WHERE anc.id_petugas='$id_petugas'
                                AND anc.id_sesi=2
                                AND anc.jadwal='$tanggalsekarang';");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                              </div>
                              <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th><center>No</center></th>
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
                                    "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                    IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                    FROM anc, mr_petugas, sesi
                                    WHERE anc.id_petugas=mr_petugas.id_petugas
                                    AND anc.id_sesi=sesi.id_sesi
                                    AND anc.id_sesi=2
                                    AND anc.id_petugas='$id_petugas'
                                    AND anc.jadwal='$tanggalsekarang'
                                    ORDER BY anc.nama ASC;");
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
                                  FROM anc
                                  WHERE anc.id_petugas='$id_petugas'
                                  AND anc.id_sesi=3
                                  AND anc.jadwal='$tanggalsekarang';");
                                 while($d = mysqli_fetch_array($data)){
                                  ?>
                                  <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                </div>
                                <table class="table table-bordered table-hover table-striped tablesorter">
                                  <thead>
                                    <tr>
                                      <th><center>No</center></th>
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
                                      "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                      IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                      FROM anc, mr_petugas, sesi
                                      WHERE anc.id_petugas=mr_petugas.id_petugas
                                      AND anc.id_sesi=sesi.id_sesi
                                      AND anc.id_sesi=3
                                      AND anc.id_petugas='$id_petugas'
                                      AND anc.jadwal='$tanggalsekarang'
                                      ORDER BY anc.nama ASC;");
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
                                    FROM anc
                                    WHERE anc.id_petugas='$id_petugas'
                                    AND anc.id_sesi=4
                                    AND anc.jadwal='$tanggalsekarang';");
                                  while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                  </div>
                                  <table class="table table-bordered table-hover table-striped tablesorter">
                                    <thead>
                                      <tr>
                                        <th><center>No</center></th>
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
                                        "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                        IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                        FROM anc, mr_petugas, sesi
                                        WHERE anc.id_petugas=mr_petugas.id_petugas
                                        AND anc.id_sesi=sesi.id_sesi
                                        AND anc.id_sesi=4
                                        AND anc.id_petugas='$id_petugas'
                                        AND anc.jadwal='$tanggalsekarang'
                                        ORDER BY anc.nama ASC;");
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
                                        FROM anc
                                        WHERE anc.id_petugas='$id_petugas'
                                        AND anc.jadwal='$tanggalsekarang';");
                                      while($d = mysqli_fetch_array($data)){
                                        ?>
                                        <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                      </div>
                                      <table class="table table-bordered table-hover table-striped tablesorter">
                                        <thead>
                                          <tr>
                                            <th><center>No</center></th>
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
                                            "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                            IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                            FROM anc, mr_petugas, sesi
                                            WHERE anc.id_petugas=mr_petugas.id_petugas
                                            AND anc.id_sesi=sesi.id_sesi
                                            AND anc.id_petugas='$id_petugas'
                                            AND anc.jadwal='$tanggalsekarang'
                                            ORDER BY anc.nama ASC;");
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
                                              FROM anc
                                              WHERE anc.id_petugas='$id_petugas'
                                              AND anc.id_sesi=1
                                              AND anc.jadwal='$tanggalsekarang';");
                                            while($d = mysqli_fetch_array($data)){
                                              ?>
                                              <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                            </div>
                                            <table class="table table-bordered table-hover table-striped tablesorter">
                                              <thead>
                                                <tr>
                                                  <th><center>No</center></th>
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
                                                  "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                                  IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                                  FROM anc, mr_petugas, sesi
                                                  WHERE anc.id_petugas=mr_petugas.id_petugas
                                                  AND anc.id_sesi=sesi.id_sesi
                                                  AND anc.id_sesi=1
                                                  AND anc.id_petugas='$id_petugas'
                                                  AND anc.jadwal='$tanggalsekarang'
                                                  ORDER BY anc.nama ASC;");
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
                                                  FROM anc
                                                  WHERE anc.id_petugas='$id_petugas'
                                                  AND anc.id_sesi=2
                                                  AND anc.jadwal='$tanggalsekarang';");
                                                while($d = mysqli_fetch_array($data)){
                                                  ?>
                                                  <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                                </div>
                                                <table class="table table-bordered table-hover table-striped tablesorter">
                                                  <thead>
                                                    <tr>
                                                      <th><center>No</center></th>
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
                                                      "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                                      IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                                      FROM anc, mr_petugas, sesi
                                                      WHERE anc.id_petugas=mr_petugas.id_petugas
                                                      AND anc.id_sesi=sesi.id_sesi
                                                      AND anc.id_sesi=2
                                                      AND anc.id_petugas='$id_petugas'
                                                      AND anc.jadwal='$tanggalsekarang'
                                                      ORDER BY anc.nama ASC;");
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
                                                      FROM anc
                                                      WHERE anc.id_petugas='$id_petugas'
                                                      AND anc.id_sesi=3
                                                      AND anc.jadwal='$tanggalsekarang';");
                                                     while($d = mysqli_fetch_array($data)){
                                                      ?>
                                                      <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                                    </div>
                                                    <table class="table table-bordered table-hover table-striped tablesorter">
                                                      <thead>
                                                        <tr>
                                                          <th><center>No</center></th>
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
                                                          "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                                          IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                                          FROM anc, mr_petugas, sesi
                                                          WHERE anc.id_petugas=mr_petugas.id_petugas
                                                          AND anc.id_sesi=sesi.id_sesi
                                                          AND anc.id_sesi=3
                                                          AND anc.id_petugas='$id_petugas'
                                                          AND anc.jadwal='$tanggalsekarang'
                                                          ORDER BY anc.nama ASC;");
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
                                                          FROM anc
                                                          WHERE anc.id_petugas='$id_petugas'
                                                          AND anc.id_sesi=4
                                                          AND anc.jadwal='$tanggalsekarang';");
                                                        while($d = mysqli_fetch_array($data)){
                                                          ?>
                                                          <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                                                        </div>
                                                        <table class="table table-bordered table-hover table-striped tablesorter">
                                                          <thead>
                                                            <tr>
                                                              <th><center>No</center></th>
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
                                                              "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                                                              IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                                                              FROM anc, mr_petugas, sesi
                                                              WHERE anc.id_petugas=mr_petugas.id_petugas
                                                              AND anc.id_sesi=sesi.id_sesi
                                                              AND anc.id_sesi=4
                                                              AND anc.id_petugas='$id_petugas'
                                                              AND anc.jadwal='$tanggalsekarang'
                                                              ORDER BY anc.nama ASC;");
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