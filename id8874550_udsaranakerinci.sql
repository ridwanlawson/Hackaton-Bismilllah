-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Agu 2019 pada 10.08
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8874550_udsaranakerinci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `level`) VALUES
(8, 'admin', '069c546d1d97fd9648d8142b3e0fd3a3', 'Admin'),
(17, 'Dadang', '202cb962ac59075b964b07152d234b70', 'Sales'),
(18, 'Ade', '202cb962ac59075b964b07152d234b70', 'Sales'),
(19, 'pimpinan', '202cb962ac59075b964b07152d234b70', 'Pimpinan'),
(20, 'sales', '9ed083b1436e5f40ef984b28255eef18', 'Sales');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(15) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brg`, `nm_brg`, `jenis_brg`, `satuan`, `harga`) VALUES
(1, 'Coconut Pisang', 'Makanan', 'Karton', 0),
(2, 'Coconut Original', 'Makanan', 'Karton', 0),
(3, 'Coconut coklat', 'Makanan', 'Karton', 0),
(4, 'Coconut Durian', 'Makanan', 'Karton', 0),
(5, 'sari gandum 115', 'Makanan', 'Karton', 0),
(6, 'sari gandum 240', 'Makanan', 'Karton', 0),
(7, 'roma kelapa', 'Makanan', 'Karton', 0),
(8, 'mi gelas', 'Makanan', 'Karton', 0),
(9, 'malkis coklat 24', 'Makanan', 'Karton', 0),
(10, 'kopiko toples 12 jar', 'Makanan', 'Karton', 0),
(11, 'blaster ciwi', 'Makanan', 'Karton', 0),
(12, 'blaster pop  hanger', 'Makanan', 'Karton', 0),
(13, 'blaster sak', 'Makanan', 'Karton', 0),
(14, 'blaster toples', 'Makanan', 'Karton', 0),
(15, 'canon ball', 'Makanan', 'Karton', 0),
(16, 'fullo 10,5', 'Makanan', 'Karton', 0),
(17, 'fullo blasto', 'Makanan', 'Karton', 0),
(18, 'fullo pack seru 42', 'Makanan', 'Karton', 0),
(19, 'kayaking 16', 'Makanan', 'Karton', 0),
(20, 'kayaking honey 7 gr', 'Makanan', 'Karton', 0),
(21, 'klop 110', 'Makanan', 'Karton', 0),
(22, 'klop 27,5', 'Makanan', 'Karton', 0),
(23, 'mint zing toples bsr', 'Makanan', 'Karton', 0),
(24, 'mint zing toples kcl', 'Makanan', 'Karton', 0),
(25, 'mint sak', 'Makanan', 'Karton', 0),
(26, 'mint biasa toples', 'Makanan', 'Karton', 0),
(27, 'mint zig-zag', 'Makanan', 'Karton', 0),
(28, 'mint zing', 'Makanan', 'Karton', 0),
(29, 'oops 8 c-144 rsc', 'Makanan', 'Karton', 0),
(30, 'oops fugu 30 gr', 'Makanan', 'Karton', 0),
(31, 'oops kunyak', 'Makanan', 'Karton', 0),
(32, 'oops pasta', 'Makanan', 'Karton', 0),
(33, 'oops renteng', 'Makanan', 'Karton', 0),
(34, 'station rasa', 'Makanan', 'Karton', 0),
(35, 'waffle 40 gr', 'Makanan', 'Karton', 0),
(36, 'waffle 8 gr', 'Makanan', 'Karton', 0),
(37, 'tango pouch 125', 'Makanan', 'Karton', 0),
(38, 'tango 130-u', 'Makanan', 'Karton', 0),
(39, 'tango 145 gr', 'Makanan', 'Karton', 0),
(40, 'tango 176 gr', 'Makanan', 'Karton', 0),
(41, 'tango 18,5 gr', 'Makanan', 'Karton', 0),
(42, 'tango 52 gr', 'Makanan', 'Karton', 0),
(43, 'tango 7,8 gr', 'Makanan', 'Karton', 0),
(44, 'tango 78', 'Makanan', 'Karton', 0),
(45, 'tango belgian 38', 'Makanan', 'Karton', 0),
(46, 'tango crunchake 80', 'Makanan', 'Karton', 0),
(47, 'beng-beng', 'Makanan', 'Karton', 0),
(48, 'better', 'Makanan', 'Karton', 0),
(49, 'choki-choki', 'Makanan', 'Karton', 0),
(50, 'kiss sak', 'Makanan', 'Karton', 0),
(51, 'kiss toples isi 12', 'Makanan', 'Karton', 0),
(52, 'kopiko sak', 'Makanan', 'Karton', 0),
(53, 'borobudur', 'Makanan', 'Karton', 0),
(54, 'jaipong', 'Makanan', 'Karton', 0),
(55, 'kerupuk tahu', 'Makanan', 'Ikat', 0),
(56, 'kiko', 'Makanan', 'Karton', 0),
(57, 'kwaci naraya', 'Makanan', 'Karton', 0),
(58, 'kwaci rebo', 'Makanan', 'Karton', 0),
(59, 'layer cake pandan', 'Makanan', 'Karton', 0),
(60, 'layer cake strawberry', 'Makanan', 'Karton', 0),
(61, 'layer cake coklat', 'Makanan', 'Karton', 0),
(62, 'makaroni', 'Makanan', 'Ikat', 0),
(63, 'mihun casper', 'Makanan', 'Ikat', 0),
(64, 'padimas coklat kecil', 'Makanan', 'Karton', 0),
(65, 'padimas pandan kecil', 'Makanan', 'Karton', 0),
(66, 'padimas stb kecil', 'Makanan', 'Karton', 0),
(67, 'pino', 'Makanan', 'Karton', 0),
(68, 'hamamie/wochip', 'Makanan', 'Ikat', 0),
(69, 'sosis  ayam', 'Makanan', 'Karton', 0),
(70, 'sosis sapi', 'Makanan', 'Karton', 0),
(71, 'asoy 15', 'Tidak Bisa Dimakan', 'Karung', 0),
(72, 'asoy 18', 'Tidak Bisa Dimakan', 'Karung', 0),
(73, 'asoy 24', 'Tidak Bisa Dimakan', 'Karung', 0),
(74, 'asoy 28', 'Tidak Bisa Dimakan', 'Karung', 0),
(75, 'asoy 35', 'Tidak Bisa Dimakan', 'Karung', 0),
(76, 'kertas nasi', 'Tidak Bisa Dimakan', 'Karung', 0),
(77, 'tisu sarbet', 'Tidak Bisa Dimakan', 'Ikat', 0),
(78, 'cristaline botol 600', 'Minuman', 'Karton', 0),
(79, 'cristaline cup 240', 'Minuman', 'Karton', 0),
(80, 'isocup', 'Minuman', 'Karton', 0),
(81, 'Kiranti DB', 'Minuman', 'Karton', 0),
(82, 'kiranti juice', 'Minuman', 'Karton', 0),
(83, 'kiranti pegal linu', 'Minuman', 'Karton', 0),
(84, 'kratingdeng botol', 'Minuman', 'Karton', 0),
(85, 'kratingdeng kaleng', 'Minuman', 'Karton', 0),
(86, 'liang cha', 'Minuman', 'Karton', 0),
(87, 'teh gelas 250', 'Minuman', 'Karton', 0),
(88, 'teh gelas 350', 'Minuman', 'Karton', 0),
(89, 'teh gelas 500', 'Minuman', 'Karton', 0),
(90, 'teh gelas big', 'Minuman', 'Karton', 0),
(91, 'you c vitamin', 'Minuman', 'Karton', 0),
(92, 'you c water', 'Minuman', 'Karton', 0),
(93, 'aqua 330', 'Minuman', 'Karton', 0),
(94, 'lasegar botol 200', 'Minuman', 'Karton', 0),
(95, 'lasegar botol 500', 'Minuman', 'Karton', 0),
(96, 'lasegar anak', 'Minuman', 'Karton', 0),
(97, 'lasegar kaleng stb', 'Minuman', 'Karton', 0),
(98, 'lasegar kaleng jambu', 'Minuman', 'Karton', 0),
(99, 'lasegar kaleng sirsak', 'Minuman', 'Karton', 0),
(100, 'mizone activ', 'Minuman', 'Karton', 0),
(101, 'mizone leci', 'Minuman', 'Karton', 0),
(102, 'mizone red', 'Minuman', 'Karton', 0),
(103, 'mizone orange', 'Minuman', 'Karton', 0),
(104, 'aqua 1500', 'Minuman', 'Karton', 0),
(105, 'soya', 'Minuman', 'Karton', 0),
(106, 'sarang burung', 'Minuman', 'Karton', 0),
(107, 'sikat gigi aero', 'Tidak Bisa Dimakan', 'Karton', 0),
(108, 'sikat gigi anak', 'Tidak Bisa Dimakan', 'Karton', 0),
(109, 'sikat gigi confident', 'Tidak Bisa Dimakan', 'Karton', 0),
(110, 'sikat gigi zig-zag', 'Tidak Bisa Dimakan', 'Karton', 0),
(111, 'sikat gigi double clean', 'Tidak Bisa Dimakan', 'Karton', 0),
(112, 'sikat gig extrim clean', 'Tidak Bisa Dimakan', 'Karton', 0),
(113, 'sikat gigi formula', 'Tidak Bisa Dimakan', 'Karton', 0),
(114, 'apilo 120', 'Makanan', 'Karton', 0),
(115, 'apilo blok 30', 'Makanan', 'Karton', 0),
(116, 'atb 120', 'Makanan', 'Karton', 0),
(117, 'atb 24', 'Makanan', 'Karton', 0),
(118, 'cocopuff coklat', 'Makanan', 'Karton', 0),
(119, 'cocopuff bluberry', 'Makanan', 'Karton', 0),
(120, 'cream 21 coklat', 'Makanan', 'Karton', 0),
(121, 'cream 21 lemon', 'Makanan', 'Karton', 0),
(122, 'cream 21 sugar cho', 'Makanan', 'Karton', 0),
(123, 'cream 21 pineapple', 'Makanan', 'Karton', 0),
(124, 'cream 21 banana', 'Makanan', 'Karton', 0),
(125, 'cream 21 orange', 'Makanan', 'Karton', 0),
(126, 'cream 21 cappucino', 'Makanan', 'Karton', 0),
(127, 'cream 21 strawberry', 'Makanan', 'Karton', 0),
(128, 'cream 21 vanila', 'Makanan', 'Karton', 0),
(129, 'cream 21 kopi susu', 'Makanan', 'Karton', 0),
(130, 'cream 21 cok milk', 'Makanan', 'Karton', 0),
(131, 'cream 21 lemon milk', 'Makanan', 'Karton', 0),
(132, 'preto vanilla', 'Makanan', 'Karton', 0),
(133, 'preto peanut', 'Makanan', 'Karton', 0),
(134, 'preto coklat', 'Makanan', 'Karton', 0),
(135, 'marie susu 160', 'Makanan', 'Karton', 0),
(136, 'malkis cracker 30', 'Makanan', 'Karton', 0),
(137, 'malkis coklat 120', 'Makanan', 'Karton', 0),
(138, 'gem bunga 4,5', 'Makanan', 'Karton', 0),
(139, 'gem bunga 120', 'Makanan', 'Karton', 0),
(140, 'delux chocochip', 'Makanan', 'Karton', 0),
(141, 'peanut kacang 12', 'Makanan', 'Karton', 0),
(142, 'peanut kacang 24', 'Makanan', 'Karton', 0),
(143, 'shp 120', 'Makanan', 'Karton', 0),
(144, 'shp 36 kelapa', 'Makanan', 'Karton', 0),
(145, 'shp 36 oroginal', 'Makanan', 'Karton', 0),
(146, 'delux natchip 120', 'Makanan', 'Karton', 0),
(147, 'deluc natchip 24', 'Makanan', 'Karton', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
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
  `letak_brg` varchar(15) NOT NULL,
  `sisa` int(11) NOT NULL,
  `no_polisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_salin`, `tgl_masuk`, `no_sj`, `id_sup`, `id_brg`, `jenis_brg`, `satuan`, `jumlah`, `harga_beli`, `harga_jual`, `letak_brg`, `sisa`, `no_polisi`) VALUES
(7, '2018-05-30', '2480/V/18', '1', '145', 'Makanan', 'Karton', 150, 160000, 165000, '3C', 150, 'BB 9209 FA'),
(8, '2018-05-30', '2480/V/18', '1', '2', 'Makanan', 'Karton', 900, 80000, 85000, '3C', 900, 'BB 9209 FA'),
(9, '2018-05-30', '2480/V/18', '1', '4', 'Makanan', 'Karton', 138, 80000, 85000, '1C', 138, 'BB 9209 FA'),
(10, '2018-05-30', '2480/V/18', '1', '1', 'Makanan', 'Karton', 100, 80000, 85000, '1C', 100, 'BB 9209 FA'),
(11, '2018-05-30', '2480/V/18', '1', '3', 'Makanan', 'Karton', 200, 80000, 85000, '1D', 200, 'BB 9209 FA'),
(12, '2018-05-30', '2487/V/18', '1', '141', 'Makanan', 'Karton', 100, 70000, 70500, '1B', 100, 'B 9038 TPA'),
(13, '2018-05-30', '2487/V/18', '1', '117', 'Makanan', 'Karton', 250, 100000, 102000, '3B', 250, 'B 9038 TPA'),
(14, '2018-05-30', '2487/V/18', '1', '114', 'Makanan', 'Karton', 25, 45000, 48500, '3C', 25, 'B 9038 TPA'),
(15, '2018-05-30', '2487/V/18', '1', '144', 'Makanan', 'Karton', 150, 160000, 165000, '3C', 150, 'B 9038 TPA'),
(16, '2018-05-30', '2487/V/18', '1', '130', 'Makanan', 'Karton', 25, 85000, 89500, '1D', 25, 'B 9038 TPA'),
(17, '2018-05-30', '2487/V/18', '1', '131', 'Makanan', 'Karton', 25, 85000, 89500, '1D', 25, 'B 9038 TPA'),
(18, '2018-05-30', '2487/V/18', '1', '129', 'Makanan', 'Karton', 20, 85000, 89500, '1D', 20, 'B 9038 TPA'),
(19, '2018-05-30', '2487/V/18', '1', '132', 'Makanan', 'Karton', 20, 85000, 89500, '1B', 20, 'B 9038 TPA'),
(20, '2018-05-30', '2487/V/18', '1', '133', 'Makanan', 'Karton', 20, 85000, 89500, '1B', 20, 'B 9038 TPA'),
(21, '2018-05-30', '2487/V/18', '1', '134', 'Makanan', 'Karton', 20, 85000, 89500, '1B', 20, 'B 9038 TPA'),
(22, '2018-05-30', '2487/V/18', '1', '135', 'Makanan', 'Karton', 50, 85000, 89500, '1B', 50, 'B 9038 TPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Tidak Bisa Dimakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plg` int(15) NOT NULL,
  `nm_plg` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_plg`, `nm_plg`, `alamat`, `telp`) VALUES
(1, 'arizona edi', 'pasar sungai penuh', '-'),
(2, 'dena', 'semurup', '-'),
(3, 'Gita ', 'dihatimu', '082279312028'),
(4, 'airin', 'kayuaro', '-'),
(5, 'mm arni', 'pasar sungai penuh', '-'),
(6, 'mm iko', 'pasar sungai penuh', '-'),
(7, 'mm shabil', 'pasar sungai penuh', '-'),
(8, 'mm athaya', 'pasar sungai penuh', '-'),
(9, 'sinar danau', 'jujun', '-'),
(10, 'sinar mutiara', 'tanah kampung', '-'),
(11, 'veto', 'kayuaro', '-'),
(12, 'beni', 'hiang', '-'),
(13, 'wijaya mart', 'pasar sungai penuh', '-'),
(14, 'putri asyira', 'semurup', '-'),
(15, 'bogi', 'sulak', '-'),
(16, 'nika', 'sulak', '-'),
(17, 'fikri', 'kayuaro', '-'),
(18, 'hendri', 'jujun', '-'),
(19, 'sakinah', 'cupak', ''),
(20, 'sinta', 'pasar sungai penuh', '-'),
(21, 'arizona', 'pasar sungai penuh', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
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
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_order`, `tgl_faktur`, `nama_sales`, `id_plg`, `id_brg`, `harga`, `jumlahk`, `total_hrg`) VALUES
(5, '2019-03-01', 'ade', '3', '3', 85000, 2, 170000),
(6, '2019-03-08', 'ridwan', '3', '2', 85000, 5, 425000),
(7, '2019-03-06', 'ade', '10', '13', 25000, 2, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sales` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pesanan` text COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `sales`, `pesanan`, `nohp`, `tgl`) VALUES
(5, 'arizona edi', 'pilih sales', '2 karton shp 36 kelapa, 2 karton shp 36 ori, 5 karton atb 24', '-', '16-03-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(8, 'Karton'),
(9, 'Karung'),
(10, 'Ikat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(15) NOT NULL,
  `nm_sup` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nm_sup`, `alamat`, `tlp`) VALUES
(1, 'ASW Food', 'Jl Yang Lurus', '081277332290'),
(2, 'Artaboga', 'Jl Yang benar', '081277332280'),
(3, 'Aqua', 'Jl Johor Bahru No.31', '081270389910'),
(4, 'Mayora ', 'Jl Kebenaran', '081277332240'),
(5, 'nagata', 'jakarta barat', '082279312022');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_salin`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kd_salin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_plg` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_order` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
