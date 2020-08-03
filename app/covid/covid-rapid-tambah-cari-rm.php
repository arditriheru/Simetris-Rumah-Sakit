<?php include "../views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "admin-menu.php"; ?>   
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
      <?php include "../../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        $id_catatan_medik = $_POST['id_catatan_medik'];
        $a = mysqli_query($koneksi, "SELECT nama, alamat FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
        while($b = mysqli_fetch_array($a)){
          $nama1             = $b['nama'];
          $alamat1           = $b['alamat'];
        }
        if(!$nama1){
          echo "<script>
          setTimeout(function() {
            swal({
              title: 'Tidak Ditemukan',
              text: 'Pasien Belum Terdaftar',
              type: 'error'
              }, function() {
                window.location = 'covid-rapid-tambah';
                });
                }, 10);
                </script>";
              }else{
                $c = mysqli_query($koneksi, "SELECT tgl_lahir, sex, IF(sex='1', 'Laki-laki', 'Perempuan') AS nama_sex FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
                while($d = mysqli_fetch_array($c)){
                  $tgl_lahir1        = $d['tgl_lahir'];
                  $nama_sex          = $d['nama_sex'];
                  $sex1              = $d['sex'];
                }
              }

              if(isset($_POST['rapidsubmit'])){
                $nama             = $_POST['nama'];
                $alamat           = $alamat1;
                $tgl_lahir        = $tgl_lahir1;
                $sex              = $sex1;
                $id_dokter        = $_POST['id_dokter'];
                $id_unit          = $_POST['id_unit'];
                $tanggal          = $tanggalsekarang;
                $jam              = $jamsekarang;
                $sampel           = 'Darah';
                $pemeriksaan      = 'SARS CoV-2 Antibody';
                $igm              = '3';
                $nilai_rujukan    = '0';
                $metode           = 'ICT';
                $pemeriksa        = $nama_login;
                $tgl_periksa      = $_POST['tgl_periksa'];
                $jam_periksa      = $_POST['jam_periksa'];
                $igg              = '3';

                $error=array();
                if(empty($id_dokter)){
                  $error['id_dokter']='Dokter Harus Diisi!!!';
                }if (empty($id_unit)){
                  $error['id_unit']='Unit Harus Diisi!!!';
                }if (empty($tgl_periksa)){
                  $error['tgl_periksa']='Tanggal Periksa Harus Diisi!!!';
                }if (empty($jam_periksa)){
                  $error['jam_periksa']='Jam Periksa Harus Diisi!!!';
                }if (empty($igm)){
                  $error['igm']='IgM Harus Diisi!!!';
                }if (empty($igg)){
                  $error['igg']='IgG Harus Diisi!!!';
                }if(empty($error)){
                  $simpan=mysqli_query($koneksi,"INSERT INTO rapidtest(id_rapidtest, id_catatan_medik, nama, alamat, tgl_lahir, sex, id_dokter, id_unit, tanggal, jam, sampel, pemeriksaan, igm, nilai_rujukan, metode, pemeriksa, tgl_periksa, jam_periksa, igg)
                    VALUES('','$id_catatan_medik','$nama','$alamat','$tgl_lahir','$sex','$id_dokter','$id_unit','$tanggal','$jam','$sampel','$pemeriksaan','$igm','$nilai_rujukan','$metode','$pemeriksa','$tgl_periksa','$jam_periksa', '$igg')");
                  if($simpan){
                    $a=mysqli_query($koneksi,"SELECT id_rapidtest FROM rapidtest WHERE id_catatan_medik='$id_catatan_medik' AND tanggal='$tanggal' AND jam='$jam'");
                    while($b = mysqli_fetch_array($a)){
                      $id_rapidtest = $b['id_rapidtest'];
                    }
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Berhasil',
                        text: 'Menambah Hasil Rapid test',
                        type: 'success'
                        }, function() {
                          window.location = 'admin-covid-rapid-tambah';
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
                                window.location = 'admin-covid-rapid-tambah';
                                });
                                }, 10);
                                </script>";
                              }
                            }
                          }
                          ?>
                          <form method="post" action="" role="form">
                            <div class="form-group">
                              <label>Nomor Rekam Medik</label>
                              <input class="form-control" type="text" name="id_catatan_medik"
                              value="<?php echo $id_catatan_medik; ?>" readonly>
                              <p style="color:red;"><?php echo ($error['id_catatan_medik']) ? $error['id_catatan_medik'] : ''; ?></p>
                            </div>
                            <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" type="text" name="nama"
                              value="<?php echo $nama1; ?>" readonly>
                              <p style="color:red;"><?php echo ($error['nama']) ? $error['nama'] : ''; ?></p>
                            </div>
                            <!-- <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <input class="form-control hidden" type="text" name="sex"
                              value="<?php echo $sex1; ?>" readonly>
                              <input class="form-control" type="text"
                              value="<?php echo $nama_sex; ?>" readonly>
                              <p style="color:red;"><?php echo ($error['sex']) ? $error['sex'] : ''; ?></p>
                            </div>
                            <div class="form-group">
                              <label>Alamat</label>
                              <input class="form-control" type="text" name="alamat"
                              value="<?php echo $alamat1; ?>" readonly>
                              <p style="color:red;"><?php echo ($error['alamat']) ? $error['alamat'] : ''; ?></p>
                            </div> -->
                            <div class="form-group">
                              <label>Dokter</label>
                              <select class="form-control" type="text" name="id_dokter"
                              value="<?php echo $d['id_dokter']; ?>" required="">
                              <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
                              <option disabled selected>Pilih</option>
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
                            <option disabled selected>Pilih</option>
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
                          <input class="form-control" type="date" name="tgl_periksa"
                          value="<?php echo $d['tgl_periksa']; ?>" required="">
                          <p style="color:red;"><?php echo ($error['tgl_periksa']) ? $error['tgl_periksa'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                          <label>Jam Periksa</label>
                          <input class="form-control" type="text" name="jam_periksa" required="">
                          <p style="color:red;"><?php echo ($error['jam_periksa']) ? $error['jam_periksa'] : ''; ?></p>
                        </div>
                       <!--  <div class="form-group">
                          <label>Sampel</label>
                          <input class="form-control" type="text" name="sampel"
                          value="Darah" readonly>
                          <p style="color:red;"><?php echo ($error['sampel']) ? $error['sampel'] : ''; ?></p>
                        </div> -->
                        <!-- <div class="form-group">
                          <label>IgM</label>
                          <select class="form-control" type="text" name="igm" required="">
                            <p style="color:red;"><?php echo ($error['igm']) ? $error['igm'] : ''; ?></p>
                            <option value='3' selected>On process</option>
                            <option value='0'>Non Reaktif</option>
                            <option value='1'>Reaktif</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>IgG</label>
                          <select class="form-control" type="text" name="igg" required="">
                            <p style="color:red;"><?php echo ($error['igg']) ? $error['igg'] : ''; ?></p>
                            <option value='3' selected>On process</option>
                            <option value='0'>Non Reaktif</option>
                            <option value='1'>Reaktif</option>
                          </select>
                        </div> -->
                        <!-- <div class="form-group">
                          <label>Petugas</label>
                          <input class="form-control" type="text" name="pemeriksa" value="<?php echo $nama_login; ?>" readonly="">
                          <p style="color:red;"><?php echo ($error['pemeriksa']) ? $error['pemeriksa'] : ''; ?></p>
                        </div> -->
                        <button type="submit" name="rapidsubmit" class="btn btn-success">Tambah</button>
                      </form>   
                    </div>
                  </div>
                </div><!-- /.row -->
              </div><!-- /#wrapper -->
              <?php include "../views/footer.php"; ?>