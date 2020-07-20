<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS - RSKIA Rachmi Yogyakarta</title>
  <!-- Bootstrap core CSS -->
  <link href="vendors/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link href="vendors/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  <script type="text/javascript" src="chartjs/Chart.js"></script>
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
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/antrian/anak-filter">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Antrian A</h1>
                      <p class="announcement-text">Antrian Poli Anak</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/antrian/kandungan-filter">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Antrian B</h1>
                      <p class="announcement-text">Antrian Poli Kandungan</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.10:81">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Aplikasi</h1>
                      <p class="announcement-text">Pendaftaran Online</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/bangsal">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Bangsal</h1>
                      <p class="announcement-text">Modul Bangsal</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/booking">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Booking</h1>
                      <p class="announcement-text">Modul Booking</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/ebook">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>E-Book</h1>
                      <p class="announcement-text">Modul E-Book</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/farmasi">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Farmasi</h1>
                      <p class="announcement-text">Modul Farmasi</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/sdi">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Hak Akses</h1>
                      <p class="announcement-text">Modul Hak Akses</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/kamar">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Info Kamar</h1>
                      <p class="announcement-text">Modul Info Kamar</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/inventaris">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Inventaris</h1>
                      <p class="announcement-text">Modul Administrasi Inventaris</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/kasir">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Kasir</h1>
                      <p class="announcement-text">Modul Kasir</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/kuesioner">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Kepuasan</h1>
                      <p class="announcement-text">Modul Kepuasan Pasien</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/laboratorium">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Laboratorium</h1>
                      <p class="announcement-text">Modul Laboratorium</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/manajemen">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Manajemen</h1>
                      <p class="announcement-text">Modul Manajemen</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="https://bit.ly/2tCozeL">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>MedScape</h1>
                      <p class="announcement-text">Modul Farmasi</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="https://bit.ly/2QpaMRM">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>MIMS</h1>
                      <p class="announcement-text">Modul Farmasi</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/antrian/monitor-a">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Monitor 1</h1>
                      <p class="announcement-text">Modul Antrian</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/poliklinik">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Poliklinik</h1>
                      <p class="announcement-text">Modul Poliklinik</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/covid">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Rapid Test</h1>
                      <p class="announcement-text">Modul Poliklinik</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.250:8080/mr">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Rekam Medis</h1>
                      <p class="announcement-text">Modul Rekam Medis</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/sdm">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>SDM</h1>
                      <p class="announcement-text">Modul Sumber Daya Manusia</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="http://192.168.1.10:8080">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Sismadak</h1>
                      <p class="announcement-text">Modul Sismadak</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/booking/covid-skrining">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Skrining 1</h1>
                      <p class="announcement-text">Skrining COVID-19</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-4"><a href="app/sdm">
                      <i class="fa fa-arrow-circle-right fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                      <h1>Surat Kerja</h1>
                      <p class="announcement-text">Modul Administrasi Surat</p>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br><br><br><?php include "system/copyright.php";?>
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
    <script src="vendors/js/jquery-1.10.2.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="vendors/js/morris/chart-data-morris.js"></script>
    <script src="vendors/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="vendors/js/tablesorter/tables.js"></script>

  </body>
  </html>
