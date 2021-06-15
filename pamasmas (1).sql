-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 07:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pamasmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bpmspams`
--

CREATE TABLE `bpmspams` (
  `id` int(101) NOT NULL,
  `nama_bpmspams` varchar(100) NOT NULL,
  `alamat_bpmspams` varchar(100) NOT NULL,
  `nohp_bpmspams` int(13) NOT NULL,
  `noskpendirian_bpmspams` varchar(50) NOT NULL,
  `tanggalsk_bpmspams` date NOT NULL,
  `adart_bpmspams` varchar(30) NOT NULL,
  `nosktarif_bpmspams` varchar(30) NOT NULL,
  `ketua_bpmspams` varchar(50) NOT NULL,
  `bendahara_bpmspams` varchar(50) NOT NULL,
  `penduduk` int(10) NOT NULL,
  `penduduk_kk` int(5) NOT NULL,
  `lakilaki_jiwa` int(10) NOT NULL,
  `perempuan_jiwa` int(10) NOT NULL,
  `modal_awal` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='percobaan';

--
-- Dumping data for table `bpmspams`
--

INSERT INTO `bpmspams` (`id`, `nama_bpmspams`, `alamat_bpmspams`, `nohp_bpmspams`, `noskpendirian_bpmspams`, `tanggalsk_bpmspams`, `adart_bpmspams`, `nosktarif_bpmspams`, `ketua_bpmspams`, `bendahara_bpmspams`, `penduduk`, `penduduk_kk`, `lakilaki_jiwa`, `perempuan_jiwa`, `modal_awal`) VALUES
(6, 'Tirta Aji', 'Desa Ngablak Kecamatan Ngablak Magelang', 2147483647, '88/SK/2009', '0000-00-00', 'Ada', '665', 'arif', 'Adit', 550, 20, 275, 275, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(10) NOT NULL,
  `kode_inventaris` int(5) NOT NULL,
  `nama_inventaris` varchar(100) NOT NULL,
  `tanggalserahterima` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `nominal_awal` int(24) NOT NULL,
  `tahun_susut` int(5) NOT NULL,
  `susut_perbulan` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `kode_inventaris`, `nama_inventaris`, `tanggalserahterima`, `jumlah`, `total`, `nominal_awal`, `tahun_susut`, `susut_perbulan`) VALUES
(4, 12, 'Gedung Kantor', '2021-03-06', 1, 2147483647, 1000000000, 2080, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah_kk` int(5) NOT NULL,
  `jumlah_jiwa` int(5) NOT NULL,
  `tanggal_pasang` date NOT NULL,
  `id_tarif` int(20) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `biaya` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nik`, `nama_pelanggan`, `alamat`, `jumlah_kk`, `jumlah_jiwa`, `tanggal_pasang`, `id_tarif`, `golongan`, `biaya`) VALUES
(14, 3131, 'Muhamad ', 'Dusun Wonolelo rt 23 rw 06', 1, 5, '2021-03-15', 8, 'sosial', 1000000),
(7, 2147483647, 'ARIF', 'Dusun wonolelo Rt23', 1, 4, '2021-03-01', 8, 'sosial', 1000000),
(15, 123123, 'Jumirah', 'Desa Purnorejo', 3, 4, '2021-03-22', 5, 'Rumah Tangga', 1000000),
(11, 33223, 'STEFANUS', 'DUSUN WONOREJO', 4, 10, '2021-03-06', 6, 'Perusahaan', 10000000),
(12, 3322, 'SUMIYATI', 'DUSUN WONOLELO', 2, 10, '2021-03-06', 5, 'Rumah Tangga', 1000000),
(13, 2212, 'PARJO', 'DUSUN WONOLELO', 4, 15, '2021-03-05', 6, 'Perusahaan', 10000000),
(16, 9095678, 'Kuswanto', 'Dusun Wonorejo', 2, 7, '2021-03-22', 5, 'Rumah Tangga', 1000000),
(17, 2147483647, 'Alip Dugong', 'cabean Wetan', 1, 4, '2021-05-18', 5, 'Rumah Tangga', 1000000),
(19, 2147483647, 'Gio', 'mangli', 2, 23, '2021-06-17', 8, 'sosial', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan`
--

CREATE TABLE `pencatatan` (
  `id` int(20) NOT NULL,
  `no_nota` int(20) NOT NULL,
  `tanggal_byrpelanggan` datetime NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `id_tarif` int(20) NOT NULL,
  `meter_awal` int(20) NOT NULL,
  `meter_akhir` int(20) NOT NULL,
  `meter_pemakaian` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencatatan`
--

INSERT INTO `pencatatan` (`id`, `no_nota`, `tanggal_byrpelanggan`, `id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `bulan`, `id_tarif`, `meter_awal`, `meter_akhir`, `meter_pemakaian`, `total_bayar`, `keterangan`) VALUES
(1, 1, '2021-03-10 03:52:40', 7, 'Arif', 'Dusun wonolelo Rt23', '', 5, 20, 30, 10, 10000, 'LUNAS'),
(2, 2, '2021-03-10 08:46:10', 7, 'Arif', 'Dusun Wonolelo rt23', '', 5, 0, 50, 10, 10000, 'LUNAS'),
(3, 3, '2021-03-10 03:34:13', 8, 'Gio', 'jkasjs', '', 5, 0, 0, 12, 1000, 'LUNAS'),
(6, 0, '0000-00-00 00:00:00', 11, 'STEFANUS', 'DUSUN WONOREJO', '', 6, 0, 0, 0, 0, 'BARU'),
(7, 0, '0000-00-00 00:00:00', 12, 'SUMIYATI', 'DUSUN WONOLELO', '', 5, 0, 0, 0, 0, 'BARU'),
(8, 0, '2021-03-09 07:18:39', 13, 'PARJO', 'DUSUN WONOLELO', '', 5, 0, 0, 0, 0, 'LUNAS'),
(9, 4, '2021-03-10 08:29:14', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 6, 50, 120, 70, 0, 'LUNAS'),
(10, 5, '2021-03-09 07:40:34', 12, 'SUMIYATI', 'DUSUN WONOLELO', 'MARET', 5, 0, 67, 67, 0, 'LUNAS'),
(11, 6, '2021-03-09 07:21:52', 13, 'PARJO', 'DUSUN WONOLELO', 'MARET', 5, 0, 90, 90, 0, 'LUNAS'),
(12, 7, '2021-03-09 07:19:21', 11, 'STEFANUS', 'DUSUN WONOREJO', 'MARET', 6, 0, 60, 60, 0, 'LUNAS'),
(13, 8, '2021-03-09 07:37:46', 13, 'PARJO', 'DUSUN WONOLELO', 'MARET', 6, 90, 120, 30, 0, 'LUNAS'),
(14, 9, '2021-03-11 03:06:11', 11, 'STEFANUS', 'DUSUN WONOREJO', 'MARET', 6, 60, 70, 10, 60000, 'LUNAS'),
(15, 10, '2021-03-10 08:39:50', 12, 'SUMIYATI', 'DUSUN WONOLELO', 'MARET', 5, 67, 75, 8, 24000, 'LUNAS'),
(16, 11, '2021-03-12 07:33:30', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 6, 120, 150, 30, 180000, 'LUNAS'),
(17, 12, '2021-03-15 09:44:07', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 6, 150, 200, 50, 300000, 'LUNAS'),
(18, 13, '2021-03-19 07:02:31', 11, 'STEFANUS', 'DUSUN WONOREJO', 'MARET', 6, 70, 79, 9, 54000, 'LUNAS'),
(19, 14, '2021-03-19 04:26:50', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 6, 200, 250, 50, 300000, 'LUNAS'),
(20, 0, '0000-00-00 00:00:00', 14, 'Muhamad ', 'Dusun Wonolelo rt 23 rw 06', 'BARU', 8, 0, 0, 0, 0, 'BARU'),
(21, 15, '2021-03-15 04:53:12', 14, 'Muhamad ', 'Dusun Wonolelo rt 23 rw 06', 'MARET', 8, 0, 10, 10, 21500, 'LUNAS'),
(22, 16, '2021-03-20 12:50:51', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 8, 250, 300, 50, 101500, 'LUNAS'),
(23, 17, '2021-03-22 12:48:58', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 8, 300, 350, 50, 101500, 'LUNAS'),
(24, 18, '2021-03-22 01:02:12', 12, 'SUMIYATI', 'DUSUN WONOLELO', 'MARET', 5, 75, 200, 125, 377000, 'LUNAS'),
(25, 0, '0000-00-00 00:00:00', 15, 'Jumirah', 'Desa Purnorejo', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(26, 0, '0000-00-00 00:00:00', 16, 'Kuswanto', 'Dusun Wonorejo', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(27, 19, '2021-03-23 04:26:55', 15, 'Jumirah', 'Desa Purnorejo', 'MARET', 5, 0, 8, 8, 26000, 'LUNAS'),
(28, 20, '2021-03-24 02:10:10', 15, 'Jumirah', 'Desa Purnorejo', 'MARET', 5, 8, 10, 2, 8000, 'BELUM LUNAS'),
(29, 21, '2021-05-23 07:14:39', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MARET', 8, 350, 360, 10, 21500, 'LUNAS'),
(30, 0, '0000-00-00 00:00:00', 17, 'Kabut', 'Dusun Weduri', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(31, 22, '2021-04-06 06:41:09', 17, 'Kabut', 'Dusun Weduri', 'APRIL', 5, 0, 13, 13, 41000, 'BELUM LUNAS'),
(32, 23, '2021-04-06 06:41:58', 17, 'Kabut', 'Dusun Weduri', 'APRIL', 5, 13, 20, 7, 23000, 'BELUM LUNAS'),
(33, 24, '2021-04-06 06:42:08', 7, 'ARIF', 'Dusun wonolelo Rt23', 'APRIL', 8, 360, 365, 5, 11500, 'BELUM LUNAS'),
(34, 25, '2021-04-06 07:48:33', 15, 'Jumirah', 'Desa Purnorejo', 'APRIL', 5, 10, 15, 5, 17000, 'BELUM LUNAS'),
(35, 0, '0000-00-00 00:00:00', 17, 'Alip Dugong', 'cabean Wetan', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(36, 26, '2021-05-18 09:10:01', 17, 'Alip Dugong', 'cabean Wetan', 'MEI', 5, 0, 20, 20, 62000, 'BELUM LUNAS'),
(37, 27, '2021-05-23 07:13:46', 7, 'ARIF', 'Dusun wonolelo Rt23', 'MEI', 8, 365, 400, 35, 71500, 'BELUM LUNAS'),
(38, 0, '0000-00-00 00:00:00', 18, 'Gio', 'sfsds', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(39, 0, '0000-00-00 00:00:00', 19, 'Gio', 'kjdshkjashdakjsh', 'BARU', 5, 0, 0, 0, 0, 'BARU'),
(40, 28, '2021-06-15 05:25:02', 16, 'Kuswanto', 'Dusun Wonorejo', 'JUNI', 5, 0, 20, 20, 62000, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(7) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pengurus` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nip`, `nama_pengurus`, `jenis_kelamin`, `jabatan`, `alamat`) VALUES
(1, '2098190', 'Bella Surya', 'Perempuan', 'Ketua Umum', 'Dusun Sukorejo');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(10) NOT NULL,
  `jenis_tarif` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `tarif1` int(10) NOT NULL,
  `pemeliharaan` int(10) NOT NULL,
  `administrasi` int(11) NOT NULL,
  `bulanan` int(20) NOT NULL,
  `denda` int(15) NOT NULL,
  `biaya_pemasangan` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `jenis_tarif`, `golongan`, `tarif1`, `pemeliharaan`, `administrasi`, `bulanan`, `denda`, `biaya_pemasangan`) VALUES
(5, 'Flat', 'Rumah Tangga', 1000, 1000, 1000, 3000, 2000, 1000000),
(8, 'sosial', 'sosial', 2000, 1000, 500, 2000, 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Muhamad Arif Wahyudi', 'admin', 'admin', 'admin'),
(9, 'Arif', 'Arif', 'arif', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vooucherbelanja`
--

CREATE TABLE `vooucherbelanja` (
  `id` int(10) NOT NULL,
  `tanggal_voucher` date NOT NULL,
  `toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(500) NOT NULL,
  `pembayaran_untuk` varchar(500) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vooucherbelanja`
--

INSERT INTO `vooucherbelanja` (`id`, `tanggal_voucher`, `toko`, `alamat_toko`, `pembayaran_untuk`, `harga`) VALUES
(3, '2019-08-16', 'Bayu Lestari', 'Jalan Sumenep', 'Pipa Air ', 20000),
(4, '2019-08-26', 'Surya Wibawa', 'Jalan Mahendra', 'Buku Tulis 3 pcs', 15000),
(7, '2021-03-10', 'senyum', 'kalimantan', 'pembelian pipa', 20000),
(6, '2021-03-23', 'Derrel Shop', 'Griya Mangli', 'Pembelian ATK', 70000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bpmspams`
--
ALTER TABLE `bpmspams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencatatan`
--
ALTER TABLE `pencatatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vooucherbelanja`
--
ALTER TABLE `vooucherbelanja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bpmspams`
--
ALTER TABLE `bpmspams`
  MODIFY `id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pencatatan`
--
ALTER TABLE `pencatatan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vooucherbelanja`
--
ALTER TABLE `vooucherbelanja`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
