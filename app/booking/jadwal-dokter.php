<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Jadwal <small>Dokter</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calendar"></i> Jadwal</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="bluetext"><b>Dokter Spesialis Anak</b></h4>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Dokter</center></th>
                <th><center>Senin</center></th>
                <th><center>Selasa</center></th>
                <th><center>Rabu</center></th>
                <th><center>Kamis</center></th>
                <th><center>Jumat</center></th>
                <th><center>Sabtu</center></th>
                <th><center>Minggu</center></th>
              </tr>
            </thead>
            <?php 
            $no = 1;
            $data = mysqli_query($koneksi,
              "SELECT *, dokter.nama_dokter
              FROM jadwal, dokter
              WHERE jadwal.id_dokter=dokter.id_dokter
              AND jadwal.sp=1 ORDER BY jadwal.id_dokter ASC;");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tbody>
                <tr>
                  <td><center><?php echo $no++; ?></td>
                    <td><left>
                      <a href="jadwal-edit?id_jadwal=<?php echo $d['id_jadwal'];?>"><?php echo $d['nama_dokter']; ?></a>
                    </td>
                    <td><center><?php echo $d['sen']; ?></center></td>
                    <td><center><?php echo $d['sel']; ?></center></td>
                    <td><center><?php echo $d['rab']; ?></center></td>
                    <td><center><?php echo $d['kam']; ?></center></td>
                    <td><center><?php echo $d['jum']; ?></center></td>
                    <td><center><?php echo $d['sab']; ?></center></td>
                    <td><center><?php echo $d['min']; ?></center></td>
                  </tr>
                </tbody>
              <?php }?>
            </table>
            <a href="jadwal-tambah?sp=1"><button type="button" class="btn btn-success">Tambah</button></a>
          </div><br>
          <div class="col-xs-12"><h4 class="bluetext"><b>Dokter Spesialis Kebidanan dan Kandungan</b></h4>
            <table class="table table-bordered table-hover table-striped tablesorter">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Dokter</center></th>
                  <th><center>Senin</center></th>
                  <th><center>Selasa</center></th>
                  <th><center>Rabu</center></th>
                  <th><center>Kamis</center></th>
                  <th><center>Jumat</center></th>
                  <th><center>Sabtu</center></th>
                  <th><center>Minggu</center></th>
                </tr>
              </thead>
              <?php 
              $no = 1;
              $data = mysqli_query($koneksi,
                "SELECT *, dokter.nama_dokter
                FROM jadwal, dokter
                WHERE jadwal.id_dokter=dokter.id_dokter
                AND jadwal.sp=2 ORDER BY jadwal.id_dokter ASC;");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tbody>
                  <tr>
                    <td><center><?php echo $no++; ?></td>
                      <td><left>
                        <a href="jadwal-edit?id_jadwal=<?php echo $d['id_jadwal'];?>"><?php echo $d['nama_dokter']; ?></a>
                      </td>
                      <td><center><?php echo $d['sen']; ?></center></td>
                      <td><center><?php echo $d['sel']; ?></center></td>
                      <td><center><?php echo $d['rab']; ?></center></td>
                      <td><center><?php echo $d['kam']; ?></center></td>
                      <td><center><?php echo $d['jum']; ?></center></td>
                      <td><center><?php echo $d['sab']; ?></center></td>
                      <td><center><?php echo $d['min']; ?></center></td>
                    </tr>
                  </tbody>
                <?php }?>
              </table>
              <a href="jadwal-tambah?sp=2"><button type="button" class="btn btn-success">Tambah</button></a>
            </div>
          </div>
        </div>
      </div><!-- /#wrapper -->
      <?php include "views/footer.php"; ?> 