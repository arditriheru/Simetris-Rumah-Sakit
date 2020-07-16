<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Antenatal Care</small></h1>
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
          <?php $id_anc = $_GET['id_anc']; ?>
          <div class="col-lg-6">
            <a href="anc-datang-proses?id_anc=<?php echo $id_anc; ?>"
              <button onclick="javascript: return confirm('Sudah Datang?')"
              type="button" class="btn btn-success">Datang</button>
            </a>
            <a href="anc-belum-datang-proses?id_anc=<?php echo $id_anc; ?>"
              <button onclick="javascript: return confirm('Ubah Belum Datang?')"
              type="button" class="btn btn-warning">Belum Datang</button>
            </a>
            <a href="anc-edit?id_anc=<?php echo $id_anc; ?>"
              <button type="button" class="btn btn-primary">Edit</button>
            </a>
          </div>
          <div align="right" class="col-lg-6">
            <a href="anc-hapus?id_anc=<?php echo $id_anc; ?>"
              onclick="javascript: return confirm('Anda yakin hapus?')">
              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </a>
          </div>
        </div><br><br><br><!-- Row --->
        <table class="table table-bordered table-hover table-striped tablesorter">
          <?php 
          $data = mysqli_query($koneksi,
            "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi,
            IF (anc.status='1', 'Datang', 'Belum Datang') AS status
            FROM anc, mr_petugas, sesi
            WHERE anc.id_petugas=mr_petugas.id_petugas
            AND anc.id_sesi=sesi.id_sesi
            AND anc.id_anc=$id_anc;");
          while($d = mysqli_fetch_array($data)){
            $jadwal = $d['jadwal'];
            function format_jadwal($jadwal)
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
              $split = explode('-', $jadwal);
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
                <td><b>Nomor Rekam Medik</b></td>
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
                <td><b>Petugas</b></td>
                <td><?php echo $d['nama_petugas']; ?></td>
              </tr>
              <tr>
                <td><b>Jadwal</b></td>
                <td><?php echo format_jadwal($jadwal); ?></td>
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
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>