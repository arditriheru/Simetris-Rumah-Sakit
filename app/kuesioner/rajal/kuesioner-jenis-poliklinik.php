<?php include "views/header.php"; ?>
<?php
$nama       = $_POST['nama'];
$kontak     = $_POST['kontak'];
$pelayanan  = $_POST['pelayanan'];
?>
<div class="col-lg-12">
  <div align="center" class="row">
    <h7><b>SILAHKAN PILIH</b></h7><br>
    <h8><b>JENIS POLIKLINIK</b></h8><br><br>
    <div class="container">
      <form method="post" action="kuesioner-nama-dokter-spesialis" role="form">
        <div class="col-lg-6">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan"
            value="<?php echo $pelayanan; ?>">
            <input class="form-control" type="hidden" name="jenispoli" value="1">
            <button type="submit" name="submitpage1" class="btn">
              <img src="../images/kuesioner-3.jpg" class="rounded float-right" width="400px">
            </button>
          </div>
        </div>
      </form>
      <form method="post" action="kuesioner-nama-dokter-spesialis" role="form">
        <div class="col-lg-6">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan"
            value="<?php echo $pelayanan; ?>">
            <input class="form-control" type="hidden" name="jenispoli" value="2">
            <button type="submit" name="submitpage1" class="btn">
              <img src="../images/kuesioner-4.jpg" class="rounded float-right" width="400px">
            </button>
          </div>
        </div>
      </form>
      <!-- <form method="post" action="kuesioner-nama-dokter-spesialis" role="form">
        <div class="col-lg-3">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan"
            value="<?php echo $pelayanan; ?>">
            <input class="form-control" type="hidden" name="jenispoli" value="3">
            <button type="submit" name="submitpage1" class="btn">
              <img src="../images/kuesioner-5.jpg" class="rounded float-right" width="200px">
            </button>
          </div>
        </div>
      </form>
      <form method="post" action="kuesioner-nama-dokter-spesialis" role="form">
        <div class="col-lg-3">
          <div align="center">
            <input class="form-control" type="hidden" name="nama"
            value="<?php echo $nama; ?>">
            <input class="form-control" type="hidden" name="kontak"
            value="<?php echo $kontak; ?>">
            <input class="form-control" type="hidden" name="pelayanan"
            value="<?php echo $pelayanan; ?>">
            <input class="form-control" type="hidden" name="jenispoli" value="4">
            <button type="submit" name="submitpage1" class="btn">
              <img src="../images/kuesioner-6.jpg" class="rounded float-right" width="200px">
            </button>
          </div>
        </div>
      </form> -->
    </div>
  </div>
</div><br>
<?php include "views/footer.php"; ?>