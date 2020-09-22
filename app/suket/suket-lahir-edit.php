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
      <td>
        <?php $id_suket = $_GET['id']; ?>
        <div align="right">
          <a href="suket-lahir-hapus.php?id=<?php echo $id_suket; ?>"
            onclick="javascript: return confirm('Anda yakin hapus?')">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
          </a>
        </div>
      </td>
      <div class="table-responsive">
        <?php
        $c = mysqli_query($koneksi,
          "SELECT *, mr_pasien.nama, mr_suket.alamat AS suket_alamat, dokter.nama_dokter
          FROM mr_suket, mr_pasien, dokter
          WHERE mr_suket.id_catatan_medik=mr_pasien.id_catatan_medik
          AND mr_suket.id_dokter=dokter.id_dokter
          AND mr_suket.id_suket='$id_suket';");
        while($d = mysqli_fetch_array($c)){


          if(isset($_POST['suketlahirsubmit'])){
            $a = mysqli_query($koneksi,
              "SELECT MAX(id_suket) AS id_suket_max
              FROM mr_suket;");
            while($b = mysqli_fetch_array($a)){

              $id_dokter        = $_POST['id_dokter'];
              $ayah             = $_POST['ayah'];
              $ibu              = $_POST['ibu'];
              $bb               = $_POST['bb'];
              $pb               = $_POST['pb'];
              $lk               = $_POST['lk'];
              $jam_lahir        = $_POST['jam_lahir'];
              $anak_ke          = $_POST['anak_ke'];
              $alamat           = $_POST['alamat'];
            }

            $simpan=mysqli_query($koneksi,"UPDATE mr_suket 
              SET id_dokter='$id_dokter', ayah='$ayah', ibu='$ibu', bb='$bb', pb='$pb', lk='$lk', jam_lahir='$jam_lahir', anak_ke='$anak_ke', alamat='$alamat'
              WHERE id_suket='$id_suket'");
            if($simpan){
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Berhasil',
                  text: 'Memperbarui Suket Keterangan Lahir',
                  type: 'success'
                  }, function() {
                    window.location = 'dashboard.php';
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

                      <form method="post" action="" role="form">
                        <div class="form-group">
                          <label>Nomor Rekam Medik</label>
                          <input class="form-control" type="text" name="id_catatan_medik" value="<?php echo $d['id_catatan_medik'];?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Nama Anak</label>
                          <input class="form-control" type="text" id="nama" name="nama" 
                          value="<?php echo $d['nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Dokter</label>
                          <select class="form-control" type="text" name="id_dokter" required="">
                            <option selected value='<?php echo $d['id_dokter']; ?>'><?php echo $d['nama_dokter']; ?></option>
                            <?php 
                            $data = mysqli_query($koneksi,
                              "SELECT id_dokter, nama_dokter FROM dokter;");
                            while($x = mysqli_fetch_array($data)){
                              echo "<option value='".$x['id_dokter']."'>".$x['nama_dokter']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Nama Ayah</label>
                          <input class="form-control" type="text" id="nama_ortu" name="ayah" 
                          value="<?php echo $d['ayah']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Nama Ibu</label>
                          <input class="form-control" type="text" name="ibu" 
                          value="<?php echo $d['ibu']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Data Kelahiran</label>
                          <div class="row form-group">
                            <div class="col col-sm-4"><input type="number" name="bb" value="<?php echo $d['bb']; ?>" class="form-control"></div>
                            <div class="col col-sm-4"><input type="number" name="pb" value="<?php echo $d['pb']; ?>" class="form-control"></div>
                            <div class="col col-sm-4"><input type="number" name="lk" value="<?php echo $d['lk']; ?>" class="form-control"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jam Lahir</label>
                          <input class="form-control" type="text" name="jam_lahir" value="<?php echo $d['jam_lahir']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Anak ke-</label>
                          <input class="form-control" type="number" name="anak_ke" value="<?php echo $d['anak_ke']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <input class="form-control" type="text" name="alamat" 
                          value="<?php echo $d['suket_alamat']; ?>" required="">
                        </div>
                        <button type="submit" name="suketlahirsubmit" class="btn btn-success">Perbarui</button>
                        </form><?php } ?> 
                      </div>
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
                      $('#nama_ortu').val(obj.nama_ortu);
                    });
                  }
                </script>
                <?php include "views/footer.php"; ?>