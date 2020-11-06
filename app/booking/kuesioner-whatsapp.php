<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
</div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <h1>Kuesioner <small>Pasien</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><i class="fa fa-plus"></i> Kuesioner</li>
    </ol>  
    <?php include "../notifikasi1.php"?>
</div>
<div class="col-lg-12">
  <?php
  $rm = $_GET['rm'];
  $nm = $_GET['nm'];
  ?>
  <div class="row">
    <div class="col-lg-4">
        <form method="get" action="" role="form"><br>
          <div class="form-group input-group">
            <?php
            if(isset($rm)){ ?>
                <input type="number" class="form-control" name="rm" value="<?php echo $rm;?>">
            <?php }else{ ?>
                <input type="number" class="form-control" name="rm" placeholder="Pencarian Nomor Rekam Medik">
            <?php }
            ?>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
            </span>
        </div>
    </form>
</div>
<div class="col-lg-4">
    <form method="get" action="" role="form"><br>
      <div class="form-group input-group">
        <?php
        if(isset($nm)){ ?>
            <input type="text" class="form-control" name="nm" value="<?php echo $nm; ?>">
        <?php }else{ ?>
            <input type="text" class="form-control" name="nm" placeholder="Pencarian Nama Pasien">
        <?php }
        ?>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        </span>
    </div>
</form>
</div>
<div class="col-lg-4">
   <?php
   if(isset($_POST['submitwa'])){
    $sub_kontak = $_POST['nomor_wa'];
    $nomor_wa   = substr($sub_kontak,1);
}
?>
<form method="post" action="" role="form"><br>
  <div class="form-group input-group">
    <?php
    if(isset($nomor_wa)){ ?>
        <input class="form-control" type="number" name="nomor_wa" value="<?php echo $sub_kontak; ?>">
    <?php }else{ ?>
        <input class="form-control" type="number" name="nomor_wa" placeholder="Contoh : 089629671717">
    <?php } ?>
    <?php
    if(isset($nomor_wa)){ ?>
        <span class="input-group-btn">
            <button type="submit" name="submitwa" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        </span>
        <span class="input-group-btn">
            <a href="https://api.whatsapp.com/send?phone=62<?php echo $nomor_wa; ?>&text=Dear%20Ayah%20dan%20Bunda,%20%20Terima%20kasih%20telah%20memilih%20RSKIA%20Rachmi%20untuk%20memberikan%20pelayanan%20kesehatan%20Anda%20dan%20keluarga.%20Mohon%20bantuan%20Ayah%20Bunda%20untuk%20mengisi%20survey%20pasien%20pada%20link%20di%20bawah%20ini%20dalam%20rangka%20meningkatkan%20kualitas%20kami%20:%20%20http://bit.ly/SurveyPasienRachmi%20%20Apabila%20Anda%20ingin%20memberikan%20apresiasi,%20kritik%20dan%20saran%20dilain%20waktu,%20Anda%20dapat%20menyimpan%20no%20WA%20khusus%20komplain%20ini,%20yaitu%20*087839165353*%20dengan%20dr.%20Sussy%20selaku%20Direktur%20RSKIA%20Rachmi.%20%20*Pendaftaran%20Online%20bisa%20dilakukan%20melalui%20link%20berikut%20:*%20%20https://rskiarachmi.co.id/pendaftaran-online%20%20Pendaftaran%20dapat%20pula%20dilakukan%20dengan%20langsung%20menghubungi%20Call%20Center%20kami%20di%20*0274-415316*%20atau%20*0274-376717*%20%20Terima%20kasih,%20semoga%20hari%20Anda%20menyenangkan..%20%E2%98%BA%EF%B8%8F" target="_blank">
                <button type="button" class="btn btn-success"><i class="fa fa-whatsapp"></i> Kirim</button>
            </a>
        </span>
    <?php }else{ ?>
        <span class="input-group-btn">
            <button type="submit" name="submitwa" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        </span>
    <?php } ?>
</div>
</form>
</div>
</div>
<table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th><center>#</center></th>
        <th><center>Action</center></th>
        <th><center>No. RM</center></th>
        <!-- <th><center>Register</center></th> -->
        <th><center>Nama Pasien</center></th>
        <!-- <th><center>Dokter</center></th> -->
        <!-- <th><center>Tanggal / Jam</center></th> -->
    </tr> 
</thead>
<tbody>
  <?php 
  $no = 1;
  if(!isset($rm) && !isset($nm)){
     $data = mysqli_query($koneksi,
        "SELECT ksr_trn.id_catatan_medik, mr_pasien.nama, mr_pasien.telp
        FROM ksr_trn
        JOIN mr_pasien
        ON ksr_trn.id_catatan_medik = mr_pasien.id_catatan_medik
        GROUP BY ksr_trn.id_catatan_medik
        ORDER BY ksr_trn.id_ksr_trn DESC
        LIMIT 50;");
 }elseif(isset($rm)){
    $data = mysqli_query($koneksi,
        "SELECT id_catatan_medik, nama, telp
        FROM mr_pasien
        WHERE id_catatan_medik = '$rm'
        GROUP BY id_catatan_medik;");
}elseif(isset($nm)){
 $data = mysqli_query($koneksi,
    "SELECT id_catatan_medik, nama, telp
    FROM mr_pasien
    WHERE nama LIKE '%' '$nm' '%'
    GROUP BY id_catatan_medik
    ORDER BY nama ASC;");
}
while($d = mysqli_fetch_array($data)){
    $sub_kontak = substr($d['telp'],1);
    ?>
    <tr>
      <td><center><?php echo $no++; ?></center></td>
      <td>
        <div align="center">
          <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>&text=Dear%20Ayah%20dan%20Bunda,%20%20Terima%20kasih%20telah%20memilih%20RSKIA%20Rachmi%20untuk%20memberikan%20pelayanan%20kesehatan%20Anda%20dan%20keluarga.%20Mohon%20bantuan%20Ayah%20Bunda%20untuk%20mengisi%20survey%20pasien%20pada%20link%20di%20bawah%20ini%20dalam%20rangka%20meningkatkan%20kualitas%20kami%20:%20%20http://bit.ly/SurveyPasienRachmi%20%20Apabila%20Anda%20ingin%20memberikan%20apresiasi,%20kritik%20dan%20saran%20dilain%20waktu,%20Anda%20dapat%20menyimpan%20no%20WA%20khusus%20komplain%20ini,%20yaitu%20*087839165353*%20dengan%20dr.%20Sussy%20selaku%20Direktur%20RSKIA%20Rachmi.%20%20*Pendaftaran%20Online%20bisa%20dilakukan%20melalui%20link%20berikut%20:*%20%20https://rskiarachmi.co.id/pendaftaran-online%20%20Pendaftaran%20dapat%20pula%20dilakukan%20dengan%20langsung%20menghubungi%20Call%20Center%20kami%20di%20*0274-415316*%20atau%20*0274-376717*%20%20Terima%20kasih,%20semoga%20hari%20Anda%20menyenangkan..%20%E2%98%BA%EF%B8%8F" target="_blank">
            <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Kirim</button></a>
        </div>
    </td>
    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
    <!-- <td><center><?php //echo $d['id_register']; ?></center></td> -->
    <td><center><?php echo $d['nama']; ?></center></td>
    <!-- <td><center><?php //echo $d['nama_dokter']; ?></center></td> -->
    <!-- <td><center><?php //echo date('d-m-Y', strtotime($d['tgl_kunj'])).' / '.$d['jam_kunj']; ?></center></td> -->
</tr>
<?php 
}
?>
</tbody>
</table>
</div>
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>