<?php include "views/header.php"; ?>
<?php $id_kuesioner = $_GET['id'];?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Kuesioner</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-flash"></i> Detail</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <a href="javascript: history.back()">
        <button type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</button></a><br><br>
        <div class="table-responsive">
          <?php 
          $data = mysqli_query($koneksi,
            "SELECT *, dokter.nama_dokter,
            CASE
            WHEN kuesioner.pelayanan='1' THEN 'Rawat Jalan'
            WHEN kuesioner.pelayanan='2' THEN 'Rawat Inap'
            WHEN kuesioner.pelayanan='3' THEN 'ANC'
            WHEN kuesioner.pelayanan='4' THEN 'Tumbuh Kembang'
            END AS nama_pelayanan,
            CASE
            WHEN kuesioner.bagian='parkir' THEN 'Parkir'
            WHEN kuesioner.bagian='satpam' THEN 'Satpam'
            WHEN kuesioner.bagian='pendaftaran' THEN 'Pendaftaran'
            WHEN kuesioner.bagian='poliklinik' THEN 'Poliklinik'
            WHEN kuesioner.bagian='dokter_umum' THEN 'Dokter Umum'
            WHEN kuesioner.bagian='perawat_ugd' THEN 'Perawat UDG'
            WHEN kuesioner.bagian='perawat_bidan' THEN 'Bidan / Perawat'
            WHEN kuesioner.bagian='dokter_spesialis' THEN 'Dokter Spesialis'
            WHEN kuesioner.bagian='laboratorium' THEN 'Laboratorium'
            WHEN kuesioner.bagian='farmasi' THEN 'Farmasi'
            WHEN kuesioner.bagian='gizi' THEN 'Gizi'
            WHEN kuesioner.bagian='kebersihan' THEN 'Kebersihan'
            WHEN kuesioner.bagian='sarpras' THEN 'Sarpras'
            WHEN kuesioner.bagian='kasir' THEN 'Kasir'
            WHEN kuesioner.bagian='rekomendasi' THEN 'Rekomendasi'
            END AS nama_bagian,
            CASE
            WHEN kuesioner.skor='1' THEN 'Sangat Puas'
            WHEN kuesioner.skor='2' THEN 'Cukup Puas'
            WHEN kuesioner.skor='3' THEN 'Tidak Puas'
            WHEN kuesioner.skor='4' THEN 'Sangat Ingin'
            WHEN kuesioner.skor='5' THEN 'Cukup Ingin'
            WHEN kuesioner.skor='6' THEN 'Tidak Ingin'
            END AS nama_skor
            FROM kuesioner, dokter
            WHERE kuesioner.id_dokter=dokter.id_dokter
            AND kuesioner.id_kuesioner='$id_kuesioner';");
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
            <table class="table table-bordered table-hover table-striped tablesorter">
              <tbody>
                <tr>
                  <td><b>Koresponden</b></td>
                  <td><?php echo $d['nama']; ?></td>
                </tr>
                <tr>
                  <td><b>Kontak</b></td>
                  <td><?php echo $d['kontak']; ?></td>
                </tr>
                <?php
                if($d['bagian']=='dokter_spesialis'){ ?>
                  <tr>
                    <td><b>Dokter Spesialis</b></td>
                    <td><?php echo $d['nama_dokter']; ?></td>
                  </tr>
                <?php } ?>
                <tr>
                  <td><b>Pelayanan</b></td>
                  <td><?php echo $d['nama_pelayanan']; ?></td>
                </tr>
                <tr>
                  <td><b>Bagian</b></td>
                  <td><?php echo $d['nama_bagian']; ?></td>
                </tr>
                <tr>
                  <td><b>Skor</b></td>
                  <td><?php echo $d['nama_skor']; ?></td>
                </tr>
                <tr>
                  <td><b>Tanggal / Jam</b></td>
                  <td><?php echo format_reservasi($tanggal); ?> / <?php echo $d['jam']; ?></td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
  <?php include "views/footer.php"; ?>