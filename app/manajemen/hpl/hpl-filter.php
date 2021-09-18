<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Pencarian <small>HPL</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Filter</li>
      </ol>  
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <form method="post" action="" role="form">
        <div class="row">
          <div class="col-lg-2">
            <div class="form-group">
              <label>Bulan</label>
              <select class="form-control" type="text" name="bulan"required="">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group">
              <label>Tahun</label>
              <input class="form-control" type="number" name="tahun" placeholder="Contoh : <?php echo $tahun; ?>" required="">
            </div>
          </div>
          <div class="col-lg-2"><br>
            <button type="submit" name="hplsubmit" class="btn btn-primary">Tampilkan</button>
          </div>
        </div>
      </form>
      <?php
      if(isset($_POST['hplsubmit'])){
        $bln = $_POST['bulan'];
        $thn = $_POST['tahun'];

        if($bulan && $tahun){ ?>
         <form method="post" action="hpl-excel.php" role="form">
          <div class="form-group">
            <input class="form-control" type="hidden" name="bln" value="<?php echo $bln?>">
          </div>
          <div class="form-group">
            <input class="form-control" type="hidden" name="thn" value="<?php echo $thn?>">
          </div>
          <button type="submit" class="btn btn-success"><i class='fa fa-download'></i> Excel</button>
        </form><br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>#</center></th>
                <th><center>No. RM</center></th>
                <th><center>Nama Pasien</center></th>
                <th><center>Kontak</center></th>
                <th><center>Dokter</center></th>
                <th><center>Prakiraan HPL</center></th>
                <th colspan='2'><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $data = mysqli_query($koneksi,
                "SELECT hpl_register.id_hpl_register, hpl_register.id_catatan_medik, hpl_register.tgl_hpl, mr_pasien.nama, mr_pasien.telp, mr_pasien.alamat, dokter.nama_dokter
                FROM hpl_register
                INNER JOIN mr_pasien ON hpl_register.id_catatan_medik=mr_pasien.id_catatan_medik
                INNER JOIN dokter ON hpl_register.id_dokter=dokter.id_dokter
                WHERE MONTH(hpl_register.tgl_hpl)='$bln'
                AND YEAR(hpl_register.tgl_hpl)='$thn'
                ORDER BY hpl_register.tgl_hpl ASC;");
              while($d = mysqli_fetch_array($data)){
                $tgl_hpl    = $d['tgl_hpl'];
                $sub_kontak = substr($d['telp'],1);
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                  <td><center><?php echo $d['nama']; ?></center></td>
                  <td><center><?php echo $d['telp']; ?></center></td>
                  <td><center><?php echo $d['nama_dokter']; ?></center></td>
                  <td><center><?php echo date('d F Y', strtotime($tgl_hpl)); ?></center></td>
                  <td>
                    <div align="center">
                      <a href="hpl-detail.php?id=<?php echo $d['id_hpl_register']; ?>"
                        <button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
                      </div>
                    </td>
                    <td>
                      <div align="center">
                        <a href="https://api.whatsapp.com/send?phone=62<?php echo $sub_kontak; ?>" target="_blank">
                          <button type="button" class="btn btn-success"><i class='fa fa-whatsapp'></i> Chat</button></a>
                        </div>
                      </td>
                      </tr><?php } ?>
                    </tbody>
                  </table>
                </div><?php } }?><!-- col-lg-12 -->
              </div><!-- row -->
            </div><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
          <?php include "views/footer.php"; ?>