<?php 
include "views/header.php";
$m = 31;
$nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
$mak   = date("Y-m-d", $nextN);

function format_mak($mak)
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
  $split = explode('-', $mak);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
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
      <h1>Tambah <small>Rapid Test</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <form method="post" action="covid-rapid-tambah-cari-rm" role="form">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Nomor RM</label>
          <input class="form-control" type="text" name="id_catatan_medik" placeholder="Nomor Rekam Medik">
        </div><button type="submit" class="btn btn-success">Cari</button>
      </div>
    </form>
  </div><br><!-- /.row -->
  <div class="row">
   <div class="col-lg-12">
    <table class="table table-bordered table-hover table-striped tablesorter">
      <thead>
        <tr>
         <th><center>No. RM</center></th>
         <th><center>Nama Pasien</center></th>
         <th><center>Dokter</center></th>
         <th><center>IgM</center></th>
         <th><center>IgG</center></th>
         <th><center>Tanggal Input</center></th>
         <th colspan='3'><center>Action</center></th>
       </tr>
     </thead>
     <tbody>
      <?php
      $data = mysqli_query($koneksi,
        "SELECT *, mr_dokter.nama_dokter,
        IF(rapidtest.igm='1', 'Reaktif', 'Non Reaktif') AS nama_igm,
        IF(rapidtest.igg='1', 'Reaktif', 'Non Reaktif') AS nama_igg
        FROM rapidtest, mr_dokter
        WHERE rapidtest.id_dokter=mr_dokter.id_dokter
        AND tanggal BETWEEN '$min' AND '$mak'
        ORDER BY id_rapidtest DESC;");
      while($d = mysqli_fetch_array($data)){
        $tgl_periksa  = $d['tgl_periksa'];
        $tanggal      = $d['tanggal'];
        $lahir        = new DateTime($d['tgl_lahir']);
        $today        = new DateTime();
        $umur         = $today->diff($lahir);
        ?>
        <tr>
          <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
          <td><center><?php echo $d['nama']; ?></center></td>
          <td><center><?php echo $d['nama_dokter']; ?></center></td>
          <td><center><?php echo $d['nama_igm']; ?></center></td>
          <td><center><?php echo $d['nama_igg']; ?></center></td>
          <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
          <td>
            <div align="center">
              <a href="covid-rapid-detail?id=<?php echo $d['id_rapidtest']; ?>"
                <button type="button" class="btn btn-primary"><i class='fa fa-print'></i> Print</button></a>
              </div>
            </td>
            </tr><?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?> 