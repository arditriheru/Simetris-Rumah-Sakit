<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small>SDM</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <?php include '../koneksi.php'; ?>
      <div class="row">
        <div class="col-lg-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                 <?php
                 include '../koneksi.php';
                 $data = mysqli_query($koneksi,
                   "SELECT COUNT(*) AS jml_pegawai
                   FROM pegawai
                   WHERE status_bekerja='Aktif'");
                 while($d = mysqli_fetch_array($data)){
                   ?>
                   <p class="announcement-heading"><?php echo $d['jml_pegawai']; ?></p>
                   <p class="announcement-text">Pegawai Aktif</p>
                 <?php } ?>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-lg-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-user-md fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
               <?php
               include '../koneksi.php';
               $data = mysqli_query($koneksi,
                 "SELECT COUNT(*)
                 AS jml_tetap
                 FROM pegawai
                 WHERE status_kepegawaian = 'tetap'");
               while($d = mysqli_fetch_array($data)){
                 ?>
                 <p class="announcement-heading"><?php echo $d['jml_tetap']; ?></p>
                 <p class="announcement-text">Pegawai Tetap</p>
               <?php } ?>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-3">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="fa fa-user-md fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
             <?php
             include '../koneksi.php';
             $data = mysqli_query($koneksi,
               "SELECT COUNT(*)
               AS jml_medis
               FROM pegawai
               WHERE jabatan = 'Tenaga Medis'");
             while($d = mysqli_fetch_array($data)){
               ?>
               <p class="announcement-heading"><?php echo $d['jml_medis']; ?></p>
               <p class="announcement-text">Tenaga Medis</p>
             <?php } ?>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-3">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-stethoscope fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
           <?php
           include '../koneksi.php';
           $data = mysqli_query($koneksi,
             "SELECT COUNT(*)
             AS jml_nonmedis
             FROM pegawai
             WHERE jabatan = 'Pegawai Non Medis'");
           while($d = mysqli_fetch_array($data)){
             ?>
             <p class="announcement-heading"><?php echo $d['jml_nonmedis']; ?></p>
             <p class="announcement-text">Dokter Umum</p>
           <?php } ?>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div><!-- /.row -->
<div class="row">
  <?php include 'diagram_statuskerja.php'; ?>
  <?php include 'diagram_jeniskelamin.php'; ?>
</div><br><br><!----- /row ------>
<div class="row">
  <?php include 'diagram_jabatan.php'; ?>
</div><!----- /row ------>
<?php include 'views/footer.php';?>
