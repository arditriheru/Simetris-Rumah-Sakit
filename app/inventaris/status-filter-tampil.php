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
      $status = $_POST['status'];
      $a = mysqli_query($koneksi,
        "SELECT COUNT(*) AS total
        FROM inventaris
        WHERE status = '$status';");
      while($b = mysqli_fetch_array($a)){
        $total = $b['total'];
        ?>
        <h1>Jumlah <small> <?php echo $total;}?> Barang</small></h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="inventaris-filter.php"><i class="fa fa-search"></i> Cari</a></li>
          <li class="active"><i class="fa fa-list"></i> List</li>
        </ol>  
        <?php include "../../system/welcome.php"?>
      </div>
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nomor Inventaris</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Jenis</center></th>
                <th><center>Ruangan</center></th>
                <th><center>Pengadaan</center></th>
                <th><center>Status</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              date_default_timezone_set("Asia/Jakarta");
              $tanggalHariIni=date('Y-m-d');
              $data = mysqli_query($koneksi,
                "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
                IF (inventaris.status='1', 'Baru', 'Bekas') AS status
                FROM inventaris, inventaris_jenis, inventaris_ruangan
                WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                AND inventaris.status = '$status'
                ORDER BY inventaris.kode_registrasi ASC;");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><center><?php echo $d['nomor_inventaris']; ?></center></td>
                  <td><center><?php echo $d['nama_barang']; ?></center></td>
                  <td><center><?php echo $d['nama_jenis']; ?></center></td>
                  <td><center><?php echo $d['nama_ruangan']; ?></center></td>
                  <td><center><?php 
                  if($d['tanggal_pengadaan']=='0000-00-00'){
                    echo "-";
                  }else{
                    echo date("d/m/Y",strtotime($d['tanggal_pengadaan']));
                  } ?></center></td>
                  <td><center><?php echo $d['status']; ?></center></td>
                  <td>
                    <div align="center">
                      <a href="inventaris-detail.php?id=<?php echo $d['kode_registrasi']; ?>"
                        <button type="button" class="btn btn-warning">Detail</a><br><br>
                        </div>
                      </td>
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
