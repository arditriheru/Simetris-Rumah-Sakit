<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Form <small>Keterangan Lahir</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Form</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        if(isset($_POST['suketlahirsubmit'])){
          $a = mysqli_query($koneksi,
            "SELECT MAX(id_suket) AS id_suket_max
            FROM mr_suket;");
          while($b = mysqli_fetch_array($a)){

            $id_suket         = $b['id_suket_max']+1;
            $id_catatan_medik = $_POST['id_catatan_medik'];
            $id_dokter        = $_POST['id_dokter'];
            $ayah             = $_POST['ayah'];
            $ibu              = $_POST['ibu'];
            $bb               = $_POST['bb'];
            $pb               = $_POST['pb'];
            $lk               = $_POST['lk'];
            $jam_lahir        = $_POST['jam_lahir'];
            $anak_ke          = $_POST['anak_ke'];
            $tanggal          = $tanggalsekarang;
            $jam              = $jamsekarang;
            $kode_abjad       = 'B';
            $kode_jenis       = '1';
          }

          $simpan=mysqli_query($koneksi,"INSERT INTO mr_suket(id_suket, id_catatan_medik, id_dokter, ayah, ibu, bb, pb, lk, jam_lahir, anak_ke, tanggal, jam, kode_abjad, kode_jenis)
            VALUES('$id_suket','$id_catatan_medik','$id_dokter','$ayah','$ibu','$bb','$pb','$lk','$jam_lahir','$anak_ke','$tanggal','$jam','$kode_abjad','$kode_jenis')");
          if($simpan){
            echo "<script>
            setTimeout(function() {
              swal({
                title: 'Berhasil',
                text: 'Menambah Surat Keterangan Lahir',
                type: 'success'
                }, function() {
                  window.location = 'suket-lahir-print?id=$id_suket';
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
                    ?>
                    <?php
                    $id_register = $_GET['id'];
                    if(isset($id_register)){

                      $c = mysqli_query($koneksi,
                        "SELECT * FROM mr_pasien WHERE id_register='$id_register';");
                      while($d = mysqli_fetch_array($c)){
                        $id_catatan_medik  = $d['id_catatan_medik'];
                        $nama              = $d['nama'];
                        $nama_ortu         = $d['nama_ortu'];
                      }
                      ?>
                      <!-- cari nama pasien -->
                      <form method="post" action="" role="form">
                        <div class="form-group">
                          <label>Nomor Rekam Medik</label>
                          <input class="form-control" type="text" name="id_catatan_medik" value="<?php echo $id_catatan_medik; ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Nama Anak</label>
                          <input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Dokter</label>
                          <select class="form-control" type="text" name="id_dokter"
                          value="<?php echo $d['id_dokter']; ?>" required="">
                          <option disabled selected>Pilih</option>
                          <?php 
                          $data = mysqli_query($koneksi,
                            "SELECT * FROM dokter;");
                          while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama Ayah</label>
                        <input class="form-control" type="text" name="ayah" value="<?php echo $nama_ortu; ?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Nama Ibu</label>
                        <input class="form-control" type="text" name="ibu" value="<?php echo $nama_ortu; ?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Data Kelahiran</label>
                        <div class="row form-group">
                          <div class="col col-sm-4"><input type="number" name="bb" placeholder="Berat Bayi (gr)" class="form-control"></div>
                          <div class="col col-sm-4"><input type="number" name="pb" placeholder="Panjang Bayi (cm)" class="form-control"></div>
                          <div class="col col-sm-4"><input type="number" name="lk" placeholder="Lingkar Kepala (cm)" class="form-control"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Jam Lahir</label>
                        <input class="form-control" type="text" name="jam_lahir" placeholder="Masukkan.." required="">
                      </div>
                      <div class="form-group">
                        <label>Anak ke-</label>
                        <input class="form-control" type="number" name="anak_ke" placeholder="Masukkan.." required="">
                      </div>
                      <button type="submit" name="suketlahirsubmit" class="btn btn-success">Submit</button>
                    </form>
                  <?php }else{ ?>
                    <!-- cari RM pasien -->
                    <form method="post" action="" role="form">
                      <div class="form-group">
                        <label>Nomor Rekam Medik</label>
                        <input class="form-control" type="text" onkeyup="isi_otomatis()" id="id_catatan_medik"
                        placeholder="Masukkan Nomor Rekam Medik" name="id_catatan_medik" required="">
                      </div>
                      <div class="form-group">
                        <label>Nama Anak</label>
                        <input class="form-control" type="text" id="nama" name="nama" 
                        placeholder="Nama Anak (otomatis)" readonly>
                      </div>
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" type="text" name="id_dokter"
                        value="<?php echo $d['id_dokter']; ?>" required="">
                        <option disabled selected>Pilih</option>
                        <?php 
                        $data = mysqli_query($koneksi,
                          "SELECT * FROM dokter;");
                        while($d = mysqli_fetch_array($data)){
                          echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Ayah</label>
                      <input class="form-control" type="text" id="nama_ayah" name="ayah" 
                      placeholder="Nama Ayah (otomatis)" required="">
                    </div>
                    <div class="form-group">
                      <label>Nama Ibu</label>
                      <input class="form-control" type="text" id="nama_ibu" name="ibu" 
                      placeholder="Nama Ibu (otomatis)" required="">
                    </div>
                    <div class="form-group">
                      <label>Data Kelahiran</label>
                      <div class="row form-group">
                        <div class="col col-sm-4"><input type="number" name="bb" placeholder="Berat Bayi (gr)" class="form-control"></div>
                        <div class="col col-sm-4"><input type="number" name="pb" placeholder="Panjang Bayi (cm)" class="form-control"></div>
                        <div class="col col-sm-4"><input type="number" name="lk" placeholder="Lingkar Kepala (cm)" class="form-control"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jam Lahir</label>
                      <input class="form-control" type="text" name="jam_lahir" placeholder="Masukkan.." required="">
                    </div>
                    <div class="form-group">
                      <label>Anak ke-</label>
                      <input class="form-control" type="number" name="anak_ke" placeholder="Masukkan.." required="">
                    </div>
                    <button type="submit" name="suketlahirsubmit" class="btn btn-success">Submit</button>
                  </form>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-6">
              <form method="post" action="suket-lahir-tambah-cari-nama" role="form">
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="nama" placeholder="Nama Pasien">
                </div><button type="submit" class="btn btn-success">Cari</button>
              </form>
            </div>
          </div><!-- /.row -->
        </div><!-- /#wrapper -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
          function isi_otomatis(){
            var id_catatan_medik = $("#id_catatan_medik").val();
            $.ajax({
              url: 'suket-lahir-tambah-controller.php',
              data:"id_catatan_medik="+id_catatan_medik ,
            }).success(function (data) {
              var json = data,
              obj = JSON.parse(json);
              $('#nama').val(obj.nama);
              $('#nama_ayah').val(obj.nama_ayah);
              $('#nama_ibu').val(obj.nama_ibu);
            });
          }
        </script>
        <?php include "views/footer.php"; ?>