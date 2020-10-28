<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMETRIS - Kuesioner</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
    <!-- Add custom CSS here -->
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
    <style>
        .bluetext {
            color: #008cba;
        }
        .redtext {
            color: #e71414;
        }
        .navbar-rachmi{
            background-color:#e67e22;
            border-color:#d35400
        }
        .navbar-brand{
            color:#ffffff;
        }

    </style>
</head>
<body>
    <?php
    include '../../config/connect.php';
    date_default_timezone_set("Asia/Jakarta");
    $tanggalsekarang    =   date('Y-m-d');
    $jamsekarang        =   date("G:i:s");
    ?>
    <nav>
        <div id="wrapper">
           <!-- Sidebar -->
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand">S I M E T R I S</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="kuesioner-whatsapp.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-check-square-o"></i> Kuesioner <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="kuesioner-whatsapp.php"><i class="fa fa-check-square-o"></i> Lihat</a></li>
                            <li><a href="kuesioner-whatsapp.php"><i class="fa fa-check-square-o"></i> WhatsApp</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                  <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $nama_login;?>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li class="divider"></li>
                      <li>
                        <a href="logout.php"><i class="fa fa-power-off">
                        </i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Kuesioner <small> <?php include '../../system/date-time.php';?></small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
    <?php include "../../system/welcome.php"?>
</div>
</div><!-- /.row -->
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
            <a href="https://api.whatsapp.com/send?phone=62<?php echo $nomor_wa; ?>&text=Assalamu'alaikum%20Wr%20Wb%0A%0ASalam%20Sejahtera%0A%0ADengan%20Hormat%2C%0A%0ADalam%20rangka%20peningkatan%20mutu%20dan%20pelayanan%20di%20RSKIA%20Rachmi%2C%20kami%20mohon%20partisipasi%20Anda%20untuk%20menjawab%20pertanyaan%20berikut%20secara%20jujur%20dan%20benar.%20Apapun%20jawaban%20Anda%20sangat%20bermanfaat%20bagi%20kami%20dan%20tidak%20akan%20mengurangi%20kualitas%20pelayanan%20yang%20kami%20berikan.%20Berikut%20ini%20adalah%20link%20survey%20tersebut%20%3A%0A%0Ahttp%3A%2F%2Fbit.ly%2FSurveyPoliklinikRachmi%0A%0AApabila%20Anda%20ingin%20memberikan%20apresiasi%2C%20kritik%20dan%20saran%20dilain%20waktu%2C%20Anda%20dapat%20menyimpan%20no%20WA%20khusus%20komplain%20087839165353%20dengan%20dr.%20Sussy%20selaku%20Direktur%20RSKIA%20Rachmi%20serta%20no%20WA%20informasi%20081390383000%20(bukan%20untuk%20pendaftaran).%20%0ABerikan%20pula%20ulasan%20pengalaman%20kunjungan%20Anda%20ke%20RSKIA%20Rachmi%20di%20Profile%20Google%20kami%2C%20pada%20link%20berikut%3A%0A%0Ahttps%3A%2F%2Fbit.ly%2FUlasanRachmi%0A%0AUntuk%20Pendaftaran%20Online%20bisa%20dilakukan%20melalui%20link%20berikut%20%3A%0A%0Ahttps%3A%2F%2Fpendaftaran.rskiarachmi.co.id%0A%0APendaftaran%20dapat%20pula%20dilakukan%20dengan%20langsung%20menghubungi%20call%20center%20kami%20di%200274-415316%20atau%200274-376717.%0A%0ATerima%20kasih%2C%20semoga%20hari%20Anda%20menyenangkan..%20%3A-)%0A%0AWassalamu'alaikum%20Wr%20Wb" target="_blank">
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
          <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>&text=Assalamu'alaikum%20Wr%20Wb%0A%0ASalam%20Sejahtera%0A%0ADengan%20Hormat%2C%0A%0ADalam%20rangka%20peningkatan%20mutu%20dan%20pelayanan%20di%20RSKIA%20Rachmi%2C%20kami%20mohon%20partisipasi%20Anda%20untuk%20menjawab%20pertanyaan%20berikut%20secara%20jujur%20dan%20benar.%20Apapun%20jawaban%20Anda%20sangat%20bermanfaat%20bagi%20kami%20dan%20tidak%20akan%20mengurangi%20kualitas%20pelayanan%20yang%20kami%20berikan.%20Berikut%20ini%20adalah%20link%20survey%20tersebut%20%3A%0A%0Ahttp%3A%2F%2Fbit.ly%2FSurveyPoliklinikRachmi%0A%0AApabila%20Anda%20ingin%20memberikan%20apresiasi%2C%20kritik%20dan%20saran%20dilain%20waktu%2C%20Anda%20dapat%20menyimpan%20no%20WA%20khusus%20komplain%20087839165353%20dengan%20dr.%20Sussy%20selaku%20Direktur%20RSKIA%20Rachmi%20serta%20no%20WA%20informasi%20081390383000%20(bukan%20untuk%20pendaftaran).%20%0ABerikan%20pula%20ulasan%20pengalaman%20kunjungan%20Anda%20ke%20RSKIA%20Rachmi%20di%20Profile%20Google%20kami%2C%20pada%20link%20berikut%3A%0A%0Ahttps%3A%2F%2Fbit.ly%2FUlasanRachmi%0A%0AUntuk%20Pendaftaran%20Online%20bisa%20dilakukan%20melalui%20link%20berikut%20%3A%0A%0Ahttps%3A%2F%2Fpendaftaran.rskiarachmi.co.id%0A%0APendaftaran%20dapat%20pula%20dilakukan%20dengan%20langsung%20menghubungi%20call%20center%20kami%20di%200274-415316%20atau%200274-376717.%0A%0ATerima%20kasih%2C%20semoga%20hari%20Anda%20menyenangkan..%20%3A-)%0A%0AWassalamu'alaikum%20Wr%20Wb" target="_blank">
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
<br><br>
<?php include "../../system/copyright.php";?>
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- JavaScript -->
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/sweetalert.min.js"></script>
<!-- Page Specific Plugins -->
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/chartjs/Chart.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/morris/chart-data-morris.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/jquery.tablesorter.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/tables.js"></script>
</body>
</html>