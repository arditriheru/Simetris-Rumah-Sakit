<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMETRIS - Manajemen</title>
    <!-- Bootstrap core CSS -->
    <link href="../../vendors/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <!-- Add custom CSS here -->
    <link href="../../vendors/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script type="text/javascript" src="../../vendors/chartjs/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../../vendors/css/sweetalert.css">
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
      <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<?php include '../../config/connect.php';?>