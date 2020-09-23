<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>E-Book <small>Edit</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-pencil"></i> Edit</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php
        $id_buku = $_GET['id_buku'];

        if(isset($_POST['submit'])){
          $kategori     = $_POST['kategori'];
          $judul        = $_POST['judul'];
          $penulis      = $_POST['penulis'];
          $penerbit     = $_POST['penerbit'];

          $simpan = mysqli_query($koneksi,"UPDATE buku SET kategori='$kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit' WHERE id_buku='$id_buku'");

          if($simpan){
           echo "<script>
           setTimeout(function() {
            swal({
              title: 'Berhasil',
              text: 'Mengupload Dokumen',
              type: 'success'
              }, function() {
                window.location = 'ebook-tampil.php';
                });
                }, 10);
                </script>";
              }else{
                echo "<script>
                setTimeout(function() {
                  swal({
                    title: 'Gagal',
                    text: 'Coba Sekali Lagi',
                    type: 'error'
                    }, function() {
                      window.location = 'javascript: history.back()';
                      });
                      }, 10);
                      </script>";
                    }
                  }

                  $a = mysqli_query($koneksi,
                    "SELECT kategori, judul, penulis, penerbit, dokumen FROM buku WHERE id_buku='$id_buku';");
                  while($b = mysqli_fetch_array($a)){
                    ?>
                    <form method="post" action="" role="form" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-group">
                          <label>Kategori</label><font color=red><small> *Harus diisi</small></font>
                          <select class="form-control" type="text" name="kategori">
                            <option selected=""><?php echo $b['kategori']; ?></option>
                            <option value="Umum">Umum</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Medis">Medis</option>
                            <option value="Keperawatan">Keperawatan</option>
                            <option value="Perundangan">Perundangan</option>
                          </select>
                        </div> 
                        <label>Judul Buku</label><font color=red><small> *Harus diisi</small></font>
                        <input class="form-control" type="text" name="judul" value="<?php echo $b['judul']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Penulis</label>
                        <input class="form-control" type="text" name="penulis" value="<?php echo $b['penulis']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" type="text" name="penerbit" value="<?php echo $b['penerbit']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Dokumen</label>
                        <input class="form-control" type="text" name="dokumen" value="<?php echo $b['dokumen']; ?>" readonly="">
                      </div>
                      <button name="submit" type="submit" class="btn btn-success">Perbarui</button>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?> 
