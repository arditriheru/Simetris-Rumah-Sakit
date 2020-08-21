<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>Rapid Test</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <td>
        <?php $id_rapidtest = $_GET['id']; ?>
        <div align="right">
          <a href="covid-rapid-hapus?id=<?php echo $id_rapidtest; ?>"
            onclick="javascript: return confirm('Anda yakin hapus?')">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
          </a>
        </div>
      </td>
      <div class="table-responsive">
        <?php
        $a = mysqli_query($koneksi,
         "SELECT *, mr_pasien.nama, mr_dokter.nama_dokter, mr_unit.nama_unit,
         CASE
         WHEN rapidtest.igm='0' THEN 'Non Reaktif'
         WHEN rapidtest.igm='1' THEN 'Reaktif'
         WHEN rapidtest.igm='3' THEN 'On Process'
         END AS nama_igm,
         CASE
         WHEN rapidtest.igg='0' THEN 'Non Reaktif'
         WHEN rapidtest.igg='1' THEN 'Reaktif'
         WHEN rapidtest.igg='3' THEN 'On Process'
         END AS nama_igg
         FROM rapidtest, mr_pasien, mr_dokter, mr_unit
         WHERE rapidtest.id_catatan_medik=mr_pasien.id_catatan_medik
         AND rapidtest.id_dokter=mr_dokter.id_dokter
         AND rapidtest.id_unit=mr_unit.id_unit
         AND id_rapidtest='$id_rapidtest';");
        while($b = mysqli_fetch_array($a)){
          $id_catatan_medik = $b['id_catatan_medik'];
          $nama             = $b['nama'];
          $id_dokter        = $b['id_dokter'];
          $nama_dokter      = $b['nama_dokter'];
          $id_unit          = $b['id_unit'];
          $nama_unit        = $b['nama_unit'];
          $tgl_periksa      = $b['tgl_periksa'];
          $jam_periksa      = $b['jam_periksa'];
          $igm              = $b['igm'];
          $nama_igm         = $b['nama_igm'];
          $igg              = $b['igg'];
          $nama_igg         = $b['nama_igg'];
          $pemeriksa        = $b['pemeriksa'];
        }

        if(isset($_POST['rapidsubmit'])){
          $id_dokter        = $_POST['id_dokter'];
          $id_unit          = $_POST['id_unit'];
          $tgl_periksa      = $_POST['tgl_periksa'];
          $jam_periksa      = $_POST['jam_periksa'];
          $igm              = $_POST['igm'];
          $igg              = $_POST['igg'];
          $simpan=mysqli_query($koneksi,"UPDATE rapidtest 
            SET id_dokter='$id_dokter', id_unit='$id_unit', tgl_periksa='$tgl_periksa', jam_periksa='$jam_periksa', igm='$igm', igg='$igg'
            WHERE id_rapidtest='$id_rapidtest'");
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
                        window.location = 'covid-rapid-edit?id=$id_rapidtest';
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
                        value="<?php echo $id_catatan_medik; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama"
                        value="<?php echo $nama; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" type="text" name="id_dokter" required="">
                          <option selected value='<?php echo $id_dokter; ?>'><?php echo $nama_dokter; ?></option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT id_dokter, nama_dokter FROM mr_dokter;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Asal</label>
                        <select class="form-control" type="text" name="id_unit"
                        value="<?php echo $b['id_unit']; ?>" required="">
                        <option selected value='<?php echo $id_unit; ?>'><?php echo $nama_unit; ?></option>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT id_unit, nama_unit FROM mr_unit;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_unit']."'>".$d['nama_unit']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Periksa</label>
                      <input class="form-control" type="date" name="tgl_periksa" value="<?php echo $tgl_periksa; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label>Jam Periksa</label>
                      <input class="form-control" type="text" name="jam_periksa" value="<?php echo $jam_periksa; ?>">
                    </div>
                    <div class="form-group">
                      <label>IgM</label>
                      <select class="form-control" type="text" name="igm" required="">
                        <option selected value='<?php echo $igm; ?>'><?php echo $nama_igm; ?></option>
                        <option value='3'>On Prosess</option>
                        <option value='0'>Non Reaktif</option>
                        <option value='1'>Reaktif</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>IgG</label>
                      <select class="form-control" type="text" name="igg" required="">
                        <option selected value='<?php echo $igg; ?>'><?php echo $nama_igg; ?></option>
                        <option value='3'>On Prosess</option>
                        <option value='0'>Non Reaktif</option>
                        <option value='1'>Reaktif</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Petugas</label>
                      <input class="form-control" type="text" name="pemeriksa" value="<?php echo $pemeriksa; ?>" readonly="">
                    </div>
                    <button type="submit" name="rapidsubmit" class="btn btn-success">Perbarui</button>
                  </form>   
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>