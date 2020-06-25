<?php
date_default_timezone_set("Asia/Jakarta");
$tanggalHariIni=date('Y-m-d');
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=list-permintaan-rekam-medis ".date('d-m-Y').".xls");
?>
<html>
<body>
    <table align="center" border="1">
        <h2 align="center">List Permintaan Rekam Medis</h2>
        <h3 align="center"><?php include 'tanggal-sekarang.php';?></h3>
        <tr>
            <th><center>Cek</center></th>
            <th><center>No</center></th>
            <th><center>No. RM</center></th>
            <th><center>Nama Pasien</center></th>
            <th><center>Sesi</center></th>
            <th><center>Status</center></th>
        </tr>
        <?php
        include '../../config/connect.php';
        $no = 1;
        $data = mysqli_query($koneksi,
            "SELECT *, dokter.nama_dokter, sesi.nama_sesi,
            IF (booking.status='1', 'Datang', 'Belum Datang') AS status
            FROM booking, dokter, sesi
            WHERE booking.id_dokter=dokter.id_dokter
            AND booking.id_sesi=sesi.id_sesi
            AND booking.booking_tanggal='$tanggalHariIni'
            ORDER BY booking.id_sesi ASC;");
        while($d = mysqli_fetch_array($data)){
            $tanggal = $d['tanggal'];
            ?>
            <tr>
                <td></td>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['nama_sesi']; ?></center></td>
                <td><center><?php echo $d['status']; ?></center></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>