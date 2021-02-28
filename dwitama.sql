-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 04:08 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwitama`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(7) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `jenis_kelamin`, `jabatan`, `status`) VALUES
(1005006, 'Yana Zulkarnaen', 'L', 'QA & QC', 'Aktif'),
(1509001, 'Joko Hadi Saputro', 'L', 'Direktur Utama', 'Aktif'),
(1509002, 'Mulyana', 'L', 'Operator', 'Aktif'),
(1509003, 'Mariana Fazri', 'P', 'General Affair', 'Aktif'),
(1509004, 'Sri Fitri Aminingsih', 'P', 'Finance ', 'Aktif'),
(1509006, 'Iwan Setiawan', 'L', 'Operator', 'Aktif'),
(1509007, 'Solihun', 'L', 'Operator', 'Aktif'),
(1509009, 'Dani Somantri', 'L', 'Security', 'Aktif'),
(1509010, 'Radimin', 'L', 'Operator', 'Aktif'),
(1511015, 'Andika Setiawan', 'L', 'Driver', 'Aktif'),
(1601070, 'Edy Hajar', 'L', 'Operator', 'Aktif'),
(1609017, 'Saeful Ali', 'L', 'Operator', 'Aktif'),
(1612020, 'Suryana', 'L', 'Toolkeeper', 'Aktif'),
(1707024, 'Turimin', 'L', 'Operator', 'Aktif'),
(1709026, 'Indriyani Mega Purniawati', 'P', 'Marketing', 'Aktif'),
(1808032, 'Rochmansyah', 'L', 'Operator', 'Aktif'),
(1809033, 'Ahmad Ali Syahroni', 'L', 'Operator', 'Aktif'),
(1812037, 'Zein B. Hilmi', 'L', 'Production Manager & PPIC', 'Aktif'),
(1903039, 'Asep Subekti', 'L', 'Operator', 'Aktif'),
(1907040, 'Hendi Hermawan', 'L', 'Operator', 'Aktif'),
(1907041, 'Haryo A. Wijaya Kusumah', 'L', 'Engineer', 'Aktif'),
(1907042, 'Anwar Mursadad', 'L', 'Operator', 'Aktif'),
(1910043, 'Kagi Wiyono ', 'L', 'Operator', 'Aktif'),
(2001044, 'Dadang Wahyudin', 'L', 'Operator', 'Aktif'),
(2006045, 'Ati Suparti', 'P', 'Direktur', 'Aktif'),
(2006046, 'Ika N. Permanasari', 'P', 'HRD', 'Aktif'),
(2006047, 'Aceng Husein Toyib', 'L', 'CS', 'Aktif'),
(2009048, 'Dindin Sudiaman', 'L', 'Operator', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('GA','Toolkeeper') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `nama`, `password`, `level`) VALUES
('General', 'Mariana Fazri', 'ba336d5909699575f47e7bc9a834a65b', 'GA'),
('Toolkeeper', 'Suryana', '13e1be54633343206280775d572bc207', 'Toolkeeper');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(9) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `nik` int(7) NOT NULL,
  `kode_tools` varchar(9) NOT NULL,
  `jumlah_pinjam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tanggal_pinjam`, `nik`, `kode_tools`, `jumlah_pinjam`) VALUES
('PJM000002', '2021-01-16', 1509001, 'TAU000003', 1),
('PJM000003', '2021-01-16', 1903039, 'TAU000008', 1);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `update_peminjaman` BEFORE INSERT ON `peminjaman` FOR EACH ROW UPDATE `tools` SET `tools`.`qty` = `tools`.`qty` - NEW.jumlah_pinjam WHERE `tools`.`kode_tools` = NEW.kode_tools
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` varchar(9) NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `nik` int(7) NOT NULL,
  `kode_tools_hp` varchar(7) NOT NULL,
  `qty_diambil` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pengambilan`
--
DELIMITER $$
CREATE TRIGGER `update_pengambilan` BEFORE INSERT ON `pengambilan` FOR EACH ROW UPDATE `tools_hp` SET `tools_hp`.`qty_diambil_hp` = `tools_hp`.`qty_diambil_hp` - NEW.qty_diambil WHERE `tools_hp`.`kode_tools_hp` = NEW.kode_tools_hp
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(9) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nik` int(7) NOT NULL,
  `kode_tools` varchar(9) NOT NULL,
  `qty_dikembalikan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `update_pengembalian` BEFORE INSERT ON `pengembalian` FOR EACH ROW UPDATE `tools` SET `tools`.`qty` = `tools`.`qty` - NEW.qty_dikembalikan WHERE `tools`.`kode_tools` = NEW.kode_tools
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `kode_tools` varchar(9) NOT NULL,
  `nama_tools` varchar(200) NOT NULL,
  `frek_pemakaian` enum('Setiap Hari','1x dalam seminggu','2x dalam seminggu','3x dalam seminggu','4x dalam seminggu','1x dalam sebulan','2x dalam sebulan','3x dalam sebulan','4x dalam sebulan','Jarang (1-2 bulan sekali)','Sangat Jarang (3 bulan sekali)','< 50 pcs perbulan','50 pcs s/d 100 pcs','> 100 pcs perbulan','') NOT NULL,
  `stok_awal` int(6) NOT NULL,
  `qty` int(6) NOT NULL,
  `satuan` enum('set','ea','pcs') NOT NULL,
  `rak` int(4) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tipe_pakai` enum('Habis Pakai','Pinjam') NOT NULL,
  `keterangan` enum('Milling Konvensional','Cutting Tools','Gergaji Tangan','Tools Mesin CNC','Bubut Konvensional','Sandblasting','Carbide Tools','Handsnai','Handtap','Mesin Bor','Gerinda Tools','Mesin Amplas','Perkakas','Kunci Perkakas','Alat Ukur','Pompa Test') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`kode_tools`, `nama_tools`, `frek_pemakaian`, `stok_awal`, `qty`, `satuan`, `rak`, `tanggal_masuk`, `tipe_pakai`, `keterangan`) VALUES
('TAU000001', 'Avo meter ', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000002', 'Bavel protector', '3x dalam seminggu', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000003', 'Bor taper gauges', 'Setiap Hari', 1, 0, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000004', 'Bore gauge 35-600 mm', 'Setiap Hari', 1, 1, 'set', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000005', 'Busur derajat', 'Setiap Hari', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000006', 'Cermin Teleskop', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000007', 'Dial dept gauge 0-150 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000008', 'Dial indicator', 'Setiap Hari', 3, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000009', 'Digital clem meter', '1x dalam sebulan', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000010', 'Hight gauge', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000011', 'Infra red thermometer', 'Setiap Hari', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000012', 'Jangka', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000013', 'Mall drat ', '3x dalam seminggu', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000014', 'Mall Radius gauge', 'Setiap Hari', 1, 1, 'set', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000015', 'Micro meter stand', '3x dalam seminggu', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000016', 'Micrometer ID 50-600 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000017', 'Micrometer OD 1\" - 2\" ', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000018', 'Micrometer OD 100-125 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000019', 'Micrometer OD 125-150 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000020', 'Micrometer OD 175-200 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000021', 'Micrometer OD 200-225 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000022', 'Micrometer OD 25-50 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000023', 'Micrometer OD 3\" - 4\" ', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000024', 'Micrometer OD 50-75 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000025', 'pocket scale', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000026', 'Roll meter 3 mtr', '2x dalam sebulan', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000027', 'Roll meter kain 15 mtr', '2x dalam sebulan', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000028', 'Roll meter kain 50 mtr', '2x dalam sebulan', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000029', 'Sigmat 1000 mm', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000030', 'Sigmat 300mm digital', 'Setiap Hari', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000031', 'Sigmat 600 mm', 'Setiap Hari', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000032', 'Tacho meter', 'Sangat Jarang (3 bulan sekali)', 2, 2, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000033', 'Teleskoping gauges', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'set', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000034', 'Termo couple tes type-K', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'set', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TAU000035', 'Water pas balok siku', '1x dalam sebulan', 1, 1, 'ea', 17, '2020-12-20', 'Pinjam', 'Alat Ukur'),
('TBK000001', 'Pisau widia kanan', '< 50 pcs perbulan', 27, 27, 'pcs', 5, '2020-12-20', 'Habis Pakai', 'Bubut Konvensional'),
('TBK000002', 'Pisau widia kiri', '< 50 pcs perbulan', 35, 35, 'pcs', 5, '2020-12-20', 'Habis Pakai', 'Bubut Konvensional'),
('TBK000003', 'Pisau widia rumah ', '< 50 pcs perbulan', 13, 13, 'pcs', 5, '2020-12-20', 'Habis Pakai', 'Bubut Konvensional'),
('TCB000001', 'Ballnose HSS diameter 12mm', '2x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000002', 'Ballnose HSS diameter 25mm', '1x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000003', 'Endmill Hss diameter 10mm', '1x dalam sebulan', 4, 4, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000004', 'Endmill Hss diameter 11mm', '2x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000005', 'Endmill Hss diameter 12mm', '1x dalam sebulan', 8, 8, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000006', 'Endmill Hss diameter 17mm', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000007', 'Endmill Hss diameter 18mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000008', 'Endmill Hss diameter 19mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000009', 'Endmill Hss diameter 1mm', '3x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000010', 'Endmill Hss diameter 20mm', 'Jarang (1-2 bulan sekali)', 4, 4, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000011', 'Endmill Hss diameter 28mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000012', 'Endmill Hss diameter 3mm', '2x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000013', 'Endmill Hss diameter 5mm', '2x dalam sebulan', 2, 2, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000014', 'Endmill Hss diameter 6,5mm', '1x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000015', 'Endmill Hss diameter 6mm', '2x dalam sebulan', 5, 5, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000016', 'Endmill Hss diameter 8mm', '1x dalam sebulan', 1, 1, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCB000017', 'Endmill Hss diameter 9mm', '1x dalam sebulan', 2, 2, 'ea', 7, '2020-12-20', 'Habis Pakai', 'Carbide Tools'),
('TCT000001', 'Cutting wheel 14\" ', '3x dalam seminggu', 4, 4, 'pcs', 2, '2020-12-20', 'Habis Pakai', 'Cutting Tools'),
('TCT000002', 'Cutting wheel Ideko', '3x dalam seminggu', 9, 9, 'pcs', 2, '2020-12-20', 'Habis Pakai', 'Cutting Tools'),
('TCT000003', 'Cutting wheel Resibon', '3x dalam seminggu', 2, 2, 'pcs', 2, '2020-12-20', 'Habis Pakai', 'Cutting Tools'),
('TCT000004', 'Cutting wheel WD', '3x dalam seminggu', 31, 31, 'pcs', 2, '2020-12-20', 'Habis Pakai', 'Cutting Tools'),
('TGR000001', 'Air grinder L', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 13, '2020-12-20', 'Pinjam', 'Gerinda Tools'),
('TGR000002', 'Air grinder short', 'Setiap Hari', 1, 1, 'ea', 13, '2020-12-20', 'Pinjam', 'Gerinda Tools'),
('TGR000003', 'Deburing Tool angin', 'Setiap Hari', 1, 1, 'set', 13, '2020-12-20', 'Pinjam', 'Gerinda Tools'),
('TGR000004', 'Gerinda Phonex kuning ', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 13, '2020-12-20', 'Pinjam', 'Gerinda Tools'),
('TGT000001', 'Mata gergaji besi pita', '3x dalam seminggu', 10, 10, 'pcs', 3, '2020-12-20', 'Habis Pakai', 'Gergaji Tangan'),
('TGT000002', 'Mata Gergaji Besi ', '2x dalam seminggu', 9, 9, 'pcs', 3, '2020-12-20', 'Habis Pakai', 'Gergaji Tangan'),
('TGT000003', 'Gergaji besi ', 'Setiap Hari', 4, 4, 'ea', 12, '2020-12-20', 'Pinjam', 'Gergaji Tangan'),
('TGT000004', 'Gergaji Hebel', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 12, '2020-12-20', 'Pinjam', 'Gergaji Tangan'),
('TGT000005', 'Gergaji kayu ', 'Jarang (1-2 bulan sekali)', 4, 4, 'ea', 12, '2020-12-20', 'Pinjam', 'Gergaji Tangan'),
('TGT000006', 'Gergaji ukir', '2x dalam seminggu', 1, 1, 'ea', 12, '2020-12-20', 'Pinjam', 'Gergaji Tangan'),
('THS000001', 'Snai   BSPT 1-2 inchi', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000002', 'Snai   BSW 3/8', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000003', 'Snai   m10 x 1,5', '1x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000004', 'Snai   m12 x 1,25', '1x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000005', 'Snai   m12 x 1,75', '1x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000006', 'Snai   m14 x 2', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000007', 'Snai   m16 x 2', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000008', 'Snai   m24', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000009', 'Snai   m4 x 0,7', '2x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000010', 'Snai   m6 x1', '2x dalam seminggu', 4, 4, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000011', 'Snai   m8 x 1,25', '1x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000012', 'Snai  m10 x 1,5', '1x dalam seminggu', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000013', 'Snai m 20 x 2,5', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000014', 'Snai m 22 x 2,5 ', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THS000015', 'Stang snay kecil', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 9, '2020-12-20', 'Pinjam', 'Handsnai'),
('THT000001', 'Tap  1\" Bsw 8', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000002', 'Tap  1/2 -12 Bsw alps', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000003', 'Tap  1/2 -13 Skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000004', 'Tap  1/2 -20 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000005', 'Tap  3/4 -10 Skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000006', 'Tap  5/8 -11 Skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000007', 'Tap  8/16 -12 BSW', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000008', 'Tap  9/16 -12 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000009', 'Tap  m10 x 1,5 Skc', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000010', 'Tap  m10 x1,75 Triangel', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000011', 'Tap  m5 x 0,8 Skc', '3x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000012', 'Tap  m5 x 0,8 Yamawa', '3x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000013', 'Tap  m6 x1 Yamawa', '3x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000014', 'Tap  m6x 1 Skc', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000015', 'Tap  m8 x 1,25 Skc', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000016', 'Tap 1/2 BSPT 14  alps', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000017', 'Tap 1/2 x 14 NPT /Alps', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000018', 'Tap 1/2 x14 BSPT', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000019', 'Tap 1/4 -18 Skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000020', 'Tap 1/4 -19 Bsp /Wipro', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000021', 'Tap 1/4 BSw 20 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000022', 'Tap 1/4 x 20 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000023', 'Tap 1/4 x20 Unc', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000024', 'Tap 1/8 x 27 NPT /alps', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000025', 'Tap 3/8 -16 BSw  Skc ', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000026', 'Tap 3/8 -19 BSPT  alps', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000027', 'Tap 3/8 x 16  Skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000028', 'Tap 3/8 x 24  Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000029', 'Tap 3/8 x16  Triangel', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000030', 'Tap 5/16 -18  Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000031', 'Tap 5/16 Bsw 18  Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000032', 'Tap m10 x 1,25 skc', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000033', 'Tap m10 x 1,5 HT-1', '1x dalam sebulan', 4, 4, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000034', 'Tap m10 x1,5 Skc', '1x dalam sebulan', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000035', 'Tap m12 x 1,75 alps', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000036', 'Tap m12 x 1,75 Hss', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000037', 'Tap m12 x 1,75 HT', '1x dalam sebulan', 1, 1, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000038', 'Tap m12 x 1,75 Skc', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000039', 'Tap m12 x 1,75 Triangel', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000040', 'Tap m12 x 1,75 Volkel', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000041', 'Tap m12 x 1,75 Yamawa', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000042', 'Tap m12 x1,75 HT P3', '1x dalam sebulan', 1, 1, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000043', 'Tap m12x 1,50 skc', '1x dalam sebulan', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000044', 'Tap m18 x 2,5 alps', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000045', 'Tap m18 x2,5 Daido', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000046', 'Tap m20 x 1,5 Skc ', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000047', 'Tap m20 x 2,5 HTD', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000048', 'Tap m20 x 2,5 Skh', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000049', 'Tap m20 x 2,5 Sks', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000050', 'Tap m22 x 2,5 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000051', 'Tap m24 x 30 Skc', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000052', 'Tap m3 x 0,5 Skc ', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000053', 'Tap m3 x 3,5 Toki', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000054', 'Tap m4 xx 0,7  Triangel', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000055', 'Tap m4 xx 0,7 Toho', '2x dalam seminggu', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000056', 'Tap m5 x 0,8 Skc', '2x dalam seminggu', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000057', 'Tap m8 x 1,25 Skc', '2x dalam seminggu', 2, 2, 'ea', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('THT000058', 'Tap m8x 1,25  yamawa', '2x dalam seminggu', 1, 1, 'set', 10, '2020-12-20', 'Pinjam', 'Handtap'),
('TKP000001', 'Kunci inggris 10\"', '4x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000002', 'Kunci inggris 12\"', '4x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000003', 'Kunci inggris 15\"', '1x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000004', 'Kunci inggris 18\"', '1x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000005', 'Kunci inggris 24\"', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000006', 'Kunci L 1/2\"', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000007', 'Kunci L 10mm', '1x dalam seminggu', 8, 8, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000008', 'Kunci L 14mm', '1x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000009', 'Kunci L 16mm', '1x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000010', 'Kunci L 17mm', '1x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000011', 'Kunci L 18mm', '1x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000012', 'Kunci L 19mm', '1x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000013', 'Kunci L 2mm', 'Setiap Hari', 11, 11, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000014', 'Kunci L 3mm', 'Setiap Hari', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000015', 'Kunci L 4mm', 'Setiap Hari', 11, 11, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000016', 'Kunci L 5mm', 'Setiap Hari', 10, 10, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000017', 'Kunci L 6mm', 'Setiap Hari', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000018', 'Kunci L 8mm', 'Setiap Hari', 6, 6, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000019', 'Kunci L bintang', 'Jarang (1-2 bulan sekali)', 1, 1, 'set', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000020', 'Kunci momen/torsi 300', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000021', 'Kunci momen 3000', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000022', 'Kunci momen 5000', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000023', 'Kunci pas ring  1-1/4\"', '2x dalam sebulan', 1, 1, 'set', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000024', 'Kunci pas ring  13/16\"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000025', 'Kunci pas ring  3/4\"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000026', 'Kunci pas ring  5/8\"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000027', 'Kunci pas ring  7/8\"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000028', 'Kunci pas ring  9/16 \"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000029', 'Kunci pas ring 1- 1/8\"', '2x dalam sebulan', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000030', 'Kunci pas ring 11 mm', 'Setiap Hari', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000031', 'Kunci pas ring 13 mm', 'Setiap Hari', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000032', 'Kunci pas ring 17 mm', 'Setiap Hari', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000033', 'Kunci pas ring 18 mm', 'Setiap Hari', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000034', 'Kunci pas ring 19 mm', 'Setiap Hari', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000035', 'Kunci pas ring 22 mm', 'Setiap Hari', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000036', 'Kunci pas ring 24 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000037', 'Kunci pas ring 30 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000038', 'Kunci pas ring 32 mm ', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000039', 'Kunci pas ring 33mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000040', 'Kunci pas ring 34 mm', '2x dalam seminggu', 3, 3, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000041', 'Kunci pas ring 35 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000042', 'Kunci pas ring 36 mm', '2x dalam seminggu', 4, 4, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000043', 'Kunci pas ring 46 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000044', 'Kunci pas ring 50 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000045', 'Kunci pas ring 55 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000046', 'Kunci pas ring 6 mm', 'Setiap Hari', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000047', 'Kunci pipa 10\"', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000048', 'Kunci pipa 14\"', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000049', 'Kunci pipa 18\"', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000050', 'kunci pipa 24\"', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000051', 'Kunci pipa 48\"', 'Sangat Jarang (3 bulan sekali)', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000052', 'Kunci ring 12-13 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000053', 'Kunci ring 14-15 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000054', 'Kunci ring 16-17 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000055', 'kunci ring 19-21 mm', '2x dalam seminggu', 4, 4, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000056', 'Kunci ring 30-32 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000057', 'Kunci ring 6-7 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000058', 'Kunci shock 16 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000059', 'Kunci shock 19 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000060', 'Kunci shock 20 mm', '3x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000061', 'Kunci shock 21 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000062', 'Kunci shock 22 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000063', 'Kunci shock 23 mm', '3x dalam seminggu', 3, 3, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000064', 'Kunci shock 27 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000065', 'Kunci shock 28 mm', '3x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000066', 'Kunci shock 30 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000067', 'Kunci shock 32 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000068', 'Kunci shock 33 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000069', 'Kunci shock 34 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000070', 'Kunci shock 36 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000071', 'Kunci shock 38 mm', '2x dalam seminggu', 1, 1, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000072', 'Kunci shock 41 mm', '2x dalam seminggu', 3, 3, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TKP000073', 'Kunci shock 46 mm', '2x dalam seminggu', 2, 2, 'ea', 16, '2020-12-20', 'Pinjam', 'Kunci Perkakas'),
('TMA000001', 'Hand machine hamplas', 'Setiap Hari', 1, 1, 'ea', 14, '2020-12-20', 'Pinjam', 'Mesin Amplas'),
('TMB000001', 'Bor  BOSCH biru', 'Setiap Hari', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000002', 'Bor diameter 10mm', '3x dalam seminggu', 6, 6, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000003', 'Bor diameter 11mm', '3x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000004', 'Bor diameter 12mm', '3x dalam seminggu', 3, 3, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000005', 'Bor diameter 14,5mm', '3x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000006', 'Bor diameter 14mm', '3x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000007', 'Bor diameter 15mm   ', '3x dalam seminggu', 3, 3, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000008', 'Bor diameter 23mm', '3x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000009', 'Bor diameter 25mm', '3x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000010', 'Bor diameter 26mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000011', 'Bor diameter 27mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000012', 'Bor diameter 28mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000013', 'Bor diameter 30mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000014', 'Bor diameter 33mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000015', 'Bor diameter 38mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000016', 'Bor diameter 46mm', '2x dalam seminggu', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000017', 'Bor diameter 51mm', '2x dalam sebulan', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000018', 'Bor diameter 6mm  ', '2x dalam sebulan', 3, 3, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000019', 'Bor diameter 7,5mm', '2x dalam sebulan', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000020', 'Bor diameter 7mm', '2x dalam sebulan', 15, 15, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000021', 'Bor diameter 8,5mm', '2x dalam sebulan', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000022', 'Bor diameter 8mm', '2x dalam sebulan', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000023', 'Bor diameter 9,5mm', '2x dalam sebulan', 1, 1, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMB000024', 'Bor diameter 9mm   ', '2x dalam sebulan', 4, 4, 'ea', 11, '2020-12-20', 'Pinjam', 'Mesin Bor'),
('TMC000001', 'Pisau insert Bdmt 11 T308 ER', '1x dalam seminggu', 10, 10, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000002', 'Pisau insert groping TDT 1,0', '2x dalam seminggu', 15, 15, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000003', 'Pisau insert Karloy pc5300', '2x dalam seminggu', 26, 26, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000004', 'Pisau insert MGMN 150 G', '1x dalam seminggu', 5, 5, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000005', 'Pisau insert Vcmt 432 sm', '2x dalam seminggu', 8, 8, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000006', 'Pisau insert DNMG-FA DNMG150404N-FA T3000Z', '2x dalam seminggu', 10, 10, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000007', 'Pisau insert Ccmt 060204 HM', '2x dalam seminggu', 4, 4, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000008', 'pisau insert turning konvensional', '2x dalam seminggu', 3, 3, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMC000009', 'pisau insert milling konvensional', '2x dalam seminggu', 3, 3, 'pcs', 4, '2020-12-20', 'Habis Pakai', 'Tools Mesin CNC'),
('TMK000001', 'Collet 1,6  ', 'Sangat Jarang (3 bulan sekali)', 8, 8, 'pcs', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000002', 'Collet 1,6 wp 25', 'Sangat Jarang (3 bulan sekali)', 17, 17, 'pcs', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000003', 'Collet 2,4  ', 'Sangat Jarang (3 bulan sekali)', 15, 15, 'pcs', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000004', 'Rmer HSS diameter  10mm', 'Jarang (1-2 bulan sekali)', 2, 2, 'ea', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000005', 'Rmer HSS diameter  12mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000006', 'Rmer HSS diameter  15mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000007', 'Rmer HSS diameter 13mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TMK000008', 'Rmer HSS diameter 14mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 1, '2020-12-20', 'Habis Pakai', 'Milling Konvensional'),
('TPR000001', 'Gunting plat', '2x dalam sebulan', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000002', 'Gunting rumput', '1x dalam sebulan', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000003', 'Kaca pembesar (Besar)', '1x dalam seminggu', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000004', 'Kaca pembesar (kecil)', '1x dalam seminggu', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000005', 'Kikir besar ', '1x dalam sebulan', 2, 2, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000006', 'Kikir kayu', '1x dalam sebulan', 1, 1, 'set', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000007', 'Kikir biasa ', 'Setiap Hari', 1, 1, 'set', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000008', 'Kikir diamond kecil ', 'Setiap Hari', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000009', 'Kunci roda', '', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000010', 'Obeng ', 'Setiap Hari', 11, 11, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000011', 'Palu 1 kg ', '2x dalam seminggu', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000012', 'Palu konde besar', 'Setiap Hari', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000013', 'Palu konde kecil ', 'Setiap Hari', 2, 2, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000014', 'Palu kulit/karet', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000015', 'Palu godam/martil besar 6lb', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000016', 'Palu nilon ', 'Jarang (1-2 bulan sekali)', 4, 4, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000017', 'Stang shock L besar', '3x dalam seminggu', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000018', 'Stang shock L sedang', '3x dalam seminggu', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000019', 'Tang kombinasi', 'Setiap Hari', 3, 3, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000020', 'Tang jepit', 'Setiap Hari', 4, 4, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000021', 'Tang lancip', 'Setiap Hari', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000022', 'Tang potong ', 'Setiap Hari', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000023', 'Tang ripet ', 'Setiap Hari', 2, 2, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000024', 'Tang nuaya', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000025', 'Tang snap ring IB', 'Jarang (1-2 bulan sekali)', 3, 3, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000026', 'Tang snap ring EB', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000027', 'Tang snap ring ES', 'Jarang (1-2 bulan sekali)', 5, 5, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPR000028', 'Kunci T 19 mm', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 15, '2020-12-20', 'Pinjam', 'Perkakas'),
('TPT000001', 'Puller 40x90 mm', '3x dalam seminggu', 1, 1, 'set', 8, '2020-12-20', 'Pinjam', 'Pompa Test'),
('TPT000002', 'Puller 250x220 mm', '3x dalam seminggu', 1, 1, 'set', 8, '2020-12-20', 'Pinjam', 'Pompa Test'),
('TPT000003', 'Lk test ', 'Jarang (1-2 bulan sekali)', 1, 1, 'ea', 8, '2020-12-20', 'Pinjam', 'Pompa Test'),
('TSB000001', 'keramik sandblast', 'Sangat Jarang (3 bulan sekali)', 5, 5, 'pcs', 6, '2020-12-20', 'Habis Pakai', 'Sandblasting'),
('TSB000002', 'keramik sandblast cabinet', 'Sangat Jarang (3 bulan sekali)', 3, 3, 'pcs', 6, '2020-12-20', 'Habis Pakai', 'Sandblasting'),
('TSB000003', 'keramik sandblast cabinet besi', 'Sangat Jarang (3 bulan sekali)', 2, 2, 'pcs', 6, '2020-12-20', 'Habis Pakai', 'Sandblasting');

-- --------------------------------------------------------

--
-- Table structure for table `tools_hp`
--

CREATE TABLE `tools_hp` (
  `kode_tools_hp` varchar(7) NOT NULL,
  `nama_tools_hp` varchar(300) NOT NULL,
  `frek_pem_hp` enum('Setiap Hari','1x dalam seminggu','2x dalam seminggu','3x dalam seminggu','4x dalam seminggu','1x dalam sebulan','2x dalam sebulan','3x dalam sebulan','4x dalam sebulan','Jarang (1-2 bulan sekali)','Sangat Jarang (3 bulan sekali)','< 50 pcs perbulan','50 pcs s/d 100 pcs','> 100 pcs perbulan','') NOT NULL,
  `qty_hp` int(4) NOT NULL,
  `qty_diambil_hp` int(4) NOT NULL,
  `satuan` enum('set','ea','pcs') NOT NULL,
  `rak_hp` enum('Rak A','Rak B','Rak C','Rak D','Rak E','Etalase') NOT NULL,
  `tgl_msk_hp` date NOT NULL,
  `keterangan` enum('Milling Konvensional','Cutting Tools','Gergaji Tangan','Tools Mesin CNC','Bubut Konvensional','Sandblasting','Carbide Tools','Handsnai','Handtap','Mesin Bor','Gerinda Tools','Mesin Amplas','Perkakas','Kunci Perkakas','Alat Ukur','Pompa Test') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools_hp`
--

INSERT INTO `tools_hp` (`kode_tools_hp`, `nama_tools_hp`, `frek_pem_hp`, `qty_hp`, `qty_diambil_hp`, `satuan`, `rak_hp`, `tgl_msk_hp`, `keterangan`) VALUES
('C12004', 'Cutting wheel 14\"', '3x dalam seminggu', 4, 0, 'pcs', 'Rak C', '2020-12-20', 'Cutting Tools'),
('C12005', 'Cutting wheel Ideko', '3x dalam seminggu', 9, 0, 'pcs', 'Rak C', '2020-12-20', 'Cutting Tools'),
('C12006', 'Cutting wheel Resibon', '3x dalam seminggu', 2, 0, 'pcs', 'Rak C', '2020-12-20', 'Cutting Tools'),
('C12007', 'Cutting wheel WD', '3x dalam seminggu', 31, 0, 'pcs', 'Rak C', '2020-12-20', 'Cutting Tools'),
('C13008', 'Mata gergaji besi pita', '3x dalam seminggu', 10, 0, 'pcs', 'Rak C', '2020-12-20', 'Gergaji Tangan'),
('C13009', 'Mata Gergaji Besi', '2x dalam seminggu', 9, 0, 'pcs', 'Rak C', '2020-12-20', 'Gergaji Tangan'),
('C14010', 'Pisau insert groping TDT 1,0', '1x dalam seminggu', 15, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14011', 'Pisau insert Karloy pc5300', '2x dalam seminggu', 26, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14012', 'Pisau insert Vcmt 432 sm', '2x dalam seminggu', 8, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14013', 'Pisau insert DNMG-FA DNMG150404N-FA T3000Z', '1x dalam seminggu', 10, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14014', 'Pisau insert Ccmt 060204 HM', '2x dalam seminggu', 4, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14015', 'pisau insert turning konvensional', '2x dalam seminggu', 3, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14016', 'pisau insert milling konvensional', '2x dalam seminggu', 3, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14017', 'Pisau insert Bdmt 11 T308 ER', '2x dalam seminggu', 10, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C14018', 'Pisau insert MGMN 150 G', '2x dalam seminggu', 5, 0, 'pcs', 'Rak C', '2020-12-20', 'Tools Mesin CNC'),
('C25019', 'Pisau widia kanan', '< 50 pcs perbulan', 27, 0, 'pcs', 'Rak C', '2020-12-20', 'Bubut Konvensional'),
('C25020', 'Pisau widia kiri', '< 50 pcs perbulan', 35, 0, 'pcs', 'Rak C', '2020-12-20', 'Bubut Konvensional'),
('C25021', 'Pisau widia rumah', '< 50 pcs perbulan', 13, 0, 'pcs', 'Rak C', '2020-12-20', 'Bubut Konvensional'),
('C27025', 'Endmill Hss diameter 1mm', '2x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27026', 'Ballnose HSS diameter 12mm', '1x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27027', 'Endmill Hss diameter 11mm', '1x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27028', 'Endmill Hss diameter 3mm', '2x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27029', 'Endmill Hss diameter 5mm', '1x dalam sebulan', 2, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27030', 'Endmill Hss diameter 6mm', 'Jarang (1-2 bulan sekali)', 5, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27031', 'Ballnose HSS diameter 25mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27032', 'Endmill Hss diameter 10mm', 'Jarang (1-2 bulan sekali)', 4, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27033', 'Endmill Hss diameter 12mm', '3x dalam sebulan', 8, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27034', 'Endmill Hss diameter 6,5mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27035', 'Endmill Hss diameter 8mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27036', 'Endmill Hss diameter 9mm', '2x dalam sebulan', 2, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27037', 'Endmill Hss diameter 17mm', '2x dalam sebulan', 2, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27038', 'Endmill Hss diameter 18mm', '1x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27039', 'Endmill Hss diameter 19mm', '2x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27040', 'Endmill Hss diameter 20mm', '1x dalam sebulan', 4, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C27041', 'Endmill Hss diameter 28mm', '1x dalam sebulan', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Carbide Tools'),
('C31001', 'Collet 1,6', 'Sangat Jarang (3 bulan sekali)', 8, 0, 'pcs', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C31002', 'Collet 1,6 wp 25', 'Sangat Jarang (3 bulan sekali)', 17, 0, 'pcs', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C31003', 'Collet 2,4', 'Sangat Jarang (3 bulan sekali)', 15, 0, 'pcs', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C36022', 'keramik sandblast', 'Sangat Jarang (3 bulan sekali)', 5, 0, 'pcs', 'Rak C', '2020-12-20', 'Sandblasting'),
('C36023', 'keramik sandblast cabinet', 'Sangat Jarang (3 bulan sekali)', 3, 0, 'pcs', 'Rak C', '2020-12-20', 'Sandblasting'),
('C36024', 'keramik sandblast cabinet besi', 'Sangat Jarang (3 bulan sekali)', 2, 0, 'pcs', 'Rak C', '2020-12-20', 'Sandblasting'),
('C38042', 'Reamer HSS diameter  10mm', 'Jarang (1-2 bulan sekali)', 2, 0, 'ea', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C38043', 'Reamer HSS diameter  12mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C38044', 'Reamer HSS diameter  15mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C38045', 'Reamer HSS diameter 13mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Milling Konvensional'),
('C38046', 'Reamer HSS diameter 14mm', 'Jarang (1-2 bulan sekali)', 1, 0, 'ea', 'Rak C', '2020-12-20', 'Milling Konvensional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `fk_peminjaman_karyawan` (`nik`),
  ADD KEY `fk_peminjaman_tools` (`kode_tools`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`),
  ADD KEY `fk_pengambilan_karyawan` (`nik`),
  ADD KEY `fk_pengambilan_tools` (`kode_tools_hp`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `fk_pengembalian_karyawan` (`nik`),
  ADD KEY `fk_pengembalian_tools` (`kode_tools`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`kode_tools`);

--
-- Indexes for table `tools_hp`
--
ALTER TABLE `tools_hp`
  ADD PRIMARY KEY (`kode_tools_hp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peminjaman_tools` FOREIGN KEY (`kode_tools`) REFERENCES `tools` (`kode_tools`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD CONSTRAINT `fk_pengambilan_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengambilan_tools` FOREIGN KEY (`kode_tools_hp`) REFERENCES `tools_hp` (`kode_tools_hp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_pengembalian_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengembalian_tools` FOREIGN KEY (`kode_tools`) REFERENCES `tools` (`kode_tools`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
