<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah <small>HPL</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Tambah</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php
      if(isset($_POST['hplsubmit'])){
        $id_catatan_medik = $_POST['id_catatan_medik'];
        $id_dokter        = $_POST['id_dokter'];
        $tanggal          = $id_petugas;
        $tgl_hpl          = $_POST['tgl_hpl'];
        $tanggal          = $tanggalsekarang;
        $jam              = $jamsekarang;
        $bln              = date('m', strtotime($tgl_hpl));
        $thn              = date('Y', strtotime($tgl_hpl));

        $cek = mysqli_query($koneksi,
          "SELECT COUNT(id_hpl_register) AS cek FROM hpl_register WHERE id_catatan_medik='$id_catatan_medik' AND MONTH(tgl_hpl)='$bln' AND YEAR(tgl_hpl)='$thn';");
        while($a = mysqli_fetch_array($cek)){
          $cek = $a['cek'];
        }
        
        if($cek>0){
          echo "<script>
          setTimeout(function() {
            swal({
              title: 'Stop',
              text: 'Data Sudah Ada',
              type: 'error'
              }, function() {
                window.location = 'hpl-tambah.php';
                });
                }, 10);
                </script>";
              }else{
                $simpan=mysqli_query($koneksi,"INSERT INTO hpl_register(id_hpl_register, id_catatan_medik, id_dokter, id_petugas, tgl_hpl, tanggal, jam)VALUES('','$id_catatan_medik','$id_dokter','$id_petugas','$tgl_hpl','$tanggal','$jam')");
                if($simpan){
                  echo "<script>
                  setTimeout(function() {
                    swal({
                      title: 'Berhasil',
                      text: 'Menambah Prakiraan HPL',
                      type: 'success'
                      }, function() {
                        window.location = 'hpl-tambah.php';
                        });
                        }, 10);
                        </script>";
                      }else{
                        echo "<script>
                        setTimeout(function() {
                          swal({
                            title: 'Upss..',
                            text: 'Coba Sekali Lagi',
                            type: 'error'
                            }, function() {
                              window.location = 'hpl-tambah.php';
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
                            <label>Nama Pasien</label>
                            <input class="form-control" type="text" id="nama" name="nama" 
                            placeholder="Nama Pasien (otomatis)" readonly>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="text" id="tgl_lahir" name="tgl_lahir" 
                            placeholder="Tanggal Lahir (otomatis)" readonly>
                          </div>
                          <div class="form-group">
                            <label>Dokter</label>
                            <select class="form-control" type="text" name="id_dokter"
                            value="<?php echo $d['id_dokter']; ?>" required="">
                            <option value="">Pilih</option>
                            <?php 
                            $data = mysqli_query($koneksi,
                              "SELECT id_dokter, nama_dokter FROM dokter WHERE id_unit=2 AND status=1;");
                            while($d = mysqli_fetch_array($data)){
                              echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Prakiraan HPL</label>
                          <input class="form-control" type="date" name="tgl_hpl" required="">
                        </div>
                        <button type="submit" name="hplsubmit" class="btn btn-success">Submit</button>
                      </form>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                      <script type="text/javascript">
                        function isi_otomatis(){
                          var id_catatan_medik = $("#id_catatan_medik").val();
                          $.ajax({
                            url: 'hpl-tambah-controller.php',
                            data:"id_catatan_medik="+id_catatan_medik ,
                          }).success(function (data) {
                            var json = data,
                            obj = JSON.parse(json);
                            $('#nama').val(obj.nama);
                            $('#tgl_lahir').val(obj.tgl_lahir);
                          });
                        }
                      </script>
                    </div><!-- row -->
                  </div><!-- /#page-wrapper -->
                </div><!-- /#wrapper -->
                <?php include "views/footer.php"; ?>