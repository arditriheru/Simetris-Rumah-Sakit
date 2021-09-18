<?php include "views/header.php"; ?>
<div id="page-wrapper">
  <img class="img-responsive" src="../../images/header.jpg" width="100%" alt="Gambar Bootstrap 3"><br>
  <div class="row">
    <div class="col-lg-12">
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-2"><a href="anak-filter.php">
              <i class="fa fa-group fa-4x"></i>
            </div>
            <div class="col-xs-10 text-right">
              <h2>Poli Anak</h2>
            </div></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-2"><a href="kandungan-filter.php">
              <i class="fa fa-group fa-4x"></i>
            </div>
            <div class="col-xs-10 text-right">
              <h2>Poli Kandungan</h2>
            </div></a>
          </div>
        </div>
      </div>
    </div><div align="center"><a href="../../dashboard"><i class="fa fa-arrow-left"></i> Back</a></div>
  </div>
</div>
<?php include "views/footer.php"; ?>