<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small><?php include '../../../system/date-time.php';?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <?php require_once "hpl-tampil.php"; ?>
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>