<?php
$kode_ruangan  = $_POST['kode_ruangan'];
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=list-pasien-".date('d-m-Y').".xls");

include '../../config/connect.php';
$title = mysqli_query($koneksi,
    "SELECT *, inventaris_ruangan.nama_ruangan
    FROM inventaris, inventaris_ruangan
    WHERE inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
    AND inventaris.kode_ruangan = '$kode_ruangan';");
while($value = mysqli_fetch_array($title)){
    $nama_ruangan    = $value['nama_ruangan'];
}
?>
<html>
<body>
    <table align="center" border="1">
        <h3 align="center">List Barang Inventaris</h3>
        <h3 align="center">Ruang <?php echo $nama_ruangan ?></h3>
        <h4 align="center"><?php include '../../system/date-time.php'; ?></h4>
        <h4></h4>
        <tr>
            <th><center>No</center></th>
            <th><center>Nomor Inventaris</center></th>
            <th><center>Nama Barang</center></th>
            <th><center>Jenis</center></th>
            <th><center>Ruangan</center></th>
            <th><center>Pengadaan</center></th>
            <th><center>Kondisi</center></th>
            <th><center>Status</center></th>
            <th><center>Kalibrasi</center></th>
            <th><center>Kalibrasi Ulang</center></th>
            <th><center>Keterangan</center></th>
        </tr>
        <?php 
        $no = 1;
        date_default_timezone_set("Asia/Jakarta");
        $tanggalHariIni=date('Y-m-d');
        $data = mysqli_query($koneksi,
          "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
          IF (inventaris.kondisi='1', 'Baik', 'Rusak') AS kondisi
          FROM inventaris, inventaris_jenis, inventaris_ruangan
          WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
          AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
          AND inventaris.kode_ruangan = '$kode_ruangan'
          ORDER BY inventaris.nama_barang ASC;");
        while($d = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><center><?php echo $no++; ?></center></td>
            <td><center><?php echo $d['nomor_inventaris']; ?></center></td>
            <td><center><?php echo $d['nama_barang']; ?></center></td>
            <td><center><?php echo $d['nama_jenis']; ?></center></td>
            <td><center><?php echo $d['nama_ruangan']; ?></center></td>
            <td><center><?php echo date("d/m/Y",strtotime($d['tanggal_pengadaan']));?></center></td>
            <td><center><?php echo $d['kondisi']; ?></center></td>
            <td><center><?php echo $d['status']; ?></center></td>
            <td><center><?php if($d['tanggal_kalibrasi']=='0000-00-00'){
                echo '-';
            }else{
                echo date("d/m/Y",strtotime($d['tanggal_kalibrasi']));
            } ?>
        </center></td>
        <td><center><?php if($d['kalibrasi_ulang']=='0000-00-00'){
            echo '-';
        }else{
            echo date("d/m/Y",strtotime($d['kalibrasi_ulang']));
        } ?>
    </center></td>
    <td><center><?php echo $d['keterangan']; ?></center></td>
</tr>
<?php
}
?>
</table>
</body>
</html>