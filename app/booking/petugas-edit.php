<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Form <small>Edit</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-pencil"></i> Edit</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      $id_petugas = $_GET['id'];
      $data = mysqli_query($koneksi,
        "SELECT * FROM mr_petugas WHERE id_petugas='$id_petugas';");
      while($d = mysqli_fetch_array($data)){
        ?>
        <?php
        if(isset($_POST['submit'])){
          $nama_petugas = $_POST['nama_petugas'];
          $pelayanan    = $_POST['pelayanan'];
          $status 		  = $_POST['status'];

          $error=array();
          if (empty($nama_petugas)){
            $error['nama_petugas']='Nama Petugas Harus Diisi!!!';
          }if(empty($error)){
            $simpan=mysqli_query($koneksi,"UPDATE mr_petugas 
             SET nama_petugas='$nama_petugas',status='$status',pelayanan='$pelayanan'
             WHERE id_petugas='$id_petugas'");
            if($simpan){
              echo '<script>
              setTimeout(function() {
                swal({
                  title: "Sukses!!!",
                  text: "Berhasil Memperbarui",
                  type: "success"
                  }, function() {
                    window.location = "dokter-tambah";
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
                          window.location = "dokter-tambah";
                          });
                          }, 10);
                          </script>';
                        }
                      }
                    }
                    ?>
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nama Petugas</label>
                        <input class="form-control" type="text" name="nama_petugas"
                        value="<?php echo $d['nama_petugas']; ?>" required="">
                        <p style="color:blue">Tuliskan nama dokter sesuai di SIMRS!!!
                          <p style="color:red;"><?php echo ($error['nama_petugas']) ? $error['nama_petugas'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                          <label>Pelayanan</label>
                          <select class="form-control" type="text" name="pelayanan" required="">
                            <p style="color:red;"><?php echo ($error['pelayanan']) ? $error['pelayanan'] : ''; ?></p>
                            <option disabled selected>Pilih</option>
                            <option value='1'>Tumbuh Kembang</option>
                            <option value='2'>Antenatal Care</option>"
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" type="text" name="status">
                            <p style="color:red;"><?php echo ($error['status']) ? $error['status'] : ''; ?></p>
                            <?php 
                            $data = mysqli_query($koneksi,
                              "SELECT status, IF(status='1', 'Aktif', 'Nonaktif') AS nama_status
                              FROM mr_petugas WHERE id_petugas='$id_petugas';");
                            while($d = mysqli_fetch_array($data)){
                              echo "<option selected value='".$d['status']."'>".$d['nama_status']."</option>";
                            }
                            echo "<option disabled></option>";
                            echo "<option value='1'>Aktif</option>";
                            echo "<option value='0'>Nonaktif</option>";
                            ?>
                          </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
                        <button type="reset" class="btn btn-warning">Reset</button>  
                      </form>
                    </div>
                  </div><!-- /.row -->
                <?php } ?>
              </div><!-- /#wrapper -->
              <?php include "views/footer.php"; ?> 