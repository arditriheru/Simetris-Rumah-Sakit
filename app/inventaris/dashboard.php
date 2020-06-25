<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php 
      $a = mysqli_query($koneksi,
        "SELECT COUNT(kode_registrasi) AS total
        FROM inventaris;");
      while($b = mysqli_fetch_array($a)){
        ?>
        <h1>Total <small> <?php echo $b['total'];}?> Barang</small></h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>  
        <?php include "../../system/welcome.php"?>
      </div>
    </div><!-- /.row -->
    <div class="row">
      <?php include "d-kondisi.php"?>
      <?php include "d-status.php"?>
    </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>