<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>E-Book <small>Tambah</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <form method="post" action="ebook-proses-tambah.php" role="form" 
        enctype="multipart/form-data" onSubmit="cek()">
        <div class="form-group">
         <div class="form-group">
          <label>Kategori</label><font color=red><small> *Harus diisi</small></font>
          <select class="form-control" type="text" name="kategori">
            <option>Umum</option>
            <option>Manajemen</option>
            <option>Medis</option>
            <option>Keperawatan</option>
            <option>Perundangan</option>
          </select>
        </div> 
        <label>Judul Buku</label><font color=red><small> *Harus diisi</small></font>
        <input class="form-control" type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku..">
      </div>
      <div class="form-group">
        <label>Penulis</label>
        <input class="form-control" type="text" name="penulis" id="penulis" placeholder="Masukkan Penulls Buku..">
      </div>
      <div class="form-group">
        <label>Penerbit</label>
        <input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit..">
      </div>
      <div class="form-group">
        <label>Dokumen</label><font color=red><small> *Harus diisi</small></font>
        <input type="file" name="dokumen" id="dokumen">
      </div><br><br>
      <button type="submit" class="btn btn-success">Tambah</button>
      <button type="reset" class="btn btn-warning">Reset</button>  
    </form>
  </div>
</div>
</div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?> 
