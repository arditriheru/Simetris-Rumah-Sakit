<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Pegawai <small>Detail</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check"></i> Detail</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <?php
    $id_sdm_pegawai = $_GET['id'];
    $data = mysqli_query($koneksi,
      "SELECT *, sdm_pegawai.nama AS nama_pegawai, mr_profesi.nama_profesi, mr_agama.nama_agama, mr_pendidikan.nama AS nama_pendidikan,
      IF (sdm_pegawai.sex='1', 'Laki-laki', 'Perempuan') AS nama_sex,
      IF (sdm_pegawai.tetap='1', 'Tetap', 'Kontrak') AS nama_tetap,
      IF (sdm_pegawai.aktif='1', 'Aktif', 'Non Aktif') AS nama_aktif
      FROM sdm_pegawai
      INNER JOIN mr_profesi
      ON sdm_pegawai.id_profesi = mr_profesi.id_profesi
      INNER JOIN mr_agama
      ON sdm_pegawai.id_agama = mr_agama.id_agama
      INNER JOIN mr_pendidikan
      ON sdm_pegawai.id_pendidikan = mr_pendidikan.id_pendidikan
      WHERE sdm_pegawai.id_sdm_pegawai='$id_sdm_pegawai';");
    while($d = mysqli_fetch_array($data)){
      ?>
      <?php 
      if(isset($_SESSION['sdm_username'])){ ?>
        <div clas="row">
          <div class="col-lg-6">
            <a href="booking-edit.php?id_booking=<?php echo $id_booking; ?>"
              <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
            </a>
          </div>
          <div align="right" class="col-lg-6">
            <a href="booking-hapus.php?id_booking=<?php echo $id_booking; ?>"
              onclick="javascript: return confirm('Anda yakin hapus?')">
              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </a>
          </div>
        </div><br><br><!-- Row --->
      <?php } ?>
      <div class="col-lg-7">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <tr>
                <td align="center" colspan="2"><b>BIODATA</b></td>
              </tr>
              <tr>
                <td><b>NIP</b></td>
                <td>
                  <?php
                  if($d['nip']=='0'){
                    echo '-'; 
                  }else{
                    echo $d['nip']; 
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>NIK</b></td>
                <td><?php echo $d['nik']; ?></td>
              </tr>
              <tr>
                <td><b>Nama Pegawai</b></td>
                <td><?php echo $d['nama_pegawai']; ?></td>
              </tr>
              <tr>
                <td><b>Profesi</b></td>
                <td><?php echo $d['nama_profesi']; ?></td>
              </tr>
              <tr>
                <td><b>Agama</b></td>
                <td><?php echo $d['nama_agama']; ?></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td><?php echo $d['nama_sex']; ?></td>
              </tr>
              <tr>
                <td><b>Tempat, Tgl Lahir</b></td>
                <td><?php echo $d['tempat'].', '.date('d F Y', strtotime($d['tgl_lahir'])); ?></td>
              </tr>
              <tr>
                <td><b>Pendidikan</b></td>
                <td><?php echo $d['nama_pendidikan']; ?></td>
              </tr>
              <tr>
                <td><b>Kontak</b></td>
                <td><?php echo $d['telp']; ?></td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td><?php echo $d['email']; ?></td>
              </tr>
              <tr>
                <td><b>Status Kepegawaian</b></td>
                <td><?php echo 'Pegawai '.$d['nama_tetap']; ?></td>
              </tr>
              <tr>
                <td><b>Tanggal Masuk</b></td>
                <td><?php echo date('d F Y', strtotime($d['tgl_masuk'])); ?></td>
              </tr>
              <tr>
                <td><b>Kontrak Habis</b></td>
                <td>
                  <?php
                  if($d['tetap']=='1'){
                    echo '-';
                  }else{
                    echo date('d F Y', strtotime($d['tgl_habis'])); 
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>Alamat Lengkap</b></td>
                <td><?php echo $d['alamat'].', '.$d['kelurahan'].', '.$d['kecamatan'].', '.$d['kabupaten'].', '.$d['provinsi'].' <br>Kode Pos '.$d['pos']; ?></td>
              </tr>
              <tr>
                <td><b>Status</b></td>
                <td><?php echo 'Pegawai '.$d['nama_aktif']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <tr>
                <td align="center" colspan="2"><b>KOMPETENSI</b></td>
              </tr>
              <tr>
                <td><b>Nomor STR</b></td>
                <td>
                  <?php
                  if(!$d['no_str']){
                    echo "-";
                  }else{
                    echo $d['no_str'];
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Berlaku Sampai</td>
                <td>
                  <?php
                  if($d['berlaku_str']==000-00-00){
                    echo "-";
                  }else{
                    echo date('d F Y', strtotime($d['berlaku_str']));
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>Nomor SIP</b></td>
                <td>
                  <?php
                  if(!$d['no_sip']){
                    echo "-";
                  }else{
                    echo $d['no_sip'];
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Berlaku Sampai</td>
                <td>
                  <?php
                  if($d['berlaku_sip']==000-00-00){
                    echo "-";
                  }else{
                    echo date('d F Y', strtotime($d['berlaku_sip']));
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>Nomor SPK</b></td>
                <td>
                  <?php
                  if(!$d['no_spk']){
                    echo "-";
                  }else{
                    echo $d['no_spk'];
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Berlaku Sampai</td>
                <td>
                  <?php
                  if($d['berlaku_spk']==000-00-00){
                    echo "-";
                  }else{
                    echo date('d F Y', strtotime($d['berlaku_spk']));
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>Nomor RKK</b></td>
                <td>
                  <?php
                  if(!$d['no_rkk']){
                    echo "-";
                  }else{
                    echo $d['no_rkk'];
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Berlaku Sampai</td>
                <td>
                  <?php
                  if($d['berlaku_rkk']==000-00-00){
                    echo "-";
                  }else{
                    echo date('d F Y', strtotime($d['berlaku_rkk']));
                  }
                  ?>
                </td>
              </tr>
            </tbody>
            </table><?php } ?>
          </div>
        </div>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>