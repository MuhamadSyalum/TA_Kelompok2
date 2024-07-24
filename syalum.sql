-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 04:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syalum`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `icon`) VALUES
(1, 'Fashion', 'fas fa-tshirt'),
(2, 'Makanan', 'fas fa-hamburger'),
(4, 'Elektronik', 'fas fa-mobile'),
(5, 'Olahraga', 'fas fa-futbol');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`, `id_kota`) VALUES
(1, 'Antapani', 1),
(2, 'Arcamanik', 1),
(3, 'Buah Batu', 1),
(4, 'UjungBerung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `kelurahan`, `id_kecamatan`) VALUES
(1, 'Antapani Kidul', 1),
(2, 'Antapani Kulon', 1),
(3, 'Antapani Tengah', 1),
(4, 'Antapani Wetan', 1),
(5, 'Cisaranten Bina Harapan', 2),
(6, 'Cisaranten Endah', 2),
(7, 'Cisaranten Kulon', 2),
(8, 'Sukamiskin', 2),
(9, 'Cijawura', 3),
(10, 'Jatisari', 3),
(11, 'Margasari', 3),
(12, 'Sekejati', 3),
(13, 'Cigending', 4),
(14, 'Pasanggrahan', 4),
(15, 'Pasirendah', 4),
(16, 'Pasirjati', 4),
(17, 'Pasirwangi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'Bandung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `email`, `password`, `alamat`, `jenis_kelamin`) VALUES
(1, 'syalum', 'msyalum@gmail.com', '1234', 'bandung', 'laki laki'),
(2, 'salumm', 'msyalum2@gmail.com', '1111', 'bandung', 'laki laki'),
(3, 'suci', 'suci@gmail.com', '1234', 'soreang', 'perempuan'),
(28, 'sofia fitriany', 'sofia@gmail.com', '123', 'bandung', 'laki laki'),
(62, 'Muhamad Syalum', 'apasih@gmail.com', '1234', 'bandung', 'laki laki'),
(63, 'azka nurul', 'azka@gmail.com', 'Syalum123', 'Bandung', 'Laki Laki');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `status_produk` tinyint(1) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`, `status_produk`, `dibuat`) VALUES
(29, 2, 'Keripik Kulit pisang', 15000, 'keripik kulit pisang asli buatan masyarakat desa parakan saat berbahan halal dan bersih dijamin kulit pisang sendiri mempunyai khasiat tersendiri yang bagus kita berat bersih nya sendiri berada di berat 150gram', 'produk1705934247.png', 1, '0000-00-00 00:00:00'),
(30, 4, 'iphone 15 pro max', 24000000, 'ini adalah iphone 15 promax silahkan dipesen aja yahh', 'produk1705934339.jpeg', 1, '0000-00-00 00:00:00'),
(31, 5, 'Sepatu futsal x munich g3 canvas 170', 899000, '<p>ini adalah sepatu futsal x munich g3 indoor silahkan dipesen aja yahh</p>\r\n', 'produk1705934427.jpg', 1, '0000-00-00 00:00:00'),
(32, 5, 'sepatu x munich g3 indoor', 999000, '<p>ini adalah sepatu futsal x munich g3 indoor silahkan dipesen aja yahh</p>\r\n', 'produk1705934542.jpeg', 1, '0000-00-00 00:00:00'),
(33, 5, 'Sepatu futsal ortuseight jogosala venom', 299000, 'ini adalah sepatu futsal ortuseight silahkan dipesen aja yahh', 'produk1705934668.jpg', 1, '0000-00-00 00:00:00'),
(34, 4, 'Infinix hot 30i', 1399000, 'ini adalah infinix hot 30i silahkan dipesen aja yahh', 'produk1705934919.jpeg', 1, '0000-00-00 00:00:00'),
(35, 4, 'Infinix note 30 pro', 2399000, 'ini adalah infinix hot 30 pro silahkan dipesen aja yahh', 'produk1705935175.jpg', 1, '0000-00-00 00:00:00'),
(36, 2, 'Kulit Pangsit', 6000, 'ini adalah Kulit Pangsit silahkan dipesen aja yahh', 'produk1705935238.jpeg', 1, '0000-00-00 00:00:00'),
(37, 2, 'Mie Ayam', 10000, 'ini adalah Mie Ayam silahkan dipesen aja yahh', 'produk1705935288.jpeg', 1, '0000-00-00 00:00:00'),
(38, 1, 'kaos bad ler', 199000, 'ini adalah Kaos Bad Ler silahkan dipesen aja yahh', 'produk1705935350.png', 1, '0000-00-00 00:00:00'),
(39, 1, 'Kaos Get Rekt', 239000, 'ini adalah Kaos Get Rekt silahkan dipesen aja yahh', 'produk1705935399.png', 1, '0000-00-00 00:00:00'),
(40, 1, 'Kaos Pro Public', 169000, 'ini adalah Kaos Pro Public silahkan dipesen aja yahh', 'produk1705935441.png', 1, '0000-00-00 00:00:00'),
(41, 1, 'Pakaian wanita satu setel', 129900, 'ini adalah pakaian wanita silahkan dipesen aja yahh', 'produk1705981585.jpeg', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nama`, `gambar`, `deskripsi`) VALUES
(1, 'adam', 'saran1705925042.jpg', 'ini saran percobaan'),
(2, 'Anisa Novia R', 'saran1705933285.jpg', 'Toko nya bagus  pelayanan nya juga ramah barang barang juga pada sesuai dengan produk harga murah '),
(3, 'Tasya Putri', 'saran1705933375.png', 'overall sih oke tinggal lebih dibanyakkin lagi barangnya aja, udah puas sih dengan pelayanan dan semuanya apalagi adminnya'),
(4, 'Rahmi', 'saran1705933847.jpg', 'Harga produk murah dan terjangkau, gambar sesuai dengan yang ada pada iklan. Makanan dan minuman nya enak, harga sesuai pengiriman dihari yang sama jadi masih terasa hangat dan dinginnya❤️.'),
(5, 'Khurin Aini', 'saran1705933887.png', 'harga produk murah dan terjangkau, gambar sesuai dengan yang ada pada iklan. Baju nya pada enak digunakan dan bahan lembut serta nyaman.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Muhamad Syalum', 'admin', 'fcea920f7412b5da7be0cf42b8c93759', '+6283819181429', 'msyalum@gmail.com', 'Jl Parakan saat, Arcamanik, Bandung.'),
(2, 'Muhamad Syalum', 'syalum', '12345', '083819181429', 'msyalum@gmail.com', 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kecamatan` (`id_kota`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_kecamatan` (`id_provinsi`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `category_id` (`id_kategori`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
