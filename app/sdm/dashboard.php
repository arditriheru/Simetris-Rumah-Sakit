<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <!-- <h1>Data Tampil <small><?php //echo format_min($min).' - '.format_mak($mak);?></small></h1> -->
      <h1>Dashboard <small><?php include "../../system/date-time.php";?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="col-lg-12">
    <div class="row">
      <?php 
      $data = mysqli_query($koneksi,
        "SELECT COUNT(id_sdm_pegawai) AS jmlmedis
        FROM sdm_pegawai
        WHERE medis = '1'
        AND aktif = '1';");
      while($d = mysqli_fetch_array($data)){
        ?>
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-user-md fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <p class="announcement-heading"><?php echo $d['jmlmedis'];?></p>
                  <p class="announcement-text">Tenaga Medis</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
      }
      $data = mysqli_query($koneksi,
        "SELECT COUNT(id_sdm_pegawai) AS jmlnonmedis
        FROM sdm_pegawai
        WHERE medis = '0'
        AND aktif = '1';");
      while($d = mysqli_fetch_array($data)){
        ?>
        <div class="col-lg-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-user fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <p class="announcement-heading"><?php echo $d['jmlnonmedis'];?></p>
                  <p class="announcement-text">Non Medis</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
      } 
      $data = mysqli_query($koneksi,
        "SELECT COUNT(id_sdm_pegawai) AS jmltotal
        FROM sdm_pegawai
        WHERE aktif = '1';");
      while($d = mysqli_fetch_array($data)){
        ?>
        <div class="col-lg-3">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-user-md fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <p class="announcement-heading"><?php echo $d['jmltotal'];?></p>
                  <p class="announcement-text">Pegawai Terdaftar</p>
                </div>
              </div>
            </div>
          </div>
          </div><?php
        }
        $data = mysqli_query($koneksi,
          "SELECT count(tgl_habis) AS jmltglhabis
          FROM sdm_pegawai
          WHERE tetap = '0'
          AND tgl_habis
          BETWEEN (SELECT MIN(tgl_habis) FROM sdm_pegawai WHERE tetap = '0')
          AND '$limit';");
        while($d = mysqli_fetch_array($data)){
          ?>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-warning fa-4x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <p class="announcement-heading"><?php echo $d['jmltglhabis'];?></p>
                    <p class="announcement-text">Kontrak Berakhir</p>
                  </div>
                </div>
              </div>
            </div>
            </div><?php } ?>
          </div><!-- /.row -->
        </div>
      </div><!-- /#wrapper -->
      <?php include "views/footer.php"; ?>