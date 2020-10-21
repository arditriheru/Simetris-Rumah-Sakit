<?php include "views/header.php"; $getMedis = $_GET['id']; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <?php
    if($getMedis=='1'){ ?>
     <div class="col-lg-12">
      <h1>Medis <small>Tambah</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check"></i> Tenaga Medis</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  <?php }elseif($getMedis=='0') { ?>
   <div class="col-lg-12">
    <h1>Non Medis <small>Tambah</small></h1>
    <ol class="breadcrumb">
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-check"></i> Tenaga Non Medis</li>
    </ol>  
    <?php include "../../system/welcome.php"?>
  </div>
<?php }elseif($getMedis=='2'){ ?>
 <div class="col-lg-12">
  <h1>Pegawai <small>Tambah</small></h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-check"></i> Pegawai Baru</li>
  </ol>  
  <?php include "../../system/welcome.php"?>
</div>
<?php } ?>

</div><!-- /.row -->
<div class="row">
 <div class="col-lg-12">
  <div class="table-responsive">
    <?php
    if(isset($_POST['submit'])){
      $nik            = $_POST['nik'];
      $nip            = $_POST['nip'];
      $nama           = $_POST['nama'];
      $id_profesi     = $_POST['id_profesi'];
      $id_pendidikan  = $_POST['id_pendidikan'];
      $id_agama       = $_POST['id_agama'];
      $sex            = $_POST['sex'];
      $tempat         = $_POST['tempat'];
      $tgl_lahir      = $_POST['tgl_lahir'];
      $telp           = $_POST['telp'];
      $email          = $_POST['email'];
      $tetap          = $_POST['tetap'];
      $tgl_masuk      = $_POST['tgl_masuk'];
      $tgl_habis      = date('Y-m-d', strtotime('+730 days', strtotime($tgl_masuk)));

      if($getMedis=='1'){
        $medis        = '1';
      }elseif($getMedis=='0'){
        $medis        = '1';
      }else{
        $medis        = $_POST['medis'];
      }
      
      $alamat         = $_POST['alamat'];
      $kelurahan      = $_POST['kelurahan'];
      $kecamatan      = $_POST['kecamatan'];
      $kabupaten      = $_POST['kabupaten'];
      $provinsi       = $_POST['provinsi'];
      $pos            = $_POST['pos'];
      $no_str         = $_POST['no_str'];
      $berlaku_str    = $_POST['berlaku_str'];
      $no_sip         = $_POST['no_sip'];
      $berlaku_sip    = $_POST['berlaku_sip'];
      $no_spk         = $_POST['no_spk'];
      $berlaku_spk    = $_POST['berlaku_spk'];
      $no_rkk         = $_POST['no_rkk'];
      $berlaku_rkk    = $_POST['berlaku_rkk'];
      $aktif          = '1';

      $simpan=mysqli_query($koneksi,"INSERT INTO sdm_pegawai(id_sdm_pegawai, id_profesi, id_pendidikan, nama, nip, nik, tempat, tgl_lahir, sex, id_agama, telp, email, alamat, provinsi, kabupaten, kecamatan, kelurahan, pos, no_str, berlaku_str, no_sip, berlaku_sip, no_spk, berlaku_spk, no_rkk, berlaku_rkk, tgl_masuk, tgl_habis, medis, tetap, aktif)VALUES('','$id_profesi','$id_pendidikan','$nama','$nip','$nik','$tempat','$tgl_lahir','$sex','$id_agama','$telp','$email','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan','$pos','$no_str','$berlaku_str','$no_sip','$berlaku_sip','$no_spk','$berlaku_spk','$no_rkk','$berlaku_rkk','$tgl_masuk','$tgl_habis','$medis','$tetap','$aktif')");

      if($simpan){
        $a = mysqli_query($koneksi,
          "SELECT id_sdm_pegawai FROM sdm_pegawai WHERE nik = '$nik';");
        while($b = mysqli_fetch_array($a)){
          $id_sdm_pegawai = $b['id_sdm_pegawai'];
        }
        echo "<script>
        setTimeout(function() {
          swal({
            title: 'Berhasil',
            text: 'Menambah Data Pegawai',
            type: 'success'
            }, function() {
              window.location = 'pegawai-detail.php?id=$id_sdm_pegawai';
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
                    window.location = 'pegawai-tambah.php';
                    });
                    }, 10);
                    </script>";
                  }
                }
                ?>
                <form method="post" action="" role="form">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nomor Induk Kependudukan</label>
                        <input class="form-control" type="number" placeholder="Tulis Tanpa Spasi" name="nik" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nomor Induk Pegawai</label>&nbsp;<label class="redtext">(Pegawai Tetap)</label>
                        <input class="form-control" type="number" placeholder="Tulis Tanpa Spasi" name="nip">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Nama Lengkap Pegawai" name="nama" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Profesi</label>
                        <select class="form-control" type="text" name="id_profesi" required="">
                          <option value="">Pilih</option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM mr_profesi;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_profesi']."'>".$d['nama_profesi']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" type="text" name="id_agama" required="">
                          <option value="">Pilih</option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM mr_agama;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_agama']."'>".$d['nama_agama']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" type="text" name="sex" required="">
                          <option value="">Pilih</option>
                          <option value="1">Laki-laki</option>
                          <option value="2">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Tempat Lahir" name="tempat" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" placeholder="Tanggal Lahir" name="tgl_lahir" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Kontak</label>
                        <input class="form-control" type="number" placeholder="Nomor Kontak" name="telp" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" placeholder="Contoh : rskia.rachmi@gmail.com" name="email" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Status Kepegawaian</label>
                        <select class="form-control" type="text" name="tetap" required="">
                          <option value="">Pilih</option>
                          <option value="1">Tetap</option>
                          <option value="0">Kontrak</option>
                        </select>
                      </div>
                    </div>
                    <?php
                    if($getMedis=='0'){ ?>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" type="text" name="medis" required="">
                            <option value="0">Tenaga Non Medis</option>
                          </select>
                        </div>
                      </div>
                    <?php }elseif($getMedis=='1'){ ?>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" type="text" name="medis" required="">
                            <option value="1">Tenaga Medis</option>
                          </select>
                        </div>
                      </div>
                    <?php }else{ ?>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" type="text" name="medis" required="">
                            <option value="">Pilih</option>
                            <option value="1">Tenaga Medis</option>
                            <option value="0">Tenaga Non Medis</option>
                          </select>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input class="form-control" type="date" placeholder="Tanggal Masuk Kerja" name="tgl_masuk" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Pendidikan</label>
                        <select class="form-control" type="text" name="id_pendidikan" required="">
                          <option value="">Pilih</option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM mr_pendidikan WHERE NOT id_pendidikan IN (1,12,13);");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_pendidikan']."'>".$d['nama']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div><hr>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Alamat Lengkap, Jalan, Gang, RT, RW" name="alamat" rows="3" required=""></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Nama Kelurahan" name="kelurahan" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Nama Kecamatan" name="kecamatan" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Kabupaten/ Kota</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Nama Kabupaten/ Kota" name="kabupaten" required="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input class="form-control" onkeyup="this.value = this.value.toUpperCase()" type="text" placeholder="Nama Provinsi" name="provinsi" required="">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label>Kode Pos</label>
                        <input class="form-control" type="number" placeholder="Kode Pos" name="pos" required="">
                      </div>
                    </div>
                  </div><hr>
                  <?php
                  if($getMedis=='2'){ ?>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nomor STR</label>
                          <input class="form-control" type="number" placeholder="Surat Tanda Registrasi" name="no_str">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Berlaku Sampai</label>
                          <input class="form-control" type="date" placeholder="Surat Tanda Registrasi" name="berlaku_str">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nomor SIP</label>
                          <input class="form-control" type="number" placeholder="Surat Ijin Prakter" name="no_sip">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Berlaku Sampai</label>
                          <input class="form-control" type="date" placeholder="Surat Ijin Praktek" name="berlaku_sip">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nomor SPK</label>
                          <input class="form-control" type="number" placeholder="Surat Penugasan Klinis" name="no_spk">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Berlaku Sampai</label>
                          <input class="form-control" type="date" placeholder="Surat Penugasan Klinis" name="berlaku_spk">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nomor RKK</label>
                          <input class="form-control" type="number" placeholder="Surat Kewenangan Klinik" name="no_rkk">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Berlaku Sampai</label>
                          <input class="form-control" type="date" placeholder="Surat Kewenangan Klinik" name="berlaku_rkk">
                        </div>
                      </div>
                    </div><hr>
                  <?php } ?>
                  <div align="center">
                    <button type="submit" name="submit" class="btn btn-success">Daftar</button>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <?php include "views/footer.php"; ?>