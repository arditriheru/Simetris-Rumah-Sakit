<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laborat-tarif-tampil"><i class="fa fa-check"></i> Laboratorium</a></li>
        <li class="active"><i class="fa fa-flash"></i> Edit</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php 
        $id_lab_tarif = $_GET['id'];
        $data = mysqli_query($koneksi,"
          SELECT * FROM lab_tarif WHERE id_lab_tarif = $id_lab_tarif;");
        while($d = mysqli_fetch_array($data)){
          ?>
          <?php
          if(isset($_POST['submit'])){
            $alat           = $_POST['alat'];
            $bhp            = $_POST['bhp'];
            $infrastruktur  = $_POST['infrastruktur'];
            $jasa_rs        = $_POST['jasa_rs'];
            $tarif          = $_POST['tarif'];
            $kel            = $_POST['kel'];

            $edit=mysqli_query($koneksi,"UPDATE lab_tarif SET alat='$alat',bhp='$bhp',infrastruktur='$infrastruktur',jasa_rs='$jasa_rs',tarif='$tarif',kel='$kel' WHERE id_lab_tarif='$id_lab_tarif'");
            if($edit){
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Berhasil',
                  text: 'Memperbarui Tarif Laborat',
                  type: 'success'
                  }, function() {
                    window.location = 'laborat-tarif-detail?id=$id_lab_tarif';
                    });
                    }, 10);
                    </script>";
                  }else{
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Gagal',
                        text: 'Memperbarui Tarif Laborat',
                        type: 'error'
                        }, function() {
                          window.location = 'laborat-tarif-edit?id=$id_lab_tarif';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                      ?>
                      <form method="post" action="" role="form">
                        <div class="form-group">
                          <label>Kode Tarif</label>
                          <input class="form-control" type="text" name="id_lab_tarif"
                          value="<?php echo $d['id_lab_tarif']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Tindakan</label>
                          <input class="form-control" type="text" name="nama"
                          value="<?php echo $d['nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Alat</label>
                          <input class="form-control" type="text" name="alat"
                          value="<?php echo $d['alat']; ?>">
                        </div>
                        <div class="form-group">
                          <label>B.H.P</label>
                          <input class="form-control" type="text" name="bhp"
                          value="<?php echo $d['bhp']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Infrastruktur</label>
                          <input class="form-control" type="text" name="infrastruktur"
                          value="<?php echo $d['infrastruktur']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Jasa RS</label>
                          <input class="form-control" type="text" name="jasa_rs"
                          value="<?php echo $d['jasa_rs']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Tarif</label>
                          <input class="form-control" type="text" name="tarif"
                          value="<?php echo $d['tarif']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Kode Kelompok</label>
                          <input class="form-control" type="text" name="kel"
                          value="<?php echo $d['kel']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
                        </form><?php }?> 
                      </div>
                    </div>
                  </div><!-- /.row -->
                  <?php include 'views/footer.php';?>