-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 08:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `pwd`) VALUES
(2, 'Rivan Abdillah', 'Nekopan', '$2y$10$Oyo73OtWTwGp2XAHT/8UU.OHIXjtKZhdA4udCreGZLdSNwaX/78hq');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `rilis` varchar(50) NOT NULL,
  `gambarhp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `merk`, `spec`, `warna`, `harga`, `rilis`, `gambarhp`) VALUES
(1, 'Poco M4 Pro', '256GB 8GB RAM', 'Kuning', 'Rp. 2.817.000', '2021-11-11', 'Poco M4 Pro.jpg'),
(2, 'Redmi Note 8', '6GB RAM 128GB ROM', 'Blue', 'Rp. 2.099.000', '2019-11-16', 'Redmi Note 8.png'),
(5, 'Samsung M20', '4GB RAM 64GB ROM', 'Hitam', 'Rp. 1.699.000', '2019-01-28', 'Samsung M20.png'),
(7, 'Samsung A03', '4GB RAM 64GB ROM', 'Blue', 'Rp. 1.799.000', '2021-11-26', 'Samsung A03.jpg'),
(8, 'Samsung A52s 5G', '8GB RAM 256GB ROM', 'Putih', 'Rp. 5.999.999', '2021-08-17', 'Samsung A52s 5G.png');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `spec` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `rilis` varchar(100) NOT NULL,
  `gambarhp` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `merk`, `spec`, `warna`, `harga`, `rilis`, `gambarhp`, `id_user`) VALUES
(1, 'Poco M4 Pro', '256GB 8GB RAM', 'Kuning', 'Rp. 2.817.000', '2021-11-11', 'Poco M4 Pro.jpg', 10),
(2, 'Poco M4 Pro', '256GB 8GB RAM', 'Kuning', 'Rp. 2.817.000', '2021-11-11', 'Poco M4 Pro.jpg', 10),
(5, 'Samsung A52s 5G', '8GB RAM 256GB ROM', 'Putih', 'Rp. 5.999.999', '2021-08-17', 'Samsung A52s 5G.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `penyimpanan` varchar(25) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `pembayaran` varchar(25) NOT NULL,
  `tgl_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `merk`, `penyimpanan`, `warna`, `pembayaran`, `tgl_pembayaran`, `bukti_pembayaran`) VALUES
(3, 'samsung', '128 gb', 'Blue', 'Cash', '2022-10-28', 'samsung.png'),
(4, 'vivo', '64 gb', 'merah', 'Cash', '2022-10-28', 'vivo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `pwd`) VALUES
(5, 'Farizi', 'Shiro', '$2y$10$6jilQMLNiojtW8wjyy1.f.BASa80vRpy/iNchTRfCkELCUZEC6Yo.'),
(6, 'Siska Leontyne', 'Siskuy', '$2y$10$rInMrGRlOd.RQ3niDZFmAO8G4R9cqLiIQW4vTokQOHclEF0agvktq'),
(7, 'Alan', 'Aduasatu', '$2y$10$riLh2c0M1Yo/hSgB7vC6PO8lkez1YMgS4NoXq1jziqqnBPnuFMPgW'),
(8, 'Rivan', 'Neko', '$2y$10$RaQf8MnqQXoO8OvdbH2UwO1DSuxe6NJx.x2..PZVbg3q5xYlCGY/m'),
(9, 'Arsy', 'Halo', '$2y$10$132TxO01C4yD9KbqzPeD3eWkTCu99.J/P2wpc9uq1VG8NRfkiLF1u'),
(10, 'Adam', 'Suns', '$2y$10$aznCTGIzDtuiM27LAdki7u4KzVFY5Zg4YvPV5nklrc/pqBlox4NtW'),
(14, 'dddss', 'dsasa', '$2y$10$KwnqgfhhOUVIqXdvDKM0tuL3jwjMqujB1lk8fZqaXpUKYTST6fzF2'),
(15, '555', 'kkkk', '$2y$10$4b6wSWEIsTpi6C133zNDg.gGyvDrhxzkCU/8WONczpK.AQKXb81XO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
