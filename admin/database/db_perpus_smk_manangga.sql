-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 06:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_smk_manangga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `kode_anggota` varchar(8) NOT NULL,
  `nama_anggota` varchar(35) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `no_kelas` varchar(2) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`kode_anggota`, `nama_anggota`, `tingkat`, `jurusan`, `no_kelas`, `no_hp`, `alamat`, `username`, `password`, `foto`) VALUES
('ANG001', 'ADAM', 'X', 'Teknik Kendaraan Ringan (TKR)', '1', '8798U79080', 'GYHUGHJGJ', 'ADAM', '333d749a7effaa4922bb5f4fb130a2ff', 'Penguins.jpg'),
('ANG002', 'DEDE', 'X', 'Teknik Kendaraan Ringan (TKR)', '2', '242343', 'KARANGNUNGGAL', 'DEDE', '1bb3ca2e563649f920e2f65f1caa3bce', 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_acara`
--

CREATE TABLE `tb_berita_acara` (
  `id_berita` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tujuan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita_acara`
--

INSERT INTO `tb_berita_acara` (`id_berita`, `tanggal`, `nama`, `tujuan`) VALUES
(1, '2018-10-18', 'dede', 'meminjam buku'),
(2, '2018-10-18', 'dede', 'meminjam buku');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kode_buku` varchar(35) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `ddc` varchar(35) NOT NULL,
  `kategori` varchar(35) NOT NULL,
  `format` varchar(35) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(35) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `edisi` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `view` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `isbn`, `judul_buku`, `ddc`, `kategori`, `format`, `pengarang`, `penerbit`, `tahun_terbit`, `edisi`, `stok`, `cover`, `view`, `tanggal_masuk`) VALUES
('BK001', '567890435678', 'LIHAT KEBUNKU', 'DDC 1', 'KATEGORI 1', 'FORMAT 1', 'DFGHJ', 'CUNGUR', '2031', '1', 205, 'Jellyfish.jpg', 1, '0000-00-00'),
('BK002', '23456789', 'sdfghj', 'DDC 1', 'KATEGORI 1', 'FORMAT 1', 'DFGHJ', 'CUNGUR', '2091', '1', 304, 'Tulips.jpg', 6, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ddc`
--

CREATE TABLE `tb_ddc` (
  `kode_ddc` varchar(8) NOT NULL,
  `nama_ddc` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ddc`
--

INSERT INTO `tb_ddc` (`kode_ddc`, `nama_ddc`) VALUES
('DDC001', 'DDC 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_peminjaman`
--

CREATE TABLE `tb_det_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `no_peminjaman` varchar(30) NOT NULL,
  `kode_anggota` varchar(30) NOT NULL,
  `kode_buku` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_det_peminjaman`
--

INSERT INTO `tb_det_peminjaman` (`id_peminjaman`, `no_peminjaman`, `kode_anggota`, `kode_buku`, `status`) VALUES
(1, 'P.001', 'ANG001', 'BK001', 'Dikembalikan'),
(2, 'P.002', 'ANG001', 'BK001', 'Dikembalikan'),
(3, 'P.002', 'ANG001', 'BK002', 'Dikembalikan'),
(4, 'P.003', 'ANG002', 'BK001', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_pengembalian`
--

CREATE TABLE `tb_det_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `no_pengembalian` varchar(35) NOT NULL,
  `kode_anggota` varchar(35) NOT NULL,
  `kode_buku` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_det_pengembalian`
--

INSERT INTO `tb_det_pengembalian` (`id_pengembalian`, `no_pengembalian`, `kode_anggota`, `kode_buku`) VALUES
(1, 'PNG001', 'ANG001', 'BK001'),
(2, 'PNG002', 'ANG001', 'BK001'),
(3, 'PNG003', 'ANG001', 'BK002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_format`
--

CREATE TABLE `tb_format` (
  `kode_format` varchar(8) NOT NULL,
  `nama_format` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_format`
--

INSERT INTO `tb_format` (`kode_format`, `nama_format`) VALUES
('F001', 'FORMAT 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kode_kategori` varchar(8) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kode_kategori`, `nama_kategori`) VALUES
('K001', 'KATEGORI 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `no_peminjaman` varchar(20) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `kode_anggota` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `no_peminjaman` varchar(35) NOT NULL,
  `kode_anggota` varchar(35) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`no_peminjaman`, `kode_anggota`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
('P.001', 'ANG001', '2018-10-17', '2018-10-17'),
('P.002', 'ANG001', '2018-10-17', '2018-10-17'),
('P.003', 'ANG002', '2018-10-17', '2018-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `kode_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`kode_penerbit`, `nama_penerbit`) VALUES
('P001', 'CUNGUR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `no_pengembalian` varchar(35) NOT NULL,
  `no_peminjaman` varchar(35) NOT NULL,
  `kode_anggota` varchar(35) NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lama_keterlambatan` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`no_pengembalian`, `no_peminjaman`, `kode_anggota`, `tanggal_dikembalikan`, `jumlah_buku`, `lama_keterlambatan`, `denda`) VALUES
('PNG001', 'P.001', 'ANG001', '2018-10-17', 1, 0, 0),
('PNG002', 'P.002', 'ANG001', '2018-10-17', 1, 0, 0),
('PNG003', 'P.002', 'ANG001', '2018-10-17', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `kode_petugas` varchar(5) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status_keaktifan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`kode_petugas`, `nama_lengkap`, `username`, `password`, `alamat`, `status_keaktifan`) VALUES
('PT001', 'DEDE', 'DEDE', '1bb3ca2e563649f920e2f65f1caa3bce', 'DEDE', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `kode_rak` varchar(8) NOT NULL,
  `nama_rak` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`kode_rak`, `nama_rak`) VALUES
('R001', 'RAK 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indexes for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `tb_ddc`
--
ALTER TABLE `tb_ddc`
  ADD PRIMARY KEY (`kode_ddc`);

--
-- Indexes for table `tb_det_peminjaman`
--
ALTER TABLE `tb_det_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_det_pengembalian`
--
ALTER TABLE `tb_det_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tb_format`
--
ALTER TABLE `tb_format`
  ADD PRIMARY KEY (`kode_format`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`,`kode_anggota`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`kode_penerbit`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`no_pengembalian`,`no_peminjaman`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`kode_rak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_det_peminjaman`
--
ALTER TABLE `tb_det_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_det_pengembalian`
--
ALTER TABLE `tb_det_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
