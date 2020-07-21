<?php
include "admin-session-start.php";
include "../views/header.php";
?>
<nav>
  <div id="wrapper">
    <?php include "admin-menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Zona Merah <small>COVID-19</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><i class="fa fa-exclamation-triangle"></i> Peringatan</li>
      </ol>  
      <?php include "../notifikasi1.php"?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Cara memperbarui daftar zona merah COVID-19 : <b>Copy jpg / jpeg / png terbaru - explorer - network - RACHMI-SVR - folder redzone - paste - rename menjadi redzone - kembali ke simetris - CTRL+F5</b>
      </div>
    </div>
    <div class="col-lg-12">
      <img class="img-responsive" src="../../../redzone/redzone.jpg" width="100%">
      <img class="img-responsive" src="../../../redzone/redzone.jpeg" width="100%">
      <img class="img-responsive" src="../../../redzone/redzone.png" width="100%">
    </div>
  </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "../views/footer.php"; ?>
