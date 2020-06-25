<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small>SDM</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">80</p>
                  <p class="announcement-text">Pegawai Aktif</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-user-md fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">6</p>
                  <p class="announcement-text">Dokter Spesialis</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-user-md fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">5</p>
                  <p class="announcement-text">Dokter Umum</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-stethoscope fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">30</p>
                  <p class="announcement-text">Tenaga Kesehatan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
<?php include 'views/footer.php';?>
