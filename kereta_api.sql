-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 09:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kereta_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `no_telp`, `nama_lengkap`) VALUES
(1, 'admin@res-train.com', '202cb962ac59075b964b07152d234b70', '081231212', 'Muhammad Rikzan'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '75689709', '11asA');

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id_pesan` int(100) NOT NULL,
  `code_barcode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id_pesan`, `code_barcode`) VALUES
(12, '323212749763');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kereta` int(11) NOT NULL,
  `id_stasiun_asal` int(11) NOT NULL,
  `id_stasiun_tujuan` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `harga` int(30) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `sisa_kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kereta`, `id_stasiun_asal`, `id_stasiun_tujuan`, `tanggal_berangkat`, `jam_berangkat`, `harga`, `kapasitas`, `sisa_kapasitas`) VALUES
(1, 1, 1, 2, '2019-02-28', '05:00:00', 600000, 12, 12),
(4, 3, 1, 1, '2019-01-02', '01:01:00', 15, 71, 0),
(5, 1, 1, 4, '2019-02-28', '03:00:00', 70000, 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `j_keluhan` varchar(20) NOT NULL,
  `d_keluhan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `id_user`, `j_keluhan`, `d_keluhan`) VALUES
(1, 1, 'frer', 'ferdfesrse');

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` int(11) NOT NULL,
  `nama_kereta` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `nama_kereta`) VALUES
(1, 'Penataran'),
(2, 'Dhoho'),
(3, 'Sriwijaya'),
(4, 'Sriwijaya'),
(5, 'qwertyc');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pesan`
--

CREATE TABLE `konfirmasi_pesan` (
  `no_resi` varchar(20) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `jam_transfer` time NOT NULL,
  `id_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `konfirmasi_pesan`
--

INSERT INTO `konfirmasi_pesan` (`no_resi`, `no_rek`, `tgl_transfer`, `jam_transfer`, `id_pesan`) VALUES
('323', 323, '2019-01-01', '01:00:00', 3),
('34342', 3212, '2019-02-20', '00:21:00', 13),
('34343', 43434, '2019-01-01', '01:01:00', 6),
('4565', 454, '2019-02-20', '05:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nomor_bangku` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `id_jadwal`, `nomor_bangku`, `status`) VALUES
(3, 4, 1, '4', 'Lunas'),
(5, 4, 1, '2', 'Belum Bayar'),
(6, 4, 1, '5', 'Dalam Proses'),
(7, 4, 1, '6', 'Belum Bayar'),
(8, 4, 1, '7', 'Belum Bayar'),
(9, 4, 1, '8', 'Belum Bayar'),
(10, 4, 1, '9', 'Belum Bayar'),
(12, 4, 1, '11', 'Lunas'),
(13, 4, 1, '12', 'Dalam Proses'),
(14, 4, 1, '1', 'Belum Bayar'),
(15, 4, 1, '3', 'Belum Bayar'),
(16, 4, 1, '10', 'Belum Bayar'),
(17, 4, 4, '16', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `stasiun_asal`
--

CREATE TABLE `stasiun_asal` (
  `id_stasiun_asal` int(11) NOT NULL,
  `nama_stasiun_asal` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun_asal`
--

INSERT INTO `stasiun_asal` (`id_stasiun_asal`, `nama_stasiun_asal`) VALUES
(1, 'Surabaya'),
(2, 'Sidoarjo'),
(3, 'Mojokerto'),
(4, 'Jombang');

-- --------------------------------------------------------

--
-- Table structure for table `stasiun_tujuan`
--

CREATE TABLE `stasiun_tujuan` (
  `id_stasiun_tujuan` int(11) NOT NULL,
  `nama_stasiun_tujuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun_tujuan`
--

INSERT INTO `stasiun_tujuan` (`id_stasiun_tujuan`, `nama_stasiun_tujuan`) VALUES
(1, 'Surabaya'),
(2, 'Sidoarjo'),
(3, 'Mojokerto'),
(4, 'Jombang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_telepon`, `email`, `username`, `password`) VALUES
(1, 'Rikzan', 'Surabaya', '082989821', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(2, 'Syahrul', 'Sidoarjo', '084938983', 'syahrul@gmail.com', 'sahrul', '202cb962ac59075b964b07152d234b70'),
(3, 'nicky', 'Jombang', '08281818', 'nicki@gmail.com', 'niki', '202cb962ac59075b964b07152d234b70'),
(4, 'gfgf', 'fgfg', 'fggf', '3563646', 'budi', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `konfirmasi_pesan`
--
ALTER TABLE `konfirmasi_pesan`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `stasiun_asal`
--
ALTER TABLE `stasiun_asal`
  ADD PRIMARY KEY (`id_stasiun_asal`);

--
-- Indexes for table `stasiun_tujuan`
--
ALTER TABLE `stasiun_tujuan`
  ADD PRIMARY KEY (`id_stasiun_tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_kereta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `stasiun_asal`
--
ALTER TABLE `stasiun_asal`
  MODIFY `id_stasiun_asal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stasiun_tujuan`
--
ALTER TABLE `stasiun_tujuan`
  MODIFY `id_stasiun_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
