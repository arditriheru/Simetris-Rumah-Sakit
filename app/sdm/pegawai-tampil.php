<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>Pegawai</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Pegawai</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><div align="center">No</div></th>
              <!--<th><div align="center">Absensi</div></th>-->
              <th><div align="center">Nama</div></th>
              <th><div align="center">Username</div></th>
              <th><div align="center">Unit</div></th>
              <th><div align="center">Jabatan</div></th>
              <th><div align="center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"
              SELECT *, mr_unit.nama_unit, psdi_jabatan.nama_jabatan,
              IF (psdi_petugas.sex=1, 'Laki-laki', 'Perempuan') AS sex,
              IF (psdi_petugas.status=1, 'Part Time', 'Full Time') AS status
              FROM mr_unit, psdi_petugas, psdi_jabatan
              WHERE psdi_petugas.id_unit = mr_unit.id_unit
              AND psdi_petugas.id_jabatan = psdi_jabatan.id_jabatan 
              ORDER BY nama ASC ;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><div align="center"><?php echo $no++; ?></div></td>
                <!--<td><div align="center"><?php echo $d['nik']; ?></div></td>-->
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nama_user']; ?></td>
                <td><?php echo $d['nama_unit']; ?></td>
                <td><?php echo $d['nama_jabatan']; ?></td>
                <td>
                  <div align="center">
                    <a href="pegawai-detail.php?id_petugas=<?php echo $d['id_petugas']; ?>"
                      <button type="button" class="btn btn-warning">DETAIL</a><br><br>
                      </div>
                    </td>
                    </tr><?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.row -->
          <?php include 'views/footer.php';?>