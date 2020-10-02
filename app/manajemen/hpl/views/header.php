<?php
error_reporting(0);
require_once "session-start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMETRIS - HPL</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
    <!-- Add custom CSS here -->
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
    <style>
        .bluetext {
            color: #008cba;
        }
        .redtext {
            color: #e71414;
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
<body>
  <nav>
    <div id="wrapper">
      <?php include "hpl_tampil.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<?php
require_once '../../../config/connect.php';
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang    = date('Y-m-d');
$bulan              = date('m', strtotime($tanggalsekarang));
$tahun              = date('Y', strtotime($tanggalsekarang));
$jamsekarang        = date("G:i:s");
?>
