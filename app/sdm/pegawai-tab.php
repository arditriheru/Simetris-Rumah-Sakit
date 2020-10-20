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
      $id = $_GET['id'];
      if($id==1){
        $medis='1'; ?>
        <h1>Tenaga <small>Medis</small></h1>
      <?php }elseif ($id==2){ ?>
        <h1>Tenaga <small>Non Medis</small></h1>
        <?php $medis='0'; ?>
      <?php }else{ ?>
        <h1>Pegawai <small>Kontrak Habis</small></h1>
      <?php }
      ?>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check"></i> Pegawai</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Filter</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href=''>All</a></li>
          <li><a href='pegawai-tab.php?id=1'>Tenaga Medis</a></li>
          <li><a href='pegawai-tab.php?id=2'>Tenaga Non Medis</a></li>
          <li><a href='pegawai-tab.php?id=3'>Kontrak Habis</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
    <div class="col-lg-6">
      <form method="post" action="pegawai-tab.php" role="form">
        <div class="form-group input-group">
          <input type="text" class="form-control" name="carinama" placeholder="Pencarian Nama Pegawai">
          <span class="input-group-btn">
            <button type="submit" name="carinamasubmit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
           <th><center>#</center></th>
           <th><center>NIK</center></th>
           <th><center>Nama Pegawai</center></th>
           <th><center>Profesi</center></th>
           <th><center>Tanggal Masuk</center></th>
           <th><center>Kontrak Berakhir</center></th>
           <th><center>Status</center></th>
           <th colspan='3'><center>Action</center></th>
         </tr>
       </thead>
       <?php
       if(isset($_POST['carinamasubmit'])){ ?>
        <tbody>
          <?php
          $carinama = $_POST['carinama'];
          $no=1;
          $data = mysqli_query($koneksi,
            "SELECT sdm_pegawai.id_sdm_pegawai, sdm_pegawai.nik, sdm_pegawai.nama, sdm_pegawai.tgl_masuk, sdm_pegawai.id_profesi, sdm_pegawai.tgl_habis, sdm_pegawai.tetap, mr_profesi.nama_profesi,
            IF (sdm_pegawai.tetap='1', 'Tetap', 'Kontrak') AS nama_tetap
            FROM sdm_pegawai
            INNER JOIN mr_profesi
            ON sdm_pegawai.id_profesi = mr_profesi.id_profesi
            WHERE sdm_pegawai.nama LIKE '%' '$carinama' '%'
            ORDER BY sdm_pegawai.nama ASC;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><center><?php echo $no++; ?></center></td>
              <td><center><?php echo $d['nik']; ?></center></td>
              <td><center><?php echo $d['nama']; ?></center></td>
              <td><center><?php echo $d['nama_profesi']; ?></center></td>
              <td><center><?php echo date('d F Y', strtotime($d['tgl_masuk'])); ?></center></td>
              <td><center>
                <?php
                if($d['tetap']=='1'){
                  echo '-';
                }else{
                  echo date('d F Y', strtotime($d['tgl_habis'])); 
                }
                ?>
              </center></td>
              <td><center><?php echo $d['nama_tetap']; ?></center></td>
              <td>
                <div align="center">
                  <a href="pegawai-detail.php?id=<?php echo $d['id_sdm_pegawai']; ?>">
                    <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                  </div>
                </td>
                </tr><?php } ?>
              </tbody>
            <?php }else{ ?>
              <tbody>
                <?php
                $no=1;
                if($id==1 || $id==2){
                  $data = mysqli_query($koneksi,
                    "SELECT sdm_pegawai.id_sdm_pegawai, sdm_pegawai.nik, sdm_pegawai.nama, sdm_pegawai.tgl_masuk, sdm_pegawai.id_profesi, sdm_pegawai.tgl_habis, sdm_pegawai.tetap, mr_profesi.nama_profesi,
                    IF (sdm_pegawai.tetap='1', 'Tetap', 'Kontrak') AS nama_tetap
                    FROM sdm_pegawai
                    INNER JOIN mr_profesi
                    ON sdm_pegawai.id_profesi = mr_profesi.id_profesi
                    WHERE sdm_pegawai.medis = '$medis'
                    ORDER BY sdm_pegawai.nama ASC;");
                }elseif($id==3) {
                  $data = mysqli_query($koneksi,
                    "SELECT sdm_pegawai.id_sdm_pegawai, sdm_pegawai.nik, sdm_pegawai.nama, sdm_pegawai.tgl_masuk, sdm_pegawai.id_profesi, sdm_pegawai.tgl_habis, sdm_pegawai.tetap, mr_profesi.nama_profesi,
                    IF (sdm_pegawai.tetap='1', 'Tetap', 'Kontrak') AS nama_tetap
                    FROM sdm_pegawai
                    INNER JOIN mr_profesi
                    ON sdm_pegawai.id_profesi = mr_profesi.id_profesi
                    WHERE sdm_pegawai.tetap = '0'
                    AND sdm_pegawai.tgl_habis
                    BETWEEN (SELECT MIN(sdm_pegawai.tgl_habis) FROM sdm_pegawai WHERE sdm_pegawai.tetap = '0')
                    AND '$limit';");
                }
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $d['nik']; ?></center></td>
                    <td><center><?php echo $d['nama']; ?></center></td>
                    <td><center><?php echo $d['nama_profesi']; ?></center></td>
                    <td><center><?php echo date('d F Y', strtotime($d['tgl_masuk'])); ?></center></td>
                    <td><center>
                      <?php
                      if($d['tetap']=='1'){
                        echo '-';
                      }else{
                        echo date('d F Y', strtotime($d['tgl_habis'])); 
                      }
                      ?>
                    </center></td>
                    <td><center><?php echo $d['nama_tetap']; ?></center></td>
                    <td>
                      <div align="center">
                        <a href="pegawai-detail.php?id=<?php echo $d['id_sdm_pegawai']; ?>">
                          <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                        </div>
                      </td>
                      </tr><?php } ?>
                    </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <?php include "views/footer.php"; ?>