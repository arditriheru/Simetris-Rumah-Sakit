<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>Jenis</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Jenis</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['tambah'])){
        $a = mysqli_query($koneksi,
          "SELECT COUNT(kode_jenis) AS max
          FROM inventaris_jenis;");
        while($b = mysqli_fetch_array($a)){
          $max = $b['max']+1;
          $digit = strlen($max);
          if($digit==1){
            $kode_jenis = "K0".$max;
          }else{
            $kode_jenis = "K".$max;
          }
          
        }
        $nama_jenis = $_POST['nama_jenis'];
        $a = mysqli_query($koneksi,
          "SELECT COUNT(kode_jenis) AS total
          FROM inventaris_jenis
          WHERE kode_jenis = '$kode_jenis';");
        while($b = mysqli_fetch_array($a)){
          $total = $b['total'];
        }
        $error=array();
        if (empty($kode_jenis)){
          $error['kode_jenis']='Kode Harus Diisi!!!';
        }if (empty($nama_jenis)){
          $error['nama_jenis']='Nama Harus Diisi!!!';
        }if($total>0){
          echo '<script>
          setTimeout(function() {
            swal({
              title: "Kode Sudah Ada!!",
              type: "error"
              }, function() {
                window.location = "jenis-tambah";
                });
                }, 10);
                </script>';
              }elseif(empty($error)){
                $simpan=mysqli_query($koneksi,"INSERT INTO inventaris_jenis(kode_jenis,nama_jenis)VALUES('$kode_jenis','$nama_jenis')");
                if($simpan){
                  echo '<script>
                  setTimeout(function() {
                    swal({
                      title: "Sukses!!!",
                      text: "Berhasil Menambahkan",
                      type: "success"
                      }, function() {
                        window.location = "jenis-tambah";
                        });
                        }, 10);
                        </script>';
                      }else{
                        echo '<script>
                        setTimeout(function() {
                          swal({
                            title: "Gagal!!!",
                            type: "error"
                            }, function() {
                              window.location = "jenis-tambah";
                              });
                              }, 10);
                              </script>';
                            }
                          }
                        }
                        ?>
                        <form method="post" action="" role="form">
                          <div class="form-group">
                            <label>Nama Jenis</label>
                            <input class="form-control" type="text" name="nama_jenis" placeholder="Masukkan jenis barang..">
                            <p style="color:red;"><?php echo ($error['nama_jenis']) ? $error['nama_jenis'] : ''; ?></p>
                          </div>
                          <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                          <button type="reset" class="btn btn-warning">Reset</button>  
                        </form>
                      </div>
                      <div class="col-lg-6">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                              <tr>
                                <th><center>No</center></th>
                                <th><center>Kode Jenis</center></th>
                                <th><center>Nama Jenis</center></th>
                                <th><center>Action</center></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 1;
                              $data = mysqli_query($koneksi,
                                "SELECT * FROM inventaris_jenis ORDER BY kode_jenis ASC;");
                              while($d = mysqli_fetch_array($data)){
                                $status = $d['status'];
                                ?>
                                <tr>
                                  <td><center><?php echo $no++; ?></center></td>
                                  <td><center><?php echo $d['kode_jenis']; ?></center></td>
                                  <td><left><?php echo $d['nama_jenis']; ?></center></td>
                                    <td>
                                      <div align="center">
                                        <a href="jenis-hapus?id=<?php echo $d['kode_jenis']; ?>"
                                         onclick="javascript: return confirm('Anda yakin hapus?')"
                                         <button type="button" name="hapus" class="btn btn-danger">Hapus</a><br><br>
                                         </div>
                                       </td>
                                     </tr>
                                     <?php 
                                   }
                                   ?>
                                 </tbody>
                               </table>
                             </div>
                           </div>
                         </div><!-- /.row -->
                       </div><!-- /#wrapper -->
                       <?php include "views/footer.php"; ?> 