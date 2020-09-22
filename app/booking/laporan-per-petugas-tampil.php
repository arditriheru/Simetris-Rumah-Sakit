<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<?php
$id_petugas = $_POST['id_petugas'];
$awal       = $_POST['awal'];
$akhir      = $_POST['akhir'];
$id_sesi    = $_POST['id_sesi'];

$a = mysqli_query($koneksi,
  "SELECT pelayanan FROM mr_petugas WHERE id_petugas = '$id_petugas';");
while($b = mysqli_fetch_array($a)){
  $pelayanan = $b['pelayanan'];
}

function awal($awal)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $awal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function akhir($akhir)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $akhir);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Pencarian <small> Tumbuh Kembang</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laporan-per-petugas.php"><i class="fa fa-search"></i> Cari</a></li>
        <li class="active"><i class="fa fa-list"></i> <?php echo awal($awal);?> - <?php echo akhir($akhir);?></li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div class="col-lg-8">
         <div class="row">
          <div class="col-lg-2">
            <form method="post" action="laporan-per-petugas-export.php" role="form">
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_petugas" value="<?php echo $id_petugas?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="awal" value="<?php echo $awal?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_sesi" value="<?php echo 
                $id_sesi?>">
              </div>
              <button type="submit" class="btn btn-success"><i class='fa fa-download'></i> Excel</button>
            </form>
          </div>
          <div class="col-lg-2">
            <form method="post" action="laporan-per-petugas-print.php" role="form">
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_petugas" value="<?php echo $id_petugas?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="awal" value="<?php echo $awal?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir?>">
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_sesi" value="<?php echo 
                $id_sesi?>">
              </div>
              <button type="submit" class="btn btn-primary"><i class='fa fa-print'></i> Print</button>
            </form>
          </div>
        </div>
      </div>
      <div align="right" class="col-lg-4">
        <?php
        $data = mysqli_query($koneksi,
          "SELECT COUNT(id_tumbang) AS total
          FROM tumbang
          WHERE jadwal BETWEEN '$awal' AND '$akhir'
          AND id_sesi = '$id_sesi'
          AND id_petugas='$id_petugas' ORDER BY id_tumbang ASC;");
        while($d = mysqli_fetch_array($data)){
          ?>
          <h1><small>Total <?php echo $d['total']; }?> Pasien</small></h1>
        </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>No.RM</center></th>
              <th><center>Nama</center></th>
              <th><center>Kontak</center></th>
              <th><center>petugas</center></th>
              <th><center>Jadwal</center></th>
              <th><center>Sesi</center></th>
              <th colspan='2'><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            if($pelayanan == 1){
              $data = mysqli_query($koneksi,
                "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                IF (tumbang.status='1', 'Datang', 'Belum Datang') AS status
                FROM tumbang, mr_petugas, sesi
                WHERE tumbang.id_petugas=mr_petugas.id_petugas
                AND tumbang.id_sesi=sesi.id_sesi
                AND tumbang.jadwal BETWEEN '$awal' AND '$akhir'
                AND tumbang.id_sesi = '$id_sesi'
                AND tumbang.id_petugas='$id_petugas' ORDER BY tumbang.id_tumbang ASC;");
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
                  <td><center><?php echo $d['jadwal']; ?></center></td>
                  <td><center><?php echo $d['nama_sesi']; ?></center></td>
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
                    <a href="tumbang-detail.php?id_tumbang=<?php echo $d['id_tumbang']; ?>"
                      <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                    </div>
                  </td>
                  </tr><?php } }elseif($pelayanan == 2){
                   $data = mysqli_query($koneksi,
                    "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
                    IF (anc.status='1', 'Datang', 'Belum Datang') AS status
                    FROM anc, mr_petugas, sesi
                    WHERE anc.id_petugas=mr_petugas.id_petugas
                    AND anc.id_sesi=sesi.id_sesi
                    AND anc.jadwal BETWEEN '$awal' AND '$akhir'
                    AND anc.id_sesi = '$id_sesi'
                    AND anc.id_petugas='$id_petugas' ORDER BY anc.id_anc ASC;");
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
                      <td><center><?php echo $d['jadwal']; ?></center></td>
                      <td><center><?php echo $d['nama_sesi']; ?></center></td>
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
                        <a href="anc-detail.php?id_anc=<?php echo $d['id_anc']; ?>"
                          <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                        </div>
                      </td>
                      </tr><?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div><!-- /.row -->
              <?php include "../copyright.php";?>
            </div><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>