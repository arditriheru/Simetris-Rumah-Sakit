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
    .blacktext {
      color: #272727;
    }
    .bluetext {
      color: #008cba;
    }
    .redtext {
      color: #e71414;
    }
    .greentext {
      color: #0c9463;
    }
    .navbar-rachmi{
      background-color:#e67e22;
      border-color:#d35400
    }
    .navbar-brand{
      color:#ffffff;
    }
    /* Center the loader */
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #dbdbdb;
      border-radius: 50%;
      border-top: 16px solid #ffffff;
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
      -webkit-animation-duration: 5s;
      animation-name: animatebottom;
      animation-duration: 5s
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
  <style type="text/css">
    /* style untuk link popup */
    a.popup-link {
      padding:17px 0;
      text-align: center;
      margin:10% auto;
      position: relative;
      width: 300px;
      color: #fff;
      text-decoration: none;
      background-color: #FFBA00;
      border-radius: 3px;
      box-shadow: 0 5px 0px 0px #eea900;
      display: block;
    }
    a.popup-link:hover {
      background-color: #ff9900;
      box-shadow: 0 3px 0px 0px #eea900;
      -webkit-transition:all 1s;
      transition:all 1s;
    }
    /* end link popup*/
    /* animasi popup */

    @-webkit-keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    @-moz-keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    @keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    /* end animasi popup */
    /*style untuk popup */  
    #popup {
      background-color: rgba(0,0,0,0.8);
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      margin:0;
      -webkit-animation:autopopup 2s;
      -moz-animation:autopopup 2s;
      animation:autopopup 2s;
    }
    #popup:target {
      -webkit-transition:all 1s;
      -moz-transition:all 1s;
      transition:all 1s;
      opacity: 0;
      visibility: hidden;
    }

    @media (min-width: 768px){
      .popup-container {
        width:600px;
      }
    }
    @media (max-width: 767px){
      .popup-container {
        width:100%;
      }
    }
    .popup-container {
      position: relative;
      margin:5% auto;
      padding:30px 50px;
      background-color: #fafafa;
      color:#333;
      border-radius: 3px;
    }

    a.popup-close {
      position: absolute;
      top:3px;
      right:3px;
      background-color: #333;
      padding:7px 10px;
      font-size: 20px;
      text-decoration: none;
      line-height: 1;
      color:#fff;
    }
    /* end style popup */

    /* style untuk isi popup */
    .popup-form {
      margin:10px auto;
    }
    .popup-form h2 {
      margin-bottom: 5px;
      font-size: 37px;
      text-transform: uppercase;
    }
    .popup-form .input-group {
      margin:10px auto;
    }
    .popup-form .input-group input {
      padding:17px;
      text-align: center;
      margin-bottom: 10px;
      border-radius:3px;
      font-size: 16px; 
      display: block;
      width: 100%;
    }
    .popup-form .input-group input:focus {
      outline-color:#FB8833; 
    }
    .popup-form .input-group input[type="email"] {
      border:0px;
      position: relative;
    }
    .popup-form .input-group input[type="submit"] {
      background-color: #FB8833;
      color: #fff;
      border: 0;
      cursor: pointer;
    }
    .popup-form .input-group input[type="submit"]:focus {
      box-shadow: inset 0 3px 7px 3px #ea7722;
    }
    /* end style isi popup */

  </style>
</head>
<body onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom"></div>
  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
          <center>
            <img width="100px" src="images/gif.gif" alt="Rachmi Online">
            <font face="consolas"><h1 class="bluetext">Server is Connected!</h1><br>
              <h4>Welcome to Information System of RSKIA Rachmi Yogyakarta</h4><br>
              <h5>If you're seeing this page via a web browser, it means you've configuration has successfully. Congratulations!<br><br>This is the default home page. It can be found on the local filesystem at: /simetris/htdocs/arditriheru/index.html</h5><br>
              <p class="blacktext">Apache/2.4.39 (Win64) OpenSSL/1.1.1c PHP/7.3.6</p></font><br>

              <a href="dashboard"
              <button type="button" class="btn btn-primary"> Go to Dashboard <i class="fa fa-arrow-circle-right"></i></button>
            </a>
            <?php include 'readme.html';?>
          </center>
        </div>
      </div><br>
      <div class="popup-wrapper" id="popup">
        <div class="popup-container">
          <form action="https://pendaftaran.rskiarachmi.co.id" method="post" class="popup-form">
            <h4>Hak Cipta,</h4>
            <p><ol>
              <li>Pasal 12 ayat (1) huruf l, tentang ciptaan yang dilindungi termasuk database dan hasil pengalih wujudan;</li>
              <li>Pasal 15 huruf g, tentang pembuatan salinan cadangan program komputer;</li>
              <li>Pasal 30 ayat (1), tentang masa berlakunya suatu hak cipta atas program komputer;</li>
              <li>Pasal 72 ayat (3), tentang sanksi pidana pelanggaran hak cipta program komputer;</li>
              <li>Pasal 72 ayat (3) “Barangsiapa dengan sengaja dan tanpa hak memperbanyak penggunaan untuk kepentingan komersial suatu Program Komputer dipidana dengan pidana penjara paling lama 5 (lima) tahun dan/atau denda paling banyak Rp 500.000.000,00 (lima ratus juta rupiah)”;</li>
            </ol></p>
          </form>
          <a class="popup-close" href="#popup">X</a>
        </div>
      </div>
      <?php include 'system/copyright.php';?>
      <br><br>
    </div>
  </div><!-- .content -->
  <!-- footer -->
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