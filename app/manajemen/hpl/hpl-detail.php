<?php
include "views/header.php";
$id_hpl_register = $_GET['id'];
?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>HPL</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Detail</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div clas="row">
    <div class="col-lg-3">
      <a href="hpl-edit.php?id=<?php echo $id_hpl_register; ?>"
        <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
      </a>
    </div>
    <div align="right" class="col-lg-3">
      <a href="hpl-hapus.php?id=<?php echo $id_hpl_register; ?>"
        onclick="javascript: return confirm('Anda yakin hapus?')">
        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
      </a>
    </div>
  </div><!-- /.row -->
  <br><br><br>
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        $data = mysqli_query($koneksi,
          "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, hpl_register.tanggal, hpl_register.jam, mr_pasien.nama, mr_pasien.telp, mr_pasien.alamat, dokter.nama_dokter, psdi_petugas.nama AS nama_petugas
          FROM hpl_register
          INNER JOIN mr_pasien ON hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
          INNER JOIN dokter ON hpl_register.id_dokter=dokter.id_dokter
          INNER JOIN psdi_petugas ON hpl_register.id_petugas=psdi_petugas.id_petugas
          WHERE hpl_register.id_hpl_register='$id_hpl_register'
          ORDER BY hpl_register.tgl_hpl ASC;");
        while($d = mysqli_fetch_array($data)){
          $tgl_hpl = $d['tgl_hpl'];
          function format_jadwal($tgl_hpl)
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
            $split = explode('-', $tgl_hpl);
            return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
          }
          $tgl_regis = $d['tanggal'];
          function format_regis($tgl_regis)
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
            $split = explode('-', $tgl_regis);
            return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
          }
          ?>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <tr>
                <td colspan="2"><div align="center"><b>Detail Pasien</b></div></td>
              </tr>
              <tr>
                <td><b>Nomor RM</b></td>
                <td><?php echo $d['id_catatan_medik']; ?></td>
              </tr>
              <tr>
                <td><b>Nama Pasien</b></td>
                <td><?php echo $d['nama']; ?></td>
              </tr>
              <tr>
                <td><b>Alamat</b></td>
                <td><?php echo $d['alamat']; ?></td>
              </tr>
              <tr>
                <td><b>Kontak</b></td>
                <td><?php echo $d['telp']; ?></td>
              </tr>
              <tr>
                <td><b>Dokter</b></td>
                <td><?php echo $d['nama_dokter']; ?></td>
              </tr>
              <tr>
                <td><b>Prakiraan HPL</b></td>
                <td><?php echo format_jadwal($tgl_hpl); ?></td>
              </tr>
              <tr>
                <td><b>Registrasi</b></td>
                <td><?php echo format_regis($tgl_regis); ?> / <?php echo $d['jam']; ?></td>
              </tr>
              <tr>
                <td><b>Petugas</b></td>
                <td><?php echo $d['nama_petugas']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
  </div><!-- /row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>