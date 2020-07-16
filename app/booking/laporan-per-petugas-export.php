<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=list-pasien-".date('d-m-Y').".xls");

include '../../config/connect.php';
$id_petugas  = $_POST['id_petugas'];
$awal        = $_POST['awal'];
$akhir       = $_POST['akhir'];
$id_sesi     = $_POST['id_sesi'];

$a = mysqli_query($koneksi,
  "SELECT pelayanan FROM mr_petugas WHERE id_petugas = '$id_petugas';");
while($b = mysqli_fetch_array($a)){
  $pelayanan = $b['pelayanan'];
}

if($pelayanan == 1){
    $title = mysqli_query($koneksi,
        "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi
        FROM tumbang, mr_petugas, sesi
        WHERE tumbang.id_petugas=mr_petugas.id_petugas
        AND tumbang.id_sesi=sesi.id_sesi
        AND tumbang.id_sesi = '$id_sesi'
        AND tumbang.id_petugas='$id_petugas';");
    while($value = mysqli_fetch_array($title)){
        $nama_petugas    = $value['nama_petugas'];
        $nama_sesi      = $value['nama_sesi'];
    }
}elseif($pelayanan == 2){
   $title = mysqli_query($koneksi,
    "SELECT *, mr_petugas.nama_petugas, sesi.nama_sesi
    FROM anc, mr_petugas, sesi
    WHERE anc.id_petugas=mr_petugas.id_petugas
    AND anc.id_sesi=sesi.id_sesi
    AND anc.id_sesi = '$id_sesi'
    AND anc.id_petugas='$id_petugas';");
   while($value = mysqli_fetch_array($title)){
    $nama_petugas    = $value['nama_petugas'];
    $nama_sesi      = $value['nama_sesi'];
}
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
<body>
    <table align="center" border="1">
        <h3 align="center">List Pasien <?php echo $nama_sesi;?></h3>
        <h3 align="center">Petugas <?php echo $nama_petugas;?></h3>
        <h4 align="center"><?php echo format_awal($awal);?> - <?php echo format_akhir($akhir);?></h4>
        <h4></h4>
        <tr>
            <th><center>Cek</center></th>
            <th><center>No</center></th>
            <th><center>Nomor RM</center></th>
            <th><center>Nama Pasien</center></th>
        </tr>
        <?php
        $no=1;
        if($pelayanan == 1){
            $data = mysqli_query($koneksi,
                "SELECT id_catatan_medik, nama
                FROM tumbang
                WHERE jadwal BETWEEN '$awal' AND '$akhir'
                AND id_sesi = '$id_sesi'
                AND id_petugas='$id_petugas' ORDER BY id_tumbang ASC;");
                while($d = mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td></td>
                        <td><center><?php echo $no++; ?></center></td>
                        <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                        <td><center><?php echo $d['nama']; ?></center></td>
                    </tr>
                <?php } }elseif($pelayanan == 2){
                    $data = mysqli_query($koneksi,
                        "SELECT id_catatan_medik, nama
                        FROM anc
                        WHERE jadwal BETWEEN '$awal' AND '$akhir'
                        AND id_sesi = '$id_sesi'
                        AND id_petugas='$id_petugas' ORDER BY id_anc ASC;");
                        while($d = mysqli_fetch_array($data)){ ?>
                            <tr>
                                <td></td>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                                <td><center><?php echo $d['nama']; ?></center></td>
                            </tr>
                        <?php } } ?>
                    </table>
                </body>
                </html>