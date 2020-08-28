<?php include "views/header.php"; ?>
<?php
$nama       = $_POST['nama'];
$kontak     = $_POST['kontak'];
$pelayanan  = $_POST['pelayanan'];
$jenispoli  = $_POST['jenispoli'];

if(isset($_POST['submitnamadoktersp'])){

 session_start();
 $a = $_POST['nama'];
 $b = $_POST['kontak'];
 $c = $_POST['pelayanan'];
 $d = $_POST['id_dokter'];
 $e = $_POST['jenispoli'];
 $_SESSION['getNama']        = $a;
 $_SESSION['getKontak']      = $b;
 $_SESSION['getPelayanan']   = $c;
 $_SESSION['getIdDokter']    = $d;
 $_SESSION['getJenisPoli']   = $e;

 header("location:kuesioner-parkir");
}
?>
<div id="page-wrapper">
  <div align="center" class="row">
    <div class="col-lg-12">
      <h3><b>PELAYANAN</b></h3>
      <h1><b>DOKTER SPESIALIS</b></h1><br><br>
      <div class="row">
        <?php
        if($jenispoli==1){ ?>
          <form method="post" action="" role="form">
            <div class="col-lg-2">
              <div align="center">
                <input class="form-control" type="hidden" name="nama"
                value="<?php echo $nama; ?>">
                <input class="form-control" type="hidden" name="kontak"
                value="<?php echo $kontak; ?>">
                <input class="form-control" type="hidden" name="pelayanan"
                value="<?php echo $pelayanan; ?>">
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="1">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/soeroyo.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="5">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/umam.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="7">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/restu.jpg" class="rounded float-right" width="150px">
                </button>
              </div>
            </div>
          </form>
        <?php }elseif($jenispoli==2){ ?>
          <form method="post" action="" role="form">
            <div class="col-lg-2">
              <div align="center">
                <input class="form-control" type="hidden" name="nama"
                value="<?php echo $nama; ?>">
                <input class="form-control" type="hidden" name="kontak"
                value="<?php echo $kontak; ?>">
                <input class="form-control" type="hidden" name="pelayanan"
                value="<?php echo $pelayanan; ?>">
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="2">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/irwan.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="3">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/irfan.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="4">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/arsi.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="8">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/marie.jpg" class="rounded float-right" width="150px">
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
                <input class="form-control" type="hidden" name="jenispoli"
                value="<?php echo $jenispoli; ?>">
                <input class="form-control" type="hidden" name="id_dokter" value="9">
                <button type="submit" name="submitnamadoktersp" class="btn">
                  <img src="../images/akbar.jpg" class="rounded float-right" width="150px">
                </button>
              </div>
            </div>
          </form>
        <?php } ?>
      </div>
    </div><br>
    <?php include "views/footer.php"; ?>