-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 04:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mabac`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_peserta`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(31, 1, 1, '90', 'Sangat Bagus'),
(32, 1, 2, '89', 'Sangat Bagus'),
(33, 1, 3, '92', 'Sangat Bagus'),
(34, 1, 4, '85', 'Sangat Bagus'),
(35, 1, 5, '88', 'Sangat Bagus'),
(36, 1, 6, '85', 'Sangat Bagus'),
(37, 2, 1, '88', 'Sangat Bagus'),
(38, 2, 2, '84', 'Sangat Bagus'),
(39, 2, 3, '90', 'Sangat Bagus'),
(40, 2, 4, '86', 'Sangat Bagus'),
(41, 2, 5, '85', 'Sangat Bagus'),
(42, 2, 6, '80', 'Sangat Bagus'),
(43, 3, 1, '85', 'Sangat Bagus'),
(44, 3, 2, '85', 'Sangat Bagus'),
(45, 3, 3, '84', 'Sangat Bagus'),
(46, 3, 4, '92', 'Sangat Bagus'),
(47, 3, 5, '89', 'Sangat Bagus'),
(48, 3, 6, '80', 'Sangat Bagus'),
(49, 4, 1, '86', 'Sangat Bagus'),
(50, 4, 2, '84', 'Sangat Bagus'),
(51, 4, 3, '88', 'Sangat Bagus'),
(52, 4, 4, '83', 'Sangat Bagus'),
(53, 4, 5, '89', 'Sangat Bagus'),
(54, 4, 6, '82', 'Sangat Bagus'),
(55, 5, 1, '88', 'Sangat Bagus'),
(56, 5, 2, '86', 'Sangat Bagus'),
(57, 5, 3, '89', 'Sangat Bagus'),
(58, 5, 4, '90', 'Sangat Bagus'),
(59, 5, 5, '89', 'Sangat Bagus'),
(60, 5, 6, '81', 'Sangat Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `id_bobot_keputusan` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot_keputusan` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`id_bobot_keputusan`, `id_peserta`, `id_kriteria`, `bobot_keputusan`) VALUES
(301, 1, 1, '70.00'),
(302, 1, 2, '40.00'),
(303, 1, 3, '30.00'),
(304, 1, 4, '24.40'),
(305, 1, 5, '12.50'),
(306, 1, 6, '10.00'),
(307, 2, 1, '56.00'),
(308, 2, 2, '20.00'),
(309, 2, 3, '26.25'),
(310, 2, 4, '26.60'),
(311, 2, 5, '20.00'),
(312, 2, 6, '20.00'),
(313, 3, 1, '35.00'),
(314, 3, 2, '24.00'),
(315, 3, 3, '15.00'),
(316, 3, 4, '40.00'),
(317, 3, 5, '10.00'),
(318, 3, 6, '20.00'),
(319, 4, 1, '42.00'),
(320, 4, 2, '20.00'),
(321, 4, 3, '22.50'),
(322, 4, 4, '20.00'),
(323, 4, 5, '10.00'),
(324, 4, 6, '16.00'),
(325, 5, 1, '56.00'),
(326, 5, 2, '28.00'),
(327, 5, 3, '24.45'),
(328, 5, 4, '35.60'),
(329, 5, 5, '10.00'),
(330, 5, 6, '18.00');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `bobot` varchar(5) NOT NULL DEFAULT '0',
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `tipe`) VALUES
(1, 'Komputer', '35', 'benefit'),
(2, 'Komunikasi', '20', 'benefit'),
(3, 'Kepemimpinan', '15', 'benefit'),
(4, 'Berhitung', '20', 'benefit'),
(5, 'Integritas', '10', 'cost'),
(6, 'Penampilan', '10', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_batas`
--

CREATE TABLE `matriks_batas` (
  `id_batas` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai_batas` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_batas`
--

INSERT INTO `matriks_batas` (`id_batas`, `id_kriteria`, `nilai_batas`) VALUES
(552, 1, '50.32'),
(553, 2, '25.49'),
(554, 3, '23.04'),
(555, 4, '28.40'),
(556, 5, '12.01'),
(557, 6, '16.30');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `normalisasi` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id_normalisasi`, `id_peserta`, `id_kriteria`, `normalisasi`) VALUES
(211, 1, 1, '1.00'),
(212, 1, 2, '1.00'),
(213, 1, 3, '1.00'),
(214, 1, 4, '0.22'),
(215, 1, 5, '0.25'),
(216, 1, 6, '0.00'),
(217, 2, 1, '0.60'),
(218, 2, 2, '0.00'),
(219, 2, 3, '0.75'),
(220, 2, 4, '0.33'),
(221, 2, 5, '1.00'),
(222, 2, 6, '1.00'),
(223, 3, 1, '0.00'),
(224, 3, 2, '0.20'),
(225, 3, 3, '0.00'),
(226, 3, 4, '1.00'),
(227, 3, 5, '0.00'),
(228, 3, 6, '1.00'),
(229, 4, 1, '0.20'),
(230, 4, 2, '0.00'),
(231, 4, 3, '0.50'),
(232, 4, 4, '0.00'),
(233, 4, 5, '0.00'),
(234, 4, 6, '0.60'),
(235, 5, 1, '0.60'),
(236, 5, 2, '0.40'),
(237, 5, 3, '0.63'),
(238, 5, 4, '0.78'),
(239, 5, 5, '0.00'),
(240, 5, 6, '0.80');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan_perbatasan`
--

CREATE TABLE `perkiraan_perbatasan` (
  `id_perkiraan` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai_perkiraan` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perkiraan_perbatasan`
--

INSERT INTO `perkiraan_perbatasan` (`id_perkiraan`, `id_peserta`, `id_kriteria`, `nilai_perkiraan`) VALUES
(81, 1, 1, '19.68'),
(82, 1, 2, '14.51'),
(83, 1, 3, '6.96'),
(84, 1, 4, '-4.00'),
(85, 1, 5, '0.49'),
(86, 1, 6, '-6.30'),
(87, 2, 1, '5.68'),
(88, 2, 2, '-5.49'),
(89, 2, 3, '3.21'),
(90, 2, 4, '-1.80'),
(91, 2, 5, '7.99'),
(92, 2, 6, '3.70'),
(93, 3, 1, '-15.3'),
(94, 3, 2, '-1.49'),
(95, 3, 3, '-8.04'),
(96, 3, 4, '11.60'),
(97, 3, 5, '-2.01'),
(98, 3, 6, '3.70'),
(99, 4, 1, '-8.32'),
(100, 4, 2, '-5.49'),
(101, 4, 3, '-0.54'),
(102, 4, 4, '-8.40'),
(103, 4, 5, '-2.01'),
(104, 4, 6, '-0.30'),
(105, 5, 1, '5.68'),
(106, 5, 2, '2.51'),
(107, 5, 3, '1.41'),
(108, 5, 4, '7.20'),
(109, 5, 5, '-2.01'),
(110, 5, 6, '1.70');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama_peserta`, `umur`, `alamat`, `jenis_kelamin`, `image`) VALUES
(1, 'Firman', '19 Tahun', 'Arjawinangun', 'laki-laki', '431434.jpg'),
(2, 'Manaf', '19 Tahun', 'Panguragan', 'laki-laki', '713941.jpg'),
(3, 'Cashadi', '19 Tahun', 'Susukan', 'laki-laki', '969454.jpg'),
(4, 'Mansyur', '19', 'Tegalgubug', 'laki-laki', '969454.jpg'),
(5, 'Hadi', '19 Tahun', 'Panguragan', 'laki-laki', '969454.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rangking`
--

CREATE TABLE `rangking` (
  `id_rangking` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `nilai_rangking` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `id_peserta`, `nama_peserta`, `nilai_rangking`) VALUES
(21, 1, 'Firman', '31.34'),
(22, 2, 'Manaf', '13.29'),
(23, 3, 'Cashadi', '-11.54'),
(24, 4, 'Mansyur', '-25.06'),
(25, 5, 'Hadi', '16.49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `image`, `level`) VALUES
(1, 'fahminudin', 'nudinfahmi04@gmail.com', '1ab7c96fa289f4a317ea2780d8b312bd', 'KTP.jpeg', 'admin'),
(2, 'Ibnu Abbas', 'ibnuabbas19@gmail.com', '4c76fe14f03682c862fd985368d816cc', '547711.jpg', 'user'),
(3, 'Solekhudin', 'solekhudin1992@gmail.com', '76fea4f016ba7dc0c27ab856460fb292', '683740.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_bobot_keputusan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `matriks_batas`
--
ALTER TABLE `matriks_batas`
  ADD PRIMARY KEY (`id_batas`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`);

--
-- Indexes for table `perkiraan_perbatasan`
--
ALTER TABLE `perkiraan_perbatasan`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
  ADD PRIMARY KEY (`id_rangking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_bobot_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matriks_batas`
--
ALTER TABLE `matriks_batas`
  MODIFY `id_batas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `perkiraan_perbatasan`
--
ALTER TABLE `perkiraan_perbatasan`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
