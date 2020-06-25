<?php error_reporting(0); ?>
<?php include "readme.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMETRIS | Inventaris</title>
    <!-- Bootstrap core CSS -->
    <link href="../../vendors/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../../vendors/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
    <script type="text/javascript" src="../../vendors/js/chartjs/Chart.js"></script>
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
<?php include '../../config/connect.php'; ?>
