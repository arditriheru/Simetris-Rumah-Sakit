<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Booking ".date('dmY').".xls");
?>
<?php include "views/header.php"; ?>
<body>
	<table align="center" border="1">
		<h2 align="center">Rekap Data Booking</h2>
		<h3 align="center">Tanggal : <?php echo $awal ?> - <?php echo $akhir ?></h3>
		<tr>
            <th><center>No</center></th>
            <th><center>No.RM</center></th>
            <th><center>Nama</center></th>
            <th><center>Alamat</center></th>
            <th><center>Kontak</center></th>
            <th><center>Dokter</center></th>
            <th><center>Booking</center></th>
            <th><center>Sesi</center></th>
            <th><center>Status</center></th>
        </tr>
        <?php 
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        $no = 1;
        $data = mysqli_query($koneksi,
            "SELECT *, IF (status='1', 'Datang', 'Belum Datang') AS status FROM booking
            WHERE booking_tanggal BETWEEN '$awal' AND '$akhir';");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                <td><center><?php echo $d['nama']; ?></center></td>
                <td><center><?php echo $d['alamat']; ?></center></td>
                <td><center><?php echo $d['kontak']; ?></center></td>
                <td><center><?php echo $d['dokter']; ?></center></td>
                <td><center><?php echo $d['booking_tanggal']; ?></center></td>
                <td><center><?php echo $d['sesi']; ?></center></td>
                <td><center><?php echo $d['status']; ?></center></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
<?php include "views/footer.php"; ?>