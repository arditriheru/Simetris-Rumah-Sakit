<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS - RSKIA Rachmi Yogyakarta</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
  <style>
    /* Center the loader */
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 0.5s linear infinite;
      animation: spin 0.5s linear infinite;
    }
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }
    @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 }
      to { bottom:0px; opacity:1 }
    }
    @keyframes animatebottom {
      from{ bottom:-100px; opacity:0 }
      to{ bottom:0; opacity:1 }
    }
    #myDiv {
      display: none;
    }
  </style>
</head>
<!-- Loading Page -->
<body onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">
    <nav>
      <div id="wrapper">
      </div><!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
      <img class="img-responsive" src="images/header.jpg" width="100%" alt="Gambar Bootstrap 3"><br>
      <div class="row">
        <div class="col-lg-12">
          <?php include "system/welcome.php"?>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.10:81">
                      <i class="fa fa-mobile fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Aplikasi</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/bangsal">
                      <i class="fa fa-heartbeat fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Bangsal</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/booking">
                      <i class="fa fa-calendar-check-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Booking</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/ebook">
                      <i class="fa fa-book fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>E-Book</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/farmasi">
                      <i class="fa fa-medkit fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Farmasi</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/sdi">
                      <i class="fa fa-user-plus fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Hak Akses</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/kamar">
                      <i class="fa fa-bed fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Info Bed</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/inventaris">
                      <i class="fa fa-paperclip fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Inventaris</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/kalender">
                      <i class="fa fa-calendar fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Kalender</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/kasir">
                      <i class="fa fa-dollar fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Kasir</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/kuesioner">
                      <i class="fa fa-smile-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Kepuasan</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/laboratorium">
                      <i class="fa fa-flask fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Laboratorium</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/manajemen">
                      <i class="fa fa-line-chart fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Manajemen</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/antrian/monitor-a">
                      <i class="fa fa-tv fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Monitor 1</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/poliklinik">
                      <i class="fa fa-stethoscope fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Poliklinik</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/covid">
                      <i class="fa fa-empire fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Rapid Test</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.250:8080/mr">
                      <i class="fa fa-id-card-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Rekam Medis</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="http://192.168.1.10:8080">
                      <i class="fa fa-database fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>Sismadak</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="https://sisrute.kemkes.go.id/baru/index.php">
                      <i class="fa fa-ambulance fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>SISRUTE</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-2"><a href="app/suket">
                      <i class="fa fa-file-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                      <h2>SuKet</h2>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><br>
        <?php include "system/copyright.php";?>
      </div><!-- /.row -->
      <br><br>
    </div><!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
  <!-- JavaScript -->
  <script>
      // Loading Page
      var myVar;
      function myFunction() {
        myVar = setTimeout(showPage, 500);
      }
      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
      }
    </script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/sweetalert.min.js"></script>
    <!-- Page Specific Plugins -->
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/chartjs/Chart.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/morris/chart-data-morris.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/tables.js"></script>
  </body>
  </html>