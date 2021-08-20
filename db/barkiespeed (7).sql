-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 06:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barkiespeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT 0,
  `barang_min_stok` int(11) DEFAULT 0,
  `barang_tgl_input` timestamp NULL DEFAULT current_timestamp(),
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL,
  `kode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`, `kode`) VALUES
('BR000001', 'Oli Shel Helix 7 5-40W', 'paket', 375000, 475000, 475000, 0, 1, '2021-06-24 15:13:14', '2021-08-19 22:06:13', 7, 5, 'BR'),
('BR000002', 'Oli Shel Helix 6 10-40W', 'paket', 350000, 475000, 475000, 0, 1, '2021-06-24 15:14:10', '2021-08-19 22:06:20', 7, 5, 'BR'),
('BR000003', 'Oli Shel Helix 5 15-40W', 'paket', 320000, 475000, 475000, 0, 1, '2021-06-24 15:14:44', '2021-08-19 22:06:28', 7, 5, 'BR'),
('BR000004', 'Oli Mobile 10-40W', 'paket', 375000, 425000, 425000, 0, 1, '2021-06-24 15:15:30', '2021-08-19 15:35:25', 7, 5, 'BR'),
('BR000005', 'Oli PrimaXp 15-40W', 'paket', 350000, 475000, 475000, 0, 1, '2021-06-25 15:09:31', '2021-08-19 22:06:36', 7, 5, 'BR'),
('BR000006', 'Oli Mobile 10w 40', 'paket', 450000, 475000, 475000, 0, 1, '2021-08-19 08:36:38', '2021-08-19 22:06:46', 7, 5, 'BR'),
('BR000007', 'Oli adnoct', '4 L', 450000, 0, 475000, 0, 1, '2021-08-19 14:12:05', NULL, 7, 5, 'BR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli`
--

INSERT INTO `tbl_beli` (`beli_nofak`, `beli_tanggal`, `beli_suplier_id`, `beli_user_id`, `beli_kode`) VALUES
('19082100009', '2021-08-19', 15, 5, 'A190821000001'),
('02', '2021-08-19', 16, 5, 'A190821000002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_beli`
--

INSERT INTO `tbl_detail_beli` (`d_beli_id`, `d_beli_nofak`, `d_beli_barang_id`, `d_beli_harga`, `d_beli_jumlah`, `d_beli_total`, `d_beli_kode`) VALUES
(68, '19082100009', 'BR000001', 375000, 3, 1125000, 'A190821000001'),
(69, '19082100009', 'BR000002', 350000, 3, 1050000, 'A190821000001'),
(70, '19082100009', 'BR000003', 320000, 3, 960000, 'A190821000001'),
(71, '02', 'BR000004', 375000, 3, 1125000, 'A190821000002'),
(72, '02', 'BR000005', 350000, 3, 1050000, 'A190821000002'),
(73, '02', 'BR000006', 450000, 3, 1350000, 'A190821000002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL,
  `keterangan` varchar(12) NOT NULL,
  `proses` varchar(12) NOT NULL,
  `jual_user_id` int(2) NOT NULL,
  `kode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`, `keterangan`, `proses`, `jual_user_id`, `kode`) VALUES
(219, '19082100001', 'BR000001', 'Oli Shel Helix 7 5-40W', 'paket', 375000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(220, '19082100001', 'BR000003', 'Oli Shel Helix 5 15-40W', 'paket', 320000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(221, '19082100002', 'BR000006', 'Oli Mobile 10w 40', 'paket', 450000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(222, '19082100002', 'BR000004', 'Oli Mobile 10-40W', 'paket', 375000, 425000, 1, 0, 425000, '', '', 0, 'BR'),
(223, '190821000002', 'BR000001', 'Oli Shel Helix 7 5-40W', 'paket', 375000, 475000, 1, 0, 475000, 'Sudah Dganti', 'selesai', 4, 'BR'),
(224, '190821000002', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(225, '190821000002', 'JS000003', 'Service Rem', NULL, 0, 200000, 2, 0, 400000, 'Kampas masih', 'selesai', 4, ''),
(226, '190821000003', 'BR000001', 'Oli Shel Helix 7 5-40W', 'paket', 375000, 475000, 1, 0, 475000, 'Sudah Di Gan', 'selesai', 4, 'BR'),
(227, '190821000003', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(228, '190821000004', 'BR000006', 'Oli Mobile 10w 40', 'paket', 450000, 475000, 1, 0, 475000, 'Sudah ', 'selesai', 4, 'BR'),
(229, '190821000004', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(230, '190821000004', 'JS000001', 'Tune-UP', NULL, 0, 300000, 2, 0, 600000, 'Tune Up karb', 'selesai', 4, ''),
(231, '190821000005', 'BR000006', 'Oli Mobile 10w 40', 'paket', 450000, 475000, 1, 0, 475000, 'Sudah', 'selesai', 4, 'BR'),
(232, '190821000005', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(233, '190821000005', 'JS000001', 'Tune-UP', NULL, 0, 300000, 2, 0, 600000, 'Berea', 'selesai', 4, ''),
(234, '190821000006', 'BR000004', 'Oli Mobile 10-40W', 'paket', 375000, 425000, 1, 0, 425000, 'A', 'selesai', 4, 'BR'),
(235, '190821000006', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(236, '190821000006', 'JS000002', 'Service Kaki-Kaki', NULL, 0, 100000, 2, 0, 200000, 'BERES', 'selesai', 4, ''),
(237, '19082100007', 'BR000004', 'Oli Mobile 10-40W', 'paket', 375000, 425000, 1, 0, 425000, '', '', 0, 'BR'),
(238, '190821000007', 'BR000003', 'Oli Shel Helix 5 15-40W', 'paket', 320000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(239, '190821000007', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(240, '190821000007', 'JS000006', 'Ganti Lampu', NULL, 0, 10000, 2, 0, 20000, '', '', 0, ''),
(241, '190821000007', 'JS000001', 'Tune-UP', NULL, 0, 300000, 3, 0, 900000, '', '', 0, ''),
(242, '190821000008', 'BR000003', 'Oli Shel Helix 5 15-40W', 'paket', 320000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(243, '190821000008', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(244, '190821000009', 'BR000002', 'Oli Shel Helix 6 10-40W', 'paket', 350000, 475000, 1, 0, 475000, '', '', 0, 'BR'),
(245, '190821000009', 'JS000004', 'Ganti Oli', NULL, 0, 25000, 1, 0, 25000, '', '', 0, ''),
(246, '19082100008', 'BR000002', 'Oli Shel Helix 6 10-40W', 'paket', 350000, 475000, 2, 0, 950000, '', '', 0, 'BR'),
(247, '19082100008', 'BR000005', 'Oli PrimaXp 15-40W', 'paket', 350000, 475000, 3, 0, 1425000, '', '', 0, 'BR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL,
  `ket` varchar(50) NOT NULL,
  `id_customer` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`, `ket`, `id_customer`) VALUES
('190821000002', '2021-08-19 15:15:20', 900000, 900000, 0, 5, 'grosir', '', ''),
('190821000003', '2021-08-19 15:22:59', 500000, 500000, 0, 5, 'grosir', '', ''),
('190821000004', '2021-08-19 15:24:22', 1100000, 1100000, 0, 5, 'grosir', '', ''),
('190821000005', '2021-08-19 15:25:12', 1100000, 1100000, 0, 5, 'grosir', '', ''),
('190821000006', '2021-08-19 15:26:17', 650000, 650000, 0, 5, 'grosir', '', ''),
('190821000007', '2021-08-19 15:50:48', 1420000, 1420000, 0, 5, 'grosir', '', ''),
('190821000008', '2021-08-19 15:51:02', 500000, 500000, 0, 5, 'grosir', '', ''),
('190821000009', '2021-08-19 15:51:15', 500000, 500000, 0, 5, 'grosir', '', ''),
('19082100001', '2021-08-19 15:09:12', 950000, 950000, 0, 5, 'grosir', '', ''),
('19082100002', '2021-08-19 15:09:49', 900000, 900000, 0, 5, 'grosir', '', ''),
('19082100007', '2021-08-19 15:28:22', 425000, 425000, 0, 5, 'grosir', '', ''),
('19082100008', '2021-08-19 15:49:13', 2375000, 2375000, 0, 5, 'grosir', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Over hould'),
(7, 'Pelumas'),
(9, 'Kabel Body'),
(13, 'Kelistrikan'),
(14, 'Tune-Up');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`satuan_id`, `satuan_nama`) VALUES
(1, 'Liter'),
(2, 'Galon'),
(3, 'Dus'),
(4, 'satuan'),
(6, '1 L'),
(7, '4 L'),
(8, 'paket');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` varchar(15) NOT NULL,
  `service_nama` varchar(150) DEFAULT NULL,
  `service_satuan` varchar(30) DEFAULT NULL,
  `service_harpok` double DEFAULT NULL,
  `service_harjul` double DEFAULT NULL,
  `service_harjul_grosir` double DEFAULT NULL,
  `service_stok` int(11) DEFAULT 0,
  `service_min_stok` int(11) DEFAULT 0,
  `service_tgl_input` timestamp NULL DEFAULT current_timestamp(),
  `service_tgl_last_update` datetime DEFAULT NULL,
  `service_kategori_id` int(11) DEFAULT NULL,
  `service_user_id` int(11) DEFAULT NULL,
  `kode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_nama`, `service_satuan`, `service_harpok`, `service_harjul`, `service_harjul_grosir`, `service_stok`, `service_min_stok`, `service_tgl_input`, `service_tgl_last_update`, `service_kategori_id`, `service_user_id`, `kode`) VALUES
('JS000001', 'Tune-UP', NULL, 0, NULL, 300000, 0, 0, '2021-06-24 16:57:17', NULL, NULL, 1, ''),
('JS000002', 'Service Kaki-Kaki', NULL, 0, NULL, 100000, 0, 0, '2021-06-24 16:57:33', NULL, NULL, 1, ''),
('JS000003', 'Service Rem', NULL, 0, NULL, 200000, 0, 0, '2021-06-24 16:57:54', NULL, NULL, 1, ''),
('JS000004', 'Ganti Oli', NULL, 0, NULL, 25000, 0, 0, '2021-06-25 15:10:41', NULL, NULL, 1, ''),
('JS000005', 'Lampu kaki 2', NULL, 0, NULL, 10000, 0, 0, '2021-06-27 05:31:38', NULL, NULL, 1, ''),
('JS000006', 'Ganti Lampu', NULL, 0, NULL, 10000, 0, 0, '2021-08-19 15:02:13', NULL, NULL, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL,
  `perusahaan` varchar(128) NOT NULL,
  `code_barang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`, `perusahaan`, `code_barang`) VALUES
(15, 'Aldi', 'BANDUNG', '083825740395', 'Bintang gejora', ''),
(16, 'Anjas', 'BANDUNG', '083825740395', 'ASA', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `email` varchar(50) NOT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `nohp` varchar(13) NOT NULL,
  `register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `level`, `status`, `email`, `jenkel`, `nohp`, `register`, `photo`) VALUES
(1, 'Aldi Wahyudias', 'Aldi Wahyudi', '202cb962ac59075b964b07152d234b70', '1', '1', 'aldiwahyudi1223@gmail.com', 'P', '083825740395', '2021-06-28 15:39:56', '6132d364c0b299299a13e00ad792dfd5.JPG'),
(4, 'Aldi', 'aldi', '202cb962ac59075b964b07152d234b70', '3', '1', 'aldiwahyudi1223@gmail.com', 'L', '083825740395', '2021-07-09 02:55:58', '556b093a9d5ce7915d47d24afdc05216.JPG'),
(5, 'Kasir Satu', 'kasir', '202cb962ac59075b964b07152d234b70', '2', '1', 'kasir@gmail.com', 'P', '083825740395', '2021-07-09 02:55:38', '16fcde2c894c2b339f88ec85c55901f7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `tempat` varchar(90) NOT NULL,
  `color` varchar(7) NOT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_album`
--

CREATE TABLE `tb_album` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL,
  `count` int(11) DEFAULT 0,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal` datetime NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tayang` int(11) DEFAULT 0,
  `slug` varchar(200) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `kategoriid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul`, `tanggal`, `isi`, `gambar`, `tayang`, `slug`, `userid`, `kategoriid`) VALUES
(11, 'Tune-up', '2021-06-28 04:45:16', '<p>asd</p>\r\n', '7ce49d63cf4212c507fb29907f1ff4f7.jpg', 91, 'tune-up', 1, 2),
(12, 'service', '2021-06-28 15:12:15', '<p>asdfsgrtgf</p>\r\n', '6ae56e96cd36fab58d0a31888ffb7362.jpg', 7, 'service', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buka`
--

CREATE TABLE `tb_buka` (
  `id` int(11) NOT NULL,
  `hari` varchar(40) DEFAULT NULL,
  `jam` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buka`
--

INSERT INTO `tb_buka` (`id`, `hari`, `jam`) VALUES
(4, 'Senin - Jumat', '09.00 - 16.00 WIB'),
(5, 'Sabtu', '09.00 - 13.00 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `email` varchar(50) NOT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `nohp` varchar(13) NOT NULL,
  `register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(250) NOT NULL,
  `nofak` varchar(123) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `ket` varchar(123) NOT NULL,
  `userid` int(11) NOT NULL,
  `slug` int(250) NOT NULL,
  `nopol` varchar(12) NOT NULL,
  `kendaraan` varchar(123) NOT NULL,
  `type` varchar(123) NOT NULL,
  `km` varchar(123) NOT NULL,
  `keluhan` varchar(256) NOT NULL,
  `deskripsi` varchar(123) NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nama`, `username`, `password`, `level`, `status`, `email`, `jenkel`, `nohp`, `register`, `photo`, `nofak`, `alamat`, `ket`, `userid`, `slug`, `nopol`, `kendaraan`, `type`, `km`, `keluhan`, `deskripsi`, `startdate`, `enddate`, `tanggal`) VALUES
(24, 'Aldi Wahyudi', 'aldi', 'e10adc3949ba59abbe56e057f20f883e', '4', '1', 'aldiwahyudi1223@gmail.com', 'P', '083825740395', '2021-08-19 15:15:21', '518cc78963996be78e4197190ee4a81a.jpg', '190821000002', 'garut', 'selesai', 5, 0, '1235', 'AVANZA', 'TOYOTA', '123', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 08:44:02'),
(25, 'Asep Sopandi', 'asep', 'e10adc3949ba59abbe56e057f20f883e', '4', '1', 'ranggi@gmail.com', 'P', '083825740395', '2021-08-19 15:22:59', '', '190821000003', 'Bandung', 'selesai', 5, 0, '1236', 'AVANZA', 'TOYOTA', '123443546', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 08:44:42'),
(26, 'Sendi', NULL, 'e10adc3949ba59abbe56e057f20f883e', '4', '1', '', NULL, '083825740395', '2021-08-19 15:24:22', '', '190821000004', 'Bandung', 'selesai', 5, 0, '1237', 'AVANZA', 'TOYOTA', '123', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 11:23:56'),
(27, 'Rangga', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '', NULL, '083825740395', '2021-08-19 15:25:12', '', '190821000005', 'Bandung', 'selesai', 5, 0, '1238', 'AVANZA', 'TOYOTA', '12424', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 11:25:35'),
(28, 'Ranggi', 'ranggi', 'e10adc3949ba59abbe56e057f20f883e', '4', '1', 'ranggi@gmail.com', 'P', '083825740395', '2021-08-19 15:26:17', '', '190821000006', 'Bandung', 'selesai', 5, 0, '1234', 'AVANZA', 'TOYOTA', '12424', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 13:49:30'),
(29, 'Ranggi', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '', NULL, '083825740395', '2021-08-19 15:50:48', '', '190821000007', 'Bandung', 'selesai', 5, 0, '1234', 'AVANZA', 'TOYOTA', '12424', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 15:28:53'),
(30, 'Aldi Wahyudi', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '', NULL, '083825740395', '2021-08-19 15:51:02', '', '190821000008', 'Bandung', 'selesai', 5, 0, '1235', 'AVANZA', 'TOYOTA', '12424', '0', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 15:30:58'),
(31, 'Asep Sopandi', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '', NULL, '083825740395', '2021-08-19 15:51:15', '', '190821000009', 'Bandung', 'selesai', 5, 0, '1236', 'AVANZA', 'TOYOTA', '12424', 'dfg', 'LUNAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-08-19 15:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_files`
--

CREATE TABLE `tb_files` (
  `id` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `oleh` varchar(40) DEFAULT NULL,
  `download` int(11) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(255) DEFAULT NULL,
  `albumid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id` int(11) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `maps` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`id`, `favicon`, `brand`, `email`, `alamat`, `telepon`, `maps`) VALUES
(1, '', 'speed.jpeg', 'aldiwahyudi1223@gmail.com', 'Jln.Suekarno-Hatta No.237 Bandung', '083825740395', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.511907745105!2d109.34173191450486!3d-7.408453875010935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559bcc0872039%3A0xf38bf5f87c50c109!2sKantor+Kecamatan+Kalimanah!5e0!3m2!1sen!2sid!4v1546212849654\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_igfeed`
--

CREATE TABLE `tb_igfeed` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `client` varchar(80) NOT NULL,
  `accestoken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_igfeed`
--

INSERT INTO `tb_igfeed` (`id`, `userid`, `client`, `accestoken`) VALUES
(1, '12609509999', 'b3abdc2ff1fe4a928e09cdf7974abb68', '12609509999.b3abdc2.65615b2e72e148ceaeff9be08f2d1d02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `email`, `kontak`, `pesan`, `tanggal`, `status`) VALUES
(23, 'Aldi Wahyudi', 'aldiwahyudi1223@gmail.com', '083825740395', 'ok', '2021-06-28 13:18:18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenispelayanan`
--

CREATE TABLE `tb_jenispelayanan` (
  `id` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama`) VALUES
(2, 'UMUM'),
(3, 'KHUSUS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') DEFAULT NULL,
  `artikelid` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `tampil` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `nama`, `email`, `isi`, `tanggal`, `status`, `artikelid`, `parent`, `tampil`) VALUES
(15, 'Aldi', 'aldiwahyudi1223@gmail.com', ' mantap', '2021-06-28 12:48:02', '1', 11, 0, '1'),
(16, 'Aldi Wahyudi', '', 'Terima kasih', '2021-06-28 12:50:39', '1', 11, 15, '1'),
(17, 'Rangga', 'asepsopandi@gmail.com', ' Luar Biasa mas', '2021-06-28 12:50:44', '1', 11, 0, '1'),
(18, 'Rifkias', 'dicky@gmail.com', ' as', '2021-06-28 12:50:48', '1', 11, 0, '1'),
(19, 'Aldi Wahyudi', '', 'siap', '2021-06-28 12:53:28', '1', 11, 18, '1'),
(20, 'bos', 'aldiwahyudi1223@gmail.com', ' mantap', '2021-06-28 13:04:11', '1', 11, 0, '1'),
(21, 'Aldi Wahyudi', '', 'Dengan Senang Hati', '2021-06-28 13:04:31', '1', 11, 20, '1'),
(22, 'Indonesia', 'azmi@gmail.com', ' as', '2021-08-16 05:41:09', '1', 11, 0, '1'),
(23, 'Aldi', 'aldiwahyudi1223@gmail.com', ' dsfs', '2021-08-16 05:41:03', '1', 11, 0, '1'),
(24, 'as', 'dicky@gmail.com', ' as', '2021-08-16 05:41:06', '1', 11, 0, '1'),
(25, 'Aldi', 'aldiwahyudi1223@gmail.comas', ' as', '2021-08-16 05:41:01', '1', 11, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `judul`, `tanggal`, `userid`, `isi`, `slug`) VALUES
(11, 'Barkiespeed', '2021-06-28 13:16:36', 1, '<p>as</p>\r\n', 'barkiespeed');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(40) DEFAULT NULL,
  `perangkat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id`, `tanggal`, `ip`, `perangkat`) VALUES
(1250, '2021-06-28 02:32:13', '::1', 'Chrome'),
(1251, '2021-06-28 17:14:46', '::1', 'Chrome'),
(1252, '2021-07-08 12:44:39', '::1', 'Chrome'),
(1253, '2021-07-09 01:22:46', '::1', 'Chrome'),
(1254, '2021-07-10 03:22:30', '::1', 'Chrome'),
(1255, '2021-07-29 22:36:33', '::1', 'Chrome'),
(1256, '2021-08-04 15:30:13', '::1', 'Chrome'),
(1257, '2021-08-07 18:24:50', '::1', 'Chrome'),
(1258, '2021-08-07 18:34:59', '127.0.0.1', 'Chrome'),
(1259, '2021-08-12 06:04:27', '::1', 'Chrome'),
(1260, '2021-08-16 02:32:33', '::1', 'Chrome'),
(1261, '2021-08-17 05:51:09', '::1', 'Chrome'),
(1262, '2021-08-17 22:07:06', '::1', 'Chrome'),
(1263, '2021-08-19 08:24:11', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `tb_potensi`
--

CREATE TABLE `tb_potensi` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_potensi`
--

INSERT INTO `tb_potensi` (`id`, `judul`, `tanggal`, `isi`, `gambar`, `slug`, `userid`) VALUES
(3, 'Tune-up', '2021-06-28 02:46:23', '<p>fdsgd</p>\r\n', '26a2c013a21d867e6396ae654c448b94.jpg', 'tune-up', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `gambar`) VALUES
(1, '28ee16bac9422d5ae02309c66e672e94.jpg'),
(2, 'd61e81e5fc4463bac0adf275b2bab83e.png'),
(3, 'c13dfa9eda41773e69158e519cfc9318.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_socmed`
--

CREATE TABLE `tb_socmed` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_socmed`
--

INSERT INTO `tb_socmed` (`id`, `nama`, `url`, `icon`) VALUES
(4, 'Facebook', 'https://www.facebook.com/ammar.pasifiky', 'fa fa-facebook'),
(8, 'Twitter', 'https://www.twitter.com/ammarFIKI', 'fa fa-twitter'),
(10, 'Instagram', 'https://www.instagram.com/kecamatankalimanah', 'fa fa-instagram'),
(12, 'Youtube', 'https:www.youtube.com', 'fa fa-youtube');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statis`
--

CREATE TABLE `tb_statis` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_statis`
--

INSERT INTO `tb_statis` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Barkiespeed', '<p><strong>Assalammualaikum Wr. Wb</strong></p>\r\n\r\n<p style=\"text-align:justify\">Alhamdulillahhirobbilalamin</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n', 'ec1d3ec7ea6cff10b8abca429a38eb9b.jpeg'),
(2, 'Visi dan Misi', '', 'wkwkwk.com'),
(3, 'Struktur Organisasi', '', 'wkwkwk.com'),
(4, 'Profil Pegawai', '', 'wkwkwk.com'),
(5, 'Desa', '<table class=\"table table-striped\">\r\n	<thead>\r\n		<tr>\r\n			<th>NO</th>\r\n			<th>DESA</th>\r\n			<th>KADES/LURAH</th>\r\n			<th>NO.HP</th>\r\n			<th>KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>JOMPO</td>\r\n			<td>MUN PRASETYO, ST</td>\r\n			<td>082237925453</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>RABAK</td>\r\n			<td>MUKHODIN, S.Sos</td>\r\n			<td>081391464333</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>BLATER</td>\r\n			<td>SUKANTO</td>\r\n			<td>081327271070</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>SIDAKANGEN</td>\r\n			<td>M. SUDIARTO</td>\r\n			<td>081228541559</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>KARANGPETIR</td>\r\n			<td>SETYA DHARMA</td>\r\n			<td>085302810098</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6</td>\r\n			<td>GRECOL</td>\r\n			<td>OO ROMADI</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7</td>\r\n			<td>MEWEK</td>\r\n			<td>SUDIYONO, SH</td>\r\n			<td>081329798900</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8</td>\r\n			<td>KARANGMANYAR</td>\r\n			<td>WAHYU JUMARTONO</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9</td>\r\n			<td>KALIKABONG</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10</td>\r\n			<td>SELABAYA</td>\r\n			<td>SUROTO</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11</td>\r\n			<td>KALIMANAH WETAN</td>\r\n			<td>WIDODO PANCA NUGRAHA, S.STP</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12</td>\r\n			<td>KALIMANAH KULON</td>\r\n			<td>SARNO</td>\r\n			<td>082137685733</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13</td>\r\n			<td>MANDURAGA</td>\r\n			<td>HARDIZON</td>\r\n			<td>085227066031</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14</td>\r\n			<td>KARANGSARI</td>\r\n			<td>IMAM NURSYAMSI</td>\r\n			<td>085291810704</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>15</td>\r\n			<td>KEDUNGWULUH</td>\r\n			<td>KAMSONO</td>\r\n			<td>085328956265</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>16</td>\r\n			<td>KLAPASAWIT</td>\r\n			<td>NGUDI WISMANTORO</td>\r\n			<td>082122535966</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>17</td>\r\n			<td>BABAKAN</td>\r\n			<td>MUHAMAD SETIADI, A.Md</td>\r\n			<td>081325687586</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'wkwkwk.com'),
(6, 'ALUR KEGIATAN PELAYANAN', '<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">ALUR KEGIATAN PELAYANAN</span></strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">KECAMATAN KALIMANAH</span></strong></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PEMOHON MENDAFTARKAN DIRI PADA MEJA PELAYANAN DI KANTOR KECAMATAN KALIMANAH DENGAN MEMBAWA PERSYARATAN YANG TELAH DITENTUKAN</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PETUGAS MENCATAT LEGALISASI SURAT PERMOHONAN DAN MENERUSKAN KEPADA PEJABAT YANG BERWENANG. (APABILA PERSYARATAN LENGKAP DITERUSKAN, APABILA PERSYARATAN TIDAK LENGKAP DIKEMBALIKAN KE PEMOHON UNTUK DILENGKAPI</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PETUGAS MENGAJUKAN BERKAS PEMOHON KEPADA PEJABAT YANG BERWENANG</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PEJABAT BERWENANG MENELITI DAN MENANDATANGANI BERKAS PERMOHONAN YANG DIAJUKAN UNTUK DIPROSES LEBIH LANJUT</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">PETUGAS MEREGISTRASI PERMOHONAN YANG TELAH DITANDATANGANI, SELANJUTNYA DIPROSES SESUAI DENGAN JENIS PERMOHONAN YANG BERSANGKUTAN.</span></span></li>\r\n</ol>\r\n', 'wkwkwk.com'),
(7, 'Denah Pelayanan', '<p style=\"text-align:center\"><span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">DENAH ALUR PELAYANAN</span></strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:11pt\"><strong><span style=\"font-size:12.0pt\">KECAMATAN KALIMANAH</span></strong></span></p>\r\n\r\n<p><img alt=\"\" src=\"/assets/kcfinder/upload/files/Screenshot%20(112).png\" class=\"img-fluid\" style=\"height:298px; width:674px\" /></p>\r\n', 'wkwkwk.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `status` enum('1','0') DEFAULT '1',
  `level` enum('1','2') DEFAULT NULL,
  `register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `jenkel`, `username`, `password`, `nohp`, `status`, `level`, `register`, `photo`) VALUES
(6, 'Ammar', 'amar.fiky@gmail.com', 'L', 'root', '202cb962ac59075b964b07152d234b70', '123', '1', '1', '2019-01-03 17:37:37', '9c43054658c67c4b8020b3132a20867b.jpg'),
(7, 'Admin', 'admin@kalimanah.com', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0857455671327', '1', '1', '2020-02-23 04:13:48', '91b2d691f17a1017182489613f35bbb9.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_artikel`
-- (See below for the actual view)
--
CREATE TABLE `vw_artikel` (
`id` int(11)
,`judul` varchar(150)
,`isi` text
,`tayang` int(11)
,`slug` varchar(200)
,`gambar` varchar(255)
,`kategori` varchar(30)
,`author` varchar(35)
,`tanggal` varchar(78)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_artikel`
--
DROP TABLE IF EXISTS `vw_artikel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kecm3262`@`localhost` SQL SECURITY DEFINER VIEW `vw_artikel`  AS SELECT `tb_artikel`.`id` AS `id`, `tb_artikel`.`judul` AS `judul`, `tb_artikel`.`isi` AS `isi`, `tb_artikel`.`tayang` AS `tayang`, `tb_artikel`.`slug` AS `slug`, `tb_artikel`.`gambar` AS `gambar`, `tb_kategori`.`nama` AS `kategori`, `tbl_user`.`nama` AS `author`, date_format(`tb_artikel`.`tanggal`,'%d %M %Y %h:%i') AS `tanggal` FROM ((`tb_artikel` join `tb_kategori` on(`tb_artikel`.`kategoriid` = `tb_kategori`.`id`)) join `tbl_user` on(`tb_artikel`.`userid` = `tbl_user`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `barang_user_id` (`service_user_id`),
  ADD KEY `barang_kategori_id` (`service_kategori_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buka`
--
ALTER TABLE `tb_buka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_files`
--
ALTER TABLE `tb_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_igfeed`
--
ALTER TABLE `tb_igfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenispelayanan`
--
ALTER TABLE `tb_jenispelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_potensi`
--
ALTER TABLE `tb_potensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_socmed`
--
ALTER TABLE `tb_socmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_statis`
--
ALTER TABLE `tb_statis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_buka`
--
ALTER TABLE `tb_buka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_files`
--
ALTER TABLE `tb_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_igfeed`
--
ALTER TABLE `tb_igfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_jenispelayanan`
--
ALTER TABLE `tb_jenispelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1264;

--
-- AUTO_INCREMENT for table `tb_potensi`
--
ALTER TABLE `tb_potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_socmed`
--
ALTER TABLE `tb_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_statis`
--
ALTER TABLE `tb_statis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
