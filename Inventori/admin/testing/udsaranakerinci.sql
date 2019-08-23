-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 10:54 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udsaranakerinci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `level`) VALUES
(8, 'admin', '069c546d1d97fd9648d8142b3e0fd3a3', 'Admin'),
(15, 'ridwan', 'd584c96e6c1ba3ca448426f66e552e8e', 'Sales'),
(16, 'Lawson', 'd584c96e6c1ba3ca448426f66e552e8e', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(15) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nm_brg`, `jenis_brg`, `satuan`, `harga`) VALUES
(1, 'Coconut Pariaman', 'Minuman', 'Karton', 110000),
(2, 'Coconut Original', 'Tidak Bisa Dimakan', 'Karung', 210000),
(3, 'Coconut Strawberrys', 'Makanan', 'Karton', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_laku`
--

CREATE TABLE `barang_laku` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `daerah` text NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_laku`
--

INSERT INTO `barang_laku` (`id`, `tanggal`, `daerah`, `nama`, `jumlah`, `satuan`) VALUES
(75, '2018-12-24', 'Sumatera_Barat', 'Beras Solok', 3, 'Kg'),
(76, '2018-12-06', 'Kota_Pariaman', 'Ciken kentaki', 4, 'Saik'),
(77, '0000-00-00', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_salin` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `no_sj` varchar(15) NOT NULL,
  `id_sup` varchar(15) NOT NULL,
  `id_brg` varchar(15) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `letak_brg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_salin`, `tgl_masuk`, `no_sj`, `id_sup`, `id_brg`, `jenis_brg`, `satuan`, `jumlah`, `harga_beli`, `harga_jual`, `letak_brg`) VALUES
(4, '2019-02-24', 'SJ-001', '3', '3', 'Makanan', 'Karton', 121, 250000, 270000, '1A'),
(5, '2019-02-25', 'SJ-021', '1', '1', 'Minuman', 'Karton', 90, 160000, 200000, '3C');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Tidak Bisa Dimakan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plg` int(15) NOT NULL,
  `nm_plg` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_plg`, `nm_plg`, `alamat`, `telp`) VALUES
(1, 'Ridwan Lawson', 'Jl Kampung Baru No.32', '081270389862'),
(2, 'Ridwan Ibrahim', 'Jl Kampung Baru No.37', '081270389863'),
(3, 'Gita Ketawa', 'Jl Kampung Baru No.32', '081270389811'),
(4, 'Lawson Roses', 'Jl Jalan', '08911911911');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_order` int(15) NOT NULL,
  `tgl_faktur` date NOT NULL,
  `nama_sales` varchar(30) NOT NULL,
  `id_plg` varchar(15) NOT NULL,
  `id_brg` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlahk` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_order`, `tgl_faktur`, `nama_sales`, `id_plg`, `id_brg`, `harga`, `jumlahk`, `total_hrg`) VALUES
(1, '2019-02-24', 'ridwan', '4', '3', 270000, 20, 5400000),
(2, '2019-02-25', 'ridwan', '3', '3', 200000, 20, 4000000),
(3, '2019-02-25', 'ridwan', '3', '1', 500000, 4, 2000000),
(4, '2019-02-25', 'ridwan', '3', '1', 500000, 3, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(8, 'Karton'),
(9, 'Karung'),
(10, 'Ikat');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(15) NOT NULL,
  `nm_sup` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nm_sup`, `alamat`, `tlp`) VALUES
(1, 'CV Maju Bersama', 'Jl Yang Lurus', '081277332290'),
(2, 'CV Toko Tiki', 'Jl Yang Lurus', '081277332290'),
(3, 'PT Maju Jaya', 'Jl Johor Bahru No.31', '081270389910');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `barang_laku`
--
ALTER TABLE `barang_laku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_salin`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_laku`
--
ALTER TABLE `barang_laku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kd_salin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_plg` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_order` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
