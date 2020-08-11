/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.6.24-0ubuntu2 : Database - dbrachmi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbrachmi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbrachmi`;

/*Table structure for table `FAR_DET_NOSP` */

DROP TABLE IF EXISTS `FAR_DET_NOSP`;

CREATE TABLE `FAR_DET_NOSP` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `kode` int(8) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `harga_beli` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `petugas_pesan` int(8) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_tempo` date DEFAULT NULL,
  `tgl_ed` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `petugas_terima` int(8) DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `kirim` int(11) DEFAULT NULL,
  `harga_beli_suplier` int(11) DEFAULT NULL,
  `tgl_faktur` date DEFAULT NULL,
  `satuan_beli` char(20) DEFAULT NULL,
  `batch` char(20) DEFAULT NULL,
  `petugas_pencatat` int(11) DEFAULT '0',
  `ppn` int(11) DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=6116 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_DET_NOSP_INAP` */

DROP TABLE IF EXISTS `FAR_DET_NOSP_INAP`;

CREATE TABLE `FAR_DET_NOSP_INAP` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `kode` int(8) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `harga_beli` int(11) DEFAULT NULL,
  `disc` double DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `petugas_pesan` int(8) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_tempo` date DEFAULT NULL,
  `tgl_ed` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `petugas_terima` int(8) DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `kirim` int(11) DEFAULT NULL,
  `harga_beli_suplier` int(11) DEFAULT NULL,
  `tgl_faktur` date DEFAULT NULL,
  `satuan_beli` char(20) DEFAULT NULL,
  `batch` char(20) DEFAULT NULL,
  `petugas_pencatat` int(11) NOT NULL DEFAULT '0',
  `ppn` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=3497 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_DET_TRN_STOK_KELUAR` */

DROP TABLE IF EXISTS `FAR_DET_TRN_STOK_KELUAR`;

CREATE TABLE `FAR_DET_TRN_STOK_KELUAR` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(8) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_trn` int(11) DEFAULT NULL,
  `satuan` char(15) DEFAULT NULL,
  `permintaan` int(11) DEFAULT '0',
  PRIMARY KEY (`no_urut`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=92615 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_DET_TRN_STOK_KELUAR_TMP` */

DROP TABLE IF EXISTS `FAR_DET_TRN_STOK_KELUAR_TMP`;

CREATE TABLE `FAR_DET_TRN_STOK_KELUAR_TMP` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(8) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_trn` int(11) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL,
  `nama_brg` char(30) DEFAULT NULL,
  `permintaan` int(11) DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=84497 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_DET_TRN_TMP` */

DROP TABLE IF EXISTS `FAR_DET_TRN_TMP`;

CREATE TABLE `FAR_DET_TRN_TMP` (
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `no_trn` int(11) DEFAULT NULL,
  `kode` varchar(15) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `kesan` varchar(255) DEFAULT NULL,
  `dokter` varchar(30) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `no_reg` varchar(8) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `infra` int(11) DEFAULT NULL,
  `jm` int(11) DEFAULT NULL,
  `tuslah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `idx` double DEFAULT NULL,
  `hb` double DEFAULT NULL,
  `kembali` double DEFAULT NULL,
  `kel` char(3) DEFAULT '-',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=1514980 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_NOSP` */

DROP TABLE IF EXISTS `FAR_NOSP`;

CREATE TABLE `FAR_NOSP` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` char(6) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `meterai` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `asuransi` char(30) DEFAULT NULL,
  `iol` int(11) DEFAULT '0',
  `suplier` char(3) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=39402 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_NOSP_INAP` */

DROP TABLE IF EXISTS `FAR_NOSP_INAP`;

CREATE TABLE `FAR_NOSP_INAP` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` char(6) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `meterai` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `asuransi` char(30) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `suplier` char(3) DEFAULT NULL,
  PRIMARY KEY (`no_urut`),
  UNIQUE KEY `no_sp` (`no_sp`)
) ENGINE=MyISAM AUTO_INCREMENT=903 DEFAULT CHARSET=latin1;

/*Table structure for table `FAR_TRN_STOK_KELUAR` */

DROP TABLE IF EXISTS `FAR_TRN_STOK_KELUAR`;

CREATE TABLE `FAR_TRN_STOK_KELUAR` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `unit` char(20) DEFAULT NULL,
  `petugas` char(20) DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jam` time DEFAULT NULL,
  `pemesan` char(30) DEFAULT NULL,
  `tgl_respon` date DEFAULT NULL,
  `jam_respon` time DEFAULT NULL,
  `kirim` char(1) DEFAULT 'B',
  `perbarui` char(4) DEFAULT '-',
  `iol` int(1) DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=60238 DEFAULT CHARSET=latin1;

/*Table structure for table `KEP_MUTU_KET` */

DROP TABLE IF EXISTS `KEP_MUTU_KET`;

CREATE TABLE `KEP_MUTU_KET` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` char(7) DEFAULT NULL,
  `ket` text,
  `unit` char(20) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

/*Table structure for table `KEP_PLG` */

DROP TABLE IF EXISTS `KEP_PLG`;

CREATE TABLE `KEP_PLG` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_cm` char(8) DEFAULT NULL,
  `no_reg` char(8) DEFAULT NULL,
  `tgl_out` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `pin` char(10) DEFAULT '-',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=21705 DEFAULT CHARSET=latin1;

/*Table structure for table `MR_ICD` */

DROP TABLE IF EXISTS `MR_ICD`;

CREATE TABLE `MR_ICD` (
  `dtype` varchar(5) DEFAULT NULL,
  `icd` varchar(10) DEFAULT NULL,
  `diagnosa` varchar(150) DEFAULT NULL,
  `no_urut` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dtd` char(10) DEFAULT NULL,
  `stp` char(6) DEFAULT NULL,
  PRIMARY KEY (`no_urut`),
  KEY `icd` (`icd`)
) ENGINE=MyISAM AUTO_INCREMENT=12312 DEFAULT CHARSET=latin1;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Table structure for table `anc` */

DROP TABLE IF EXISTS `anc`;

CREATE TABLE `anc` (
  `id_anc` int(100) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) NOT NULL,
  `id_petugas` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `jadwal` date NOT NULL,
  `id_sesi` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(8) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=Belum Datang, 1=Datang',
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_anc`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ant_anak` */

DROP TABLE IF EXISTS `ant_anak`;

CREATE TABLE `ant_anak` (
  `id_ant_anak` int(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=aktif, 2=nonaktif',
  `id_sesi` int(1) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  PRIMARY KEY (`id_ant_anak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ant_kandungan` */

DROP TABLE IF EXISTS `ant_kandungan`;

CREATE TABLE `ant_kandungan` (
  `id_ant_kandungan` int(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=aktif, 2=nonaktif',
  `id_sesi` int(1) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  PRIMARY KEY (`id_ant_kandungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ant_pendaftaran` */

DROP TABLE IF EXISTS `ant_pendaftaran`;

CREATE TABLE `ant_pendaftaran` (
  `id_ant_pendaftaran` int(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=aktif, 2=nonaktif',
  PRIMARY KEY (`id_ant_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `bangsal_antrian_kamar` */

DROP TABLE IF EXISTS `bangsal_antrian_kamar`;

CREATE TABLE `bangsal_antrian_kamar` (
  `id_bangsal_antrian_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(40) DEFAULT NULL,
  `alamat` char(60) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `no_bed` char(3) DEFAULT NULL,
  `telpon` char(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `catatan` char(200) DEFAULT NULL,
  PRIMARY KEY (`id_bangsal_antrian_kamar`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `bangsal_diagnosa` */

DROP TABLE IF EXISTS `bangsal_diagnosa`;

CREATE TABLE `bangsal_diagnosa` (
  `id_bangsal_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `icd` char(10) DEFAULT NULL,
  `catatan` char(200) DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bangsal_diagnosa`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Table structure for table `bangsal_ket_antri` */

DROP TABLE IF EXISTS `bangsal_ket_antri`;

CREATE TABLE `bangsal_ket_antri` (
  `id_ket_antri` int(11) NOT NULL AUTO_INCREMENT,
  `ket_antri` char(20) DEFAULT NULL,
  `warna` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_ket_antri`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `bangsal_status_icd` */

DROP TABLE IF EXISTS `bangsal_status_icd`;

CREATE TABLE `bangsal_status_icd` (
  `id_bangsal_status_icd` int(11) NOT NULL AUTO_INCREMENT,
  `bangsal_status_icd` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_bangsal_status_icd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `nama` char(40) COLLATE latin1_general_ci DEFAULT NULL,
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=1035 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id_booking` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `id_catatan_medik` int(8) NOT NULL,
  `booking_tanggal` date NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(8) NOT NULL,
  `status` char(1) NOT NULL COMMENT '1.Datang, 2.Belum Datang',
  `keterangan` varchar(200) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_sesi` int(1) DEFAULT NULL,
  `mandiri` int(1) DEFAULT NULL COMMENT '0=cs, 1=mandiri',
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=14517 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `dokumen` varchar(500) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Table structure for table `catatan_medik` */

DROP TABLE IF EXISTS `catatan_medik`;

CREATE TABLE `catatan_medik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(100) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1. Aktif, 2. Nonaktif',
  `id_unit` int(5) NOT NULL,
  `aktif` int(1) NOT NULL,
  `ket` int(2) DEFAULT NULL,
  `kuota_status` int(1) DEFAULT NULL,
  `kuota` int(5) DEFAULT NULL,
  `kuota_hari` varchar(62) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `dokter_jadwal` */

DROP TABLE IF EXISTS `dokter_jadwal`;

CREATE TABLE `dokter_jadwal` (
  `id_jadwal` int(100) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(10) NOT NULL,
  `id_sesi` int(1) NOT NULL,
  `hari` int(1) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `kuota` int(5) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `far_asuransi` */

DROP TABLE IF EXISTS `far_asuransi`;

CREATE TABLE `far_asuransi` (
  `id_far_asuransi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_far_asuransi` char(30) NOT NULL,
  PRIMARY KEY (`id_far_asuransi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_copy_resep_tmp` */

DROP TABLE IF EXISTS `far_copy_resep_tmp`;

CREATE TABLE `far_copy_resep_tmp` (
  `id_far_copy_resep_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_register` int(11) DEFAULT NULL,
  `nama_petugas` char(70) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_copy_resep_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Table structure for table `far_ctk_retur` */

DROP TABLE IF EXISTS `far_ctk_retur`;

CREATE TABLE `far_ctk_retur` (
  `id_ctk_retur` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_ctk_retur`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Table structure for table `far_ctk_sp_tmp` */

DROP TABLE IF EXISTS `far_ctk_sp_tmp`;

CREATE TABLE `far_ctk_sp_tmp` (
  `id_far_ctk_sp_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_trn` int(8) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `str` char(30) DEFAULT NULL,
  `nama_apoteker` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_far_ctk_sp_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_nosp` */

DROP TABLE IF EXISTS `far_det_nosp`;

CREATE TABLE `far_det_nosp` (
  `id_det_no_sp` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `id_barang` int(8) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `harga_beli` int(11) DEFAULT NULL,
  `disc` double DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `petugas_pesan` int(8) DEFAULT NULL,
  `tgl_ed` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `petugas_terima` int(8) DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `kirim` int(11) DEFAULT NULL,
  `harga_beli_suplier` int(11) DEFAULT NULL,
  `satuan_beli` char(20) DEFAULT NULL,
  `batch` char(20) DEFAULT NULL,
  `petugas_pencatat` int(11) DEFAULT '0',
  `ppn` int(11) DEFAULT '0',
  `tanggal_ed` date DEFAULT NULL,
  `isi` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_no_sp`),
  KEY `no_sp` (`no_sp`),
  KEY `id_barang` (`id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=22261 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_nosp_inap` */

DROP TABLE IF EXISTS `far_det_nosp_inap`;

CREATE TABLE `far_det_nosp_inap` (
  `id_det_no_sp` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `id_barang` int(8) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `harga_beli` int(11) DEFAULT NULL,
  `disc` double DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `petugas_pesan` int(8) DEFAULT NULL,
  `tgl_ed` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `petugas_terima` int(8) DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `kirim` int(11) DEFAULT NULL,
  `harga_beli_suplier` int(11) DEFAULT NULL,
  `satuan_beli` char(20) DEFAULT NULL,
  `batch` char(20) DEFAULT NULL,
  `petugas_pencatat` int(11) DEFAULT '0',
  `ppn` int(11) DEFAULT '0',
  `tanggal_ed` date DEFAULT NULL,
  `isi` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_no_sp`),
  KEY `no_sp` (`no_sp`),
  KEY `id_barang` (`id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=5775 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_trn` */

DROP TABLE IF EXISTS `far_det_trn`;

CREATE TABLE `far_det_trn` (
  `id_far_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_far_trn` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `idx` double DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `poli_inap` int(11) DEFAULT NULL,
  `dosis` int(4) DEFAULT NULL,
  `hari` double DEFAULT NULL,
  `id_far_satuan_minum` int(11) DEFAULT NULL,
  `resep` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_det_trn`),
  KEY `NO_TRN` (`id_far_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=161385 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_trn_copy` */

DROP TABLE IF EXISTS `far_det_trn_copy`;

CREATE TABLE `far_det_trn_copy` (
  `id_far_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_far_trn` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `idx` double DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `poli_inap` int(11) DEFAULT NULL,
  `dosis` int(11) DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `id_far_satuan_minum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_det_trn`),
  KEY `NO_TRN` (`id_far_trn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_trn_copyxx` */

DROP TABLE IF EXISTS `far_det_trn_copyxx`;

CREATE TABLE `far_det_trn_copyxx` (
  `id_far_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_far_trn` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `idx` double DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `poli_inap` int(11) DEFAULT NULL,
  `dosis` int(4) DEFAULT NULL,
  `hari` double DEFAULT NULL,
  `id_far_satuan_minum` int(11) DEFAULT NULL,
  `resep` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_det_trn`),
  KEY `NO_TRN` (`id_far_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=2666 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_trn_fix` */

DROP TABLE IF EXISTS `far_det_trn_fix`;

CREATE TABLE `far_det_trn_fix` (
  `id_far_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_far_trn` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `idx` double DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `poli_inap` int(11) DEFAULT NULL,
  `dosis` int(4) DEFAULT NULL,
  `hari` double DEFAULT NULL,
  `id_far_satuan_minum` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `pph` int(11) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `resep` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_det_trn`),
  KEY `NO_TRN` (`id_far_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=174874 DEFAULT CHARSET=latin1;

/*Table structure for table `far_det_trn_stok_keluar` */

DROP TABLE IF EXISTS `far_det_trn_stok_keluar`;

CREATE TABLE `far_det_trn_stok_keluar` (
  `id_far_det_trn_stok_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(8) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `id_trn` int(11) NOT NULL DEFAULT '0',
  `id_satuan` int(3) NOT NULL DEFAULT '0',
  `permintaan` int(11) NOT NULL DEFAULT '0',
  `harga_pokok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_det_trn_stok_keluar`),
  KEY `kode` (`id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Table structure for table `far_detil_retur_inap` */

DROP TABLE IF EXISTS `far_detil_retur_inap`;

CREATE TABLE `far_detil_retur_inap` (
  `id_detil_retur_inap` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur_inap` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `catatan` char(150) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `no_sp` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detil_retur_inap`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `far_detil_retur_poli` */

DROP TABLE IF EXISTS `far_detil_retur_poli`;

CREATE TABLE `far_detil_retur_poli` (
  `id_detil_retur_poli` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur_poli` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `catatan` char(150) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `no_sp` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `faktur` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_detil_retur_poli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_faktur_cetak` */

DROP TABLE IF EXISTS `far_faktur_cetak`;

CREATE TABLE `far_faktur_cetak` (
  `id_far_faktur_cetak` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `suplier` char(50) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `tglAwal` date DEFAULT NULL,
  `tglAkhir` date DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_faktur_cetak`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `far_generik` */

DROP TABLE IF EXISTS `far_generik`;

CREATE TABLE `far_generik` (
  `id_far_generik` int(1) NOT NULL AUTO_INCREMENT,
  `nama_generik` char(20) NOT NULL,
  PRIMARY KEY (`id_far_generik`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_kel` */

DROP TABLE IF EXISTS `far_kel`;

CREATE TABLE `far_kel` (
  `id_far_kel` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL,
  PRIMARY KEY (`id_far_kel`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `far_kel_stok` */

DROP TABLE IF EXISTS `far_kel_stok`;

CREATE TABLE `far_kel_stok` (
  `id_kel_stok` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kel_stok` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_kel_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_ket_stok` */

DROP TABLE IF EXISTS `far_ket_stok`;

CREATE TABLE `far_ket_stok` (
  `id_far_ket_stok` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_far_ket_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `far_kode_lain` */

DROP TABLE IF EXISTS `far_kode_lain`;

CREATE TABLE `far_kode_lain` (
  `no_urut` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_anfrah` */

DROP TABLE IF EXISTS `far_lap_anfrah`;

CREATE TABLE `far_lap_anfrah` (
  `id_far_lap_anfrah` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` char(10) DEFAULT NULL,
  `tgl_akhir` char(10) DEFAULT NULL,
  `poli_inap` char(1) DEFAULT NULL,
  `nama_petugas` char(70) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` char(30) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL,
  `navi` int(1) DEFAULT NULL,
  `harga_pokok` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap_anfrah`)
) ENGINE=MyISAM AUTO_INCREMENT=69108 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_ctk_anfrah` */

DROP TABLE IF EXISTS `far_lap_ctk_anfrah`;

CREATE TABLE `far_lap_ctk_anfrah` (
  `id_far_lap_ctk_anfrah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` char(50) DEFAULT NULL,
  `no_sp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap_ctk_anfrah`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_pembelian_obat` */

DROP TABLE IF EXISTS `far_lap_pembelian_obat`;

CREATE TABLE `far_lap_pembelian_obat` (
  `id_far_lap` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `tanggal_faktur` date DEFAULT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `nama_suplier` char(60) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `harga_beli` int(3) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `meterai` int(8) DEFAULT NULL,
  `faktur` char(50) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `master_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap`)
) ENGINE=MyISAM AUTO_INCREMENT=22131 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_penggunaan_obat` */

DROP TABLE IF EXISTS `far_lap_penggunaan_obat`;

CREATE TABLE `far_lap_penggunaan_obat` (
  `id_lap_penggunaan_obat` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `ket` char(60) DEFAULT NULL,
  `id_penggunaan_obat` int(11) DEFAULT NULL,
  `poli_inap` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_penggunaan_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_penjualan_tmp` */

DROP TABLE IF EXISTS `far_lap_penjualan_tmp`;

CREATE TABLE `far_lap_penjualan_tmp` (
  `id_far_lap_penjualan_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `nama_petugas` char(70) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama_asuransi` char(50) DEFAULT NULL,
  `poli_inap` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap_penjualan_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=1850 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_stok_elk` */

DROP TABLE IF EXISTS `far_lap_stok_elk`;

CREATE TABLE `far_lap_stok_elk` (
  `id_far_lap_stok_elk` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(60) DEFAULT NULL,
  `ket_stok` char(30) DEFAULT NULL,
  `masuk` int(11) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `nama_satuan` char(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `id_trn` int(8) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_unit` char(35) DEFAULT NULL,
  `tgl_awal` char(10) DEFAULT NULL,
  `tgl_akhir` char(10) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap_stok_elk`)
) ENGINE=MyISAM AUTO_INCREMENT=34364 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_stok_limit` */

DROP TABLE IF EXISTS `far_lap_stok_limit`;

CREATE TABLE `far_lap_stok_limit` (
  `id_lap_stok_limit` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `kel_stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_stok_limit`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_tmp` */

DROP TABLE IF EXISTS `far_lap_tmp`;

CREATE TABLE `far_lap_tmp` (
  `id_far_lap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `nama_petugas` char(100) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_lap_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

/*Table structure for table `far_lap_trm_brg` */

DROP TABLE IF EXISTS `far_lap_trm_brg`;

CREATE TABLE `far_lap_trm_brg` (
  `id_trm_brg` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` int(11) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `nbm` char(10) DEFAULT NULL,
  `sip` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_trm_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Table structure for table `far_log_stok` */

DROP TABLE IF EXISTS `far_log_stok`;

CREATE TABLE `far_log_stok` (
  `id_far_log_stok` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `stok_poli` double DEFAULT NULL,
  `stok_inap` double DEFAULT NULL,
  `kode` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_far_log_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=116374 DEFAULT CHARSET=latin1;

/*Table structure for table `far_navi_pinjam` */

DROP TABLE IF EXISTS `far_navi_pinjam`;

CREATE TABLE `far_navi_pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_nosp` */

DROP TABLE IF EXISTS `far_nosp`;

CREATE TABLE `far_nosp` (
  `id_no_sp` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `meterai` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_asuransi` int(11) DEFAULT NULL,
  `iol` int(11) DEFAULT '0',
  `id_suplier` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_faktur` date DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `faktur` char(40) DEFAULT NULL,
  `pembayaran` int(1) DEFAULT NULL,
  `valid_keu` int(1) DEFAULT '0',
  PRIMARY KEY (`id_no_sp`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_suplier` (`id_suplier`),
  KEY `tanggal_faktur` (`tanggal_faktur`),
  KEY `id_petugas` (`id_petugas`),
  KEY `faktur` (`faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=8560 DEFAULT CHARSET=latin1;

/*Table structure for table `far_nosp_inap` */

DROP TABLE IF EXISTS `far_nosp_inap`;

CREATE TABLE `far_nosp_inap` (
  `id_no_sp` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `meterai` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_asuransi` int(11) DEFAULT NULL,
  `iol` int(11) DEFAULT '0',
  `id_suplier` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_faktur` date DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `faktur` char(40) DEFAULT NULL,
  `pembayaran` int(1) DEFAULT NULL,
  `valid_keu` int(1) DEFAULT '0',
  PRIMARY KEY (`id_no_sp`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_suplier` (`id_suplier`),
  KEY `id_petugas` (`id_petugas`),
  KEY `tanggal_faktur` (`tanggal_faktur`),
  KEY `faktur` (`faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=3239 DEFAULT CHARSET=latin1;

/*Table structure for table `far_nota_tmp` */

DROP TABLE IF EXISTS `far_nota_tmp`;

CREATE TABLE `far_nota_tmp` (
  `id_far_nota_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_far_trn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama_petugas` char(70) DEFAULT NULL,
  PRIMARY KEY (`id_far_nota_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

/*Table structure for table `far_pabrik` */

DROP TABLE IF EXISTS `far_pabrik`;

CREATE TABLE `far_pabrik` (
  `id_far_pabrik` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL,
  PRIMARY KEY (`id_far_pabrik`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

/*Table structure for table `far_pembayaran` */

DROP TABLE IF EXISTS `far_pembayaran`;

CREATE TABLE `far_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_penggunaan_obat` */

DROP TABLE IF EXISTS `far_penggunaan_obat`;

CREATE TABLE `far_penggunaan_obat` (
  `id_penggunaan_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penggunaan_obat` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_penggunaan_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `far_pesan` */

DROP TABLE IF EXISTS `far_pesan`;

CREATE TABLE `far_pesan` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_sp` varchar(6) DEFAULT NULL,
  `kode_brglama` int(8) DEFAULT NULL,
  `nama_brg` varchar(40) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `disc` double DEFAULT NULL,
  `hp` decimal(10,2) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `batch` varchar(15) DEFAULT NULL,
  `suplier` varchar(3) DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `ptg_pesan` varchar(30) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `tgl_tempo` datetime DEFAULT NULL,
  `tgl_ed` datetime DEFAULT NULL,
  `ptg_terima` varchar(30) DEFAULT NULL,
  `faktur` varchar(20) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `satuan_pesan` varchar(20) DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `pencatat` char(30) DEFAULT NULL,
  `kirim` char(5) DEFAULT 'BELUM',
  `tgl_faktur` date DEFAULT NULL,
  `harga_beli_sup` decimal(10,2) DEFAULT NULL,
  `cek` int(11) DEFAULT NULL,
  `kode_brg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_urut`),
  KEY `kode_brg` (`kode_brg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `far_pinjam_obat` */

DROP TABLE IF EXISTS `far_pinjam_obat`;

CREATE TABLE `far_pinjam_obat` (
  `id_pinjam_obat` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `poli_inap` int(1) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `asal` int(11) DEFAULT NULL,
  `tujuan` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `keterangan` char(100) DEFAULT NULL,
  `navi` int(1) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jam_kembali` char(8) DEFAULT NULL,
  `id_petugas_kembali` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=419 DEFAULT CHARSET=latin1;

/*Table structure for table `far_ppn` */

DROP TABLE IF EXISTS `far_ppn`;

CREATE TABLE `far_ppn` (
  `idppn` int(11) NOT NULL AUTO_INCREMENT,
  `nilaippn` int(11) DEFAULT '0',
  PRIMARY KEY (`idppn`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_prosentasi` */

DROP TABLE IF EXISTS `far_prosentasi`;

CREATE TABLE `far_prosentasi` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `prosentasi` int(11) DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `far_retur_inap` */

DROP TABLE IF EXISTS `far_retur_inap`;

CREATE TABLE `far_retur_inap` (
  `id_retur_inap` int(11) NOT NULL AUTO_INCREMENT,
  `faktur` char(30) DEFAULT NULL,
  `id_no_sp` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_suplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_retur_inap`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `far_retur_poli` */

DROP TABLE IF EXISTS `far_retur_poli`;

CREATE TABLE `far_retur_poli` (
  `id_retur_poli` int(11) NOT NULL AUTO_INCREMENT,
  `faktur` char(30) DEFAULT NULL,
  `id_no_sp` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_far_suplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_retur_poli`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Table structure for table `far_satuan` */

DROP TABLE IF EXISTS `far_satuan`;

CREATE TABLE `far_satuan` (
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_satuan`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `far_satuanX` */

DROP TABLE IF EXISTS `far_satuanX`;

CREATE TABLE `far_satuanX` (
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_satuan`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `far_satuan_minum` */

DROP TABLE IF EXISTS `far_satuan_minum`;

CREATE TABLE `far_satuan_minum` (
  `id_far_satuan_minum` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan_minum` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_far_satuan_minum`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok` */

DROP TABLE IF EXISTS `far_stok`;

CREATE TABLE `far_stok` (
  `nama` char(100) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL,
  `harga_pokok` int(11) NOT NULL DEFAULT '0',
  `disc` double NOT NULL DEFAULT '0',
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) NOT NULL DEFAULT '0',
  `batas` int(11) NOT NULL DEFAULT '0',
  `suplier` int(3) NOT NULL DEFAULT '0',
  `pabrik` int(30) NOT NULL DEFAULT '0',
  `isi` int(11) NOT NULL DEFAULT '0',
  `satuan` int(10) NOT NULL DEFAULT '0',
  `generik` int(1) NOT NULL DEFAULT '0',
  `kode_lain` int(3) NOT NULL DEFAULT '0',
  `petugas` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch` char(20) NOT NULL,
  `tgl_ed` date NOT NULL,
  `inorder` int(2) NOT NULL DEFAULT '0',
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `stok_inap` double NOT NULL DEFAULT '0' COMMENT 'stok gudang inap',
  `batas_stok_inap` int(11) NOT NULL,
  `stok_poli` double NOT NULL,
  `batas_stok_poli` int(11) NOT NULL,
  `tuslah` int(11) NOT NULL DEFAULT '0',
  `asuransi` int(11) NOT NULL DEFAULT '0',
  `satuan_beli` int(11) NOT NULL DEFAULT '0',
  `filter_inap` int(1) NOT NULL DEFAULT '0',
  `Filter_poli` int(1) NOT NULL DEFAULT '0',
  `kode` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `stok_depo_poli` int(11) DEFAULT NULL,
  `batas_stok_depo_poli` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  `stok_depo_inap` int(11) DEFAULT NULL,
  `batas_stok_depo_inap` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=1113 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok-lal` */

DROP TABLE IF EXISTS `far_stok-lal`;

CREATE TABLE `far_stok-lal` (
  `nama` char(100) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL,
  `harga_pokok` int(11) NOT NULL DEFAULT '0',
  `disc` double NOT NULL DEFAULT '0',
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) NOT NULL DEFAULT '0',
  `batas` int(11) NOT NULL DEFAULT '0',
  `suplier` int(3) NOT NULL DEFAULT '0',
  `pabrik` int(30) NOT NULL DEFAULT '0',
  `isi` int(11) NOT NULL DEFAULT '0',
  `satuan` int(10) NOT NULL DEFAULT '0',
  `generik` int(1) NOT NULL DEFAULT '0',
  `kode_lain` int(3) NOT NULL DEFAULT '0',
  `petugas` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch` char(20) NOT NULL,
  `tgl_ed` date NOT NULL,
  `inorder` int(2) NOT NULL DEFAULT '0',
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `stok_inap` int(11) NOT NULL DEFAULT '0' COMMENT 'stok gudang inap',
  `batas_stok_inap` int(11) NOT NULL,
  `stok_poli` int(11) NOT NULL,
  `batas_stok_poli` int(11) NOT NULL,
  `tuslah` int(11) NOT NULL DEFAULT '0',
  `asuransi` int(11) NOT NULL DEFAULT '0',
  `satuan_beli` int(11) NOT NULL DEFAULT '0',
  `filter_inap` int(1) NOT NULL DEFAULT '0',
  `Filter_poli` int(1) NOT NULL DEFAULT '0',
  `kode` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `stok_depo_poli` int(11) DEFAULT NULL,
  `batas_stok_depo_poli` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  `stok_depo_inap` int(11) DEFAULT NULL,
  `batas_stok_depo_inap` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok_3-1-15` */

DROP TABLE IF EXISTS `far_stok_3-1-15`;

CREATE TABLE `far_stok_3-1-15` (
  `nama` char(100) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL,
  `harga_pokok` int(11) NOT NULL DEFAULT '0',
  `disc` double NOT NULL DEFAULT '0',
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) NOT NULL DEFAULT '0',
  `batas` int(11) NOT NULL DEFAULT '0',
  `suplier` int(3) NOT NULL DEFAULT '0',
  `pabrik` int(30) NOT NULL DEFAULT '0',
  `isi` int(11) NOT NULL DEFAULT '0',
  `satuan` int(10) NOT NULL DEFAULT '0',
  `generik` int(1) NOT NULL DEFAULT '0',
  `kode_lain` int(3) NOT NULL DEFAULT '0',
  `petugas` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch` char(20) NOT NULL,
  `tgl_ed` date NOT NULL,
  `inorder` int(2) NOT NULL DEFAULT '0',
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `stok_inap` int(11) NOT NULL DEFAULT '0' COMMENT 'stok gudang inap',
  `batas_stok_inap` int(11) NOT NULL,
  `stok_poli` int(11) NOT NULL,
  `batas_stok_poli` int(11) NOT NULL,
  `tuslah` int(11) NOT NULL DEFAULT '0',
  `asuransi` int(11) NOT NULL DEFAULT '0',
  `satuan_beli` int(11) NOT NULL DEFAULT '0',
  `filter_inap` int(1) NOT NULL DEFAULT '0',
  `Filter_poli` int(1) NOT NULL DEFAULT '0',
  `kode` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `stok_depo_poli` int(11) DEFAULT NULL,
  `batas_stok_depo_poli` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  `stok_depo_inap` int(11) DEFAULT NULL,
  `batas_stok_depo_inap` int(11) DEFAULT NULL,
  `stok_pringgondani` int(11) DEFAULT NULL,
  `stok_kahyangan` int(11) DEFAULT NULL,
  `stok_taman_sari` int(11) DEFAULT NULL,
  `stok_ok` int(11) DEFAULT NULL,
  `stok_hcu` int(11) DEFAULT NULL,
  `stok_vk` int(11) DEFAULT NULL,
  `stok_laboratorium` int(11) DEFAULT NULL,
  `stok_radiologi` int(11) DEFAULT NULL,
  `stok_fisioteraphi` int(11) DEFAULT NULL,
  `stok_igd` int(11) DEFAULT NULL,
  `stok_non_igd` int(11) DEFAULT NULL,
  `stok_lain_lain` int(11) DEFAULT NULL,
  `stok_punokawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=1531 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok_copy` */

DROP TABLE IF EXISTS `far_stok_copy`;

CREATE TABLE `far_stok_copy` (
  `nama` char(100) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL,
  `harga_pokok` int(11) NOT NULL DEFAULT '0',
  `disc` double NOT NULL DEFAULT '0',
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) NOT NULL DEFAULT '0',
  `batas` int(11) NOT NULL DEFAULT '0',
  `suplier` int(3) NOT NULL DEFAULT '0',
  `pabrik` int(30) NOT NULL DEFAULT '0',
  `isi` int(11) NOT NULL DEFAULT '0',
  `satuan` int(10) NOT NULL DEFAULT '0',
  `generik` int(1) NOT NULL DEFAULT '0',
  `kode_lain` int(3) NOT NULL DEFAULT '0',
  `petugas` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch` char(20) NOT NULL,
  `tgl_ed` date NOT NULL,
  `inorder` int(2) NOT NULL DEFAULT '0',
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `stok_inap` int(11) NOT NULL DEFAULT '0' COMMENT 'stok gudang inap',
  `batas_stok_inap` int(11) NOT NULL,
  `stok_poli` int(11) NOT NULL,
  `batas_stok_poli` int(11) NOT NULL,
  `tuslah` int(11) NOT NULL DEFAULT '0',
  `asuransi` int(11) NOT NULL DEFAULT '0',
  `satuan_beli` int(11) NOT NULL DEFAULT '0',
  `filter_inap` int(1) NOT NULL DEFAULT '0',
  `Filter_poli` int(1) NOT NULL DEFAULT '0',
  `kode` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `stok_depo_poli` int(11) DEFAULT NULL,
  `batas_stok_depo_poli` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  `stok_depo_inap` int(11) DEFAULT NULL,
  `batas_stok_depo_inap` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok_elk` */

DROP TABLE IF EXISTS `far_stok_elk`;

CREATE TABLE `far_stok_elk` (
  `id_far_stok_elk` int(11) NOT NULL AUTO_INCREMENT,
  `stok` char(30) DEFAULT '-',
  `masuk` decimal(10,2) DEFAULT '0.00',
  `keluar` decimal(10,2) DEFAULT '0.00',
  `sisa` decimal(10,2) DEFAULT '0.00',
  `tanggal` date DEFAULT NULL,
  `id_register` int(8) DEFAULT '0',
  `id_trn` int(11) DEFAULT '0',
  `id_petugas` int(11) DEFAULT '0',
  `id_dokter` int(11) DEFAULT '0',
  `id_barang` int(11) DEFAULT '0',
  `jam` char(8) DEFAULT '00:00',
  `id_unit` int(11) DEFAULT '0',
  `poli_inap` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_far_stok_elk`),
  KEY `no_reg` (`id_register`),
  KEY `no_trn` (`id_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=212079 DEFAULT CHARSET=latin1;

/*Table structure for table `far_stok_opname` */

DROP TABLE IF EXISTS `far_stok_opname`;

CREATE TABLE `far_stok_opname` (
  `nama` char(100) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL,
  `harga_pokok` int(11) NOT NULL DEFAULT '0',
  `disc` double NOT NULL DEFAULT '0',
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual_non_r` int(11) NOT NULL DEFAULT '0',
  `batas` int(11) NOT NULL DEFAULT '0',
  `suplier` int(3) NOT NULL DEFAULT '0',
  `pabrik` int(30) NOT NULL DEFAULT '0',
  `isi` int(11) NOT NULL DEFAULT '0',
  `satuan` int(10) NOT NULL DEFAULT '0',
  `generik` int(1) NOT NULL DEFAULT '0',
  `kode_lain` int(3) NOT NULL DEFAULT '0',
  `petugas` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch` char(20) NOT NULL,
  `tgl_ed` date NOT NULL,
  `inorder` int(2) NOT NULL DEFAULT '0',
  `no_urut` int(10) NOT NULL AUTO_INCREMENT,
  `stok_inap` int(11) NOT NULL DEFAULT '0' COMMENT 'stok gudang inap',
  `batas_stok_inap` int(11) NOT NULL,
  `stok_poli` int(11) NOT NULL,
  `batas_stok_poli` int(11) NOT NULL,
  `tuslah` int(11) NOT NULL DEFAULT '0',
  `asuransi` int(11) NOT NULL DEFAULT '0',
  `satuan_beli` int(11) NOT NULL DEFAULT '0',
  `filter_inap` int(1) NOT NULL DEFAULT '0',
  `Filter_poli` int(1) NOT NULL DEFAULT '0',
  `kode` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `stok_depo_poli` int(11) DEFAULT NULL,
  `batas_stok_depo_poli` int(11) DEFAULT NULL,
  `ppn_keluaran` int(11) DEFAULT NULL,
  `stok_depo_inap` int(11) DEFAULT NULL,
  `batas_stok_depo_inap` int(11) DEFAULT NULL,
  `harga_jual_r` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=1583 DEFAULT CHARSET=latin1;

/*Table structure for table `far_suplier` */

DROP TABLE IF EXISTS `far_suplier`;

CREATE TABLE `far_suplier` (
  `nama` char(40) DEFAULT NULL,
  `alamat` char(50) DEFAULT NULL,
  `telpon` char(20) DEFAULT NULL,
  `fax` char(20) DEFAULT NULL,
  `email` char(40) DEFAULT NULL,
  `cp` char(30) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_far_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kontak` char(50) DEFAULT NULL,
  `handphone` char(30) DEFAULT NULL,
  `id_tmp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_suplier`)
) ENGINE=MyISAM AUTO_INCREMENT=364 DEFAULT CHARSET=latin1;

/*Table structure for table `far_trn` */

DROP TABLE IF EXISTS `far_trn`;

CREATE TABLE `far_trn` (
  `id_far_trn` int(10) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '2014-01-01',
  `id_unit` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `lunas` int(1) NOT NULL DEFAULT '0',
  `kelas` char(5) DEFAULT NULL,
  `poli_inap` int(1) DEFAULT NULL,
  `shift` char(1) DEFAULT NULL,
  `id_asuransi` int(11) DEFAULT NULL,
  `tgl_menyerahkan` datetime DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `val_farmasi` int(11) DEFAULT NULL,
  `no_psn` int(11) DEFAULT NULL,
  `nama` char(70) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_far_trn`),
  KEY `no_reg` (`id_register`)
) ENGINE=MyISAM AUTO_INCREMENT=55259 DEFAULT CHARSET=latin1;

/*Table structure for table `far_trn_stok_keluar` */

DROP TABLE IF EXISTS `far_trn_stok_keluar`;

CREATE TABLE `far_trn_stok_keluar` (
  `id_far_stok_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(3) NOT NULL DEFAULT '0',
  `id_petugas` int(3) NOT NULL DEFAULT '0',
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pemesan` int(3) NOT NULL,
  `tgl_respon` date NOT NULL,
  `jam_respon` char(8) NOT NULL,
  `kirim` char(1) NOT NULL DEFAULT 'B',
  `perbarui` int(4) NOT NULL DEFAULT '0',
  `iol` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_far_stok_keluar`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Table structure for table `far_yt` */

DROP TABLE IF EXISTS `far_yt`;

CREATE TABLE `far_yt` (
  `id_far_yt` int(11) NOT NULL AUTO_INCREMENT,
  `nama_far_yt` char(5) NOT NULL,
  PRIMARY KEY (`id_far_yt`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `fis_cetak_trn` */

DROP TABLE IF EXISTS `fis_cetak_trn`;

CREATE TABLE `fis_cetak_trn` (
  `id_fis_cetak_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_no_trn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_fis_cetak_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `fis_det_trn` */

DROP TABLE IF EXISTS `fis_det_trn`;

CREATE TABLE `fis_det_trn` (
  `id_fis_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `id_fis_trn` int(11) NOT NULL DEFAULT '0',
  `id_fis_tarif` int(11) NOT NULL DEFAULT '0',
  `pengirim` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `konsul` int(11) DEFAULT NULL,
  `koperasi` int(11) DEFAULT NULL,
  `rumah` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT NULL,
  `dr_sunu` int(11) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fis_det_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_fis_trn` (`id_fis_trn`),
  KEY `id_fis_tarif` (`id_fis_tarif`),
  KEY `id_petugas` (`id_petugas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `fis_lap_kunjungan` */

DROP TABLE IF EXISTS `fis_lap_kunjungan`;

CREATE TABLE `fis_lap_kunjungan` (
  `id_fis_lap_kunjungan` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(5) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `alamat` char(60) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `unit` char(40) DEFAULT NULL,
  `asuransi` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_fis_lap_kunjungan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `fis_tarif` */

DROP TABLE IF EXISTS `fis_tarif`;

CREATE TABLE `fis_tarif` (
  `id_fis_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `konsul` int(11) DEFAULT NULL,
  `koperasi` int(11) DEFAULT NULL,
  `rumah` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT NULL,
  `dr_sunu` int(11) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `publish` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fis_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Table structure for table `fis_tarif_copy` */

DROP TABLE IF EXISTS `fis_tarif_copy`;

CREATE TABLE `fis_tarif_copy` (
  `id_fis_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `konsul` int(11) DEFAULT NULL,
  `koperasi` int(11) DEFAULT NULL,
  `rumah` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT NULL,
  `dr_sunu` int(11) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `publish` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fis_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Table structure for table `fis_trn` */

DROP TABLE IF EXISTS `fis_trn`;

CREATE TABLE `fis_trn` (
  `id_fis_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `kelas` char(1) NOT NULL DEFAULT '-',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_asuransi` int(11) NOT NULL DEFAULT '0',
  `biaya` int(11) NOT NULL DEFAULT '0',
  `lunas` int(1) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `id_rujuk` int(11) NOT NULL,
  `umur_th` int(11) NOT NULL,
  `umur_bln` int(11) NOT NULL,
  `umur_hr` int(11) NOT NULL,
  `icd` char(10) NOT NULL,
  `iol` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fis_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_unit` (`id_unit`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_rujuk` (`id_rujuk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `igd_kasus` */

DROP TABLE IF EXISTS `igd_kasus`;

CREATE TABLE `igd_kasus` (
  `id_igd_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kasus` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_igd_kasus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `igd_peralatan` */

DROP TABLE IF EXISTS `igd_peralatan`;

CREATE TABLE `igd_peralatan` (
  `id_igd_peralatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peralatan` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_igd_peralatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `igd_register` */

DROP TABLE IF EXISTS `igd_register`;

CREATE TABLE `igd_register` (
  `id_igd_register` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_kasus` int(11) DEFAULT NULL,
  `id_unit_perawatan` int(11) DEFAULT NULL,
  `id_triase` int(11) DEFAULT NULL,
  `id_peralatan` int(11) DEFAULT NULL,
  `id_tindak_lanjut` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jam_masuk` char(8) DEFAULT NULL,
  `icd` char(10) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_asuransi` int(11) DEFAULT NULL,
  `bl` int(11) DEFAULT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `bb` decimal(10,2) DEFAULT NULL,
  `tb` decimal(10,0) DEFAULT NULL,
  `anamnese` text,
  `tek_atas` int(11) DEFAULT NULL,
  `tek_bawah` int(11) DEFAULT NULL,
  `pernapasan` int(11) DEFAULT NULL,
  `suhu` decimal(10,1) DEFAULT NULL,
  `nadi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_igd_register`)
) ENGINE=MyISAM AUTO_INCREMENT=3280 DEFAULT CHARSET=latin1;

/*Table structure for table `igd_tindak_lanjut` */

DROP TABLE IF EXISTS `igd_tindak_lanjut`;

CREATE TABLE `igd_tindak_lanjut` (
  `id_igd_tindak_lanjut` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tindak_lanjut` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_igd_tindak_lanjut`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `igd_triase` */

DROP TABLE IF EXISTS `igd_triase`;

CREATE TABLE `igd_triase` (
  `id_igd_triase` int(11) NOT NULL AUTO_INCREMENT,
  `nama_triase` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_igd_triase`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `igd_unit_perawatan` */

DROP TABLE IF EXISTS `igd_unit_perawatan`;

CREATE TABLE `igd_unit_perawatan` (
  `id_igd_unit_perawatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit_perawatan` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_igd_unit_perawatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `inventaris` */

DROP TABLE IF EXISTS `inventaris`;

CREATE TABLE `inventaris` (
  `kode_registrasi` int(100) NOT NULL,
  `kode_jenis` varchar(5) NOT NULL,
  `kode_ruangan` varchar(5) NOT NULL,
  `nomor_inventaris` varchar(100) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `kondisi` int(5) NOT NULL COMMENT '1=Baik, 0=Rusak',
  `status` int(5) NOT NULL COMMENT '1=Baru, 0=Bekas',
  `tanggal_kalibrasi` date NOT NULL,
  `kalibrasi_ulang` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `inventaris_jenis` */

DROP TABLE IF EXISTS `inventaris_jenis`;

CREATE TABLE `inventaris_jenis` (
  `kode_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `inventaris_ruangan` */

DROP TABLE IF EXISTS `inventaris_ruangan`;

CREATE TABLE `inventaris_ruangan` (
  `kode_ruangan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id_jadwal` int(5) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(15) NOT NULL,
  `sen` varchar(15) NOT NULL,
  `sel` varchar(15) NOT NULL,
  `rab` varchar(15) NOT NULL,
  `kam` varchar(15) NOT NULL,
  `jum` varchar(15) NOT NULL,
  `sab` varchar(15) NOT NULL,
  `min` varchar(15) NOT NULL,
  `sp` int(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kep_mutu` */

DROP TABLE IF EXISTS `kep_mutu`;

CREATE TABLE `kep_mutu` (
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `shift` int(1) DEFAULT NULL,
  `id_unit` int(3) DEFAULT NULL,
  `infus` int(11) DEFAULT '0',
  `plebitis` int(11) DEFAULT '0',
  `jam` char(8) DEFAULT NULL,
  `ter_cat` int(11) DEFAULT '0',
  `pem_cat` int(11) DEFAULT '0',
  `isk` int(11) DEFAULT '0',
  `oper` int(11) DEFAULT '0',
  `inf` int(11) DEFAULT '0',
  `dekub` int(11) DEFAULT '0',
  `sk_brad` int(11) DEFAULT '0',
  `jatuh` int(11) DEFAULT '0',
  `sk_jatuh` int(11) DEFAULT '0',
  `s_psn` int(11) DEFAULT '0',
  `s_obat` int(11) DEFAULT '0',
  `s_dosis` int(11) DEFAULT '0',
  `s_waktu` int(11) DEFAULT '0',
  `s_pemb` int(11) DEFAULT '0',
  `ket` char(250) DEFAULT NULL,
  `jml` int(11) DEFAULT '0',
  `infus1` int(11) DEFAULT '0',
  `s_ptg` int(11) DEFAULT '0',
  `s_dok` int(11) DEFAULT '0',
  `s_jns` int(11) DEFAULT '0',
  `jmlbr` int(11) DEFAULT '0',
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Table structure for table `kep_mutu_tmp` */

DROP TABLE IF EXISTS `kep_mutu_tmp`;

CREATE TABLE `kep_mutu_tmp` (
  `id_kep_mutu_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kep_mutu_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_akun` */

DROP TABLE IF EXISTS `ksr_akun`;

CREATE TABLE `ksr_akun` (
  `kode_akun` char(15) DEFAULT NULL,
  `nama_akun` char(50) DEFAULT NULL,
  `saldo_awal` int(11) DEFAULT NULL,
  `tipe_akun` int(4) DEFAULT NULL,
  `aktif` char(1) DEFAULT NULL,
  `id_ksr_akun` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_ksr_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=512 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_akun_copy` */

DROP TABLE IF EXISTS `ksr_akun_copy`;

CREATE TABLE `ksr_akun_copy` (
  `kode_akun` char(15) DEFAULT NULL,
  `nama_akun` char(50) DEFAULT NULL,
  `saldo_awal` int(11) DEFAULT NULL,
  `tipe_akun` int(4) DEFAULT NULL,
  `aktif` char(1) DEFAULT NULL,
  `id_ksr_akun` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_ksr_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=512 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_alat` */

DROP TABLE IF EXISTS `ksr_alat`;

CREATE TABLE `ksr_alat` (
  `id_ksr_alat` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_angsuran` */

DROP TABLE IF EXISTS `ksr_angsuran`;

CREATE TABLE `ksr_angsuran` (
  `id_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_angsuran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_ctk_nota_tmp` */

DROP TABLE IF EXISTS `ksr_ctk_nota_tmp`;

CREATE TABLE `ksr_ctk_nota_tmp` (
  `id_ksr_ctk_nota_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_register` int(11) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT NULL,
  `nama_tarif` char(60) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama` char(60) DEFAULT NULL,
  `alamat` char(70) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jam_masuk` char(8) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(8) DEFAULT NULL,
  `rawat` char(30) DEFAULT NULL,
  `nama_dokter` char(40) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `iol` char(1) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `sub_diskon` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `petugas` char(50) DEFAULT NULL,
  `titip` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_ctk_nota_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=1041 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_det_faktur` */

DROP TABLE IF EXISTS `ksr_det_faktur`;

CREATE TABLE `ksr_det_faktur` (
  `id_ksr_det_faktur` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` char(50) DEFAULT NULL,
  `faktur` char(50) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `id_no_sp` int(11) DEFAULT NULL,
  `kelompok` char(100) DEFAULT NULL,
  `nama_penerima` char(50) DEFAULT NULL,
  `id_suplier` int(11) DEFAULT NULL,
  `id_ksr_faktur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=7058 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_det_faktur_inap` */

DROP TABLE IF EXISTS `ksr_det_faktur_inap`;

CREATE TABLE `ksr_det_faktur_inap` (
  `id_ksr_det_faktur` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` char(50) DEFAULT NULL,
  `faktur` char(50) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `id_no_sp` int(11) DEFAULT NULL,
  `kelompok` char(100) DEFAULT NULL,
  `nama_penerima` char(50) DEFAULT NULL,
  `id_suplier` int(11) DEFAULT NULL,
  `id_ksr_faktur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=2847 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_det_piutang` */

DROP TABLE IF EXISTS `ksr_det_piutang`;

CREATE TABLE `ksr_det_piutang` (
  `id_ksr_det_piutang` int(11) NOT NULL AUTO_INCREMENT,
  `id_register` int(8) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `keterangan` char(100) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_piutang`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_det_trn` */

DROP TABLE IF EXISTS `ksr_det_trn`;

CREATE TABLE `ksr_det_trn` (
  `kelompok_unit` char(4) DEFAULT '-',
  `asuransi` int(1) DEFAULT '0',
  `kelas` char(5) DEFAULT '3',
  `adm` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `sp_anak` int(11) DEFAULT '0',
  `ass_1` int(11) DEFAULT NULL,
  `ass_2` int(11) DEFAULT '0',
  `penata` int(11) DEFAULT NULL,
  `on_loop` int(11) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `sewa_r` int(11) DEFAULT NULL,
  `sewa_a` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `id_dokter_sp_anak` int(11) DEFAULT NULL,
  `id_ass_1` int(11) DEFAULT NULL,
  `id_ass_2` int(11) DEFAULT NULL,
  `id_penata` int(11) DEFAULT NULL,
  `id_on_loop` int(11) DEFAULT NULL,
  `id_insentif` int(11) DEFAULT NULL,
  `pelaksana` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `id_ksr_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `rs` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_anestesi` int(11) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `ass_2_jaga` int(1) DEFAULT NULL,
  `onloop_jaga` int(1) DEFAULT NULL,
  `id_petugas_luar` int(11) DEFAULT NULL,
  `ass_luar` int(11) DEFAULT NULL,
  `diskon_dr` int(1) DEFAULT NULL,
  `id_residen_operator` int(3) DEFAULT NULL,
  `id_mr_bl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_trn`),
  KEY `asuransi` (`asuransi`),
  KEY `kelompok` (`kelompok_unit`),
  KEY `id_register` (`sewa_r`),
  KEY `id_unit` (`bhp`),
  KEY `kode` (`id_ass_2`),
  KEY `id_dokter_operator` (`id_operator`),
  KEY `id_dokter_anestesi` (`id_dokter_sp_anak`)
) ENGINE=MyISAM AUTO_INCREMENT=288133 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_det_trn_copy` */

DROP TABLE IF EXISTS `ksr_det_trn_copy`;

CREATE TABLE `ksr_det_trn_copy` (
  `kelompok_unit` char(4) DEFAULT '-',
  `asuransi` int(1) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat` int(11) DEFAULT '0',
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `id_dokter_operator` int(11) DEFAULT NULL COMMENT 'dr operator',
  `id_dokter_anestesi` int(11) DEFAULT NULL COMMENT 'dr anestesi',
  `id_dokter1` int(11) DEFAULT NULL COMMENT 'dr visit',
  `id_asisten` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `operator_ke` int(11) DEFAULT NULL,
  `anestesi_ke` int(11) DEFAULT NULL,
  `dokter_ke` int(11) DEFAULT NULL,
  `inloop_ke` int(11) DEFAULT NULL,
  `id_dokter_konsul` int(11) DEFAULT NULL,
  `konsul_sp` int(11) DEFAULT NULL,
  `id_cyto` int(11) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `id_dokter2` int(11) DEFAULT NULL,
  `dokter_ke1` int(11) DEFAULT NULL,
  `alat_rc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_trn`),
  KEY `asuransi` (`asuransi`),
  KEY `kelompok` (`kelompok_unit`),
  KEY `id_register` (`id_register`)
) ENGINE=MyISAM AUTO_INCREMENT=34060 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_detil_jurnal` */

DROP TABLE IF EXISTS `ksr_detil_jurnal`;

CREATE TABLE `ksr_detil_jurnal` (
  `id_ksr_detil_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(12) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `id_ksr_jurnal` int(11) DEFAULT NULL,
  `posisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_detil_jurnal`),
  KEY `id_ksr_jurnal` (`id_ksr_jurnal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_detil_jurnal_pembelian_farmasi_ralan` */

DROP TABLE IF EXISTS `ksr_detil_jurnal_pembelian_farmasi_ralan`;

CREATE TABLE `ksr_detil_jurnal_pembelian_farmasi_ralan` (
  `id_ksr_detil_jurnal_pembelian_farmasi_ralan` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(12) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `id_ksr_jurnal_pembelian_farmasi_ralan` int(11) DEFAULT NULL,
  `posisi` int(1) DEFAULT NULL,
  `awal` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_detil_jurnal_pembelian_farmasi_ralan`),
  KEY `id_ksr_jurnal` (`id_ksr_jurnal_pembelian_farmasi_ralan`)
) ENGINE=InnoDB AUTO_INCREMENT=32359 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_detil_jurnal_pembelian_farmasi_ranap` */

DROP TABLE IF EXISTS `ksr_detil_jurnal_pembelian_farmasi_ranap`;

CREATE TABLE `ksr_detil_jurnal_pembelian_farmasi_ranap` (
  `id_ksr_detil_jurnal_farmasi_ranap` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(12) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `id_ksr_jurnal_pembelian_farmasi_ranap` int(11) DEFAULT NULL,
  `posisi` int(1) DEFAULT NULL,
  `awal` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_detil_jurnal_farmasi_ranap`),
  KEY `id_ksr_jurnal` (`id_ksr_jurnal_pembelian_farmasi_ranap`)
) ENGINE=InnoDB AUTO_INCREMENT=7065 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_faktur` */

DROP TABLE IF EXISTS `ksr_faktur`;

CREATE TABLE `ksr_faktur` (
  `id_ksr_faktur` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `cp_suplier` char(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `lunas` int(11) DEFAULT NULL COMMENT '1=luns 0 = belum',
  `id_suplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_faktur`)
) ENGINE=InnoDB AUTO_INCREMENT=6921 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_faktur_inap` */

DROP TABLE IF EXISTS `ksr_faktur_inap`;

CREATE TABLE `ksr_faktur_inap` (
  `id_ksr_faktur` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `cp_suplier` char(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `lunas` int(11) DEFAULT NULL COMMENT '1=luns 0 = belum',
  `id_suplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=2785 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_inkaso` */

DROP TABLE IF EXISTS `ksr_inkaso`;

CREATE TABLE `ksr_inkaso` (
  `id_ksr_inkaso` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `aksi` char(20) DEFAULT NULL,
  `keterangan` char(100) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `cp` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_inkaso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_jurnal` */

DROP TABLE IF EXISTS `ksr_jurnal`;

CREATE TABLE `ksr_jurnal` (
  `id_ksr_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `no_bukti` char(20) DEFAULT NULL,
  `uraian` char(50) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_jurnal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_jurnal_pembelian_farmasi_ralan` */

DROP TABLE IF EXISTS `ksr_jurnal_pembelian_farmasi_ralan`;

CREATE TABLE `ksr_jurnal_pembelian_farmasi_ralan` (
  `id_ksr_jurnal_pembelian_farmasi_ralan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_no_sp` int(20) DEFAULT NULL,
  `uraian` char(50) DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `no_inkaso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_jurnal_pembelian_farmasi_ralan`)
) ENGINE=MyISAM AUTO_INCREMENT=15038 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_jurnal_pembelian_farmasi_ranap` */

DROP TABLE IF EXISTS `ksr_jurnal_pembelian_farmasi_ranap`;

CREATE TABLE `ksr_jurnal_pembelian_farmasi_ranap` (
  `id_ksr_jurnal_pembelian_farmasi_ranap` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_no_sp_inap` int(20) DEFAULT NULL,
  `uraian` char(50) DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `no_inkaso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_jurnal_pembelian_farmasi_ranap`)
) ENGINE=MyISAM AUTO_INCREMENT=3124 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_jurnal_posisi` */

DROP TABLE IF EXISTS `ksr_jurnal_posisi`;

CREATE TABLE `ksr_jurnal_posisi` (
  `id_ksr_jurnal_posisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_jurnal_posisi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_kel_set_akun` */

DROP TABLE IF EXISTS `ksr_kel_set_akun`;

CREATE TABLE `ksr_kel_set_akun` (
  `id_ksr_kel_set_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kel_set_akun` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_kel_set_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_kelas` */

DROP TABLE IF EXISTS `ksr_kelas`;

CREATE TABLE `ksr_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_kelompok_unit` */

DROP TABLE IF EXISTS `ksr_kelompok_unit`;

CREATE TABLE `ksr_kelompok_unit` (
  `id_ksr_kelompok_unit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelompok_unit` char(4) DEFAULT NULL,
  `nama_kelompok_unit` char(30) DEFAULT NULL,
  `id_mr_kelompok_unit` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_kelompok_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_kuitansi` */

DROP TABLE IF EXISTS `ksr_kuitansi`;

CREATE TABLE `ksr_kuitansi` (
  `id_ksr_kuitansi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(60) DEFAULT NULL,
  `nomor` char(10) DEFAULT NULL,
  `keterangan` char(150) DEFAULT NULL,
  `rupiah` int(11) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_ksr_kuitansi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap` */

DROP TABLE IF EXISTS `ksr_lap`;

CREATE TABLE `ksr_lap` (
  `id_ksr_lap` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `nama_suplier` char(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_faktur` date DEFAULT NULL,
  `faktur` char(30) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_lap`)
) ENGINE=MyISAM AUTO_INCREMENT=66602 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_det_trn` */

DROP TABLE IF EXISTS `ksr_lap_det_trn`;

CREATE TABLE `ksr_lap_det_trn` (
  `kelompok_unit` char(4) DEFAULT '-',
  `asuransi` int(1) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat` int(11) DEFAULT '0',
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `id_dokter_operator` int(11) DEFAULT NULL COMMENT 'dr operator',
  `id_dokter_anestesi` int(11) DEFAULT NULL COMMENT 'dr anestesi',
  `id_dokter1` int(11) DEFAULT NULL COMMENT 'dr visit',
  `id_asisten` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `operator_ke` int(11) DEFAULT NULL,
  `anestesi_ke` int(11) DEFAULT NULL,
  `dokter_ke` int(11) DEFAULT NULL,
  `inloop_ke` int(11) DEFAULT NULL,
  `id_dokter_konsul` int(11) DEFAULT NULL,
  `konsul_sp` int(11) DEFAULT NULL,
  `id_cyto` int(11) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `id_dokter2` int(11) DEFAULT NULL,
  `dokter_ke1` int(11) DEFAULT NULL,
  `alat_rc` int(11) DEFAULT NULL,
  `adm_klaim` int(11) DEFAULT NULL,
  `paket_ranap` int(11) DEFAULT NULL,
  `imunisasi` int(11) DEFAULT NULL,
  `asper` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `tindakan_bidan` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` char(10) DEFAULT NULL,
  `tgl_akhir` char(10) DEFAULT NULL,
  `nama_asuransi` char(50) DEFAULT NULL,
  `nama_tarif` char(50) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_det_trn`),
  KEY `asuransi` (`asuransi`),
  KEY `kelompok` (`kelompok_unit`),
  KEY `id_register` (`id_register`)
) ENGINE=MyISAM AUTO_INCREMENT=869987 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_jasa_alat` */

DROP TABLE IF EXISTS `ksr_lap_jasa_alat`;

CREATE TABLE `ksr_lap_jasa_alat` (
  `id_ksr_lap_pendapatan_per_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kelompok_unit` char(4) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(5) DEFAULT NULL,
  `nama_pas` char(50) DEFAULT NULL,
  `nama_pemeriksaan` char(50) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `nama_dokter` char(50) DEFAULT NULL,
  `cyto` int(11) DEFAULT NULL,
  `operator_ke` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `keterangan` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_lap_pendapatan_per_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_jasa_assisten` */

DROP TABLE IF EXISTS `ksr_lap_jasa_assisten`;

CREATE TABLE `ksr_lap_jasa_assisten` (
  `id_ksr_lap_pendapatan_per_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kelompok_unit` char(4) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(5) DEFAULT NULL,
  `nama_pas` char(50) DEFAULT NULL,
  `nama_pemeriksaan` char(50) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `keterangan` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_lap_pendapatan_per_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=23783 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_pendapatan_para_per_unit` */

DROP TABLE IF EXISTS `ksr_lap_pendapatan_para_per_unit`;

CREATE TABLE `ksr_lap_pendapatan_para_per_unit` (
  `id_ksr_lap_pendapatan_para_per_unit` int(11) NOT NULL AUTO_INCREMENT,
  `kelompok_unit` char(4) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(5) DEFAULT NULL,
  `nama_pas` char(50) DEFAULT NULL,
  `nama_pemeriksaan` char(50) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `r_obat` int(11) DEFAULT NULL,
  `nama_dokter` char(50) DEFAULT NULL,
  `cyto` int(11) DEFAULT NULL,
  `operator_ke` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `keterangan` char(10) DEFAULT NULL,
  `tind_bidan` int(11) DEFAULT NULL,
  `igd` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT NULL,
  `asper` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT NULL,
  `assisten` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `tindakan` int(11) DEFAULT NULL,
  `perujuk` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_lap_pendapatan_para_per_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=75900 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_pendapatan_per_dokter` */

DROP TABLE IF EXISTS `ksr_lap_pendapatan_per_dokter`;

CREATE TABLE `ksr_lap_pendapatan_per_dokter` (
  `id_ksr_lap_pendapatan_per_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kelompok_unit` char(4) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(5) DEFAULT NULL,
  `nama_pas` char(50) DEFAULT NULL,
  `nama_pemeriksaan` char(50) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `nama_dokter` char(50) DEFAULT NULL,
  `cyto` char(5) DEFAULT NULL,
  `operator_ke` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `keterangan` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_lap_pendapatan_per_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=15093 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_lap_tmp` */

DROP TABLE IF EXISTS `ksr_lap_tmp`;

CREATE TABLE `ksr_lap_tmp` (
  `id_lap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `kode_rujukan` char(3) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=429 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_operator_ke` */

DROP TABLE IF EXISTS `ksr_operator_ke`;

CREATE TABLE `ksr_operator_ke` (
  `id_operator` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_operator`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_pend_per_para` */

DROP TABLE IF EXISTS `ksr_pend_per_para`;

CREATE TABLE `ksr_pend_per_para` (
  `id_ksr_pend_per_para` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) DEFAULT NULL,
  `nama` char(200) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `ass_1` int(11) DEFAULT NULL,
  `ass_2` int(11) DEFAULT NULL,
  `penata` int(11) DEFAULT NULL,
  `on_loop` int(11) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_pend_per_para`)
) ENGINE=InnoDB AUTO_INCREMENT=915 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_petugas_luar` */

DROP TABLE IF EXISTS `ksr_petugas_luar`;

CREATE TABLE `ksr_petugas_luar` (
  `id_ksr_petugas_luar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_petugas_luar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_piutang` */

DROP TABLE IF EXISTS `ksr_piutang`;

CREATE TABLE `ksr_piutang` (
  `id_ksr_piutang` int(11) NOT NULL AUTO_INCREMENT,
  `id_register` int(8) DEFAULT NULL,
  `nama_penanggung` char(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `pekerjaan` int(11) DEFAULT NULL,
  `telpon` int(11) DEFAULT NULL,
  `jenis_jaminan` char(40) DEFAULT NULL,
  `nomor_jaminan` char(40) DEFAULT NULL,
  `nama_pemilik` char(50) DEFAULT NULL,
  `alamat_di_jaminan` char(50) DEFAULT NULL,
  `type` char(40) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `uang_muka` int(11) DEFAULT NULL,
  `cetak` int(1) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `tanggal_tempo` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_piutang`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_rekap_cetak_tmp` */

DROP TABLE IF EXISTS `ksr_rekap_cetak_tmp`;

CREATE TABLE `ksr_rekap_cetak_tmp` (
  `id_ksr_rekap_cetak_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_register` int(11) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `tgl_kunj` date DEFAULT NULL,
  `jam_kunj` char(5) DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `jam_pulang` char(5) DEFAULT NULL,
  `nama` char(60) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `titip` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kurang` int(11) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `unit` char(40) DEFAULT NULL,
  `asuransi` char(40) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `poli_inap` char(10) DEFAULT NULL,
  `lunas` char(5) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_rekap_cetak_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=1517 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_rekap_farmasi_tmp` */

DROP TABLE IF EXISTS `ksr_rekap_farmasi_tmp`;

CREATE TABLE `ksr_rekap_farmasi_tmp` (
  `id_ksr_rekap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `total` double DEFAULT NULL,
  `titip` double DEFAULT NULL,
  `kurang` double DEFAULT NULL,
  `tgl_awal` char(18) DEFAULT NULL,
  `tgl_akhir` char(18) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `nama_suplier` char(60) DEFAULT NULL,
  `cp_suplier` char(60) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `no_inkaso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_rekap_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=41349 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_rekap_tmp` */

DROP TABLE IF EXISTS `ksr_rekap_tmp`;

CREATE TABLE `ksr_rekap_tmp` (
  `id_ksr_rekap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `total` double DEFAULT NULL,
  `titip` double DEFAULT NULL,
  `kurang` double DEFAULT NULL,
  `tgl_awal` char(18) DEFAULT NULL,
  `tgl_akhir` char(18) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_rekap_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=364 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_set_akun` */

DROP TABLE IF EXISTS `ksr_set_akun`;

CREATE TABLE `ksr_set_akun` (
  `id_ksr_set_akun` int(11) NOT NULL AUTO_INCREMENT,
  `uraian` char(200) DEFAULT NULL,
  `kode_akun` char(20) DEFAULT NULL,
  `posisi` int(11) DEFAULT NULL,
  `keterangan` char(100) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_set_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_set_residen` */

DROP TABLE IF EXISTS `ksr_set_residen`;

CREATE TABLE `ksr_set_residen` (
  `id_ksr_set_residen` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) DEFAULT NULL,
  `id_dr_residen` int(11) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_set_residen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_sub` */

DROP TABLE IF EXISTS `ksr_sub`;

CREATE TABLE `ksr_sub` (
  `id_ksr_sub` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sub` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif` */

DROP TABLE IF EXISTS `ksr_tarif`;

CREATE TABLE `ksr_tarif` (
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT NULL,
  `sub` int(3) DEFAULT NULL,
  `nama` char(80) DEFAULT NULL,
  `kelas` char(5) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `adm` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `anestesi` int(11) DEFAULT NULL,
  `sp_anak` int(11) DEFAULT NULL,
  `ass_1` int(11) DEFAULT NULL,
  `ass_2` int(11) DEFAULT NULL,
  `penata` int(11) DEFAULT NULL,
  `on_loop` int(11) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `sewa_r` int(2) DEFAULT NULL,
  `sewa_a` int(11) DEFAULT NULL,
  `rs` int(11) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `publish_anestesi` int(1) DEFAULT NULL,
  `publish_sp_anak` int(1) DEFAULT NULL,
  `publish_ass_1` int(1) DEFAULT NULL,
  `publish_ass_2` int(1) DEFAULT NULL,
  `publish_penata` int(1) DEFAULT NULL,
  `publish_on_loop` int(1) DEFAULT NULL,
  `publish_insentif` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `bpjs` int(1) DEFAULT NULL,
  `publish_petugas_luar` int(11) DEFAULT NULL,
  `ass_petugas_luar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=459 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_13-11-14` */

DROP TABLE IF EXISTS `ksr_tarif_13-11-14`;

CREATE TABLE `ksr_tarif_13-11-14` (
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT '-',
  `nama` char(100) DEFAULT '-',
  `asuransi` int(2) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `adm_klaim` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `tindakan_bidan` int(11) DEFAULT NULL,
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `konsul_sp` int(11) DEFAULT NULL,
  `paket_ranap` int(11) DEFAULT NULL,
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `imunisasi` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat_rc` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT '0',
  `asper` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `publish` int(1) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  UNIQUE KEY `kode` (`kode`),
  KEY `nama` (`nama`),
  KEY `asuransi` (`asuransi`),
  KEY `kelas` (`kelas`)
) ENGINE=MyISAM AUTO_INCREMENT=1195 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_2014` */

DROP TABLE IF EXISTS `ksr_tarif_2014`;

CREATE TABLE `ksr_tarif_2014` (
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT '-',
  `nama` char(100) DEFAULT '-',
  `asuransi` int(2) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `adm_klaim` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `tindakan_bidan` int(11) DEFAULT NULL,
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `konsul_sp` int(11) DEFAULT NULL,
  `paket_ranap` int(11) DEFAULT NULL,
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `imunisasi` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat_rc` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT '0',
  `asper` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `publish` int(1) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  `publish_alat` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  UNIQUE KEY `kode` (`kode`),
  KEY `nama` (`nama`),
  KEY `asuransi` (`asuransi`),
  KEY `kelas` (`kelas`)
) ENGINE=MyISAM AUTO_INCREMENT=1199 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_6-6-14` */

DROP TABLE IF EXISTS `ksr_tarif_6-6-14`;

CREATE TABLE `ksr_tarif_6-6-14` (
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT '-',
  `nama` char(70) DEFAULT '-',
  `asuransi` int(2) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `adm_klaim` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `tindakan_bidan` int(11) DEFAULT NULL,
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `konsul_sp` int(11) DEFAULT NULL,
  `paket_ranap` int(11) DEFAULT NULL,
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `imunisasi` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat_rc` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT '0',
  `asper` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `publish` int(1) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=922 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_copy` */

DROP TABLE IF EXISTS `ksr_tarif_copy`;

CREATE TABLE `ksr_tarif_copy` (
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT NULL,
  `sub` int(3) DEFAULT NULL,
  `nama` char(80) DEFAULT NULL,
  `kelas` char(5) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `adm` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `anestesi` int(11) DEFAULT NULL,
  `sp_anak` int(11) DEFAULT NULL,
  `ass_1` int(11) DEFAULT NULL,
  `ass_2` int(11) DEFAULT NULL,
  `penata` int(11) DEFAULT NULL,
  `on_loop` int(11) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `sewa_r` int(2) DEFAULT NULL,
  `sewa_a` int(11) DEFAULT NULL,
  `rs` int(11) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `publish_anestesi` int(1) DEFAULT NULL,
  `publish_sp_anak` int(1) DEFAULT NULL,
  `publish_ass_1` int(1) DEFAULT NULL,
  `publish_ass_2` int(1) DEFAULT NULL,
  `publish_penata` int(1) DEFAULT NULL,
  `publish_on_loop` int(1) DEFAULT NULL,
  `publish_insentif` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `bpjs` int(1) DEFAULT NULL,
  `publish_petugas_luar` int(11) DEFAULT NULL,
  `ass_petugas_luar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=367 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_copy11-11` */

DROP TABLE IF EXISTS `ksr_tarif_copy11-11`;

CREATE TABLE `ksr_tarif_copy11-11` (
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT NULL,
  `sub` int(3) DEFAULT NULL,
  `nama` char(80) DEFAULT NULL,
  `kelas` char(5) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `adm` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `anestesi` int(11) DEFAULT NULL,
  `sp_anak` int(11) DEFAULT NULL,
  `ass_1` int(11) DEFAULT NULL,
  `ass_2` int(11) DEFAULT NULL,
  `penata` int(11) DEFAULT NULL,
  `on_loop` int(11) DEFAULT NULL,
  `insentif` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `sewa_r` int(2) DEFAULT NULL,
  `sewa_a` int(11) DEFAULT NULL,
  `rs` int(11) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `publish_anestesi` int(1) DEFAULT NULL,
  `publish_sp_anak` int(1) DEFAULT NULL,
  `publish_ass_1` int(1) DEFAULT NULL,
  `publish_ass_2` int(1) DEFAULT NULL,
  `publish_penata` int(1) DEFAULT NULL,
  `publish_on_loop` int(1) DEFAULT NULL,
  `publish_insentif` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `bpjs` int(1) DEFAULT NULL,
  `publish_petugas_luar` int(11) DEFAULT NULL,
  `ass_petugas_luar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=385 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarif_copyx` */

DROP TABLE IF EXISTS `ksr_tarif_copyx`;

CREATE TABLE `ksr_tarif_copyx` (
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(4) DEFAULT '-',
  `nama` char(100) DEFAULT '-',
  `asuransi` int(2) DEFAULT '0',
  `kelas` char(1) DEFAULT '3',
  `bhp` int(11) DEFAULT '0',
  `adm` int(11) DEFAULT '0',
  `adm_klaim` int(11) DEFAULT NULL,
  `tim` int(11) DEFAULT '0',
  `r_obat` int(11) DEFAULT '0',
  `tindakan` int(11) DEFAULT '0',
  `operator` int(11) DEFAULT '0',
  `anestesi` int(11) DEFAULT '0',
  `assisten_nama` int(11) DEFAULT '0',
  `tindakan_bidan` int(11) DEFAULT NULL,
  `assistensi` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT '0',
  `perujuk` int(11) DEFAULT '0',
  `peng_ugd` int(11) DEFAULT '0',
  `koperasi` int(11) DEFAULT '0',
  `keuangan` int(11) DEFAULT '0',
  `yayasan` int(11) DEFAULT '0',
  `lebaran` int(11) DEFAULT '0',
  `igd` int(11) DEFAULT '0',
  `lebaran_igd` int(11) DEFAULT NULL,
  `konsul_gizi` int(11) DEFAULT '0',
  `lebaran_gizi` int(11) DEFAULT NULL,
  `embalase` int(11) DEFAULT '0',
  `konsul_sp` int(11) DEFAULT NULL,
  `paket_ranap` int(11) DEFAULT NULL,
  `rohani` int(11) DEFAULT '0',
  `sanitasi` int(11) DEFAULT '0',
  `linen` int(11) DEFAULT '0',
  `kamar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `rumah` int(11) DEFAULT '0',
  `snak` int(11) DEFAULT '0',
  `visit_umum` int(11) DEFAULT '0',
  `makan` int(11) DEFAULT '0',
  `imunisasi` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT '0',
  `telp` int(11) DEFAULT '0',
  `alat_rc` int(11) DEFAULT NULL,
  `alat` int(11) DEFAULT '0',
  `asper` int(11) DEFAULT NULL,
  `invest` int(11) DEFAULT NULL,
  `bensin` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT '0',
  `keb_peri` int(11) DEFAULT '0',
  `tarif` int(11) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `publish` int(1) DEFAULT NULL,
  `publish_operator` int(11) DEFAULT NULL,
  `publish_anestesi` int(11) DEFAULT NULL,
  `publish_inloop` int(11) DEFAULT NULL,
  `publish_konsul_sp` int(11) DEFAULT NULL,
  `publish_visit_dokter` int(11) DEFAULT NULL,
  `publish_alat` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  UNIQUE KEY `kode` (`kode`),
  KEY `nama` (`nama`),
  KEY `asuransi` (`asuransi`),
  KEY `kelas` (`kelas`)
) ENGINE=MyISAM AUTO_INCREMENT=1195 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tarifx` */

DROP TABLE IF EXISTS `ksr_tarifx`;

CREATE TABLE `ksr_tarifx` (
  `id_ksr_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `kode` int(5) DEFAULT NULL,
  `kelompok_unit` char(3) DEFAULT NULL,
  `sub` int(11) DEFAULT NULL,
  `nama` char(80) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `anestesi` int(11) DEFAULT NULL,
  `tim_ok` int(11) DEFAULT NULL,
  `sewa_ok` int(11) DEFAULT NULL,
  `kamar` int(11) DEFAULT NULL,
  `visit` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `rs` int(11) DEFAULT NULL,
  `petugas` int(11) DEFAULT NULL,
  `asuransi` int(2) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `publish_anestesi` int(1) DEFAULT NULL,
  `publish_visit` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tarif`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_tipe_akun` */

DROP TABLE IF EXISTS `ksr_tipe_akun`;

CREATE TABLE `ksr_tipe_akun` (
  `id_ksr_tipe_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe_akun` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_tipe_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_titip` */

DROP TABLE IF EXISTS `ksr_titip`;

CREATE TABLE `ksr_titip` (
  `id_ksr_titip` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` tinytext,
  `total` int(11) DEFAULT NULL,
  `kode` int(4) DEFAULT NULL,
  `keterangan` char(150) DEFAULT NULL,
  `nama` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_titip`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_trn` */

DROP TABLE IF EXISTS `ksr_trn`;

CREATE TABLE `ksr_trn` (
  `id_ksr_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `tgl_kunj` date DEFAULT NULL,
  `jam_kunj` char(8) DEFAULT NULL,
  `tgl_inap` date DEFAULT NULL,
  `jam_inap` char(8) DEFAULT NULL,
  `tgl_pulang` datetime DEFAULT NULL,
  `jam_pulang` char(8) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_asuransi` int(11) DEFAULT NULL,
  `kelas` char(5) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `lunas` char(1) DEFAULT NULL,
  `id_petugas` int(3) DEFAULT NULL,
  `titip` int(11) DEFAULT NULL,
  `hak_kelas` int(11) DEFAULT NULL,
  `id_dokter` int(3) DEFAULT NULL,
  `id_pengirim` int(3) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kuitansi` char(150) DEFAULT NULL,
  `dari` char(60) DEFAULT NULL,
  `posting` int(1) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tgl_kuitansi` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_unit` (`id_unit`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pengirim` (`id_pengirim`)
) ENGINE=MyISAM AUTO_INCREMENT=82314 DEFAULT CHARSET=latin1;

/*Table structure for table `ksr_val_faktur` */

DROP TABLE IF EXISTS `ksr_val_faktur`;

CREATE TABLE `ksr_val_faktur` (
  `id_ksr_val_faktur` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` char(50) DEFAULT NULL,
  `faktur` char(50) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `id_no_sp` int(11) DEFAULT NULL,
  `kelompok` char(100) DEFAULT NULL,
  `nama_penerima` char(50) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_ksr_faktur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ksr_val_faktur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `kuesioner` */

DROP TABLE IF EXISTS `kuesioner`;

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan` int(1) NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_kuesioner`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `lab_det_trn` */

DROP TABLE IF EXISTS `lab_det_trn`;

CREATE TABLE `lab_det_trn` (
  `id_lab_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `id_lab_trn` int(11) NOT NULL DEFAULT '0',
  `id_lab_tarif` int(11) NOT NULL DEFAULT '0',
  `hasil` char(40) NOT NULL DEFAULT '-',
  `qty` char(40) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `alat` int(11) NOT NULL,
  `bhp` int(11) NOT NULL,
  `infrastruktur` int(11) NOT NULL,
  `rujuk` int(11) NOT NULL,
  `jasa_rs` int(11) NOT NULL,
  `hilang` int(1) NOT NULL DEFAULT '0',
  `rujukan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lab_det_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_lab_trn` (`id_lab_trn`),
  KEY `id_lab_tarif` (`id_lab_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=114300 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_lap_kunj_poli_inap` */

DROP TABLE IF EXISTS `lab_lap_kunj_poli_inap`;

CREATE TABLE `lab_lap_kunj_poli_inap` (
  `id_lab_lap_kunj_poli_inap` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `alamat` char(70) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `nama_dokter` char(50) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_lab_lap_kunj_poli_inap`)
) ENGINE=MyISAM AUTO_INCREMENT=7133 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_lap_pendapatan` */

DROP TABLE IF EXISTS `lab_lap_pendapatan`;

CREATE TABLE `lab_lap_pendapatan` (
  `id_lab_lap_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(3) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `id_catatan_medik` int(8) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `id_lab_trn` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `alat` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `infrastruktur` int(11) DEFAULT NULL,
  `rujuk` int(11) DEFAULT NULL,
  `jasa_rs` int(11) DEFAULT NULL,
  `alat1` int(11) DEFAULT NULL,
  `bhp1` int(11) DEFAULT NULL,
  `infrastruktur1` int(11) DEFAULT NULL,
  `rujuk1` int(11) DEFAULT NULL,
  `jasa_rs1` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `nama_pasien` char(60) DEFAULT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `rujukan1` int(11) DEFAULT NULL,
  `nama_asuransi` char(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `total1` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_lab_lap_pendapatan`)
) ENGINE=MyISAM AUTO_INCREMENT=58271 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_lap_tmp` */

DROP TABLE IF EXISTS `lab_lap_tmp`;

CREATE TABLE `lab_lap_tmp` (
  `id_lap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_petugas` int(10) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `kode_rujukan` char(3) DEFAULT NULL,
  PRIMARY KEY (`id_lap_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_rujukan` */

DROP TABLE IF EXISTS `lab_rujukan`;

CREATE TABLE `lab_rujukan` (
  `id_rujukan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rujukan` char(40) DEFAULT NULL,
  `kode_rujukan` char(3) DEFAULT NULL,
  PRIMARY KEY (`id_rujukan`),
  UNIQUE KEY `kode_rujukan` (`kode_rujukan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_sampel` */

DROP TABLE IF EXISTS `lab_sampel`;

CREATE TABLE `lab_sampel` (
  `id_sampel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sampel` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_sampel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_tarif` */

DROP TABLE IF EXISTS `lab_tarif`;

CREATE TABLE `lab_tarif` (
  `id_lab_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(100) NOT NULL DEFAULT '-',
  `harga_normal` char(30) NOT NULL DEFAULT '-',
  `satuan` char(20) NOT NULL DEFAULT '-',
  `sampel` char(20) NOT NULL DEFAULT '-',
  `alat` int(11) NOT NULL DEFAULT '0',
  `bhp` int(11) NOT NULL DEFAULT '0',
  `infrastruktur` int(11) NOT NULL DEFAULT '0',
  `rujuk` int(11) NOT NULL DEFAULT '0',
  `jasa_rs` int(11) NOT NULL DEFAULT '0',
  `tarif` int(11) NOT NULL,
  `kel` char(100) NOT NULL DEFAULT '-',
  `tgl` timestamp NOT NULL DEFAULT '2014-01-01 07:00:00',
  `bawah` char(50) NOT NULL,
  `atas` double NOT NULL DEFAULT '0',
  `laborat` double NOT NULL DEFAULT '0',
  `isjamak` tinyint(1) NOT NULL DEFAULT '0',
  `kode_rujukan` char(3) DEFAULT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lab_tarif`),
  KEY `kode_rujukan` (`kode_rujukan`)
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_tarif_asli` */

DROP TABLE IF EXISTS `lab_tarif_asli`;

CREATE TABLE `lab_tarif_asli` (
  `id_lab_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(100) NOT NULL DEFAULT '-',
  `harga_normal` char(30) NOT NULL DEFAULT '-',
  `satuan` char(20) NOT NULL DEFAULT '-',
  `sampel` char(20) NOT NULL DEFAULT '-',
  `alat` int(11) NOT NULL DEFAULT '0',
  `bhp` int(11) NOT NULL DEFAULT '0',
  `infrastruktur` int(11) NOT NULL DEFAULT '0',
  `rujuk` int(11) NOT NULL DEFAULT '0',
  `jasa_rs` int(11) NOT NULL DEFAULT '0',
  `tarif` int(11) NOT NULL,
  `kel` char(100) NOT NULL DEFAULT '-',
  `tgl` timestamp NOT NULL DEFAULT '2014-01-01 00:00:00',
  `bawah` char(50) NOT NULL,
  `atas` double NOT NULL DEFAULT '0',
  `laborat` double NOT NULL DEFAULT '0',
  `isjamak` tinyint(1) NOT NULL DEFAULT '0',
  `kode_rujukan` char(3) DEFAULT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lab_tarif`),
  KEY `kode_rujukan` (`kode_rujukan`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_tarif_copy` */

DROP TABLE IF EXISTS `lab_tarif_copy`;

CREATE TABLE `lab_tarif_copy` (
  `id_lab_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(100) NOT NULL DEFAULT '-',
  `harga_normal` char(30) NOT NULL DEFAULT '-',
  `satuan` char(20) NOT NULL DEFAULT '-',
  `sampel` char(20) NOT NULL DEFAULT '-',
  `alat` int(11) NOT NULL DEFAULT '0',
  `bhp` int(11) NOT NULL DEFAULT '0',
  `infrastruktur` int(11) NOT NULL DEFAULT '0',
  `rujuk` int(11) NOT NULL DEFAULT '0',
  `jasa_rs` int(11) NOT NULL DEFAULT '0',
  `tarif` int(11) NOT NULL,
  `kel` char(100) NOT NULL DEFAULT '-',
  `tgl` timestamp NOT NULL DEFAULT '2014-01-01 00:00:00',
  `bawah` char(10) NOT NULL,
  `atas` double NOT NULL DEFAULT '0',
  `laborat` double NOT NULL DEFAULT '0',
  `isjamak` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_lab_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

/*Table structure for table `lab_trn` */

DROP TABLE IF EXISTS `lab_trn`;

CREATE TABLE `lab_trn` (
  `id_lab_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `kelas` char(5) NOT NULL DEFAULT '-',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_asuransi` int(11) NOT NULL DEFAULT '0',
  `biaya` int(11) NOT NULL DEFAULT '0',
  `lunas` int(1) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `id_sampel` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `iol` int(1) DEFAULT NULL,
  `diskon` int(3) DEFAULT NULL,
  `nama` char(70) DEFAULT NULL,
  `val_lab` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_lab_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_unit` (`id_unit`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_sampel` (`id_sampel`)
) ENGINE=MyISAM AUTO_INCREMENT=10394 DEFAULT CHARSET=latin1;

/*Table structure for table `log_mr_tt_pindah` */

DROP TABLE IF EXISTS `log_mr_tt_pindah`;

CREATE TABLE `log_mr_tt_pindah` (
  `id_log_mr_tt_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `kelas_awal` char(5) DEFAULT NULL,
  `no_bed_awal` char(3) DEFAULT NULL,
  `kelas_akhir` char(5) DEFAULT NULL,
  `no_bed_akhir` char(3) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log_mr_tt_pindah`)
) ENGINE=InnoDB AUTO_INCREMENT=399 DEFAULT CHARSET=latin1;

/*Table structure for table `log_transaksi` */

DROP TABLE IF EXISTS `log_transaksi`;

CREATE TABLE `log_transaksi` (
  `id_log_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_trn` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` tinytext,
  `id_aplikasi` int(11) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=1084 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_agama` */

DROP TABLE IF EXISTS `mr_agama`;

CREATE TABLE `mr_agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `nama_agama` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_aktif` */

DROP TABLE IF EXISTS `mr_aktif`;

CREATE TABLE `mr_aktif` (
  `id_mr_aktif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(10) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_aktif`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_alamat_bps` */

DROP TABLE IF EXISTS `mr_alamat_bps`;

CREATE TABLE `mr_alamat_bps` (
  `id_alamat_bps` int(11) NOT NULL AUTO_INCREMENT,
  `kode_desa` int(11) DEFAULT NULL,
  `nama_desa` char(30) DEFAULT NULL,
  `kode_kecamatan` int(11) DEFAULT NULL,
  `nama_kecamatan` char(50) DEFAULT NULL,
  `kode_kabupaten` int(11) DEFAULT NULL,
  `nama_kabupaten` char(50) DEFAULT NULL,
  `kode_propinsi` int(11) DEFAULT NULL,
  `nama_propinsi` char(50) DEFAULT NULL,
  `alamat` char(200) DEFAULT NULL,
  PRIMARY KEY (`id_alamat_bps`)
) ENGINE=InnoDB AUTO_INCREMENT=152750 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_alergi` */

DROP TABLE IF EXISTS `mr_alergi`;

CREATE TABLE `mr_alergi` (
  `id_alergi` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(225) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `nama_obat` char(150) DEFAULT NULL,
  PRIMARY KEY (`id_alergi`),
  KEY `id_catatan_medik` (`id_catatan_medik`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_asuransi` */

DROP TABLE IF EXISTS `mr_asuransi`;

CREATE TABLE `mr_asuransi` (
  `id_asuransi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(40) NOT NULL DEFAULT '-',
  `alamat` char(50) NOT NULL DEFAULT '-',
  `telp` char(20) NOT NULL DEFAULT '0',
  `bpjs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asuransi`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_batal_periksa` */

DROP TABLE IF EXISTS `mr_batal_periksa`;

CREATE TABLE `mr_batal_periksa` (
  `id_mr_batala_periksa` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_batala_periksa`)
) ENGINE=InnoDB AUTO_INCREMENT=2311 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_bl` */

DROP TABLE IF EXISTS `mr_bl`;

CREATE TABLE `mr_bl` (
  `id_mr_bl` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL DEFAULT '2014-01-01',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `id_register` int(8) NOT NULL DEFAULT '0',
  `bl` int(1) NOT NULL DEFAULT '1',
  `id_unit` int(11) NOT NULL DEFAULT '1',
  `iol` int(1) NOT NULL DEFAULT '1',
  `id_kecamatan` char(10) NOT NULL,
  `id_kabupaten` char(10) NOT NULL,
  `id_asuransi` int(11) NOT NULL DEFAULT '1',
  `id_dokter` int(11) NOT NULL DEFAULT '1',
  `umur_th` int(11) NOT NULL DEFAULT '0',
  `umur_bln` int(11) NOT NULL DEFAULT '0',
  `umur_hr` int(11) NOT NULL DEFAULT '0',
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `imunisasi` int(11) NOT NULL DEFAULT '0',
  `kb` int(11) NOT NULL DEFAULT '0',
  `apseptor` int(11) NOT NULL DEFAULT '0',
  `pp` int(11) NOT NULL DEFAULT '0',
  `anc` int(11) NOT NULL DEFAULT '0',
  `gyn` int(11) NOT NULL DEFAULT '0',
  `jam_exec` char(8) NOT NULL DEFAULT '00:00:00',
  `lanjut` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `tb` double NOT NULL DEFAULT '0',
  `bb` double NOT NULL DEFAULT '0',
  `ulna` float(5,2) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `no_periksa` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `daftar_ke` int(11) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `tgl_m_t` date DEFAULT NULL,
  `val_farmasi` int(1) DEFAULT NULL,
  `val_lab` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_mr_bl`),
  KEY `no_reg` (`id_register`),
  KEY `unit` (`id_unit`),
  KEY `asuransi` (`id_asuransi`),
  KEY `dokter` (`id_dokter`),
  KEY `no_cm` (`id_catatan_medik`)
) ENGINE=MyISAM AUTO_INCREMENT=83305 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_bl_copy` */

DROP TABLE IF EXISTS `mr_bl_copy`;

CREATE TABLE `mr_bl_copy` (
  `id_mr_bl` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `id_register` int(8) NOT NULL DEFAULT '0',
  `bl` int(1) NOT NULL DEFAULT '1',
  `id_unit` int(11) NOT NULL DEFAULT '1',
  `iol` int(1) NOT NULL DEFAULT '1',
  `id_kecamatan` char(10) NOT NULL,
  `id_kabupaten` char(10) NOT NULL,
  `id_asuransi` int(11) NOT NULL DEFAULT '1',
  `id_dokter` int(11) NOT NULL DEFAULT '1',
  `umur_th` int(11) NOT NULL DEFAULT '0',
  `umur_bln` int(11) NOT NULL DEFAULT '0',
  `umur_hr` int(11) NOT NULL DEFAULT '0',
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `imunisasi` int(11) NOT NULL DEFAULT '0',
  `kb` int(11) NOT NULL DEFAULT '0',
  `apseptor` int(11) NOT NULL DEFAULT '0',
  `pp` int(11) NOT NULL DEFAULT '0',
  `anc` int(11) NOT NULL DEFAULT '0',
  `gyn` int(11) NOT NULL DEFAULT '0',
  `jam_exec` char(8) NOT NULL DEFAULT '00:00:00',
  `lanjut` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `tb` double NOT NULL DEFAULT '0',
  `bb` double NOT NULL DEFAULT '0',
  `ulna` float(5,2) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `no_periksa` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `daftar_ke` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_bl`),
  KEY `no_reg` (`id_register`),
  KEY `unit` (`id_unit`),
  KEY `asuransi` (`id_asuransi`),
  KEY `dokter` (`id_dokter`),
  KEY `no_cm` (`id_catatan_medik`)
) ENGINE=MyISAM AUTO_INCREMENT=6232 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_bl_copyx` */

DROP TABLE IF EXISTS `mr_bl_copyx`;

CREATE TABLE `mr_bl_copyx` (
  `id_mr_bl` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `id_register` int(8) NOT NULL DEFAULT '0',
  `bl` int(1) NOT NULL DEFAULT '1',
  `id_unit` int(11) NOT NULL DEFAULT '1',
  `iol` int(1) NOT NULL DEFAULT '1',
  `id_kecamatan` char(10) NOT NULL,
  `id_kabupaten` char(10) NOT NULL,
  `id_asuransi` int(11) NOT NULL DEFAULT '1',
  `id_dokter` int(11) NOT NULL DEFAULT '1',
  `umur_th` int(11) NOT NULL DEFAULT '0',
  `umur_bln` int(11) NOT NULL DEFAULT '0',
  `umur_hr` int(11) NOT NULL DEFAULT '0',
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `imunisasi` int(11) NOT NULL DEFAULT '0',
  `kb` int(11) NOT NULL DEFAULT '0',
  `apseptor` int(11) NOT NULL DEFAULT '0',
  `pp` int(11) NOT NULL DEFAULT '0',
  `anc` int(11) NOT NULL DEFAULT '0',
  `gyn` int(11) NOT NULL DEFAULT '0',
  `jam_exec` char(8) NOT NULL DEFAULT '00:00:00',
  `lanjut` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `tb` double NOT NULL DEFAULT '0',
  `bb` double NOT NULL DEFAULT '0',
  `ulna` float(5,2) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `no_periksa` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `daftar_ke` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_bl`),
  KEY `no_reg` (`id_register`),
  KEY `unit` (`id_unit`),
  KEY `asuransi` (`id_asuransi`),
  KEY `dokter` (`id_dokter`),
  KEY `no_cm` (`id_catatan_medik`)
) ENGINE=MyISAM AUTO_INCREMENT=6240 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_daftar` */

DROP TABLE IF EXISTS `mr_daftar`;

CREATE TABLE `mr_daftar` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_daftar` char(20) NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_desa` */

DROP TABLE IF EXISTS `mr_desa`;

CREATE TABLE `mr_desa` (
  `kode` char(12) NOT NULL DEFAULT '-',
  `nama` char(40) NOT NULL DEFAULT '-',
  `kode_kec` char(10) NOT NULL DEFAULT '0',
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=806 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_desa_bps` */

DROP TABLE IF EXISTS `mr_desa_bps`;

CREATE TABLE `mr_desa_bps` (
  `kode_kecamatan` int(11) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `nama_desa` char(60) NOT NULL,
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_desa`),
  KEY `kode_kecamatan` (`kode_kecamatan`),
  KEY `kode_desa` (`kode_desa`)
) ENGINE=MyISAM AUTO_INCREMENT=131071 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_desa_tmp` */

DROP TABLE IF EXISTS `mr_desa_tmp`;

CREATE TABLE `mr_desa_tmp` (
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` int(11) NOT NULL,
  `nama_desa` char(60) NOT NULL,
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=80064 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_desa_tmp_copy` */

DROP TABLE IF EXISTS `mr_desa_tmp_copy`;

CREATE TABLE `mr_desa_tmp_copy` (
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` int(11) NOT NULL,
  `nama_desa` char(60) NOT NULL,
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=14529 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_dirujuk` */

DROP TABLE IF EXISTS `mr_dirujuk`;

CREATE TABLE `mr_dirujuk` (
  `id_dirujuk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rujukan` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_dirujuk`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_dokter` */

DROP TABLE IF EXISTS `mr_dokter`;

CREATE TABLE `mr_dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` char(50) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_golongan_darah` */

DROP TABLE IF EXISTS `mr_golongan_darah`;

CREATE TABLE `mr_golongan_darah` (
  `id_golongan_darah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_golongan_darah` char(2) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_golongan_darah`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_icd` */

DROP TABLE IF EXISTS `mr_icd`;

CREATE TABLE `mr_icd` (
  `dtype` varchar(5) NOT NULL DEFAULT '-',
  `icd` varchar(10) NOT NULL DEFAULT '-',
  `diagnosa` varchar(150) NOT NULL DEFAULT '-',
  `no_urut` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `dtd` char(10) NOT NULL DEFAULT '-',
  `stp` char(6) NOT NULL DEFAULT '-',
  `ewar` char(10) DEFAULT NULL,
  PRIMARY KEY (`no_urut`),
  KEY `icd` (`icd`)
) ENGINE=MyISAM AUTO_INCREMENT=18845 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_icd9` */

DROP TABLE IF EXISTS `mr_icd9`;

CREATE TABLE `mr_icd9` (
  `icd9` char(10) NOT NULL DEFAULT '-',
  `diagnosa` char(60) NOT NULL DEFAULT '-',
  `id_icd9` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_icd9`)
) ENGINE=InnoDB AUTO_INCREMENT=20461 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_icd_copy` */

DROP TABLE IF EXISTS `mr_icd_copy`;

CREATE TABLE `mr_icd_copy` (
  `dtype` varchar(5) NOT NULL DEFAULT '-',
  `icd` varchar(10) NOT NULL DEFAULT '-',
  `diagnosa` varchar(150) NOT NULL DEFAULT '-',
  `no_urut` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `dtd` char(10) NOT NULL DEFAULT '-',
  `stp` char(6) NOT NULL DEFAULT '-',
  `ewar` char(10) DEFAULT NULL,
  PRIMARY KEY (`no_urut`),
  KEY `icd` (`icd`)
) ENGINE=MyISAM AUTO_INCREMENT=12311 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_iol` */

DROP TABLE IF EXISTS `mr_iol`;

CREATE TABLE `mr_iol` (
  `id_mr_iol` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_mr_iol`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kabupaten` */

DROP TABLE IF EXISTS `mr_kabupaten`;

CREATE TABLE `mr_kabupaten` (
  `kode` char(10) NOT NULL DEFAULT '-',
  `nama` char(40) NOT NULL DEFAULT '-',
  `kd_prop` char(10) NOT NULL DEFAULT '-',
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=296 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kabupaten_bps` */

DROP TABLE IF EXISTS `mr_kabupaten_bps`;

CREATE TABLE `mr_kabupaten_bps` (
  `kode_propinsi` int(11) NOT NULL,
  `kode_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` char(60) NOT NULL,
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_kabupaten`),
  KEY `kode_propinsi` (`kode_propinsi`),
  KEY `kode_kabupaten` (`kode_kabupaten`)
) ENGINE=MyISAM AUTO_INCREMENT=508 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kabupaten_bps_copy` */

DROP TABLE IF EXISTS `mr_kabupaten_bps_copy`;

CREATE TABLE `mr_kabupaten_bps_copy` (
  `kode_propinsi` int(11) NOT NULL,
  `kode_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` char(60) NOT NULL,
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB AUTO_INCREMENT=508 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kasus_polisi` */

DROP TABLE IF EXISTS `mr_kasus_polisi`;

CREATE TABLE `mr_kasus_polisi` (
  `id_kasus_polisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kasus_polisi` char(5) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_kasus_polisi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kecamatan` */

DROP TABLE IF EXISTS `mr_kecamatan`;

CREATE TABLE `mr_kecamatan` (
  `kode` char(10) NOT NULL DEFAULT '-',
  `nama` char(40) NOT NULL DEFAULT '-',
  `kd_kab` char(10) NOT NULL DEFAULT '-',
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`),
  KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=387 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kecamatan_bps` */

DROP TABLE IF EXISTS `mr_kecamatan_bps`;

CREATE TABLE `mr_kecamatan_bps` (
  `kode_kabupaten` int(11) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` char(60) NOT NULL,
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_kecamatan`),
  KEY `kode_kabupaten` (`kode_kabupaten`),
  KEY `kode_kecamatan` (`kode_kecamatan`)
) ENGINE=MyISAM AUTO_INCREMENT=6940 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kecamatan_bps_copy` */

DROP TABLE IF EXISTS `mr_kecamatan_bps_copy`;

CREATE TABLE `mr_kecamatan_bps_copy` (
  `kode_kabupaten` int(11) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` char(60) NOT NULL,
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_kecamatan`),
  KEY `kode_kabupaten` (`kode_kabupaten`),
  KEY `kode_kecamatan` (`kode_kecamatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kel_asuransi` */

DROP TABLE IF EXISTS `mr_kel_asuransi`;

CREATE TABLE `mr_kel_asuransi` (
  `id_mr_kel_asuransi` int(11) NOT NULL AUTO_INCREMENT,
  `kel_asuransi` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_mr_kel_asuransi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kel_stp` */

DROP TABLE IF EXISTS `mr_kel_stp`;

CREATE TABLE `mr_kel_stp` (
  `id_kel_stp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kel_stp` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_kel_stp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kelas` */

DROP TABLE IF EXISTS `mr_kelas`;

CREATE TABLE `mr_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kelompok_unit` */

DROP TABLE IF EXISTS `mr_kelompok_unit`;

CREATE TABLE `mr_kelompok_unit` (
  `id_kelompok_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelompok_unit` char(50) NOT NULL,
  PRIMARY KEY (`id_kelompok_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_keluarga` */

DROP TABLE IF EXISTS `mr_keluarga`;

CREATE TABLE `mr_keluarga` (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `nama_keluarga` char(30) NOT NULL,
  PRIMARY KEY (`id_keluarga`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_ket_bl` */

DROP TABLE IF EXISTS `mr_ket_bl`;

CREATE TABLE `mr_ket_bl` (
  `id_mr_ket_bl` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_mr_ket_bl`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_kondisi_pulang` */

DROP TABLE IF EXISTS `mr_kondisi_pulang`;

CREATE TABLE `mr_kondisi_pulang` (
  `id_kondisi_pulang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kondisi_pulang` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_kondisi_pulang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lama` */

DROP TABLE IF EXISTS `mr_lama`;

CREATE TABLE `mr_lama` (
  `id_lama` int(11) NOT NULL AUTO_INCREMENT,
  `lama` int(11) NOT NULL,
  PRIMARY KEY (`id_lama`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_10_diagnosa` */

DROP TABLE IF EXISTS `mr_lap_10_diagnosa`;

CREATE TABLE `mr_lap_10_diagnosa` (
  `id_lap_10_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `icd` char(10) DEFAULT NULL,
  `keluar_hidup_laki` int(11) DEFAULT NULL,
  `keluar_mati_laki` int(11) DEFAULT NULL,
  `keluar_hidup_perempuan` int(11) DEFAULT NULL,
  `keluar_mati_perempuan` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_10_diagnosa`)
) ENGINE=MyISAM AUTO_INCREMENT=38042 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_diagnosa` */

DROP TABLE IF EXISTS `mr_lap_diagnosa`;

CREATE TABLE `mr_lap_diagnosa` (
  `id_mr_lap_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `bl` int(11) DEFAULT NULL,
  `umur_hr` int(11) DEFAULT NULL,
  `umur_bln` int(11) DEFAULT NULL,
  `umur_th` int(11) DEFAULT NULL,
  `icd` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_mr_lap_diagnosa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_ewar` */

DROP TABLE IF EXISTS `mr_lap_ewar`;

CREATE TABLE `mr_lap_ewar` (
  `id_lap_ewar` int(11) NOT NULL AUTO_INCREMENT,
  `minggu` int(11) DEFAULT NULL,
  `icd` char(10) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `b` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `e` int(11) DEFAULT NULL,
  `f` int(11) DEFAULT NULL,
  `g` int(11) DEFAULT NULL,
  `h` int(11) DEFAULT NULL,
  `i` int(11) DEFAULT NULL,
  `j` int(11) DEFAULT NULL,
  `k` int(11) DEFAULT NULL,
  `l` int(11) DEFAULT NULL,
  `m` int(11) DEFAULT NULL,
  `n` int(11) DEFAULT NULL,
  `p` int(11) DEFAULT NULL,
  `q` int(11) DEFAULT NULL,
  `r` int(11) DEFAULT NULL,
  `s` int(11) DEFAULT NULL,
  `t` int(11) DEFAULT NULL,
  `u` int(11) DEFAULT NULL,
  `v` int(11) DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `yy` int(11) DEFAULT NULL,
  `z` int(11) DEFAULT NULL,
  `xx` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_ewar`)
) ENGINE=InnoDB AUTO_INCREMENT=6467 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunj_bl_poli` */

DROP TABLE IF EXISTS `mr_lap_kunj_bl_poli`;

CREATE TABLE `mr_lap_kunj_bl_poli` (
  `id_mr_lap_kunj_bl_poli` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(60) DEFAULT NULL,
  `baru` int(11) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `laki` int(11) DEFAULT NULL,
  `perempuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_lap_kunj_bl_poli`)
) ENGINE=InnoDB AUTO_INCREMENT=649729 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunjungan_dokter` */

DROP TABLE IF EXISTS `mr_lap_kunjungan_dokter`;

CREATE TABLE `mr_lap_kunjungan_dokter` (
  `id_lap_kunjungan_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` char(40) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  PRIMARY KEY (`id_lap_kunjungan_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=16562 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunjungan_kecamatan` */

DROP TABLE IF EXISTS `mr_lap_kunjungan_kecamatan`;

CREATE TABLE `mr_lap_kunjungan_kecamatan` (
  `id_kunjungan_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` char(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_kunjungan_kecamatan`)
) ENGINE=MyISAM AUTO_INCREMENT=13188 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunjungan_per_dokter` */

DROP TABLE IF EXISTS `mr_lap_kunjungan_per_dokter`;

CREATE TABLE `mr_lap_kunjungan_per_dokter` (
  `id_kunjungan_per_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL,
  `id_catatan_medik` int(11) NOT NULL,
  `id_register` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `nama_dokter` char(50) NOT NULL,
  `nama_unit` char(50) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_asuransi` char(50) NOT NULL,
  `id_asuransi` int(11) NOT NULL,
  PRIMARY KEY (`id_kunjungan_per_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=1069603 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunjungan_per_kecamatan` */

DROP TABLE IF EXISTS `mr_lap_kunjungan_per_kecamatan`;

CREATE TABLE `mr_lap_kunjungan_per_kecamatan` (
  `id_kunjungan_per_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL,
  `id_catatan_medik` int(11) NOT NULL,
  `id_register` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `nama_dokter` char(50) NOT NULL,
  `nama_unit` char(50) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_asuransi` char(50) NOT NULL,
  `id_asuransi` int(11) NOT NULL,
  `alamat` char(60) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kunjungan_per_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=59242 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_kunjungan_poliklinik` */

DROP TABLE IF EXISTS `mr_lap_kunjungan_poliklinik`;

CREATE TABLE `mr_lap_kunjungan_poliklinik` (
  `id_lap_kunjungan_poliklinik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` char(40) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_lap_kunjungan_poliklinik`)
) ENGINE=MyISAM AUTO_INCREMENT=15570 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_lap_per_diagnosa_ralan_ranap` */

DROP TABLE IF EXISTS `mr_lap_per_diagnosa_ralan_ranap`;

CREATE TABLE `mr_lap_per_diagnosa_ralan_ranap` (
  `id_lap_per_diagnosa_ralan_ranap` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `nama` char(80) DEFAULT NULL,
  `alamat` char(80) DEFAULT NULL,
  `unit` char(30) DEFAULT NULL,
  `th` int(11) DEFAULT NULL,
  `bln` int(11) DEFAULT NULL,
  `hr` int(11) DEFAULT NULL,
  `jam` char(5) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `icd` char(10) DEFAULT NULL,
  `rawat` char(30) DEFAULT NULL,
  `sex` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_lap_per_diagnosa_ralan_ranap`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_laporan_baru_lama` */

DROP TABLE IF EXISTS `mr_laporan_baru_lama`;

CREATE TABLE `mr_laporan_baru_lama` (
  `id_baru_lama` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` char(10) NOT NULL,
  `nama` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `iol` char(20) DEFAULT NULL,
  `sex` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_baru_lama`)
) ENGINE=MyISAM AUTO_INCREMENT=1295 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_log_edit_cm` */

DROP TABLE IF EXISTS `mr_log_edit_cm`;

CREATE TABLE `mr_log_edit_cm` (
  `id_log_edit_cm` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik_lama` int(11) NOT NULL,
  `id_catatan_medik_baru` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_baru` char(60) NOT NULL,
  `nama_lama` char(60) NOT NULL,
  `alamat_lama` char(60) NOT NULL,
  `alamat_baru` char(60) NOT NULL,
  `id_register_lama` int(11) DEFAULT NULL,
  `id_register_baru` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log_edit_cm`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_log_edit_pasien_inap` */

DROP TABLE IF EXISTS `mr_log_edit_pasien_inap`;

CREATE TABLE `mr_log_edit_pasien_inap` (
  `id_log_pasien_inap` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `kelas1` char(1) DEFAULT NULL,
  `kelas2` char(1) DEFAULT NULL,
  `asuransi1` int(11) DEFAULT NULL,
  `asuransi2` int(11) DEFAULT NULL,
  `unit1` int(11) DEFAULT NULL,
  `unit2` int(11) DEFAULT NULL,
  `bed1` int(11) DEFAULT NULL,
  `bed2` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_log_pasien_inap`)
) ENGINE=InnoDB AUTO_INCREMENT=529 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_log_pasien_inap` */

DROP TABLE IF EXISTS `mr_log_pasien_inap`;

CREATE TABLE `mr_log_pasien_inap` (
  `id_log_pasien_inap` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_asuransi` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_pasien_inap`)
) ENGINE=MyISAM AUTO_INCREMENT=4218 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_menikah` */

DROP TABLE IF EXISTS `mr_menikah`;

CREATE TABLE `mr_menikah` (
  `id_menikah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menikah` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_menikah`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pangkat` */

DROP TABLE IF EXISTS `mr_pangkat`;

CREATE TABLE `mr_pangkat` (
  `id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pangkat` char(50) NOT NULL,
  `kesatuan` int(11) NOT NULL,
  `kelas_perawatan` int(11) NOT NULL,
  PRIMARY KEY (`id_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien` */

DROP TABLE IF EXISTS `mr_pasien`;

CREATE TABLE `mr_pasien` (
  `id_catatan_medik` int(8) DEFAULT '0',
  `id_register` int(8) DEFAULT '0',
  `nama` char(60) DEFAULT '-',
  `alamat` char(60) DEFAULT '-',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `id_kabupaten` int(11) DEFAULT '0',
  `id_propinsi` int(11) DEFAULT '0',
  `sex` int(3) DEFAULT '0' COMMENT '1=laki,2=perempuan',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_lahir` date DEFAULT '2013-01-01',
  `tempat` char(30) DEFAULT '-',
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kunjungan` date DEFAULT '2013-01-01',
  `jam_kunjungan` char(8) DEFAULT '00:00:00',
  `poli_inap` int(1) DEFAULT '1' COMMENT '1=poli,2=inap',
  `id_unit` int(3) DEFAULT '0',
  `id_dokter` int(3) DEFAULT '0',
  `id_pengirim` int(3) DEFAULT '0',
  `id_asuransi` int(3) DEFAULT '0',
  `id_petugas` int(11) DEFAULT '0',
  `id_pendidikan` int(3) DEFAULT '0',
  `id_agama` int(3) DEFAULT '0',
  `id_pekerjaan` int(3) DEFAULT '0',
  `nama_ortu` char(60) DEFAULT '-',
  `telp` char(25) DEFAULT '-',
  `no_periksa` int(3) DEFAULT '0',
  `aktif` int(1) DEFAULT '1' COMMENT '1=aktif, 0=tidak aktif',
  `kelas` char(5) DEFAULT '3',
  `id_petugas_tpp` int(11) DEFAULT '0',
  `tgl_inap` date DEFAULT '2013-01-01',
  `jam_inap` char(8) DEFAULT '00:00:00',
  `tgl_pulang` date DEFAULT '2013-01-01',
  `jam_pulang` char(8) DEFAULT '00:00:00',
  `no_bed` char(3) DEFAULT '0',
  `icd` char(15) DEFAULT '0',
  `kunjungan` int(11) DEFAULT '0',
  `id_keluarga` int(11) DEFAULT '0',
  `alamat_ortu` char(60) DEFAULT '-',
  `id_pekerjaan_ortu` int(11) DEFAULT '0',
  `golongan_darah` char(2) DEFAULT '-',
  `id_kasus_polisi` int(1) DEFAULT NULL COMMENT '1=ya, 2=tidak',
  `menikah` int(1) DEFAULT '0' COMMENT '1=ya, 2 tidak',
  `id_ppk` int(11) DEFAULT '0',
  `tanggal_ppk` date DEFAULT '2014-01-01',
  `no_pendaftaran` int(11) DEFAULT NULL,
  `id_pangkat` int(11) DEFAULT NULL,
  `nip` char(30) DEFAULT NULL,
  `nik` char(30) DEFAULT NULL,
  `alergi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  UNIQUE KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `nama` (`nama`),
  KEY `id_desa` (`id_desa`),
  KEY `poli_inap` (`poli_inap`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_unit` (`id_unit`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_register` (`id_register`)
) ENGINE=MyISAM AUTO_INCREMENT=19998 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_copy` */

DROP TABLE IF EXISTS `mr_pasien_copy`;

CREATE TABLE `mr_pasien_copy` (
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `id_register` int(8) NOT NULL DEFAULT '0',
  `nama` char(60) NOT NULL DEFAULT '-',
  `alamat` char(60) NOT NULL DEFAULT '-',
  `id_desa` int(11) NOT NULL DEFAULT '0',
  `id_kecamatan` int(11) NOT NULL DEFAULT '0',
  `id_kabupaten` int(11) NOT NULL DEFAULT '0',
  `id_propinsi` int(11) NOT NULL DEFAULT '0',
  `sex` int(3) NOT NULL DEFAULT '0' COMMENT '1=laki,2=perempuan',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_lahir` date NOT NULL DEFAULT '2013-01-01',
  `tempat` char(30) NOT NULL DEFAULT '-',
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kunjungan` date NOT NULL DEFAULT '2013-01-01',
  `jam_kunjungan` char(8) NOT NULL DEFAULT '00:00:00',
  `poli_inap` int(1) NOT NULL DEFAULT '1' COMMENT '1=poli,2=inap',
  `id_unit` int(3) NOT NULL DEFAULT '0',
  `id_dokter` int(3) NOT NULL DEFAULT '0',
  `id_pengirim` int(3) NOT NULL DEFAULT '0',
  `id_asuransi` int(3) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_pendidikan` int(3) NOT NULL DEFAULT '0',
  `id_agama` int(3) NOT NULL DEFAULT '0',
  `id_pekerjaan` int(3) NOT NULL DEFAULT '0',
  `nama_ortu` char(60) NOT NULL DEFAULT '-',
  `telp` char(25) NOT NULL DEFAULT '-',
  `no_periksa` int(3) NOT NULL DEFAULT '0',
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif, 0=tidak aktif',
  `kelas` char(1) NOT NULL DEFAULT '3',
  `id_petugas_tpp` int(11) NOT NULL DEFAULT '0',
  `tgl_inap` date NOT NULL DEFAULT '2013-01-01',
  `jam_inap` char(8) NOT NULL DEFAULT '00:00:00',
  `tgl_pulang` date NOT NULL DEFAULT '2013-01-01',
  `jam_pulang` char(8) NOT NULL DEFAULT '00:00:00',
  `no_bed` char(3) NOT NULL DEFAULT '0',
  `icd` char(15) NOT NULL DEFAULT '0',
  `kunjungan` int(11) NOT NULL DEFAULT '0',
  `id_keluarga` int(11) NOT NULL DEFAULT '0',
  `alamat_ortu` char(60) NOT NULL DEFAULT '-',
  `id_pekerjaan_ortu` int(11) NOT NULL DEFAULT '0',
  `golongan_darah` char(2) NOT NULL DEFAULT '-',
  `id_kasus_polisi` int(1) NOT NULL COMMENT '1=ya, 2=tidak',
  `menikah` int(1) NOT NULL DEFAULT '0' COMMENT '1=ya, 2 tidak',
  `id_ppk` int(11) NOT NULL DEFAULT '0',
  `tanggal_ppk` date NOT NULL DEFAULT '2014-01-01',
  `no_pendaftaran` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `nip` char(30) NOT NULL,
  `nik` char(30) DEFAULT NULL,
  `alergi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  UNIQUE KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `nama` (`nama`),
  KEY `id_desa` (`id_desa`),
  KEY `poli_inap` (`poli_inap`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_unit` (`id_unit`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_register` (`id_register`)
) ENGINE=MyISAM AUTO_INCREMENT=14282 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_lama` */

DROP TABLE IF EXISTS `mr_pasien_lama`;

CREATE TABLE `mr_pasien_lama` (
  `no_cm` char(12) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `alamat` char(150) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=29101 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_lama_asli` */

DROP TABLE IF EXISTS `mr_pasien_lama_asli`;

CREATE TABLE `mr_pasien_lama_asli` (
  `no_cm` int(8) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `alamat` char(150) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pasien`),
  KEY `no_cm` (`no_cm`)
) ENGINE=InnoDB AUTO_INCREMENT=32403 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_lama_int` */

DROP TABLE IF EXISTS `mr_pasien_lama_int`;

CREATE TABLE `mr_pasien_lama_int` (
  `no_cm` int(12) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `alamat` char(150) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_pulang` */

DROP TABLE IF EXISTS `mr_pasien_pulang`;

CREATE TABLE `mr_pasien_pulang` (
  `id_pasien_pulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `umur_hari` int(11) NOT NULL DEFAULT '0',
  `umur_bulan` int(11) NOT NULL DEFAULT '0',
  `umur_tahun` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL DEFAULT '2014-01-01',
  `tgl_pulang` date NOT NULL DEFAULT '2013-01-01',
  `jam_pulang` char(8) NOT NULL DEFAULT '00:00:00',
  `id_kondisi_pulang` int(11) NOT NULL DEFAULT '0',
  `id_dirujuk` int(11) NOT NULL DEFAULT '0',
  `lama_dirawat` int(11) NOT NULL DEFAULT '0',
  `kelas` char(2) NOT NULL DEFAULT '-',
  `icd_utama` char(10) NOT NULL DEFAULT '-',
  `icd_1` char(10) NOT NULL DEFAULT '-',
  `icd_2` char(10) NOT NULL DEFAULT '-',
  `icd_3` char(10) NOT NULL DEFAULT '-',
  `icd_4` char(10) NOT NULL DEFAULT '-',
  `icd_5` char(10) NOT NULL DEFAULT '-',
  `icd_6` char(10) NOT NULL DEFAULT '-',
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `poli_inap` int(11) NOT NULL DEFAULT '0',
  `icd9_1` char(10) NOT NULL DEFAULT '-',
  `icd9_2` char(10) NOT NULL DEFAULT '-',
  `icd9_3` char(10) NOT NULL DEFAULT '-',
  `icd9_4` char(10) NOT NULL DEFAULT '-',
  `icd9_5` char(10) NOT NULL DEFAULT '-',
  `id_unit` int(11) DEFAULT NULL,
  `bl` int(11) DEFAULT NULL,
  `id_mr_bl` int(11) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `jam_kunjungan` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_pasien_pulang`)
) ENGINE=MyISAM AUTO_INCREMENT=83745 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasien_tmp` */

DROP TABLE IF EXISTS `mr_pasien_tmp`;

CREATE TABLE `mr_pasien_tmp` (
  `no_cm` int(8) NOT NULL DEFAULT '0',
  `nama` char(50) DEFAULT NULL,
  `alamat` char(70) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`)
) ENGINE=MyISAM AUTO_INCREMENT=78100 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pasienx` */

DROP TABLE IF EXISTS `mr_pasienx`;

CREATE TABLE `mr_pasienx` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) DEFAULT '0',
  `id_register` int(8) DEFAULT '0',
  `nama` char(60) DEFAULT '-',
  `alamat` char(60) DEFAULT '-',
  `id_desa` char(15) DEFAULT '0',
  `id_kecamatan` char(15) DEFAULT '0',
  `id_kabupaten` char(15) DEFAULT '0',
  `id_propinsi` char(15) DEFAULT '0',
  `sex` int(3) DEFAULT '0',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_lahir` date DEFAULT '2013-01-01',
  `tempat` char(30) DEFAULT '-',
  `tgl_kunjungan` date DEFAULT '2013-01-01',
  `jam_kunjungan` char(8) DEFAULT '00:00:00',
  `poli_inap` int(1) DEFAULT '1',
  `id_unit` int(3) DEFAULT '0',
  `id_dokter` int(3) DEFAULT '0',
  `id_pengirim` int(3) DEFAULT '0',
  `id_asuransi` int(3) DEFAULT '0',
  `id_petugas` int(11) DEFAULT '0',
  `id_pendidikan` int(3) DEFAULT '0',
  `id_agama` int(3) DEFAULT '0',
  `id_pekerjaan` int(3) DEFAULT '0',
  `nama_ortu` char(60) DEFAULT '-',
  `telp` int(20) DEFAULT '0',
  `no_periksa` int(3) DEFAULT '0',
  `aktif` int(1) DEFAULT '1',
  `kelas` char(1) DEFAULT '3',
  `id_petugas_tpp` int(11) DEFAULT '0',
  `tgl_inap` date DEFAULT '2013-01-01',
  `jam_inap` char(8) DEFAULT '00:00:00',
  `tgl_pulang` date DEFAULT '2013-01-01',
  `jam_pulang` char(8) DEFAULT '00:00:00',
  `no_bed` int(11) DEFAULT '0',
  `icd` char(15) DEFAULT '0',
  `kunjungan` int(11) DEFAULT '0',
  `id_keluarga` int(11) DEFAULT '0',
  `alamat_ortu` char(60) DEFAULT '-',
  `id_pekerjaan_ortu` int(11) DEFAULT '0',
  PRIMARY KEY (`id_pasien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pekerjaan` */

DROP TABLE IF EXISTS `mr_pekerjaan`;

CREATE TABLE `mr_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pendaftaran` */

DROP TABLE IF EXISTS `mr_pendaftaran`;

CREATE TABLE `mr_pendaftaran` (
  `id_mr_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_mr_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pendidikan` */

DROP TABLE IF EXISTS `mr_pendidikan`;

CREATE TABLE `mr_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_pengirim` */

DROP TABLE IF EXISTS `mr_pengirim`;

CREATE TABLE `mr_pengirim` (
  `id_pengirim` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` char(60) NOT NULL DEFAULT '-',
  `alamat_pengirim` char(60) NOT NULL DEFAULT '-',
  `telp` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pengirim`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_petugas` */

DROP TABLE IF EXISTS `mr_petugas`;

CREATE TABLE `mr_petugas` (
  `id_petugas` int(10) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=Aktif, 0=Nonaktif',
  `pelayanan` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `mr_poli_inap` */

DROP TABLE IF EXISTS `mr_poli_inap`;

CREATE TABLE `mr_poli_inap` (
  `id_poli_inap` int(11) NOT NULL AUTO_INCREMENT,
  `nama_poli_inap` char(40) NOT NULL,
  PRIMARY KEY (`id_poli_inap`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_ppk` */

DROP TABLE IF EXISTS `mr_ppk`;

CREATE TABLE `mr_ppk` (
  `id_ppk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ppk` char(50) NOT NULL,
  `alamat_ppk` char(50) NOT NULL,
  `telp` char(20) NOT NULL,
  PRIMARY KEY (`id_ppk`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_profesi` */

DROP TABLE IF EXISTS `mr_profesi`;

CREATE TABLE `mr_profesi` (
  `id_profesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_profesi` char(50) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_profesi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_propinsi` */

DROP TABLE IF EXISTS `mr_propinsi`;

CREATE TABLE `mr_propinsi` (
  `id_propinsi` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(5) DEFAULT '-',
  `nama` char(40) DEFAULT '-',
  PRIMARY KEY (`id_propinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_propinsi_bps` */

DROP TABLE IF EXISTS `mr_propinsi_bps`;

CREATE TABLE `mr_propinsi_bps` (
  `kode_propinsi` int(11) NOT NULL,
  `nama_propinsi` char(50) NOT NULL,
  `id_propinsi` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_propinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_rla` */

DROP TABLE IF EXISTS `mr_rla`;

CREATE TABLE `mr_rla` (
  `id_rla` int(10) NOT NULL AUTO_INCREMENT,
  `icd` char(10) NOT NULL DEFAULT '0',
  `7_28hr` int(4) NOT NULL DEFAULT '0',
  `28_1th` int(4) NOT NULL DEFAULT '0',
  `1_4th` int(4) NOT NULL DEFAULT '0',
  `5_14th` int(4) NOT NULL DEFAULT '0',
  `15_24th` int(4) NOT NULL DEFAULT '0',
  `25_44th` int(4) NOT NULL DEFAULT '0',
  `45_64th` int(4) NOT NULL DEFAULT '0',
  `65th` int(4) NOT NULL DEFAULT '0',
  `laki` int(4) NOT NULL DEFAULT '0',
  `perempuan` int(4) NOT NULL DEFAULT '0',
  `hidup` int(4) NOT NULL DEFAULT '0',
  `mati` int(4) NOT NULL DEFAULT '0',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `bl` int(1) NOT NULL DEFAULT '0',
  `poli_inap` int(1) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_mr_bl` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `0_6hr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rla`)
) ENGINE=MyISAM AUTO_INCREMENT=88012 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_rla_copy` */

DROP TABLE IF EXISTS `mr_rla_copy`;

CREATE TABLE `mr_rla_copy` (
  `id_rla` int(10) NOT NULL AUTO_INCREMENT,
  `icd` char(10) NOT NULL DEFAULT '0',
  `0_28hr` int(4) NOT NULL DEFAULT '0',
  `28_1th` int(4) NOT NULL DEFAULT '0',
  `1_4th` int(4) NOT NULL DEFAULT '0',
  `5_14th` int(4) NOT NULL DEFAULT '0',
  `15_24th` int(4) NOT NULL DEFAULT '0',
  `25_44th` int(4) NOT NULL DEFAULT '0',
  `45_64th` int(4) NOT NULL DEFAULT '0',
  `65th` int(4) NOT NULL DEFAULT '0',
  `laki` int(4) NOT NULL DEFAULT '0',
  `perempuan` int(4) NOT NULL DEFAULT '0',
  `hidup` int(4) NOT NULL DEFAULT '0',
  `mati` int(4) NOT NULL DEFAULT '0',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bl` int(1) NOT NULL DEFAULT '0',
  `poli_inap` int(1) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_mr_bl` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rla`)
) ENGINE=MyISAM AUTO_INCREMENT=197395 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_rla_copy1` */

DROP TABLE IF EXISTS `mr_rla_copy1`;

CREATE TABLE `mr_rla_copy1` (
  `id_rla` int(10) NOT NULL AUTO_INCREMENT,
  `icd` char(10) NOT NULL DEFAULT '0',
  `7_28hr` int(4) NOT NULL DEFAULT '0',
  `28_1th` int(4) NOT NULL DEFAULT '0',
  `1_4th` int(4) NOT NULL DEFAULT '0',
  `5_14th` int(4) NOT NULL DEFAULT '0',
  `15_24th` int(4) NOT NULL DEFAULT '0',
  `25_44th` int(4) NOT NULL DEFAULT '0',
  `45_64th` int(4) NOT NULL DEFAULT '0',
  `65th` int(4) NOT NULL DEFAULT '0',
  `laki` int(4) NOT NULL DEFAULT '0',
  `perempuan` int(4) NOT NULL DEFAULT '0',
  `hidup` int(4) NOT NULL DEFAULT '0',
  `mati` int(4) NOT NULL DEFAULT '0',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `bl` int(1) NOT NULL DEFAULT '0',
  `poli_inap` int(1) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_mr_bl` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `0_6hr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rla`)
) ENGINE=MyISAM AUTO_INCREMENT=8800 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_rla_tmp` */

DROP TABLE IF EXISTS `mr_rla_tmp`;

CREATE TABLE `mr_rla_tmp` (
  `id_rla_tmp` int(10) NOT NULL AUTO_INCREMENT,
  `icd` char(10) NOT NULL DEFAULT '0',
  `0_6hrlk` int(4) DEFAULT NULL,
  `7_28hrlk` int(4) NOT NULL DEFAULT '0',
  `28_1thlk` int(4) NOT NULL DEFAULT '0',
  `1_4thlk` int(4) NOT NULL DEFAULT '0',
  `5_14thlk` int(4) NOT NULL DEFAULT '0',
  `15_24thlk` int(4) NOT NULL DEFAULT '0',
  `25_44thlk` int(4) NOT NULL DEFAULT '0',
  `45_64thlk` int(4) NOT NULL DEFAULT '0',
  `65thlk` int(4) NOT NULL DEFAULT '0',
  `laki` int(4) NOT NULL DEFAULT '0',
  `perempuan` int(4) NOT NULL DEFAULT '0',
  `hiduplk` int(4) NOT NULL DEFAULT '0',
  `matilk` int(4) NOT NULL DEFAULT '0',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bl` int(1) NOT NULL DEFAULT '0',
  `poli_inap` int(1) NOT NULL DEFAULT '0',
  `0_6hrpr` int(11) DEFAULT NULL,
  `7_28hrpr` int(11) DEFAULT NULL,
  `28_1thpr` int(11) DEFAULT NULL,
  `1_4thpr` int(11) DEFAULT NULL,
  `5_14thpr` int(11) DEFAULT NULL,
  `15_24thpr` int(11) DEFAULT NULL,
  `25_44thpr` int(11) DEFAULT NULL,
  `45_64thpr` int(11) DEFAULT NULL,
  `65thpr` int(11) DEFAULT NULL,
  `kode_rs` char(10) DEFAULT NULL,
  `hiduppr` int(11) DEFAULT NULL,
  `matipr` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rla_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_rlax` */

DROP TABLE IF EXISTS `mr_rlax`;

CREATE TABLE `mr_rlax` (
  `id_rla` int(10) NOT NULL AUTO_INCREMENT,
  `icd` char(10) NOT NULL DEFAULT '0',
  `0_28hr` int(4) NOT NULL DEFAULT '0',
  `28_1th` int(4) NOT NULL DEFAULT '0',
  `1_4th` int(4) NOT NULL DEFAULT '0',
  `5_14th` int(4) NOT NULL DEFAULT '0',
  `15_24th` int(4) NOT NULL DEFAULT '0',
  `25_44th` int(4) NOT NULL DEFAULT '0',
  `45_64th` int(4) NOT NULL DEFAULT '0',
  `65th` int(4) NOT NULL DEFAULT '0',
  `laki` int(4) NOT NULL DEFAULT '0',
  `perempuan` int(4) NOT NULL DEFAULT '0',
  `hidup` int(4) NOT NULL DEFAULT '0',
  `mati` int(4) NOT NULL DEFAULT '0',
  `id_catatan_medik` int(8) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bl` int(1) NOT NULL DEFAULT '0',
  `poli_inap` int(1) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_mr_bl` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rla`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mr_sensus_ranap` */

DROP TABLE IF EXISTS `mr_sensus_ranap`;

CREATE TABLE `mr_sensus_ranap` (
  `id_sensus_ranap` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `awal_v` int(11) DEFAULT NULL,
  `awal_1` int(11) DEFAULT NULL,
  `masuk_v` int(11) DEFAULT NULL,
  `pindahan_v` int(11) DEFAULT NULL,
  `di_pindahkan_v` int(11) DEFAULT NULL,
  `keluar_hidup_v` int(11) DEFAULT NULL,
  `aps_v` int(11) DEFAULT NULL,
  `di_rujuk_v` int(11) DEFAULT NULL,
  `mati_krng48_v` int(11) DEFAULT NULL,
  `mati_lbh48_v` int(11) DEFAULT NULL,
  `lama_v` int(11) DEFAULT NULL,
  `keluar_masuk_v` int(11) DEFAULT NULL,
  `hari_perawatan_v` int(11) DEFAULT NULL,
  `validasi` char(1) DEFAULT NULL,
  `id_petugas` char(10) DEFAULT NULL,
  `tgl_entri` date DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_entri` char(8) DEFAULT NULL,
  `awal_2` int(11) DEFAULT NULL,
  `awal_3` int(11) DEFAULT NULL,
  `masuk_1` int(11) DEFAULT NULL,
  `masuk_2` int(11) DEFAULT NULL,
  `masuk_3` int(11) DEFAULT NULL,
  `pindahan_1` int(11) DEFAULT NULL,
  `pindahan_2` int(11) DEFAULT NULL,
  `pindahan_3` int(11) DEFAULT NULL,
  `di_pindahkan_1` int(11) DEFAULT NULL,
  `di_pindahkan_2` int(11) DEFAULT NULL,
  `di_pindahkan_3` int(11) DEFAULT NULL,
  `keluar_hidup_1` int(11) DEFAULT NULL,
  `keluar_hidup_2` int(11) DEFAULT NULL,
  `keluar_hidup_3` int(11) DEFAULT NULL,
  `aps_1` int(11) DEFAULT NULL,
  `aps_2` int(11) DEFAULT NULL,
  `aps_3` int(11) DEFAULT NULL,
  `di_rujuk_1` int(11) DEFAULT NULL,
  `di_rujuk_2` int(11) DEFAULT NULL,
  `di_rujuk_3` int(11) DEFAULT NULL,
  `mati_krng48_1` int(11) DEFAULT NULL,
  `mati_krng48_2` int(11) DEFAULT NULL,
  `mati_krng48_3` int(11) DEFAULT NULL,
  `mati_lbh48_1` int(11) DEFAULT NULL,
  `mati_lbh48_2` int(11) DEFAULT NULL,
  `mati_lbh48_3` int(11) DEFAULT NULL,
  `lama_1` int(11) DEFAULT NULL,
  `lama_2` int(11) DEFAULT NULL,
  `lama_3` int(11) DEFAULT NULL,
  `keluar_masuk_1` int(11) DEFAULT NULL,
  `keluar_masuk_2` int(11) DEFAULT NULL,
  `keluar_masuk_3` int(11) DEFAULT NULL,
  `hari_perawatan_1` int(11) DEFAULT NULL,
  `hari_perawatan_2` int(11) DEFAULT NULL,
  `hari_perawatan_3` int(11) DEFAULT NULL,
  `tt_v` int(2) DEFAULT NULL,
  `tt_1` int(2) DEFAULT NULL,
  `tt_2` int(2) DEFAULT NULL,
  `tt_3` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_sensus_ranap`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_sex` */

DROP TABLE IF EXISTS `mr_sex`;

CREATE TABLE `mr_sex` (
  `id_sex` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sex` char(10) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_sex`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_shift` */

DROP TABLE IF EXISTS `mr_shift`;

CREATE TABLE `mr_shift` (
  `id_mr_shift` int(11) NOT NULL AUTO_INCREMENT,
  `nama_shift` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_mr_shift`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_sjr` */

DROP TABLE IF EXISTS `mr_sjr`;

CREATE TABLE `mr_sjr` (
  `id_sjr` int(11) NOT NULL AUTO_INCREMENT,
  `no_sjr` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_register` int(8) NOT NULL,
  `id_pengirim` int(8) NOT NULL,
  `diagnosa` char(200) NOT NULL,
  `id_catatan_medik` int(8) NOT NULL,
  `tgl_pulang` date NOT NULL DEFAULT '2014-01-01',
  `id_kondisi` int(8) NOT NULL,
  `ket_periksa` char(255) NOT NULL,
  `ket_diagnosa` char(255) NOT NULL,
  `ket_obat` char(255) NOT NULL,
  `ket_anjuran` char(255) NOT NULL,
  `id_dokter` int(8) NOT NULL,
  `umur_th` int(11) NOT NULL,
  `umur_bln` int(11) NOT NULL,
  `umur_hr` int(11) NOT NULL,
  PRIMARY KEY (`id_sjr`)
) ENGINE=MyISAM AUTO_INCREMENT=14471 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_tmp` */

DROP TABLE IF EXISTS `mr_tmp`;

CREATE TABLE `mr_tmp` (
  `no_cm` int(8) DEFAULT NULL,
  `no_reg` int(8) DEFAULT NULL,
  `nama` char(60) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=489 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_tt` */

DROP TABLE IF EXISTS `mr_tt`;

CREATE TABLE `mr_tt` (
  `id_mr_tt` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` char(5) DEFAULT NULL,
  `no_bed` char(3) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `rencana_pulang` char(70) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `ket_antri` int(1) DEFAULT NULL,
  `vk` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_mr_tt`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_unit` */

DROP TABLE IF EXISTS `mr_unit`;

CREATE TABLE `mr_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` char(30) NOT NULL DEFAULT '-',
  `kelompok` int(11) NOT NULL DEFAULT '0' COMMENT '1=POLI,2=inap,3penunjang',
  `tempat_tidur` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `satu` int(11) NOT NULL,
  `dua` int(11) NOT NULL,
  `tiga` int(11) NOT NULL,
  `aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_unit_copy` */

DROP TABLE IF EXISTS `mr_unit_copy`;

CREATE TABLE `mr_unit_copy` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` char(30) NOT NULL DEFAULT '-',
  `kelompok` int(11) NOT NULL DEFAULT '0' COMMENT '1=POLI,2=inap,3penunjang',
  `tempat_tidur` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `satu` int(11) NOT NULL,
  `dua` int(11) NOT NULL,
  `tiga` int(11) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_unitx` */

DROP TABLE IF EXISTS `mr_unitx`;

CREATE TABLE `mr_unitx` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` char(30) NOT NULL DEFAULT '-',
  `kelompok` int(11) NOT NULL DEFAULT '0' COMMENT '1=POLI,2=inap,3penunjang',
  `tempat_tidur` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `satu` int(11) NOT NULL,
  `dua` int(11) NOT NULL,
  `tiga` int(11) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Table structure for table `mr_var_tmp` */

DROP TABLE IF EXISTS `mr_var_tmp`;

CREATE TABLE `mr_var_tmp` (
  `id_mr_var_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `mr_var_tmp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mr_var_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Table structure for table `mst_unit` */

DROP TABLE IF EXISTS `mst_unit`;

CREATE TABLE `mst_unit` (
  `id_mst_unit` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trn_unit` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `biaya` int(11) NOT NULL DEFAULT '0',
  `lunas` int(11) NOT NULL DEFAULT '0' COMMENT '1=lunas, 2 belum',
  PRIMARY KEY (`id_mst_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `pasien_tmp` */

DROP TABLE IF EXISTS `pasien_tmp`;

CREATE TABLE `pasien_tmp` (
  `no_rm` char(8) DEFAULT NULL,
  `nm_pas` char(80) DEFAULT NULL,
  `no_id` char(8) DEFAULT NULL,
  `alamat` char(80) DEFAULT NULL,
  `kel` char(30) DEFAULT NULL,
  `kec` char(30) DEFAULT NULL,
  `kab` char(30) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `jenis` char(1) DEFAULT NULL,
  `tp_lahir` char(20) DEFAULT NULL,
  `tg_lahir` char(10) DEFAULT NULL,
  `no_urut` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no_urut`)
) ENGINE=InnoDB AUTO_INCREMENT=78021 DEFAULT CHARSET=latin1;

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `profesi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `no_str` varchar(100) NOT NULL,
  `tanggal_str` date NOT NULL,
  `no_sip` varchar(100) NOT NULL,
  `tanggal_sip` date NOT NULL,
  `status_kepegawaian` varchar(10) NOT NULL,
  `status_bekerja` varchar(10) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_aplikasi` */

DROP TABLE IF EXISTS `psdi_aplikasi`;

CREATE TABLE `psdi_aplikasi` (
  `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` char(40) NOT NULL,
  PRIMARY KEY (`id_aplikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_jabatan` */

DROP TABLE IF EXISTS `psdi_jabatan`;

CREATE TABLE `psdi_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` char(40) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_lap_pegawai` */

DROP TABLE IF EXISTS `psdi_lap_pegawai`;

CREATE TABLE `psdi_lap_pegawai` (
  `id_lap_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` char(50) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lap_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_md5` */

DROP TABLE IF EXISTS `psdi_md5`;

CREATE TABLE `psdi_md5` (
  `id_md5` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`id_md5`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_petugas` */

DROP TABLE IF EXISTS `psdi_petugas`;

CREATE TABLE `psdi_petugas` (
  `nama` char(60) NOT NULL DEFAULT '-',
  `tempat` char(30) NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT '2014-01-01',
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nomor_str` char(50) NOT NULL,
  `nomor_sip` char(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `fungsional` char(40) NOT NULL,
  `profesi` char(40) NOT NULL,
  `pendidikan_terakhir` char(40) NOT NULL,
  `jurusan` char(40) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` char(20) NOT NULL,
  `password` char(60) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_aplikasi` int(11) NOT NULL,
  `alamat` char(50) NOT NULL,
  `hapus` int(1) DEFAULT NULL,
  `gudang` int(1) DEFAULT NULL,
  `laporan` int(1) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `nik` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `id_aplikasi` (`id_aplikasi`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_petugas_copy` */

DROP TABLE IF EXISTS `psdi_petugas_copy`;

CREATE TABLE `psdi_petugas_copy` (
  `nama` char(60) NOT NULL DEFAULT '-',
  `tempat` char(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nomor_str` char(50) NOT NULL,
  `nomor_sip` char(50) NOT NULL,
  `jabatan` char(40) NOT NULL,
  `fungsional` char(40) NOT NULL,
  `profesi` char(40) NOT NULL,
  `pendidikan_terakhir` char(40) NOT NULL,
  `jurusan` char(40) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` char(20) NOT NULL,
  `password` char(60) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_aplikasi` int(11) NOT NULL,
  `alamat` char(50) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_petugas_copyx` */

DROP TABLE IF EXISTS `psdi_petugas_copyx`;

CREATE TABLE `psdi_petugas_copyx` (
  `nama` char(60) NOT NULL DEFAULT '-',
  `tempat` char(30) NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT '2014-01-01',
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nomor_str` char(50) NOT NULL,
  `nomor_sip` char(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `fungsional` char(40) NOT NULL,
  `profesi` char(40) NOT NULL,
  `pendidikan_terakhir` char(40) NOT NULL,
  `jurusan` char(40) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` char(20) NOT NULL,
  `password` char(60) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_aplikasi` int(11) NOT NULL,
  `alamat` char(50) NOT NULL,
  `hapus` int(1) DEFAULT NULL,
  `gudang` int(1) DEFAULT NULL,
  `laporan` int(1) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `nik` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `id_aplikasi` (`id_aplikasi`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_petugasx` */

DROP TABLE IF EXISTS `psdi_petugasx`;

CREATE TABLE `psdi_petugasx` (
  `nama` char(60) NOT NULL DEFAULT '-',
  `tempat` char(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sex` char(1) NOT NULL,
  `status` char(2) NOT NULL,
  `nomor_str` char(50) NOT NULL,
  `nomor_sip` char(50) NOT NULL,
  `jabatan` char(40) NOT NULL,
  `fungsional` char(40) NOT NULL,
  `profesi` char(40) NOT NULL,
  `pendidikan_terakhir` char(40) NOT NULL,
  `jurusan` char(40) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_petugas`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_riw_aplikasi` */

DROP TABLE IF EXISTS `psdi_riw_aplikasi`;

CREATE TABLE `psdi_riw_aplikasi` (
  `id_riw_aplikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) DEFAULT NULL,
  `id_aplikasi` int(11) DEFAULT NULL,
  `transaksi` int(1) DEFAULT NULL COMMENT '1= ya, 2 = tidak',
  `data` int(1) DEFAULT NULL COMMENT '1 = ya, 2 tidak',
  `laporan` int(1) DEFAULT NULL,
  `hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_riw_aplikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_rs` */

DROP TABLE IF EXISTS `psdi_rs`;

CREATE TABLE `psdi_rs` (
  `id_rs` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rs` int(11) NOT NULL DEFAULT '0',
  `nama_rs` char(60) NOT NULL DEFAULT '-',
  `alamat_rs` char(100) NOT NULL DEFAULT '-',
  `telp_rs` char(30) NOT NULL DEFAULT '0',
  `email_rs` char(30) DEFAULT NULL,
  `fax_rs` char(30) NOT NULL,
  `kabupaten_rs` char(40) DEFAULT NULL,
  `server_php` char(100) DEFAULT NULL,
  `alamat_nota` char(100) DEFAULT NULL,
  `set_logo` char(100) DEFAULT NULL,
  PRIMARY KEY (`id_rs`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_rs_copy` */

DROP TABLE IF EXISTS `psdi_rs_copy`;

CREATE TABLE `psdi_rs_copy` (
  `id_rs` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rs` int(11) NOT NULL DEFAULT '0',
  `nama_rs` char(60) NOT NULL DEFAULT '-',
  `alamat_rs` char(100) NOT NULL DEFAULT '-',
  `telp_rs` char(30) NOT NULL DEFAULT '0',
  `email_rs` char(30) NOT NULL,
  `fax_rs` char(30) NOT NULL,
  `kabupaten_rs` char(40) DEFAULT NULL,
  PRIMARY KEY (`id_rs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `psdi_status_petugas` */

DROP TABLE IF EXISTS `psdi_status_petugas`;

CREATE TABLE `psdi_status_petugas` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` char(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `rapidtest` */

DROP TABLE IF EXISTS `rapidtest`;

CREATE TABLE `rapidtest` (
  `id_rapidtest` int(100) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sex` int(1) NOT NULL COMMENT '1. Laki-laki, 2. Perempuan',
  `id_dokter` int(11) NOT NULL,
  `id_unit` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(8) NOT NULL,
  `sampel` varchar(20) NOT NULL,
  `pemeriksaan` varchar(50) NOT NULL,
  `igm` int(1) NOT NULL COMMENT '0. Non-Reaktif, 1. Reaktif',
  `nilai_rujukan` int(1) NOT NULL COMMENT '	0. Non-Reaktif, 1. Reaktif	',
  `metode` varchar(20) NOT NULL COMMENT '1. ICT',
  `pemeriksa` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `jam_periksa` varchar(8) NOT NULL,
  `igg` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_rapidtest`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ro_cetak_trn` */

DROP TABLE IF EXISTS `ro_cetak_trn`;

CREATE TABLE `ro_cetak_trn` (
  `id ro_cetak_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_no_trn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `nama_petugas` char(60) DEFAULT NULL,
  PRIMARY KEY (`id ro_cetak_trn`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_det_trn` */

DROP TABLE IF EXISTS `ro_det_trn`;

CREATE TABLE `ro_det_trn` (
  `id_ro_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `id_ro_trn` int(11) NOT NULL DEFAULT '0',
  `id_ro_tarif` int(11) NOT NULL DEFAULT '0',
  `hasil` text NOT NULL,
  `bhp` int(11) NOT NULL,
  `alat` int(11) NOT NULL,
  `amplop` int(11) NOT NULL,
  `jasa_petugas` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `manajemen` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `kesan` text NOT NULL,
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `hepar` text,
  `lien` text,
  `ren` text,
  `vf` text,
  `pankreas` text,
  `vu` text,
  `kesan_usg` text,
  `rujukan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ro_det_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_ro_trn` (`id_ro_trn`),
  KEY `id_ro_tarif` (`id_ro_tarif`),
  KEY `id_unit` (`id_unit`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `ro_det_trn_copy` */

DROP TABLE IF EXISTS `ro_det_trn_copy`;

CREATE TABLE `ro_det_trn_copy` (
  `id_ro_det_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `id_ro_trn` int(11) NOT NULL DEFAULT '0',
  `id_ro_tarif` int(11) NOT NULL DEFAULT '0',
  `hasil` text NOT NULL,
  `bhp` int(11) NOT NULL,
  `alat` int(11) NOT NULL,
  `amplop` int(11) NOT NULL,
  `jasa_petugas` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `manajemen` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `kesan` text NOT NULL,
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `hepar` text,
  `lien` text,
  `ren` text,
  `vf` text,
  `pankreas` text,
  `vu` text,
  `kesan_usg` text,
  PRIMARY KEY (`id_ro_det_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_ro_trn` (`id_ro_trn`),
  KEY `id_ro_tarif` (`id_ro_tarif`),
  KEY `id_unit` (`id_unit`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=MyISAM AUTO_INCREMENT=4210 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_kelompok` */

DROP TABLE IF EXISTS `ro_kelompok`;

CREATE TABLE `ro_kelompok` (
  `ro_kelompok` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelompok` char(30) NOT NULL,
  PRIMARY KEY (`ro_kelompok`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_lap_kunj_poli_inap` */

DROP TABLE IF EXISTS `ro_lap_kunj_poli_inap`;

CREATE TABLE `ro_lap_kunj_poli_inap` (
  `id_ro_lap_kunj_poli_inap` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `alamat` char(70) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `nama_unit` char(30) DEFAULT NULL,
  `nama_asuransi` char(30) DEFAULT NULL,
  `nama_dokter` char(50) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ro_lap_kunj_poli_inap`)
) ENGINE=MyISAM AUTO_INCREMENT=5406 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_lap_pendapatan` */

DROP TABLE IF EXISTS `ro_lap_pendapatan`;

CREATE TABLE `ro_lap_pendapatan` (
  `id_ro_lap_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(3) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `id_catatan_medik` int(8) DEFAULT NULL,
  `id_register` int(8) DEFAULT NULL,
  `id_ro_trn` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `alat` int(11) DEFAULT NULL,
  `bhp` int(11) DEFAULT NULL,
  `amplop` int(11) DEFAULT NULL,
  `jasa_petugas` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `manajemen` int(11) DEFAULT NULL,
  `bhp1` int(11) DEFAULT NULL,
  `pengirim` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `jam` char(8) DEFAULT NULL,
  `iol` int(1) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `nama_pasien` char(60) DEFAULT NULL,
  `alat1` int(11) DEFAULT NULL,
  `amplop1` int(11) DEFAULT NULL,
  `nama_asuransi` char(50) DEFAULT NULL,
  `jasa_petugas1` int(11) DEFAULT NULL,
  `operator1` int(11) DEFAULT NULL,
  `manajemen1` int(11) DEFAULT NULL,
  `pengirim1` int(11) DEFAULT NULL,
  `sisa1` int(11) DEFAULT NULL,
  `biaya1` int(11) DEFAULT NULL,
  `nama_dokter` char(70) DEFAULT NULL,
  `qty1` int(11) DEFAULT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `rujukan1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ro_lap_pendapatan`)
) ENGINE=MyISAM AUTO_INCREMENT=3833 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_lap_tmp` */

DROP TABLE IF EXISTS `ro_lap_tmp`;

CREATE TABLE `ro_lap_tmp` (
  `id_lap_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `id_petugas` int(10) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `iol` int(11) DEFAULT NULL,
  `kode_rujukan` char(3) DEFAULT NULL,
  PRIMARY KEY (`id_lap_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_rujuk` */

DROP TABLE IF EXISTS `ro_rujuk`;

CREATE TABLE `ro_rujuk` (
  `id_ro_rujuk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rujukan` char(50) NOT NULL,
  PRIMARY KEY (`id_ro_rujuk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_tarif` */

DROP TABLE IF EXISTS `ro_tarif`;

CREATE TABLE `ro_tarif` (
  `id_ro_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(60) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL DEFAULT '0',
  `bhp` int(11) NOT NULL DEFAULT '0',
  `alat` int(11) NOT NULL DEFAULT '0',
  `amplop` int(11) NOT NULL DEFAULT '0',
  `jasa_petugas` int(11) NOT NULL DEFAULT '0',
  `operator` int(11) NOT NULL DEFAULT '0',
  `manajemen` int(11) NOT NULL DEFAULT '0',
  `pengirim` int(11) NOT NULL DEFAULT '0',
  `sisa` int(11) NOT NULL DEFAULT '0',
  `tarif` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `radiologi` int(3) DEFAULT '0',
  `rujukan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ro_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_tarif_copy` */

DROP TABLE IF EXISTS `ro_tarif_copy`;

CREATE TABLE `ro_tarif_copy` (
  `id_ro_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(60) NOT NULL DEFAULT '-',
  `kel` int(3) NOT NULL DEFAULT '0',
  `bhp` int(11) NOT NULL DEFAULT '0',
  `alat` int(11) NOT NULL DEFAULT '0',
  `amplop` int(11) NOT NULL DEFAULT '0',
  `jasa_petugas` int(11) NOT NULL DEFAULT '0',
  `operator` int(11) NOT NULL DEFAULT '0',
  `manajemen` int(11) NOT NULL DEFAULT '0',
  `pengirim` int(11) NOT NULL DEFAULT '0',
  `sisa` int(11) NOT NULL DEFAULT '0',
  `tarif` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL DEFAULT '2014-01-01',
  `radiologi` int(3) DEFAULT '0',
  PRIMARY KEY (`id_ro_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Table structure for table `ro_trn` */

DROP TABLE IF EXISTS `ro_trn`;

CREATE TABLE `ro_trn` (
  `id_ro_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `kelas` char(5) NOT NULL DEFAULT '-',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_asuransi` int(11) NOT NULL DEFAULT '0',
  `biaya` int(11) NOT NULL DEFAULT '0',
  `lunas` int(1) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `id_rujuk` int(11) NOT NULL,
  `umur_th` int(11) NOT NULL,
  `umur_bln` int(11) NOT NULL,
  `umur_hr` int(11) NOT NULL,
  `icd` char(10) NOT NULL,
  `iol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ro_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_unit` (`id_unit`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_rujuk` (`id_rujuk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `ro_trn_copy` */

DROP TABLE IF EXISTS `ro_trn_copy`;

CREATE TABLE `ro_trn_copy` (
  `id_ro_trn` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(11) NOT NULL DEFAULT '0',
  `id_register` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `jam` char(8) NOT NULL DEFAULT '00:00:00',
  `kelas` char(1) NOT NULL DEFAULT '-',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_asuransi` int(11) NOT NULL DEFAULT '0',
  `biaya` int(11) NOT NULL DEFAULT '0',
  `lunas` int(1) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  `id_dokter` int(11) NOT NULL DEFAULT '0',
  `id_pengirim` int(11) NOT NULL DEFAULT '0',
  `id_rujuk` int(11) NOT NULL,
  `umur_th` int(11) NOT NULL,
  `umur_bln` int(11) NOT NULL,
  `umur_hr` int(11) NOT NULL,
  `icd` char(10) NOT NULL,
  `iol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ro_trn`),
  KEY `id_catatan_medik` (`id_catatan_medik`),
  KEY `id_register` (`id_register`),
  KEY `id_unit` (`id_unit`),
  KEY `id_asuransi` (`id_asuransi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_rujuk` (`id_rujuk`)
) ENGINE=MyISAM AUTO_INCREMENT=4105 DEFAULT CHARSET=latin1;

/*Table structure for table `sep_tmp` */

DROP TABLE IF EXISTS `sep_tmp`;

CREATE TABLE `sep_tmp` (
  `id_septmp` int(11) NOT NULL AUTO_INCREMENT,
  `no_kpsta` char(20) DEFAULT NULL,
  `no_sep` char(20) DEFAULT NULL,
  `id_register` int(11) DEFAULT NULL,
  `id_catatan_medik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_septmp`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Table structure for table `sesi` */

DROP TABLE IF EXISTS `sesi`;

CREATE TABLE `sesi` (
  `id_sesi` int(1) NOT NULL,
  `nama_sesi` varchar(5) NOT NULL,
  PRIMARY KEY (`id_sesi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `surat_eksternal` */

DROP TABLE IF EXISTS `surat_eksternal`;

CREATE TABLE `surat_eksternal` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `nomor_surat` (`nomor_surat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `surat_internal` */

DROP TABLE IF EXISTS `surat_internal`;

CREATE TABLE `surat_internal` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `nomor_surat` (`nomor_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `surat_masuk` */

DROP TABLE IF EXISTS `surat_masuk`;

CREATE TABLE `surat_masuk` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `nomor_surat` (`nomor_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `tumbang` */

DROP TABLE IF EXISTS `tumbang`;

CREATE TABLE `tumbang` (
  `id_tumbang` int(100) NOT NULL AUTO_INCREMENT,
  `id_catatan_medik` int(8) NOT NULL,
  `id_petugas` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `jadwal` date NOT NULL,
  `id_sesi` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(8) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=Belum Datang, 1=Datang',
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tumbang`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `v_far_faktur_total_poli` */

DROP TABLE IF EXISTS `v_far_faktur_total_poli`;

CREATE TABLE `v_far_faktur_total_poli` (
  `id_no_sp` int(11) NOT NULL DEFAULT '0',
  `grand_total` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `waktu` */

DROP TABLE IF EXISTS `waktu`;

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `tanggal` char(10) NOT NULL,
  `jam` char(8) NOT NULL,
  `tanggal_date` date NOT NULL,
  `jam_time` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_sensus` date DEFAULT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
