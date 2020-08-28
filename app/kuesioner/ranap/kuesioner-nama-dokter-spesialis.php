<?php include "views/header.php"; ?>
<?php
$nama       = $_POST['nama'];
$kontak     = $_POST['kontak'];
$pelayanan  = $_POST['pelayanan'];

if(isset($_POST['submitnamadoktersp'])){

 session_start();
 $nama                       = $_POST['nama'];
 $kontak                     = $_POST['kontak'];
 $pelayanan                  = $_POST['pelayanan'];
 $id_dokter                  = $_POST['id_dokter'];
 $_SESSION['getNama']        = $nama;
 $_SESSION['getKontak']      = $kontak;
 $_SESSION['getPelayanan']   = $pelayanan;
 $_SESSION['getIdDokter']    = $id_dokter;

 header("location:kuesioner-parkir");
}
?>
<div id="page-wrapper">
  <div align="center" class="row">
    <div class="col-lg-12">
      <h7><b>PELAYANAN</b></h7><br>
      <h8><b>DOKTER SPESIALIS</b></h8><br><br>
      <div class="row">
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="1">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/soeroyo.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="2">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/irwan.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="3">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/irfan.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="4">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/arsi.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="5">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/umam.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="7">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/restu.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
      </div><br>
      <div class="row">
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="8">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/marie.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-2">
            <div align="center">
              <input class="form-control" type="hidden" name="nama"
              value="<?php echo $nama; ?>">
              <input class="form-control" type="hidden" name="kontak"
              value="<?php echo $kontak; ?>">
              <input class="form-control" type="hidden" name="pelayanan"
              value="<?php echo $pelayanan; ?>">
              <input class="form-control" type="hidden" name="id_dokter" value="9">
              <button type="submit" name="submitnamadoktersp" class="btn">
                <img src="../images/akbar.jpg" class="img-rounded" width="100%">
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><br>
  <?php include "views/footer.php"; ?>