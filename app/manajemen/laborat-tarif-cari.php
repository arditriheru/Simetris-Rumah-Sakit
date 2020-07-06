<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Tarif <small>Laboratorium</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check"></i> Laboratorium</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div clas="row">
          <div class="col-lg-6">
          </div>
          <div align="right" class="col-lg-6">
            <form method="post" action="laborat-tarif-cari" role="form">
              <div class="form-group">
                <input class="form-control" type="text" name="cari" placeholder="Pencarian..">
              </div>
            </form>
          </div>
        </div><!-- Row --->
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><div align="center">#</div></th>
              <th><div align="center">Tindakan</div></th>
              <th><div align="center">Alat</div></th>
              <th><div align="center">B.H.P</div></th>
              <th><div align="center">Infrastruktur</div></th>
              <th><div align="center">Jasa RS</div></th>
              <th><div align="center">Tarif</div></th>
              <th colspan="2"><div align="center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            $cari = $_POST['cari'];
            $data = mysqli_query($koneksi,"SELECT * FROM lab_tarif WHERE nama LIKE '%' '$cari' '%';");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><div align="center"><?php echo $no++; ?></div></td>
                <td><div align="left"><?php echo $d['nama']; ?></div></td>
                <td><div align="center"><?php echo number_format($d['alat']); ?></div></td>
                <td><div align="center"><?php echo number_format($d['bhp']); ?></div></td>
                <td><div align="center"><?php echo number_format($d['infrastruktur']); ?></div></td>
                <td><div align="center"><?php echo number_format($d['jasa_rs']); ?></div></td>
                <td><div align="center"><?php echo number_format($d['tarif']); ?></div></td>
                <td><div align="center"><a href="laborat-tarif-detail?id=<?php echo $d['id_lab_tarif']; ?>"
                  <button type="button" class="btn btn-primary">Detail</a></div>
                  </td>
                  </tr><?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
        <?php include 'views/footer.php';?>