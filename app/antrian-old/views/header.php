<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS - Antrian</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
  <script type="text/javascript" >
    $(document).ready(function(){
      $("#play").click(function(){
        document.getElementById('suarabel').play();     
      });
    });
  </script>
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
      -webkit-animation-duration: 0s;
      animation-name: animatebottom;
      animation-duration: 0s
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
    
    h1,h2,p,a{
      font-family: sans-serif;
      font-weight: normal;
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
?>

