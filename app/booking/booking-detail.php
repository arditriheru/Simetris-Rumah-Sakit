<?php include "views/header.php"; ?>
<?php $id_booking = $_GET['id_booking'];?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-flash"></i> Detail</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div clas="row">
          <div class="col-lg-6">
            <a href="booking-datang-proses?id_booking=<?php echo $id_booking; ?>"
              <button onclick="javascript: return confirm('Sudah Datang?')"
              type="button" class="btn btn-success">Datang</button>
            </a>
            <a href="booking-belum-datang-proses?id_booking=<?php echo $id_booking; ?>"
              <button onclick="javascript: return confirm('Ubah Belum Datang?')"
              type="button" class="btn btn-warning">Belum Datang</button>
            </a>
            <a href="booking-edit?id_booking=<?php echo $id_booking; ?>"
              <button type="button" class="btn btn-primary">Edit</button>
            </a>
          </div>
          <div align="right" class="col-lg-6">
            <a href="booking-hapus?id_booking=<?php echo $id_booking; ?>"
              onclick="javascript: return confirm('Anda yakin hapus?')">
              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </a>
          </div>
        </div><br><br><br><!-- Row --->
        <table class="table table-bordered table-hover table-striped tablesorter">
          <?php 
          $data = mysqli_query($koneksi,
            "SELECT *, dokter.nama_dokter, sesi.nama_sesi,
            IF (booking.status='1', 'Datang', 'Belum Datang') AS status
            FROM booking, dokter, sesi
            WHERE booking.id_dokter=dokter.id_dokter
            AND booking.id_sesi=sesi.id_sesi
            AND booking.id_booking=$id_booking;");
          while($d = mysqli_fetch_array($data)){
            $booking_tanggal = $d['booking_tanggal'];
            function format_jadwal($booking_tanggal)
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
              $split = explode('-', $booking_tanggal);
              return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
            }
            $tanggal = $d['tanggal'];
            function format_reservasi($tanggal)
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
            <tbody>
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
                <td><?php echo $d['kontak']; ?></td>
              </tr>
              <tr>
                <td><b>Dokter</b></td>
                <td><?php echo $d['nama_dokter']; ?></td>
              </tr>
              <tr>
                <td><b>Jadwal</b></td>
                <td><?php echo format_jadwal($booking_tanggal); ?></td>
              </tr>
              <tr>
                <td><b>Sesi</b></td>
                <td><?php echo $d['nama_sesi']; ?></td>
              </tr>
              <tr>
                <td><b>Registrasi</b></td>
                <td><?php echo format_reservasi($tanggal); ?> / <?php echo $d['jam']; ?></td>
              </tr>
              <tr>
                <td><b>Status</b></td>
                <td><?php echo $d['status']; ?></td>
              </tr>
              <tr>
                <td><b>Keterangan</b></td>
                <td><?php echo $d['keterangan']; ?></td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.row -->
</div><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>