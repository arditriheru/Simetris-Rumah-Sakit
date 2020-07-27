<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>Ruangan</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus"></i> Ruangan</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['tambah'])){
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];

        $a = mysqli_query($koneksi,
          "SELECT COUNT(kode_ruangan) AS total
          FROM inventaris_ruangan
          WHERE kode_ruangan = '$kode_ruangan';");
        while($b = mysqli_fetch_array($a)){
          $total = $b['total'];
        }

        $error=array();
        if (empty($kode_ruangan)){
          $error['kode_ruangan']='Kode Harus Diisi!!!';
        }if (empty($nama_ruangan)){
          $error['nama_ruangan']='Nama Harus Diisi!!!';
        }if($total>0){
          echo '<script>
          setTimeout(function() {
            swal({
              title: "Kode Sudah Ada!!",
              type: "error"
              }, function() {
                window.location = "ruangan-tambah";
                });
                }, 10);
                </script>';
              }elseif(empty($error)){
                $simpan=mysqli_query($koneksi,"INSERT INTO inventaris_ruangan(kode_ruangan,nama_ruangan)VALUES('$kode_ruangan','$nama_ruangan')");
                if($simpan){
                  echo '<script>
                  setTimeout(function() {
                    swal({
                      title: "Sukses!!!",
                      text: "Berhasil Menambahkan",
                      type: "success"
                      }, function() {
                        window.location = "ruangan-tambah";
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
                              window.location = "ruangan-tambah";
                              });
                              }, 10);
                              </script>';
                            }
                          }
                        }
                        ?>
                        <form method="post" action="" role="form">
                          <div class="form-group">
                            <label>Kode Ruangan</label>
                            <input class="form-control" type="text" name="kode_ruangan" placeholder="Contoh : RD">
                            <p style="color:blue">Tuliskan kode dengan huruf Kapital!!
                              <p style="color:red;"><?php echo ($error['kode_ruangan']) ? $error['kode_ruangan'] : ''; ?></p>
                            </div>
                            <div class="form-group">
                              <label>Nama Ruangan</label>
                              <input class="form-control" type="text" name="nama_ruangan" placeholder="Masukkan jenis barang..">
                              <p style="color:red;"><?php echo ($error['nama_ruangan']) ? $error['nama_ruangan'] : ''; ?></p>
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
                                  <th><center>Kode Ruangan</center></th>
                                  <th><center>Nama Ruangan</center></th>
                                  <th><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                $data = mysqli_query($koneksi,
                                  "SELECT * FROM inventaris_ruangan ORDER BY nama_ruangan ASC;");
                                while($d = mysqli_fetch_array($data)){
                                  $status = $d['status'];
                                  ?>
                                  <tr>
                                    <td><center><?php echo $no++; ?></center></td>
                                    <td><center><?php echo $d['kode_ruangan']; ?></center></td>
                                    <td><left><?php echo $d['nama_ruangan']; ?></center></td>
                                      <td>
                                        <div align="center">
                                          <a href="ruangan-hapus?id=<?php echo $d['kode_ruangan']; ?>"
                                           onclick="javascript: return confirm('Anda yakin hapus?')"
                                           <button type="button" name="hapus" class="btn btn-danger">Hapus</a><br><br>
                                           </div>
                                         </td>
                                       </tr>
                                     <?php } ?>
                                   </tbody>
                                 </table>
                               </div>
                             </div>
                           </div><!-- /.row -->
                         </div><!-- /#wrapper -->
                         <?php include "views/footer.php"; ?> 