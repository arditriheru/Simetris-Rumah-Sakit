<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php
      $id_dokter    = $_POST['id_dokter'];
      $tanggal      = $_POST['tanggal'];
      $id_sesi      = $_POST['id_sesi'];      
      $a = mysqli_query($koneksi,"SELECT COUNT(*) AS total
        FROM booking
        WHERE booking_tanggal = '$tanggal'
        AND id_sesi = '$id_sesi'
        AND id_dokter='$id_dokter';");
      while($b = mysqli_fetch_array($a)){
        $total = $b['total'];

        function tanggal($tanggal)
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
          $split = explode('-', $tanggal);
          return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }
        ?>
        <h1>Antrian <small> <?php echo $total;}?> Pasien</small></h1>
        <ol class="breadcrumb">
          <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="booking-filter"><i class="fa fa-search"></i> Cari</a></li>
          <li class="active"><i class="fa fa-calendar"></i> <?php echo tanggal($tanggal); ?></li>
        </ol>  
        <?php include "../../system/welcome.php"?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>No.RM</center></th>
                <th><center>Nama</center></th>
                <th><center>Alamat</center></th>
                <th><center>Kontak</center></th>
                <th><center>Dokter</center></th>
                <th><center>Sesi</center></th>
                <th><center>Status</center></th>
                <th><center>Keterangan</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $data = mysqli_query($koneksi,"SELECT *, dokter.nama_dokter, sesi.nama_sesi,
                IF (booking.status='1', 'Datang', 'Belum Datang') AS status
                FROM booking, dokter, sesi
                WHERE booking.id_dokter=dokter.id_dokter
                AND booking.id_sesi=sesi.id_sesi
                AND booking.booking_tanggal = '$tanggal'
                AND booking.id_sesi = '$id_sesi'
                AND booking.id_dokter='$id_dokter' ORDER BY booking.id_booking ASC;");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                  <td><center><?php echo $d['nama']; ?></center></td>
                  <td><center><?php echo $d['alamat']; ?></center></td>
                  <td><center><?php echo $d['kontak']; ?></center></td>
                  <td><center><?php echo $d['nama_dokter']; ?></center></td>
                  <td><center><?php echo $d['nama_sesi']; ?></center></td>
                  <td><center><?php echo $d['status']; ?></center></td>
                  <td><center><?php echo $d['keterangan']; ?></center></td>
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
            </div>
          </div><!-- /.row -->
        </div><!-- /#wrapper -->
        <?php include "views/footer.php"; ?>
