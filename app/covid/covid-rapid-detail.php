<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Rapid Test</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> Detail</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
    <div class="col-lg-12">
      <?php $id_rapidtest = $_GET['id']; ?>
      <form method="post" action="covid-rapid-print" role="form">
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_rapidtest" value="<?php echo $id_rapidtest?>">
        </div>
        <button type="submit" class="btn btn-primary"><i class='fa fa-print'></i> Print</button>
      </form>
    </div>
    <div class="col-lg-12">
      <div class="table-responsive">
        <img class="img-responsive" src="../../images/Kop Surat Laboratorium.jpg" width="100%" alt="Gambar Bootstrap 3"><br>
        <div class="row">
          <div class="col-lg-6">
           <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <?php
              $data = mysqli_query($koneksi,
                "SELECT *, mr_dokter.nama_dokter, mr_unit.nama_unit,
                IF(rapidtest.sex='1', 'Laki-laki', 'Perempuan') AS nama_sex,
                CASE
                WHEN rapidtest.igm='0' THEN 'Non Reaktif'
                WHEN rapidtest.igm='1' THEN 'Reaktif'
                WHEN rapidtest.igm='3' THEN 'On Process'
                END AS nama_igm,
                CASE
                WHEN rapidtest.igg='0' THEN 'Non Reaktif'
                WHEN rapidtest.igg='1' THEN 'Reaktif'
                WHEN rapidtest.igg='3' THEN 'On Process'
                END AS nama_igg,
                IF(rapidtest.nilai_rujukan='1', 'Reaktif', 'Non Reaktif') AS nama_nilai_rujukan
                FROM rapidtest, mr_dokter, mr_unit
                WHERE rapidtest.id_dokter=mr_dokter.id_dokter
                AND rapidtest.id_unit=mr_unit.id_unit
                AND rapidtest.id_rapidtest='$id_rapidtest';");
              while($d = mysqli_fetch_array($data)){
                $tgl_periksa  = $d['tgl_periksa'];
                $tanggal      = $d['tanggal'];
                $lahir        = new DateTime($d['tgl_lahir']);
                $today        = new DateTime();
                $umur         = $today->diff($lahir);

                function format_tgl_periksa($tgl_periksa)
                {
                  $bulan = array (1 =>   'Januari',
                   'Februari',
                   'Maret',
                   'April',
                   'Mei',
                   'Juni',
                   'Juli',
                   'Agustus',
                   'September',
                   'Oktober',
                   'November',
                   'Desember'
                 );
                  $split = explode('-', $tgl_periksa);
                  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                }
                function format_tanggal($tanggal)
                {
                  $bulan = array (1 =>   'Januari',
                   'Februari',
                   'Maret',
                   'April',
                   'Mei',
                   'Juni',
                   'Juli',
                   'Agustus',
                   'September',
                   'Oktober',
                   'November',
                   'Desember'
                 );
                  $split = explode('-', $tanggal);
                  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                }
                ?>
                <tr>
                  <td><b>Nomor RM</b></td>
                  <td><?php echo $d['id_catatan_medik']; ?></td>
                </tr>
                <tr>
                  <td><b>Nama Pasien</b></td>
                  <td><?php echo $d['nama']; ?></td>
                </tr>
                <tr>
                  <td><b>Umur</b></td>
                  <td><?php echo $umur->y; echo " Tahun, "; echo $umur->m; echo " Bulan, dan "; echo $umur->d; echo " Hari"; ?></td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td><?php echo $d['nama_sex']; ?></td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td><?php echo $d['alamat']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-6">
           <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
              <tr>
                <td><b>Dokter</b></td>
                <td><?php echo $d['nama_dokter']; ?></td>
              </tr>
              <tr>
                <td><b>Asal</b></td>
                <td><?php echo $d['nama_unit']; ?></td>
              </tr>
              <tr>
                <td><b>Tanggal Periksa</b></td>
                <td><?php echo format_tgl_periksa($d['tgl_periksa']); ?></td>
              </tr>
              <tr>
                <td><b>Jam Periksa</b></td>
                <td><?php echo $d['jam_periksa']; ?></td>
              </tr>
              <tr>
                <td><b>Sampel</b></td>
                <td><?php echo $d['sampel']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-12">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>Pemeriksaan</center></th>
                <th><center>Hasil</center></th>
                <th><center>Nilai Rujukan</center></th>
                <th><center>Metode</center></th>
              </tr>
              <tr><td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d['pemeriksaan']; ?></td></tr>
            </thead>
            <tbody>
              <tr>
                <td><center>(IgM)</center></td>
                <td><center><?php echo $d['nama_igm']; ?></center></td>
                <td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
                <td><center><?php echo $d['metode']; ?></center></td>
              </tr>
              <tr>
                <td><center>(IgG)</center></td>
                <td><center><?php echo $d['nama_igg']; ?></center></td>
                <td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
                <td><center><?php echo $d['metode']; ?></center></td>
              </tr>
            </tbody>
          </table>
          <div align="right">
            <small>Printed : <?php include "../../system/date-time.php";?> / <?php echo $jamsekarang;?></small>
          </div>
        </div>
        <?php
        if( $d['igm']==1 || $d['igg']==1){ ?>
          <div class="col-lg-12">
            <p>
              <strong>Catatan :</strong><br>
              1. Pemeriksaan Rapid ke 1<br>
              2. Hasil Rapid Test Antibody Reaktif belum dapat memastikan adanya Infeksi SARS Cov-2<br>
              3. Pemeriksaan Konfirmasi dengan pemeriksaan <b>RT PCR</b><br>
              4. Lakukan karantina mandiri  dengan menerapkan PHBS (Perilaku Hidup Bersih dan Sehat : Mencuci tangan, menerapkan etika batuk, menggunakan masker), dan menjaga Physical Distancing<br>
              5. Bila muncul gejala atau gejala memberat selama isolasi segera menuju ke RS Rujukan Covid-19<br>
            </p>
          </div>
        <?php }else{ ?>
          <div class="col-lg-12">
            <p>
              <strong>Catatan :</strong><br>
              1. Pemeriksaan Rapid ke 1<br>
              2. Hasil Non reaktif tidak menyingkirkan kemungkinan infeksi SARS CoV-2<br>
              3. Hasil Non Reaktif dapat terjadi pada kondisi :<br>
              &nbsp; &nbsp; - Sesorang belum / tidak terinfeksi<br>
              &nbsp; &nbsp; - Window Period (Terinfeksi namun antibody belum terbentuk)<br>
              &nbsp; &nbsp; - Immunocompromised<br>
              4. Saran :<br>
              &nbsp; &nbsp; - Ulangi pemeriksaan rapid test antibody 7-10 hari kemudian<br>
              &nbsp; &nbsp; - Pertahankan perilaku hidup bersih dan physical distancing<br><br><br>
            </p>
          </div>
        <?php } ?>
        <div class="col-lg-6"><br><br>
          <p>
            <div align="center">
              <strong>Petugas,</strong><br><br><br><br><br><br>
              <?php echo $d['pemeriksa']; ?>
            </div>
          </p>
        </div>
        <div class="col-lg-6"><br><br>
          <p>
            <div align="center">
              Yogyakarta, <?php echo format_tanggal($d['tanggal']); ?><br><strong>Penanggung jawab,</strong><br><br><br><br><br>
              dr. Indah Ajeng Ebtasari, M.Sc.,Sp.PK.
            </div>
          </p>
          </div><?php } ?>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>