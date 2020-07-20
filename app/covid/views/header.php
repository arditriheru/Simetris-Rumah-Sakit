<?php
error_reporting(0);
include "../../system/session-start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMETRIS | COVID-19</title>
    <!-- Bootstrap core CSS -->
    <link href="../../vendors/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../../vendors/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <script src="../../vendors/js/font-awesome.js"></script>
    <link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
    <style>
        .whitetext {
            color: #ffffff;
        }
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
<?php
include '../../config/connect.php';
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang    =   date('Y-m-d');
$jamsekarang        =   date("H:i:s");
?>

