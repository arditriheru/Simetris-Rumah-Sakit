<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>WhatsApp <small>Chat</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah"><i class="fa fa-plus"></i> Tambah</a></li>
        <li class="active"><i class="fa fa-send"></i> WhatsApp</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['submitwa'])){
        $nomor_wa  = $_POST['nomor_wa'];
      }
      ?>
      <form method="post" action="" role="form">
        <div class="form-group">
          <label>Nomor WhatsApp</label><small class="redtext"> Tanpa diawali angka Nol</small>
          <?php
          if(isset($nomor_wa)){ ?>
            <input class="form-control" type="number" name="nomor_wa" value="<?php echo $nomor_wa; ?>">
          <?php }else{ ?>
            <input class="form-control" type="number" name="nomor_wa" placeholder="masukkan Nomor WhtasApp">
          <?php } ?>
        </div>
        <button type="submit" name="submitwa" class="btn btn-success">Submit</button>
        <?php
        if(isset($nomor_wa)){ ?>
          <a href="https://api.whatsapp.com/send?phone=62<?php echo $nomor_wa; ?>" target="_blank">
            <button type="button" class="btn btn-primary">Chat Sekarang</button>
          </a>
        <?php } ?>
      </form>
    </div>
  </div>
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?> 