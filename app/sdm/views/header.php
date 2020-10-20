<?php
error_reporting(0);
include "session-start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS | SDM</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
  <style>
    .navbar-rachmi{
      background-color:#e67e22;
      border-color:#d35400
    }
    .navbar-brand{
      color:#ffffff;
    }
    .jam-digital {
      overflow: hidden;
      width: 20px;
      margin: 20px auto;
      border: 5px solid #efefef;
    }
    .box{
      float: left;
      width: 40px;
      height: 40px;
      background-color: transparent;
    }
    .jam-digital p {
      color: #ffffff;
      font-size: 20px;
      text-align: right;
      margin-top: 30px;
    }

    .bluetext {
      color: #008cba;
    }
    .whitetext {
      color: #ffffff;
    }
    .blacktext {
      color: #000000;
    }
    .redtext {
      color: #FF0000;
    }
    .greentext {
      color: #005082;
    }
    .greytext {
      color: #222222;
    }
    .antrian {
      font-size: 120px;
      color: #000000;
    }
    .marquee1 {
      font-size: 30px;
      color: #ffffff;
    }
    .marquee2 {
      font-size: 40px;
      color: #ffffff;
    }
    .navbar-rachmi{
     background-color:#e67e22;
     border-color:#d35400
   }
   .navbar-brand{
     color:#ffffff;
   }
 </style>
</head>
<?php
include '../../config/connect.php';
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang    =   date('Y-m-d');
$jamsekarang        =   date("G:i:s");
$n = 30;
$m = mktime(0, 0, 0, date("m"), date("d") + $n, date("Y"));
$limit = date("Y-m-d", $m);
?>