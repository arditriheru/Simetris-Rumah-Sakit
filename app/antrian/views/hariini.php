<?php 
function hari_ini(){
	$hari = date ("D");
	
	switch($hari){
		case 'Sun':
		$hari_ini = "Minggu";
		break;
		
		case 'Mon':			
		$hari_ini = "Senin";
		break;
		
		case 'Tue':
		$hari_ini = "Selasa";
		break;
		
		case 'Wed':
		$hari_ini = "Rabu";
		break;
		
		case 'Thu':
		$hari_ini = "Kamis";
		break;
		
		case 'Fri':
		$hari_ini = "Jumat";
		break;
		
		case 'Sat':
		$hari_ini = "Sabtu";
		break;
		
		default:
		$hari_ini = "Tidak di ketahui";		
		break;
	}
	
	return $hari_ini;
	
}
date_default_timezone_set("Asia/Jakarta");
$tanggal = date('Y-m-d');
function tanggal_indo($tanggal)
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

echo hari_ini().", "; echo tanggal_indo($tanggal); // 20 Maret 2016

?>