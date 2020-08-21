<?php
include "views/header.php";
$m = 31;
$nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
$mak   = date("Y-m-d", $nextN);

function format_mak($mak)
{
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $mak);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
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
        <li class="active"><i class="fa fa-plus"></i> Tambah</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
   <div class="col-lg-6">
    <div class="table-responsive">
      <?php 
      $id_catatan_medik = $_POST['id_catatan_medik'];

      $c = mysqli_query($koneksi, "SELECT tgl_lahir, sex, IF(sex='1', 'Laki-laki', 'Perempuan') AS nama_sex FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
      while($d = mysqli_fetch_array($c)){
        $tgl_lahir1        = $d['tgl_lahir'];
        $nama_sex          = $d['nama_sex'];
        $sex1              = $d['sex'];
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
          $simpan=mysqli_query($koneksi,"INSERT INTO rapidtest(id_rapidtest, id_catatan_medik, id_dokter, id_unit, tanggal, jam, sampel, pemeriksaan, igm, nilai_rujukan, metode, pemeriksa, tgl_periksa, jam_periksa, igg)
            VALUES('','$id_catatan_medik','$id_dokter','$id_unit','$tanggal','$jam','$sampel','$pemeriksaan','$igm','$nilai_rujukan','$metode','$pemeriksa','$tgl_periksa','$jam_periksa', '$igg')");
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
                  }
                  ?>
                  <form method="post" action="" role="form">
                    <div class="form-group">
                      <label>Nomor Rekam Medik</label>
                      <input class="form-control" type="text" onkeyup="isi_otomatis()" id="id_catatan_medik"
                      placeholder="Masukkan Nomor Rekam Medik" name="id_catatan_medik" required="">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
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
                </div>
                <div class="form-group">
                  <label>Jam Periksa</label>
                  <input class="form-control" type="text" name="jam_periksa" required="">
                </div>
                <button type="submit" name="rapidsubmit" class="btn btn-success">Tambah</button>
              </form>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script type="text/javascript">
                function isi_otomatis(){
                  var id_catatan_medik = $("#id_catatan_medik").val();
                  $.ajax({
                    url: 'covid-rapid-tambah-controller.php',
                    data:"id_catatan_medik="+id_catatan_medik ,
                  }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                  });
                }
              </script> 
            </div>
          </div>
        </div>
      </div><!-- /#wrapper -->
      <?php include "views/footer.php"; ?> 