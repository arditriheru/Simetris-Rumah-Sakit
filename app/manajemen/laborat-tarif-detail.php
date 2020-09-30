<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laborat-tarif-tampil.php"><i class="fa fa-check"></i> Laboratorium</a></li>
        <li class="active"><i class="fa fa-flash"></i> Detail</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <?php
  $id_lab_tarif = $_GET['id'];$data = mysqli_query($koneksi,"
    SELECT * FROM lab_tarif WHERE id_lab_tarif = $id_lab_tarif;");
  while($d = mysqli_fetch_array($data)){
    ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="table-responsive">
          <div clas="row">
            <div class="col-lg-6">
              <a href="laborat-tarif-edit.php?id=<?php echo $d['id_lab_tarif']; ?>"
                <button type="button" class="btn btn-primary">Edit</button>
              </a>
            </div>
          </div><br><br><br><!-- Row --->
          <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <tr>
                <td><b>Kode Tarif</b></td>
                <td><?php echo $d['id_lab_tarif']; ?></td>
              </tr>
              <tr>
                <td><b>Tindakan</b></td>
                <td><?php echo $d['nama']; ?></td>
              </tr>
              <tr>
                <td><b>Alat</b></td>
                <td><?php echo number_format($d['alat']); ?></td>
              </tr>
              <tr>
                <td><b>B.H.P</b></td>
                <td><?php echo number_format($d['bhp']); ?></td>
              </tr>
              <tr>
                <td><b>Infrastruktur</b></td>
                <td><?php echo number_format($d['infrastruktur']); ?></td>
              </tr>
              <tr>
                <td><b>Jasa RS</b></td>
                <td><?php echo number_format($d['jasa_rs']); ?></td>
              </tr>
              <tr>
                <td><b>Tarif</b></td>
                <td><?php echo number_format($d['tarif']); ?></td>
              </tr>
              <tr>
                <td><b>Kode Kelompok</b></td>
                <td><?php echo $d['kel']; ?></td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.row -->
  <?php include 'views/footer.php';?>