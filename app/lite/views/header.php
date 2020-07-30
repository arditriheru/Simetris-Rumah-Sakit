<?php error_reporting(0); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMETRIS | RSKIA Rachmi Yogyakarta</title>
  <meta name="description" content="Sistem Informasi Rumah Sakit RSKIA Rachmi Yogyakarta - Pendaftaran Online">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/40a517b96a.js"></script>
  <link rel="stylesheet" type="text/css" href="vendors/sweetalert/sweetalert.css">
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
    .gallery
    {
      display: inline-block;
      margin-top: 20px;
    }
    .nav-bottom {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 55px;
      box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
      background-color: #ffffff;
      display: flex;
      overflow-x: auto;
    }
    .nav-bottom__link {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
      min-width: 50px;
      overflow: hidden;
      white-space: nowrap;
      font-family: sans-serif;
      font-size: 13px;
      color: #000000;
      text-decoration: none;
      -webkit-tap-highlight-color: transparent;
      transition: background-color 0.1s ease-in-out;
    }
    .nav-bottom__link:hover {
      background-color: #e0dede;
    }
    .nav-bottom__link--active {
      color: #fb7813;
    }
    .nav-bottom__icon {
      font-size: 18px;
    }
  </style>
</head>
<body onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom"></div>
  <div id="right-panel" class="right-panel">
    <header id="header" class="header navbar-fixed-top">
      <div class="header-menu">
        <div class="col-sm-12">
          <div class="user-area float-left">
            <a href="https://www.pendaftaran.rskiarachmi.co.id">
              <img src="images/logo.jpg" alt="Rachmi Online">
            </a>
          </div>
        </div>
      </div>
    </header><br><br><br><br>
    <?php include 'controller/connection.php';
    include 'controller/date-format.php'; ?>
