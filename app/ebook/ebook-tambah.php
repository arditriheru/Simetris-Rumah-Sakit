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
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        if(isset($_POST['submit'])){
          $lokasi_file  = $_FILES['dokumen']['tmp_name'];
          $nama_file    = $_FILES['dokumen']['name'];
          $folder       = "../../../ebook-file-upload/$nama_file";
          $judul        = $_POST['judul'];
          $penulis      = $_POST['penulis'];
          $penerbit     = $_POST['penerbit'];
          $tahun        = date("Ymd");
          $kategori     = $_POST['kategori'];
          $upload       = move_uploaded_file($lokasi_file,"$folder");

          if($upload){
            $simpan = mysqli_query($koneksi,"INSERT INTO buku VALUES('','$judul','$penulis','$penerbit','$tahun','$kategori','$nama_file')");

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
                }
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
                  ?>
                  <form method="post" action="" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" type="text" name="kategori">
                          <option value="">Pilih</option>
                          <option value="Umum">Umum</option>
                          <option value="Manajemen">Manajemen</option>
                          <option value="Medis">Medis</option>
                          <option value="Keperawatan">Keperawatan</option>
                          <option value="Perundangan">Perundangan</option>
                        </select>
                      </div> 
                      <label>Judul Buku</label>
                      <input class="form-control" type="text" name="judul" placeholder="Masukkan..">
                    </div>
                    <div class="form-group">
                      <label>Penulis</label>
                      <input class="form-control" type="text" name="penulis" placeholder="Masukkan..">
                    </div>
                    <div class="form-group">
                      <label>Penerbit</label>
                      <input class="form-control" type="text" name="penerbit" placeholder="Masukkan..">
                    </div>
                    <div class="form-group">
                      <label>Dokumen</label><font color=red></font>
                      <input type="file" name="dokumen" id="dokumen">
                    </div>
                    <button name="submit" type="submit" class="btn btn-success">Perbarui</button>
                  </form>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?> 
