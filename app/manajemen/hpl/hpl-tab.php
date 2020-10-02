<?php
include "views/header.php";
if($_GET['dokter']){
  $dokter = $_GET['dokter'];
}else{
  $bulan = $_GET['bulan'];
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
      <h1>Filter <small>HPL</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Filter</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <?php 
      if($dokter){ ?>
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Per Dokter</button>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <?php 
            $data = mysqli_query($koneksi,
              "SELECT hpl_register.id_dokter, dokter.nama_dokter FROM hpl_register, dokter WHERE hpl_register.id_dokter=dokter.id_dokter AND MONTH(hpl_register.tgl_hpl)='$bulan' AND YEAR(hpl_register.tgl_hpl)='$tahun' GROUP BY hpl_register.id_dokter;");
            while($d = mysqli_fetch_array($data)){
              echo "<li><a href='hpl-tab.php?dokter=".$d['id_dokter']."'>".$d['nama_dokter']."</a></li>";
            }
            ?>
          </ul>
        </div>
        <div class="row">
          <div align="right" class="col-lg-12">
            <?php
            $data = mysqli_query($koneksi,
              "SELECT COUNT(id_hpl_register) AS total
              FROM hpl_register
              WHERE id_dokter='$dokter';");
            while($d = mysqli_fetch_array($data)){
              ?>
              <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
            </div>
          </div><!-- row -->
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
              <thead>
                <tr>
                  <th><center>#</center></th>
                  <th><center>No. RM</center></th>
                  <th><center>Nama Pasien</center></th>
                  <th><center>Kontak</center></th>
                  <th><center>Dokter</center></th>
                  <th><center>Prakiraan HPL</center></th>
                  <th colspan='2'><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                $data = mysqli_query($koneksi,
                  "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, mr_pasien.nama, mr_pasien.telp, dokter.nama_dokter, psdi_petugas.nama AS nama_petugas
                  FROM hpl_register, mr_pasien, dokter, psdi_petugas
                  WHERE hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
                  AND hpl_register.id_dokter=dokter.id_dokter
                  AND hpl_register.id_petugas=psdi_petugas.id_petugas
                  AND hpl_register.id_dokter='$dokter'
                  AND MONTH(hpl_register.tgl_hpl)='$bulan'
                  AND YEAR(hpl_register.tgl_hpl)='$tahun'
                  ORDER BY hpl_register.tgl_hpl ASC;");
                while($d = mysqli_fetch_array($data)){
                  $id_booking = $d['id_booking'];
                  $tgl_hpl    = $d['tgl_hpl'];
                  $sub_kontak = substr($d['telp'],1);
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                    <td><center><?php echo $d['nama']; ?></center></td>
                    <td><center><?php echo $d['telp']; ?></center></td>
                    <td><center><?php echo $d['nama_dokter']; ?></center></td>
                    <td><center><?php echo date('d F Y', strtotime($tgl_hpl)); ?></center></td>
                    <td>
                      <div align="center">
                        <a href="hpl-detail.php?id=<?php echo $d['id_hpl_register']; ?>"
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
              </div><!-- table responsive -->
            <?php }else{ ?>
              <div class="btn-group">
                <button type="button" class="btn btn-primary">Per Bulan</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href='hpl-tab.php?bulan=1'><?php echo $tahun; ?> Januari</a></li>
                  <li><a href='hpl-tab.php?bulan=2'><?php echo $tahun; ?> Februari</a></li>
                  <li><a href='hpl-tab.php?bulan=3'><?php echo $tahun; ?> Maret</a></li>
                  <li><a href='hpl-tab.php?bulan=4'><?php echo $tahun; ?> April</a></li>
                  <li><a href='hpl-tab.php?bulan=5'><?php echo $tahun; ?> Mei</a></li>
                  <li><a href='hpl-tab.php?bulan=6'><?php echo $tahun; ?> Juni</a></li>
                  <li><a href='hpl-tab.php?bulan=7'><?php echo $tahun; ?> Juli</a></li>
                  <li><a href='hpl-tab.php?bulan=8'><?php echo $tahun; ?> Agustus</a></li>
                  <li><a href='hpl-tab.php?bulan=9'><?php echo $tahun; ?> September</a></li>
                  <li><a href='hpl-tab.php?bulan=10'><?php echo $tahun; ?> Oktober</a></li>
                  <li><a href='hpl-tab.php?bulan=11'><?php echo $tahun; ?> November</a></li>
                  <li><a href='hpl-tab.php?bulan=12'><?php echo $tahun; ?> Desember</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="row">
                <div align="right" class="col-lg-12">
                  <?php
                  $data = mysqli_query($koneksi,
                    "SELECT COUNT(id_hpl_register) AS total
                    FROM hpl_register
                    WHERE MONTH(hpl_register.tgl_hpl)='$bulan'
                    AND YEAR(hpl_register.tgl_hpl)='$tahun';");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
                  </div>
                </div><!-- row -->
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th><center>#</center></th>
                        <th><center>No. RM</center></th>
                        <th><center>Nama Pasien</center></th>
                        <th><center>Kontak</center></th>
                        <th><center>Dokter</center></th>
                        <th><center>Prakiraan HPL</center></th>
                        <th colspan='2'><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysqli_query($koneksi,
                        "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, mr_pasien.nama, mr_pasien.telp, dokter.nama_dokter, psdi_petugas.nama AS nama_petugas
                        FROM hpl_register, mr_pasien, dokter, psdi_petugas
                        WHERE hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
                        AND hpl_register.id_dokter=dokter.id_dokter
                        AND hpl_register.id_petugas=psdi_petugas.id_petugas
                        AND MONTH(hpl_register.tgl_hpl)='$bulan'
                        AND YEAR(hpl_register.tgl_hpl)='$tahun'
                        ORDER BY hpl_register.tgl_hpl ASC;");
                      while($d = mysqli_fetch_array($data)){
                        $id_booking = $d['id_booking'];
                        $tgl_hpl    = $d['tgl_hpl'];
                        $sub_kontak = substr($d['telp'],1);
                        ?>
                        <tr>
                          <td><center><?php echo $no++; ?></center></td>
                          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                          <td><center><?php echo $d['nama']; ?></center></td>
                          <td><center><?php echo $d['telp']; ?></center></td>
                          <td><center><?php echo $d['nama_dokter']; ?></center></td>
                          <td><center><?php echo date('d F Y', strtotime($tgl_hpl)); ?></center></td>
                          <td>
                            <div align="center">
                              <a href="hpl-detail.php?id=<?php echo $d['id_hpl_register']; ?>"
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
                    </div><!-- table responsive -->
                  <?php } ?>
                </div><!-- row -->
              </div><!-- /#wrapper -->
              <?php include "views/footer.php"; ?>