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
    <h7><b>MOHON PENILAIAN ANDA</b></h7><br>
    <h8 size="15"><b>TERHADAP PELAYANAN KAMI</b></h8>
    <div class="col-lg-12">
      <div class="container">
        <img width="30%" src="images/gif2.gif" alt="Rachmi Online">
        <form method="post" action="kuesioner-layanan" role="form">
          <div class="row">
            <div class="form-group col-lg-6">
              <input class="form-control input-lg input-upper" style="height:70px" type="text" name="nama" placeholder="Masukkan Nama Anda" required="">
            </div>
            <div class="form-group col-lg-6">
              <input class="form-control input-lg input-upper" style="height:70px" type="text" name="kontak" placeholder="Masukkan Nomor WhatsApp" required="">
            </div>
          </div><br>
          <button type="submit" class="btn btn-block"><img src="images/kuesioner-button.jpg" class="rounded float-right" width="100%"></button>
        </form>
      </div>
    </div>
  </div><div align="center"><b>Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></b> | All Right Reserved.<a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <b class="bluetext">Tim IT RSKIA Rachmi</b></div><br>
  <?php include "views/footer.php"; ?>