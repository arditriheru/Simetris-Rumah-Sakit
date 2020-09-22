<?php include "views/header.php"; ?>
<nav>
  <div id="wrapper">
    <?php include "menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Hasil <small>Pencarian</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah.php"><i class="fa fa-pencil"></i> Tambah</a></li>
        <li class="active"><i class="fa fa-search"></i> Cari</li>
      </ol>
      <?php include "../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th><center>No</th>
                <th><center>Nomor RM</th>
                  <th><center>Nama</th>
                    <th><center>Dokter</th>
                      <th><center>Jadwal</th>
                        <th><center>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        $nama = $_POST['nama'];
                        $data = mysqli_query($koneksi,
                          "SELECT dokter.nama_dokter, booking.id_booking,
                          booking.id_catatan_medik, booking.nama,
                          booking.booking_tanggal
                          FROM booking, dokter
                          WHERE booking.id_dokter = dokter.id_dokter
                          AND booking.nama LIKE '%' '$nama' '%'
                          ORDER BY booking.booking_tanggal DESC;");
                        while($d = mysqli_fetch_array($data)){
                          $booking_tanggal = $d['booking_tanggal'];
                          ?>
                          <tr>
                            <td><center><?php echo $no++; ?></td>
                              <td><center><?php echo $d['id_catatan_medik']; ?></td>
                                <td><center><?php echo $d['nama']; ?></td>
                                  <td><center><?php echo $d['nama_dokter']; ?></td>
                                    <td><center><?php echo date("d/m/Y", strtotime($booking_tanggal)); ?></td>
                                      <td>
                                        <div align="center">
                                          <a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
                                            <button type="button" class="btn btn-warning">Detail</a><br><br>
                                            </div>
                                          </td>
                                        </tr>
                                        <?php 
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div><!-- /.row -->
                        </div><!-- /#wrapper -->
                        <?php include "views/footer.php"; ?>