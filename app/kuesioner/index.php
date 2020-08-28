<?php include "views/header.php"; ?>
<style>
  .input-upper { text-transform: uppercase }
  .input-upper::-webkit-input-placeholder { text-transform: none }
  .input-upper::-moz-placeholder { text-transform: none }
  .input-upper:-moz-placeholder { text-transform: none }
  .input-upper:-ms-placeholder { text-transform: none }
</style>
<div class="col-lg-12">
  <div align="center" class="row">
    <h1><b>MOHON PENILAIAN ANDA TERHADAP PELAYANAN KAMI</b></h1>
    <div class="col-lg-12">
      <div class="container">
        <img width="20%" src="images/gif2.gif" alt="Rachmi Online">
        <form method="post" action="kuesioner-layanan" role="form">
          <div align="center">
            <div class="form-group">
              <input class="form-control input-lg input-upper" type="text" name="nama" placeholder="Masukkan Nama Anda" required="">
            </div>
            <input class="form-control input-lg input-upper" type="text" name="kontak" placeholder="Masukkan Nomor WhatsApp" required="">
          </div><br>
          <button type="submit" class="btn btn-success btn-lg btn-block">Lanjutkan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div><br>
<?php include "views/footer.php"; ?>