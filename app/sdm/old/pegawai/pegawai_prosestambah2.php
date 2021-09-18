<?php 
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form
$nip 				= $_POST['nip'];
$nama 				= $_POST['nama'];
$alamat 			= $_POST['alamat'];
$tempat_lahir 		= $_POST['tempat_lahir'];
$tanggal_lahir 		= $_POST['tanggal_lahir'];
$agama 				= $_POST['agama'];
$jabatan 			= $_POST['jabatan'];
$profesi 			= $_POST['profesi'];
$jenis_kelamin 		= $_POST['jenis_kelamin'];
$pendidikan 		= $_POST['pendidikan'];
$no_str 			= $_POST['no_str'];
$tanggal_str 		= $_POST['tanggal_str'];
$no_sip 			= $_POST['no_sip'];
$tanggal_sip 		= $_POST['tanggal_sip'];
$status_kepegawaian = 'Kontrak';
$status_bekerja		= 'Aktif';
// menginput data ke database
mysqli_query($koneksi,"insert into pegawai values('$nip','$nama','$alamat','$tempat_lahir','$tanggal_lahir',
	'$agama','$jabatan','$profesi','$jenis_kelamin','$pendidikan','$no_str','$tanggal_str','$no_sip',
	'$no_sip','$status_kepegawaian','$status_bekerja')");
// mengalihkan halaman kembali ke index.php
header("location:pegawai_tambah2.php");
?>