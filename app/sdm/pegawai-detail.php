
?>
<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Biodata <small>Pegawai</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="pegawai-tampil.php"><i class="fa fa-user"></i> Pegawai</a></li>
        <li class="active"><i class="fa fa-edit"></i> Detail</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php 
        include '../koneksi.php';
        $id_petugas = $_GET['id_petugas'];
        $data = mysqli_query($koneksi,
          "SELECT *, mr_unit.nama_unit, psdi_jabatan.nama_jabatan,
          IF (psdi_petugas.sex=1, 'Laki-laki', 'Perempuan') AS sex,
          IF (psdi_petugas.status=1, 'Part Time', 'Full Time') AS status
          FROM mr_unit, psdi_petugas, psdi_jabatan
          WHERE psdi_petugas.id_unit = mr_unit.id_unit
          AND psdi_petugas.id_jabatan = psdi_jabatan.id_jabatan
          AND id_petugas='$id_petugas';");
        while($d = mysqli_fetch_array($data)){
          <table class="table table-bordered table-hover table-striped tablesorter">
          <tbody>
          <tr>
          <td>No.Absen</td>
          <td><?php echo $d['nik']; ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><?php echo $d['nama']; ?></td>
        </tr>
        <tr>
          <td>Tempat/ Tgl Lahir</td>
          <td><?php echo $d['tempat']; ?>, <?php echo $d['tgl_lahir']; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?php echo $d['alamat']; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $d['sex']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Masuk</td>
          <td><?php echo $d['tanggal_masuk']; ?></td>
        </tr>
        <tr>
          <td>No. SIP</td>
          <td><?php echo $d['nomor_sip']; ?></td>
        </tr>
        <tr>
          <td>No. STR</td>
          <td><?php echo $d['nomor_str']; ?></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td><?php echo $d['nama_unit']; ?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td><?php echo $d['nama_jabatan']; ?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><?php echo $d['status']; ?></td>
          </tr><?php }?>
        </tbody>
      </table><h3>Hak Akses</h3>
      <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Aplikasi</div></th>
            <th><div align="center">Transaki</div></th>
            <th><div align="center">Data</div></th>
            <th><div align="center">Laporan</div></th>
            <th><div align="center">Hapus</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          $data = mysqli_query($koneksi,
            "SELECT *, psdi_aplikasi.nama_aplikasi,
            IF (psdi_riw_aplikasi.transaksi=1, 'Ya', 'Tidak') AS transaksi,
            IF (psdi_riw_aplikasi.data=1, 'Ya', 'Tidak') AS data,
            IF (psdi_riw_aplikasi.laporan=1, 'Ya', 'Tidak') AS laporan,
            IF (psdi_riw_aplikasi.hapus=1, 'Ya', 'Tidak') AS hapus
            FROM psdi_riw_aplikasi, psdi_aplikasi
            WHERE psdi_riw_aplikasi.id_aplikasi=psdi_aplikasi.id_aplikasi
            AND id_petugas='$id_petugas';");
          while($d = mysqli_fetch_array($data)){
           ?>
           <tr>
            <td><div align="center"><?php echo $no++; ?></div></td>
            <td><?php echo $d['nama_aplikasi']; ?></td>
            <td><?php echo $d['transaksi']; ?></td>
            <td><?php echo $d['data']; ?></td>
            <td><?php echo $d['laporan']; ?></td>
            <td><?php echo $d['hapus']; ?></td>
            </tr><?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.row -->
</div><br><br><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- JavaScript -->
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>