<?php include "views/header.php"; ?>
<?php
$nama   = $_POST['nama'];
$kontak = $_POST['kontak'];
?>
<div class="col-lg-12">
  <div align="center" class="row">
    <h3><b>SILAHKAN PILIH</b></h3>
    <h1><b>JENIS PELAYANAN</b></h1><br><br>
    <div class="container">
      <form method="post" action="rajal/kuesioner-jenis-poliklinik" role="form">
        <div class="col-lg-6">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan" value="1">
            <button type="submit" name="submitpage1" class="btn">
              <img src="images/kuesioner-1.jpg" class="rounded float-right" width="200px">
            </button>
          </div>
        </div>
      </form>
      <form method="post" action="ranap/kuesioner-nama-dokter-spesialis" role="form">
        <div class="col-lg-6">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan" value="2">
            <button type="submit" name="submitpage1" class="btn">
              <img src="images/kuesioner-2.jpg" class="rounded float-right" width="200px">
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div><br>
<?php include "views/footer.php"; ?>