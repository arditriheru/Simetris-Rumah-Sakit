<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>IMUT<small> Rawat Inap</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>  
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="table-responsive">
        <?php
        $awal     = $_POST['awal'];
        $akhir    = $_POST['akhir'];
        $tt       = $_POST['tt'];
        $hari     = $_POST['hari']
        ?>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nomor RM</center></th>
              <th><center>Tanggal Inap</center></th>
              <th><center>Tanggal Pulang</center></th>
              <th><center>Selisih</center></th>
            </tr>
          </thead>
          <tbody>
            <!---------- Batas ----------->
            <?php
            $no = 1;
            $data = mysqli_query($koneksi,"
              SELECT *, TIMESTAMPDIFF(DAY,tgl_inap,tgl_pulang) AS selisih
              FROM ksr_trn
              WHERE tgl_pulang BETWEEN '$awal'AND'$akhir'
              AND iol='2';");
            while($d = mysqli_fetch_array($data)){
              $selisih = $d['selisih']+1;
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['tgl_inap']; ?> <?php echo $d['jam_inap']; ?></center></td>
                <td><center><?php echo $d['tgl_pulang']; ?></center></td>
                <td><center><?php echo $selisih; ?> Hari</center></td>
              </tr>
            <?php }?>
            <!---------- Batas ----------->
            <?php 
            $data = mysqli_query($koneksi,
             "SELECT SUM(TIMESTAMPDIFF(DAY,tgl_inap,tgl_pulang)+1) AS total,
             COUNT(*) AS jml_pasien
             FROM ksr_trn
             WHERE tgl_pulang BETWEEN '$awal'AND'$akhir'
             AND iol='2';");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td colspan="4"><b><center>TOTAL</center></b></td>
                <td><b><center><?php echo $d['total']; ?> Hari</center></b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-6">
        <h3><center><b>Periode : <?php echo $awal?> - <?php echo $akhir?></b></h3>
          <table class="table table-hover tablesorter">
           <tbody>
            <tr>
              <td>
                <?php
                $total 		= $d['total'];
                $tt 			= $tt;
                $hari 		= $hari;
                $hasil 		= $total / ($tt * $hari) *'100';
                $angka_format = number_format($hasil, 2);
                ?>
                <center>
                  <h3><?php echo $total?><br>
                   &emsp;&emsp;&emsp;------------------- x 100%<br>
                   (<?php echo $tt?> x <?php echo $hari?>)</h3>
                   <h2><b>B.O.R = <?php echo $angka_format;?>%</b></h2>
                 </center>
               </td> 
             </tr>
             <tr>
              <td>
                <?php
                $total 		= $d['total'];
                $jml_pasien 	= $d['jml_pasien'];
                $tt 			= $tt;
                $hari 		= $hari;
                $hasil 		= (($tt * $hari) - $total) / $jml_pasien;
                $angka_format = number_format($hasil, 2);
                ?>
                <center>
                  <h3>(<?php echo $tt?> x <?php echo $hari?>) - <?php echo $total?><br>
                   -------------------------------<br>
                   <?php echo $jml_pasien?></h3>
                   <h2><b>T.O.I = <?php echo $angka_format;?></b></h2>
                 </center>
               </td> 
             </tr>
             <tr>
              <td>
                <?php
                $total 		= $d['total'];
                $jml_pasien 	= $d['jml_pasien'];
                $tt 			= $tt;
                $hari 		= $hari;
                $hasil 		= $jml_pasien / $tt;
                $angka_format = number_format($hasil, 2);
                ?>
                <center>
                  <h3><?php echo $jml_pasien?><br>
                   -------------------<br>
                   <?php echo $tt?></h3>
                   <h2><b>B.T.O = <?php echo $angka_format;?></b></h2>
                 </center>
               <?php } ?>
             </td> 
           </tr>
           <tbody>
           </table>
         </div>
       </div>
       <?php include 'views/footer.php';?>