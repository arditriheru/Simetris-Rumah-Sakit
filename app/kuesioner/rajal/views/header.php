<?php
error_reporting(0);
include "../session-start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS | Kuesioner</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
</head>
<?php
include '../../../config/connect.php';
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang    =   date('Y-m-d');
$jamsekarang        =   date("H:i:s");
?>
<nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="https://instagram.com/arditriheru" class="navbar-brand">S I M E T R I S</a>
      </div>
    </nav>
  </div>
</nav><br>
