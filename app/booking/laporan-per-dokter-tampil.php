<?php include "views/header.php"; ?>
<?php
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
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<?php
$id_dokter  = $_POST['id_dokter'];
$awal       = $_POST['awal'];
$akhir      = $_POST['akhir'];
$id_sesi    = $_POST['id_sesi'];
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Pencarian <small> Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laporan-per-dokter"><i class="fa fa-search"></i> Cari</a></li>
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
            <form method="post" action="laporan-per-dokter-export" role="form">
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_dokter" value="<?php echo $id_dokter?>">
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
            <form method="post" action="laporan-per-dokter-print" role="form">
              <div class="form-group">
                <input class="form-control" type="hidden" name="id_dokter" value="<?php echo $id_dokter?>">
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
          "SELECT COUNT(id_booking) AS total
          FROM booking
          WHERE booking_tanggal BETWEEN '$awal' AND '$akhir'
          AND id_sesi = '$id_sesi'
          AND id_dokter='$id_dokter' ORDER BY id_booking ASC;");
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
              <th><center>Dokter</center></th>
              <th><center>Jadwal</center></th>
              <th><center>Sesi</center></th>
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
              AND booking.booking_tanggal BETWEEN '$awal' AND '$akhir'
              AND booking.id_sesi = '$id_sesi'
              AND booking.id_dokter='$id_dokter' ORDER BY booking.id_booking ASC;");
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
                <td><center><?php echo $d['booking_tanggal']; ?></center></td>
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
                  <a href="booking-detail?id_booking=<?php echo $d['id_booking']; ?>"
                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                  </div>
                </td>
                </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div><!-- /.row -->
        <?php include "../copyright.php";?>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>