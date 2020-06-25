<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tabel <small>User</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="pegawai_tampil.php"><i class="fa fa-user"></i> User</a></li>
        <li class="active"><i class="fa fa-edit"></i> Detail</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <form method="post" action="user_prosesedit.php?id_admin=<?php echo $d['id_admin']; ?>" role="form">
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" type="text" name="unit">
            <option>SDM</option>
            <option>Manajemen</option>
          </select>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="username" 
          value="<?php echo $d['username']; ?>">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" 
          value="<?php echo $d['password']; ?>">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
        <button type="reset" class="btn btn-warning">Reset</button>  
      </div>
      </form><?php } ?>
    </div>
  </div><!-- /.row -->
  <?php include 'views/footer.php';?>