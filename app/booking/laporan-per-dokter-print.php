<?php
include '../../config/connect.php';
$id_dokter  = $_POST['id_dokter'];
$awal       = $_POST['awal'];
$akhir      = $_POST['akhir'];
$id_sesi    = $_POST['id_sesi'];
$title = mysqli_query($koneksi,
    "SELECT *, dokter.nama_dokter, sesi.nama_sesi
    FROM booking, dokter, sesi
    WHERE booking.id_dokter=dokter.id_dokter
    AND booking.id_sesi=sesi.id_sesi
    -- AND booking.id_sesi = '$id_sesi'
    AND booking.id_dokter='$id_dokter';");
while($value = mysqli_fetch_array($title)){
    $nama_dokter    = $value['nama_dokter'];
    $nama_sesi      = $value['nama_sesi'];
}

function format_awal($awal)
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
    $split = explode('-', $awal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
function format_akhir($akhir)
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
    $split = explode('-', $akhir);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
<html>
<head>
    <script>
        window.print();
    </script>
</head>
<body>
    <table align="center" border="1">
        <h3 align="center">
            <!-- List Pasien Poli <?php echo $nama_sesi;?><br> -->
            List Pasien<br>
            Dokter <?php echo $nama_dokter;?><br>
            <?php echo format_awal($awal);?> - <?php echo format_akhir($akhir);?></h3>
            <tr>
                <th><center>Cek</center></th>
                <th><center>No</center></th>
                <th><center>Nomor RM</center></th>
                <th><center>Sesi</center></th>
                <th><center>Nama Pasien</center></th>
            </tr>
            <?php
            $no=1;
            $data = mysqli_query($koneksi,
                "SELECT *, dokter.nama_dokter, sesi.nama_sesi,
                IF (booking.status='1', 'Datang', 'Belum Datang') AS status
                FROM booking, dokter, sesi
                WHERE booking.id_dokter=dokter.id_dokter
                AND booking.id_sesi=sesi.id_sesi
                AND booking.booking_tanggal BETWEEN '$awal' AND '$akhir'
                -- AND booking.id_sesi = '$id_sesi'
                AND booking.id_dokter='$id_dokter' ORDER BY booking.id_booking ASC;");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td></td>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                    <td><center><?php echo $d['nama_sesi']; ?></center></td>
                    <td><left><?php echo $d['nama']; ?></left></td>
                    </tr><?php } ?>
                </table>
                <br><div align="center"><a href="javascript:history.back()">Kembali</a></div>
            </body>
            </html>