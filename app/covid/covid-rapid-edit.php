<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit <small>Rapid Test</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        $id_rapidtest = $_GET['id'];
        $c = mysqli_query($koneksi,
         "SELECT *, mr_dokter.nama_dokter, mr_unit.nama_unit,
         IF(rapidtest.sex='1', 'Laki-laki', 'Perempuan') AS nama_sex,
         IF(rapidtest.igm='1', 'Reaktif', 'Non Reaktif') AS nama_igm,
         IF(rapidtest.igg='1', 'Reaktif', 'Non Reaktif') AS nama_igg,
         IF(rapidtest.nilai_rujukan='1', 'Reaktif', 'Non Reaktif') AS nama_nilai_rujukan
         FROM rapidtest, mr_dokter, mr_unit
         WHERE rapidtest.id_dokter=mr_dokter.id_dokter
         AND rapidtest.id_unit=mr_unit.id_unit
         AND rapidtest.id_rapidtest='$id_rapidtest';");
        while($d = mysqli_fetch_array($c)){
          $id_catatan_medik1 = $d['id_catatan_medik'];
          $nama1             = $d['nama'];
          $alamat1           = $d['alamat'];
          $tgl_lahir1        = $d['tgl_lahir'];
          $sex1              = $d['sex'];
          $nama_sex1         = $d['nama_sex'];
          $id_dokter1        = $d['id_dokter'];
          $nama_dokter1      = $d['nama_dokter'];
          $id_unit1          = $d['id_unit'];
          $nama_unit1        = $d['nama_unit'];
          $sampel1           = $d['sampel'];
          $pemeriksaan1      = $d['pemeriksaan'];
          $igm1              = $d['igm'];
          $nama_igm1         = $d['nama_igm'];
          $metode1           = $d['metode'];
          $pemeriksa1        = $d['pemeriksa'];
          $tgl_periksa1      = $d['tgl_periksa'];
          $jam_periksa1      = $d['jam_periksa'];
          $igg1              = $d['igg'];
          $nama_igg1         = $d['nama_igg'];
        }

        if(isset($_POST['rapidsubmit'])){
          $id_dokter        = $_POST['id_dokter'];
          $id_unit          = $_POST['id_unit'];
          $igm              = $_POST['igm'];
          $tgl_periksa      = $_POST['tgl_periksa'];
          $jam_periksa      = $_POST['jam_periksa'];
          $igg              = $_POST['igg'];

          $simpan=mysqli_query($koneksi,"UPDATE rapidtest SET id_dokter='$id_dokter',id_unit='$id_unit',igm='$igm',tgl_periksa='$tgl_periksa',jam_periksa='$jam_periksa',igg='$igg')");
          if($simpan){
            echo "<script>
            setTimeout(function() {
              swal({
                title: 'Berhasil',
                text: 'Memperbarui Data',
                type: 'success'
                }, function() {
                  window.location = 'dashboard';
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
                        window.location = 'covid-rapid-tambah';
                        });
                        }, 10);
                        </script>";
                      }
                    }
                    ?>
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nomor Rekam Medik</label>
                        <input class="form-control" type="text" name="id_catatan_medik"
                        value="<?php echo $id_catatan_medik1; ?>" readonly>
                        <p style="color:red;"><?php echo ($error['id_catatan_medik']) ? $error['id_catatan_medik'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama"
                        value="<?php echo $nama1; ?>" readonly>
                        <p style="color:red;"><?php echo ($error['nama']) ? $error['nama'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control hidden" type="text" name="sex"
                        value="<?php echo $sex1; ?>" readonly>
                        <input class="form-control" type="text" value="<?php echo $nama_sex1; ?>" readonly>
                        <p style="color:red;"><?php echo ($error['sex']) ? $error['sex'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat"
                        value="<?php echo $alamat1; ?>" readonly>
                        <p style="color:red;"><?php echo ($error['alamat']) ? $error['alamat'] : ''; ?></p>
                      </div>
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" type="text" name="id_dokter"
                        value="<?php echo $d['id_dokter']; ?>" required="">
                        <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
                        <option selected value='<?php echo $id_dokter1; ?>'><?php echo $nama_dokter1; ?></option>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM mr_dokter;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Asal</label>
                      <select class="form-control" type="text" name="id_unit"
                      value="<?php echo $d['id_unit']; ?>" required="">
                      <p style="color:red;"><?php echo ($error['id_unit']) ? $error['id_unit'] : ''; ?></p>
                      <option selected value='<?php echo $id_unit1; ?>'><?php echo $nama_unit1; ?></option>
                      <?php 
                      $data = mysqli_query($koneksi,
                        "SELECT * FROM mr_unit;");
                      while($d = mysqli_fetch_array($data)){
                        echo "<option value='".$d['id_unit']."'>".$d['nama_unit']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Periksa</label>
                    <input class="form-control" type="date" name="tgl_periksa" value="<?php echo $tgl_periksa1; ?>" required="">
                    <p style="color:red;"><?php echo ($error['tgl_periksa']) ? $error['tgl_periksa'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Jam Periksa</label>
                    <input class="form-control" type="text" name="jam_periksa" value="<?php echo $jam_periksa1; ?>">
                    <p style="color:red;"><?php echo ($error['jam_periksa']) ? $error['jam_periksa'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Sampel</label>
                    <input class="form-control" type="text" name="sampel"
                    value="Darah" readonly>
                    <p style="color:red;"><?php echo ($error['sampel']) ? $error['sampel'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Metode</label>
                    <input class="form-control" type="text" name="metode"
                    value="<?php echo $metode1; ?>" readonly>
                    <p style="color:red;"><?php echo ($error['metode']) ? $error['Metode'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>IgM</label>
                    <select class="form-control" type="text" name="igm" required="">
                      <p style="color:red;"><?php echo ($error['igm']) ? $error['igm'] : ''; ?></p>
                      <option selected value='<?php echo $igm1; ?>'><?php echo $nama_igm1; ?></option>
                      <option value='0'>Non Reaktif</option>
                      <option value='1'>Reaktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>IgG</label>
                    <select class="form-control" type="text" name="igg" required="">
                      <p style="color:red;"><?php echo ($error['igg']) ? $error['igg'] : ''; ?></p>
                      <option selected value='<?php echo $igg1; ?>'><?php echo $nama_igg1; ?></option>
                      <option value='0'>Non Reaktif</option>
                      <option value='1'>Reaktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Petugas</label>
                    <input class="form-control" type="text" name="pemeriksa" value="<?php echo $pemeriksa1; ?>" readonly="">
                    <p style="color:red;"><?php echo ($error['pemeriksa']) ? $error['pemeriksa'] : ''; ?></p>
                  </div>
                  <button type="submit" name="rapidsubmit" class="btn btn-success">Tambah</button>
                </form>   
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /#wrapper -->
        <?php include "views/footer.php"; ?>